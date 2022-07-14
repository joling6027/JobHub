<?php

class PageUserDetails
{

    static function userInfo()
    {
        ?>
                <main class="innerMain">
                    <div class="container p-5">
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                                <h4> User Info</h4>
                                <form class=" col mt-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" disabled class="form-control" placeholder="johndoe@gmail.com" id="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Contact</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address">
                                    </div>

                                    <div class="input-group mb-3 mt-2">
                                        <span class="input-group-text" id="basic-addon1">Resume</span>
                                        <a href="" class="ms-2 mt-2" target="download">file attached</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Edit</button>
                                    <!-- <button type="submit" class="btn btn-danger mt-4">Delete</button> -->
                                </form>
                            </div>
                        </div>
                </main>
        <?php
    }
}
?>