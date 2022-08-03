<?php

class Validate{

  static function inputValidation(){

    $validate = true;

    //email, fname, lname, phone, password

    //for registration form
    if(isset($_POST['register'])){

      //validate first name
      //should contains no digits
      if (strlen(trim($_POST['fname'])) == 0 || preg_match('~[0-9]~', $_POST['fname'])) {
        $validate = false;
        PageRegister::$notification['name'] = "First name and/or last name should not be empty or contain numbers.";
      }

      //validate last name
      //should contains no digits
      if (strlen(trim($_POST['lname'])) == 0 || preg_match('~[0-9]~', $_POST['lname'])) {
        $validate = false;
        PageRegister::$notification['name'] = "First name and/or last name shouldn't be empty.";
      }

      //validate email
      $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      if (!$filteredEmail) {
        $validate = false;
        PageRegister::$notification['email'] = "Please enter a correct email address.";
      }

      //validate phone number
      $option = array("options" => array("regexp" => PHONE_VALIDATION));
      $filterPhone = filter_input(INPUT_POST, "phone", FILTER_VALIDATE_REGEXP, $option);
      if (!$filterPhone) {
        $validate = false;
        PageRegister::$notification['phone'] = "Phone number should be 10 numbers.";
      }

      //validate agreement checkbox
      if (!isset($_POST['agreement'])) {
        $validate = false;
        PageRegister::$notification['agreement'] = "Please make sure you agree with our terms.";
      }

      //validate password
      //Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character
      $pass_option = array("options" => array("regexp" => PASS_VALIDATION));
      $filterPassword = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, $pass_option);
      if (!$filterPassword) {
        $validate = false;
        PageRegister::$notification['password'] =
          "Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.";
      }

    }

    //log in password
    if(isset($_POST['login'])){
      $pass_option = array("options" => array("regexp" => PASS_VALIDATION));
      $filterPassword = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, $pass_option);
      if (!$filterPassword) {
        $validate = false;
        PageLogin::$notification['password'] =
        "Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.";
      }
    }

    return $validate;

  }

  //Validation on user detail update/edit page
  static function validateUserDetail(Users $user){

    $notification = [];
    if (strlen(trim($user->getFname())) == 0 || preg_match('~[0-9]~', $user->getFname())) {
     $notification['fname'] = "First name should not be empty or contain numbers.";
    }

    if (strlen(trim($user->getLname())) == 0 || preg_match('~[0-9]~', $user->getLname())) {
      $notification['lname'] = "Last name should not be empty or contain numbers.";
    }

    $option = array("options" => array("regexp" => PHONE_VALIDATION));
    $filterPhone = filter_var($user->getPhone(), FILTER_VALIDATE_REGEXP, $option);
    if (!$filterPhone) {
      $notification['phone'] = "Phone number should be 10 numbers.";
    }

    return $notification;
  }

  //Validation on create new Job
  static function validateNewJob(Jobs $job){
    $notification = [];
    if (strlen(trim($job->getCompanyName())) == 0) {
      $notification['companyName'] = "Company name should not be empty.";
    }

    if (strlen(trim($job->getJobPosition())) == 0) {
      $notification['jobtitle'] = "Job Title should not be empty.";
    }

    if (strlen(trim($job->getJobLocation())) == 0) {
      $notification['jobLocation'] = "Job location should not be empty.";
    }

    if(trim($job->getsalary())<= 0){
      $notification['salary'] = "Salary should be greater than 0.";
    }

    return $notification;
  }

  static function validateChangePassword($new_password, $con_password){
    $notification = [];

    if(trim($new_password) == trim($con_password) )
    {
      $pass_option = array("options" => array("regexp" => PASS_VALIDATION));
      $filterPassword = filter_var($new_password, FILTER_VALIDATE_REGEXP, $pass_option);
      if (!$filterPassword) {
       $notification['new_password'] ="Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.";
      }
  
      $filterPassword = filter_var($con_password, FILTER_VALIDATE_REGEXP, $pass_option);
      if (!$filterPassword) {
       $notification['con_password'] ="Password should be min 8 chars, 1 uppercase, 1 lowercase, 1 number and 1 special character.";
      }
    }
    else{
      $notification['match_password'] ="Password not matched.";
    }
    return $notification;
  }
}

?>