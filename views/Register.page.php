<?php

class PageRegister
{
    static $notification = [];

    static function register()
    {
        ?>
            <section class="">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card mb-2" style="border-radius: 25px; z-index:auto">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
                                            <img src="../images/registeration.png" class="img-fluid" alt="registration image">
                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2">
                                            <p class="error" style="color: red;">
                                            <?php
                                                if(isset($_POST['submit']) && !empty(self::$notification)){
                                                    echo "Please correct following input(s): ";
                                                    echo self::$notification;
                                                }
                                            ?>
                                            </p>
                                            <h2 class="text-left fw-bold mb-5 ml-1 mx-1 mx-md-4 mt-4">Sign up</h2>

                                            <form class="mx-1" action="" method="post">

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required/>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <input type="text" class="form-control .fname" name="fname" placeholder="first name" aria-label="fname" required>
                                                    <input type="text" class="form-control" name="lname" placeholder="last name" aria-label="lname">
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="phone" id="phone" name="phone" class="form-control" placeholder="Enter your phone" required/>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required/>
                                                    </div>
                                                </div>

                                                <div class="form-check d-flex justify-content-center mb-5">
                                                    <input class="form-check-input me-2" type="checkbox" name="agreement" id="agreement" required />
                                                    <label class="form-check-label" for="agreement">
                                                        I agree all statements in <a href="#">Terms of service</a>
                                                    </label>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <input type="submit" class=" btn-info btn btn-lg" value="Register">
                                                </div>
                                                <p class="small fw-bold mt-2 pt-1 mb-0">Alreay have an account? <a href="../controllers/Login.controller.php" class="link-primary">login</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="copyright text-black m-0">Copyright&#169; 2022 Joing & Jaspal. All rights reserved</p>
                </div>
            </section>
            </div>
        <?php
    }
}

?>