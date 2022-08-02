<?php

class PageLogin
{
    public static $notification;

    static function login()
    {
?>
        <section class="vh-100 mx-auto d-inline">
            <div class="container-fluid h-custom card mb-2 loginContainer" style="z-index:auto">
                <div class="row d-flex justify-content-center align-items-center h-100 loginMargin">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="../images/registeration.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <h3>Welcome to Job Hub</h3> <br>
                            <?php if (!empty(self::$notification['loginError'])) echo "<p style=\"color:red; \">" . self::$notification['loginError'] . "</p>"; ?>

                            <!-- email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required />
                                <!-- <span class="text-danger d-none mb-0 p-2 err">
                                     Please enter email address.
                                </span> -->
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="javascript:void(0)" class="text-body forgetPwd">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                               
                                <input type="submit" class=" btn-info btn btn-lg" value="Login" name="login">
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="../controllers/Register.controller.php" class="link-primary">Register</a>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Want to keep searching for jobs first? <a href="../controllers/user_entrance.controller.php" class="link-primary">Back to job posting</a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div>
                <p class="copyright text-black m-0">Copyright&#169; 2022 Joing & Jaspal. All rights reserved</p>
            </div>
        </section>
        </div>

         <!--  Forgot Password Modal -->
         <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div id="modelPopup" class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="modal-myform" class=" col" method="post" action="../controllers/Forget_password.controller.php">
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
                                            <small><a class="dropdown-item forgetPwd link-primary" href="javascript:void(0)">Click again to Change Password to get new otp.</a> </small></i>
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
                                <div class="d-flex hide-email">
                                        <input type="email" id="mailTo" name="email" class="form-control round-input-otp" placeholder="Enter your email" required />
                                        <button id="emailBtn" type="button" class="btn bg-secondary round-btn-otp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </button>
                                </div>
                                <span class="text-danger d-none mb-0 p-2 err">
                                        Please enter valid email address.
                                </span>
                                <div class="mb-3 hide-pass">
                                    <label for="newpassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword">
                                </div>
                                <div class="mb-3 hide-pass">
                                    <label for="conpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="conpassword" id="conpassword">
                                </div>
                                <input type="hidden" id="mailFrm" value="<?= FROM_EMAIL ?>">
                                <input type="hidden" id="token" value="<?= SECURE_TOKEN ?>">
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
    }
}

?>