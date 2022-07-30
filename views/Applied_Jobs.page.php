<?php

class PageJobApplied
{

    static function userAppliedJobs($users)
    {
?>
        <main class="innerMain">
            <div class="container p-5">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-applied-tab" data-bs-toggle="tab" data-bs-target="#nav-applied" type="button" role="tab" aria-controls="nav-applied" aria-selected="true">Users Applied for this job</button>
                        <button class="nav-link " id="nav-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit" aria-selected="true">Job Description</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-applied" role="tabpanel" aria-labelledby="nav-applied-tab" tabindex="0">
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                                <!-- search element -->
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text" id="basic-addon1">Search</span>
                                    <input type="search" class="form-control" placeholder="keyword" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone no.</th>
                                            <th scope="col">Resume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          
                                    <?php
                                            $i=1;
                                            foreach($users as $user)  {
                                                echo "<tr>";
                                                echo "<th scope='row'>".$i."</th>";
                                                echo "<td>".$user->getFname()." ".$user->getLname()."</td>";
                                                echo "<td>".$user->getEmail()."</td>";
                                                echo "<td>".$user->getPhone()."</td>";
                                                echo "<td><a href=\"".$_SERVER['PHP_SELF']."?action=download&id=".$user->AppliedID."\">Resume</td>";
                                                echo "</tr></tbody>";
                                            } 
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab" tabindex="0">
                    <?php
                }


                static function editJobs()
                {
                    ?>
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                                <form class=" col mt-4">
                                    <div class="mb-3">
                                        <label for="categoryDD" class="form-label">Select Category</label>
                                        <select class="form-select mb-4" id="categoryDD" aria-label="Default select example">
                                            <option value="infoTech" selected>Information Technology</option>
                                            <option value="labourJobs">Labour jobs</option>
                                            <option value="management">Management</option>
                                        </select>
                                        <label for="categoryDD" class="form-label">Select Job Type</label>
                                        <select class="form-select mb-4" id="categoryDD" aria-label="Default select example">
                                            <option value="partTime" selected>Part-time</option>
                                            <option value="fullTime">Full-time</option>
                                            <option value="Casual">Casual</option>
                                        </select>
                                        <label for="jobtitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobtitle" aria-describedby="emailHelp">
                                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="descriptionTextarea" class="form-label">Job Description</label>
                                        <textarea class="form-control" placeholder="Add Description" id="descriptionTextarea"></textarea>
                                    </div>
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="salary" aria-describedby="emailHelp">
                                    <button type="submit" class="btn btn-primary mt-4">Edit</button>
                                    <button type="submit" class="btn btn-danger mt-4">Delete</button>

                                </form>
                            </div>

                        </div>


                    </div>


        </main>
<?php
                }
            }