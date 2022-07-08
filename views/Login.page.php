<?php

class PageLogin
{

    static function login()
    {
        ?>
                <section class="vh-100 mx-auto d-inline">
                    <div class="container-fluid h-custom card mb-2 loginContainer" >
                        <div class="row d-flex justify-content-center align-items-center h-100 loginMargin"> 
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="../images/registeration.png" class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                    <h3>Welcome to Job Hub</h3>
                                    <br>
                                    <!-- username input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password"  required/>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="remember" />
                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#!" class="text-body">Forgot password?</a>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <input type="submit" class=" btn-info btn btn-lg" value="Login">
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="../controllers/Register.controller.php" class="link-primary">Register</a>
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
        <?php
    }
}

?>