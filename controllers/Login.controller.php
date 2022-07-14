<?php

    require_once('../views/component/footer.page.php');
    require_once('../views/component/header.page.php');
    require_once('../views/Login.page.php');

    PageHeader::header();
   // PageHeader::nav();
    PageLogin::login();

    if(!empty($_POST) && isset($_POST))
    {
        echo "".$_POST['email'];
        echo "".$_POST['password'];
    }
    //PageFooter::footer();

?>