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

    $('#delBtn').click(function(){
      location.href = $('#del_loc').val() + usrId;
    //   location.href = "<?=$_SERVER['PHP_SELF']."?action=delete&id="?>"+usr_id;
    });

    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tblUsr tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});