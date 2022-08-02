<?php
    require_once('../inc/config.inc.php');
    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../views/User_details.page.php');
    require_once('../inc/Utilities/PDOService.php');
    require_once('../inc/Utilities/UsersDAO.class.php');
    require_once('../models/Users.class.php');
    require_once('../inc/Utilities/LoginManager.class.php');
    require_once('../inc/Utilities/Extension.class.php');
    require_once('../inc/Utilities/Validation.class.php');

if(LoginManager::verifyLogin()){
    UsersDAO::initialize(USERS);
    if(!empty($_POST) && isset($_POST))
    {
        PageUserDetails::$errors = [];
        $user = new Users();
        $user->setFname($_POST['fname']);
        $user->setLname($_POST['lname']);
        $user->setPhone((int)$_POST['phone']);
        $user->setUserID($_POST['id']);
        $isValid = Validate::validateUserDetail($user);
        PageUserDetails::$errors = $isValid;
        if(count($isValid) <= 0){
          $res = UsersDAO::updateUser($user);

          if($res > 0)
          {
            $_SESSION['username']['Name'] =$user->getFname()." ". $user->getLname();
            $_SESSION['msg']['success']  = "User Info is updated sucessfully.";
          }
          else{
            $_SESSION['msg']['error'] = "User Info is not updated.";
          }
          $_SESSION['msg']['url'] = LOCATION_ADMIN;
          header("Location: ".LOCATION_ADMIN);
          exit;
        }
        else{
          PageHeader::header(true);
          $user = UsersDAO::getUserById($user->getUserID());
          PageUserDetails::userInfo($user);
          PageFooter::footer(true);
        }
    }
    else
    {
        PageHeader::header(true);
        if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
            $user = UsersDAO::getUserById($_GET['id']);
        }
        PageUserDetails::userInfo($user);
        PageFooter::footer(true);
    }
}
else{
  // PageHeader::header(true);
  header("Location: ". LOCATION_LOGIN);
  exit;
}
