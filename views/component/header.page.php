<?php

class PageHeader
{

    static function header($flag = false)
    {
        ?>
        <!-- <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Job Hub</title>

                     Google font -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet"> -->

        <!-- Bootstrap CDN -->
        <!-- CSS only -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
        <!-- JavaScript Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="../CSS/style.css">
                </head> -->


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
           
            
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <title>Job hub Admin</title>
        
        <?php

        if ($flag) 
        {
            ?>
             <link rel="stylesheet" type="text/css" href="../../css/custom.css">
</head>
                <body>
                    <header class="bg pt-2 pb-2 d-flex fixed">
                        <div class="container">
                            <a href="#" class="logo text-white d-inline"> Job Hub </a>
                            <div class="dropdown d-inline float-end w-20">
                                <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                      echo $_SESSION['username']['Name'];
                                    ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                                    <li><a class="dropdown-item" href="../../controllers/Logout.controller.php">Logout</a></li>
                                </ul>
                            </div>
                    </header>
                <?php
        }else{
            ?>
            <link rel="stylesheet" href="../css/style.css">
            </head>
             <body>
                <div class="container">
                    <section id="title">
                        <!-- Nav bar -->
                        <nav class="navbar navbar-expand-lg">
                            <!-- <a class="navbar-brand fs-1" href="index.html">Job Portal</a> -->
                        </nav>
                    </section>
            <?php
        }
         
    }

}