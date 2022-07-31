<?php

class PageUserDetails
{

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
                                        <input type="email" disabled class="form-control" value="<?=$user->getEmail();?>" id="email" name = "email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="name" name="fname" value="<?=$user->getFName();?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="name" name="lname" value="<?=$user->getLName();?>"aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Contact</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?=$user->getPhone();?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                    <button type="submit" class="btn btn-primary mt-4">Edit</button>
                                    <a href="../controllers/Index.controller.php" class="btn btn-secondary mt-4">Back</a>
                                </form>
                            </div>
                        </div>
                </main>
        <?php
    }
}
