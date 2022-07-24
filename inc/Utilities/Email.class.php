 <?php

//    require 'class/class.phpmailer.php';

//    $mail = new ;
//    $mail->IsSMTP();
//    $mail->Host = 'smtpout.secureserver.net';
//    $mail->Port = '80';
//    $mail->SMTPAuth = true;
//    $mail->Username = 'xxxxxxxxxxxxxx';
//    $mail->Password = 'xxxxxxxxxxxxxx';
//    $mail->SMTPSecure = '';
//    $mail->From = 'tutorial@webslesson.info';
//    $mail->FromName = 'Webslesson';
//    $mail->AddAddress($user_email);
//    $mail->WordWrap = 50;
//    $mail->IsHTML(true);
//    $mail->Subject = 'Verification code for Verify Your Email Address';

//    $message_body = '
//    <p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
//    <p>Sincerely,</p>
//    <p>Webslesson.info</p>
//    ';
//    $mail->Body = $message_body;

//    if($mail->Send())
//    {
//     echo '<script>alert("Please Check Your Email for Verification Code")</script>';

//     header('location:email_verify.php?code='.$user_activation_code);
//   } 