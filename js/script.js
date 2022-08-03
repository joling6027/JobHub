$(document).ready(function(){

    //Header JS
    var global_var_otp;
    var clearInterval;
    var usrId;
    $('.changePwd').click(function(e){
        e.preventDefault();
        $('#otp').val('');
        $("#modelPopup").removeClass("modal-lg");
        $(".modal-footer").addClass("hide-model");
        $(".hide-pass").addClass("hide-model");
        $(".otp-visible").removeClass("hide-model");
        $(".sent-msg").addClass("hide-model");
        $(".err-msg").addClass("hide-model");
        $(".missed-otp-msg").addClass("hide-model");
        $('#staticBackdrop').modal('show')
        sendEmail();
        clearInterval = setTimeout(function() 
            {
                global_var_otp = "";
                $(".sent-msg").addClass("hide-model");
                $(".err-msg").addClass("hide-model");
                $(".missed-otp-msg").removeClass("hide-model");
            }, 100000);
    });

    $('.forgetPwd').click(function(e){
        e.preventDefault();
        $("#modelPopup").removeClass("modal-lg");
        $(".modal-footer").addClass("hide-model");
        $(".hide-pass").addClass("hide-model");
        $(".otp-visible").addClass("hide-model");
        $(".sent-msg").addClass("hide-model");
        $(".err-msg").addClass("hide-model");
        $('.err').addClass('d-none');
        $(".missed-otp-msg").addClass("hide-model");
        $('#staticBackdrop').modal('show')
    });

    $('#emailBtn').click(function(e){
        e.preventDefault();
        if(!validation())
        {
            $('.err').removeClass('d-none');
        }
        else{
            $('#otp').val('');
            $("#modelPopup").removeClass("modal-lg");
            $(".modal-footer").addClass("hide-model");
            $(".hide-pass").addClass("hide-model");
            $(".hide-email").addClass("hide-model");
            $(".otp-visible").removeClass("hide-model");
            $(".sent-msg").addClass("hide-model");
            $(".err-msg").addClass("hide-model");
            $('.err').addClass('d-none');
            $(".missed-otp-msg").addClass("hide-model");
            $('#staticBackdrop').modal('show')
            sendEmail();
            clearInterval = setTimeout(function() 
                {
                    global_var_otp = "";
                    $(".sent-msg").addClass("hide-model");
                    $(".err-msg").addClass("hide-model");
                    $(".missed-otp-msg").removeClass("hide-model");
                }, 100000);
        }
       
    });

    $("#otpBtn").click(function(e){
        e.preventDefault();
        var value = $('#otp').val();
        if(value && value == global_var_otp){
            $("#modelPopup").addClass("modal-lg");
            $(".modal-footer").removeClass("hide-model");
            $(".otp-visible").addClass("hide-model");
            $(".hide-pass").removeClass("hide-model");
            clearTimeout(clearInterval);
        }
        else{
            $(".sent-msg").addClass("hide-model");
            $(".err-msg").removeClass("hide-model")
        }
    });

    function validation(){
        var email = $('#mailTo').val();
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(email);
    }

    $("#modal-myform").submit(function (e) {
        if(!isChangePassword()){
            e.preventDefault();
            return false;
        }
    });

    function isChangePassword(){
        var new_pass = $('#newpassword').val();
        var con_pass = $('#conpassword').val();
        var pattern = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/);
        var isValid = true;
        if(new_pass === con_pass){
            if(!(pattern.test(new_pass)))
            {
                $('.err-new-pass').removeClass('d-none');
                $('.err-new-pass').text('Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.');
                isValid = false;
            }

            if(!(pattern.test(new_pass)))
            {
                $('.err-con-pass').removeClass('d-none');
                $('.err-con-pass').text('Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.');
                isValid = false;
            }
        }
        else{
            $('.err-match-pass').removeClass('d-none');
            $('.err-match-pass').text('Password not matched.');
            isValid = false;
        }
        return isValid
    }

    $('#saveChange').click(function(){
        $('#modal-myform').submit();
    });
    
    function sendEmail()
    {
        $(".err-msg").addClass("hide-model");
        var otp= Math.floor((Math.random() * 999999) + 100000);
        global_var_otp = otp;
        Email.send({
        SecureToken : $('#token').val(),
        To : $('#mailTo').val(),
        From : $('#mailFrm').val(),
        Subject : "DONOT REPLY: ONE TIME PASSWORD (OTP)",
        Body : "<html><h2>ONE TIME PASSWORD</h2><strong>Your code is: "+otp+"</strong><br></br><em>Please do not share with anyone.</em></html>"
        }).then(
            setTimeout(function() 
            {
                 $(".sent-msg").removeClass("hide-model")
            }, 3000)
        );
    }


    //Index JS
    $('.deleteuser').click(function(e){
      e.preventDefault();
      usrId = $(this).closest('tr').find('#delete_usr_id').val();
      $('#deletemodal').modal('show')
    });

    $('.del_job').click(function(e){
        e.preventDefault();
        $('#deletemodal').modal('show')
      });

      $('#delJobBtn').click(function(){
        location.href = $('#del_jobId').val();
      });
  
    
    $('#delBtn').click(function(){
      location.href = $('#del_loc').val() + usrId;
    });

    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tblUsr tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#searchJob").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#jobCard a").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});