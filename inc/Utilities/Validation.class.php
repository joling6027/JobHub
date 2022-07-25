<?php

class Validate{

  static $validate = true;

  static function validateRegistration(){

    //email, fname, lname, phone, password

    //validate first name
    if(strlen($_POST['fname']) == 0){
      $validate = false;
      PageRegister::$notification = " first name,";
    }

    //validate last name
    if(strlen($_POST['lname']) == 0){
      $validate = false;
      PageRegister::$notification .= " last name,";
    }

    //validate email
    $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if(!$filteredEmail){
      $validate = false;
      PageRegister::$notification .= " email,";
    }

    //validate phone number
    $option = array("options" => array("regexp" => PHONE_VALIDATION));
    $filterPhone = filter_input(INPUT_POST, "phoneNumber", FILTER_VALIDATE_REGEXP, $option);
    if(!$filterPhone){
      $validate = false;
      PageRegister::$notification .= " phone number,";
    }

    //validate agreement checkbox
    if (!isset($_POST['agreement'])) {
      $validate = false;
      PageRegister::$notification .= "and agreement";
    }

    //validate password
    //Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character
    $pass_option = array("options"=> array("regexp" => PASS_VALIDATION));
    $filterPassword = filter_input(INPUT_POST,"password", FILTER_VALIDATE_REGEXP, $pass_option);
    if(!$filterPassword){
      $validate = false;
      PageRegister::$notification .= "\nPassword should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.";
    }

    

  }

}

?>