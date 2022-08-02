<?php

class PageUserDetails
{

    static $errors = [];
    static function userInfo(Users $user)
    {
        ?>
                <main class="innerMain">
                    <div class="container p-5">
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                                <h4> User Info</h4>
                                <form class=" col mt-4"  action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" disabled class="form-control" value="<?=$user->getEmail();?>" id="email" name = "email" aria-describedby="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="name" name="fname" value="<?=empty(self::$errors['fname'])?$user->getFName():''?>" aria-describedby="fname">
                                        <?php
                                            if(!empty(self::$errors) && isset(self::$errors['fname'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['fname']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="name" name="lname" value="<?=empty(self::$errors['lname'])?$user->getLName():''?>"aria-describedby="lname">
                                        <?php
                                            if(!empty(self::$errors) && isset(self::$errors['lname'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['lname']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Contact</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?=empty(self::$errors['phone'])?$user->getPhone():''?>">
                                        <?php
                                            if(!empty(self::$errors) && isset(self::$errors['phone'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['phone'] ?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <input type="hidden" name="id" value="<?=!empty($_GET['id'])?$_GET['id'] : $user->getUserID()?>">
                                    <button type="submit" class="btn btn-primary mt-4">Edit</button>
                                    <a href="../controllers/Admin.controller.php" class="btn btn-secondary mt-4">Back</a>
                                </form>
                            </div>
                        </div>
                </main>
        <?php
    }
}
