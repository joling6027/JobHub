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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://smtpjs.com/v3/smtp.js"></script>
            <script src="../js/script.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../css/custom.css">
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <title>Job Hub</title>

            <?php

            if ($flag) {
            ?>


                <link rel="stylesheet" type="text/css" href="../css/custom.css">
        </head>

        <body>
            <header class="bg pt-2 pb-2 d-flex fixed">
                <div class="container">
                    <?php
                    //if user is admin, go to admin control page, otherwise go to user entrance page
                    $home = '';
                    if (!empty($_SESSION) && $_SESSION['user_role'] == 'Admin')
                        $home = "Index.controller.php";
                    else
                        $home = "user_entrance.controller.php";

                    ?>
                    <a href="<?php echo $home ?>" class="logo text-white d-inline"> Job Hub </a>
                    <div class="dropdown d-inline float-end w-20">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            if (!empty($_SESSION))
                                echo $_SESSION['username']['Name'];
                            else
                                echo "User Login";
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                            if (!empty($_SESSION)) {
                            ?>
                                <input type="hidden" id="mailTo" value="<?= $_SESSION['username']['Email'] ?>">
                                <input type="hidden" id="mailFrm" value="<?= FROM_EMAIL ?>">
                                <input type="hidden" id="token" value="<?= SECURE_TOKEN ?>">
                                <li><a class="dropdown-item changePwd" href="javascript:void(0)">Change Password</a></li>
                                <li><a class="dropdown-item" href="../controllers/Login.controller.php">Logout</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a class="dropdown-item" href="../controllers/Login.controller.php">Log In</a></li>
                                <li><a class="dropdown-item" href="../controllers/Register.controller.php">Register</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
            </header>
            <!--  Forgot Password Modal -->
            <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div id="modelPopup" class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="modal-myform" class=" col" method="post" action="../controllers/Change_password.controller.php">
                                <div class="mb-3 otp-visible">
                                    <div class="mb-3 bg-success bg-opacity-25 mt-0 p-2 border border-success rounded sent-msg">
                                        <i><strong>Email is successfully sent. </strong>
                                            <small>Please check spam as well.</small></i>
                                    </div>
                                    <div class="mb-3 bg-danger bg-opacity-25 mt-0 p-2 border border-success rounded err-msg">
                                        <i><strong>Wrong OTP. </strong>
                                            <small>Please check spam as well.</small></i>
                                    </div>
                                    <div class="mb-3 bg-danger bg-opacity-25 mt-0 p-2 border border-success rounded missed-otp-msg">
                                        <i><strong>OTP Expired !! </strong>
                                            <small><a class="dropdown-item changePwd link-primary" href="javascript:void(0)">Click again to Change Password to get new otp.</a> </small></i>
                                    </div>
                                    <label for="otp" class="form-label">Enter OTP</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control round-input-otp" value=" " id="otp">
                                        <button id="otpBtn" type="button" class="btn bg-secondary round-btn-otp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3 hide-pass">
                                    <label for="newpassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword">
                                </div>
                                <div class="mb-3 hide-pass">
                                    <label for="conpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="conpassword" id="conpassword">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer hide-model">
                            <button id="closeBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input id="saveChange" type="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </div>
                </div>
            </div>


        <?php
            } else {
        ?>
        <link rel="stylesheet" type="text/css" href="../css/custom.css">
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
