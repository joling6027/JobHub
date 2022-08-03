<?php

class PageJobApplied
{
    static $categories;
    static $types;
    static $errors = [];
    static function userAppliedJobs($users)
    {
       
?>
        <main class="innerMain">
            <div class="container p-5">
            <a href="../controllers/Admin.controller.php" class="btn btn-secondary mt-0 mb-4">Back</a>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <?=!empty(self::$errors)?'':'active'?> " id="nav-applied-tab" data-bs-toggle="tab" data-bs-target="#nav-applied" type="button" role="tab" aria-controls="nav-applied" aria-selected="true">Users Applied for this job</button>
                        <button class="nav-link <?=!empty(self::$errors)?'active':''?>" id="nav-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit" aria-selected="true">Edit Job</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade <?=!empty(self::$errors)?'':'show active'?>" id="nav-applied" role="tabpanel" aria-labelledby="nav-applied-tab" tabindex="0">
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                                <!-- search element -->
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text" id="basic-addon1">Search</span>
                                    <input type="search" id="searchInput" class="form-control" placeholder="keyword" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <?php
                                 if(!empty($users))
                                 {
                                ?>
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone no.</th>
                                            <th scope="col">Desired Salary</th>
                                            <th scope="col">Portfolio</th>
                                            <th scope="col">Resume</th>
                                            <th scope="col">Comments</th>
                                            <th scope="col">Applied On</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblUsr">
                                          
                                    <?php
                                            $i=1;
                                            foreach($users as $user)  {
                                                echo "<tr>";
                                                echo "<th scope='row'>".$i."</th>";
                                                echo "<td>".$user->getFname()." ".$user->getLname()."</td>";
                                                echo "<td>".$user->getEmail()."</td>";
                                                echo "<td>".$user->getPhone()."</td>";
                                                echo "<td>".$user->DesiredPay."</td>";
                                                echo "<td>".$user->AdditionalUrls."</td>";
                                                echo "<td><a href=\"".$_SERVER['PHP_SELF']."?action=download&id=".$user->AppliedID."\">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
  <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
  <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
</svg>
                                                Resume
                                                </td>";
                                                echo "<td>".$user->Comments."</td>";
                                                echo "<td>".$user->AppliedOn."</td>";
                                                echo "</tr></tbody>";
                                            } 
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                                 }
                                ?>
                            </div>

                        </div>

                    </div>
                    
                    <?php
       
                }


                static function editJobs(Jobs $job)
                {
                    ?>
                    <div class="tab-pane fade <?=!empty(self::$errors)?'show active':''?>" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab" tabindex="0">
                        <div class="card inneradminDetails w-100 m-auto">
                            <div class="card-body">
                            <div class="d-flex">
                    <form class=" col mt-5" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                            <div class="mb-3 col d-flex">
                                <div class="col-6 pe-2">
                                <label for="categoryDD" class="form-label">Select Category</label>
                                <select class="form-select mb-4" id="categoryDD" name="categoryDD" aria-label="Default select example">
                                    <?php
                                       foreach(self::$categories as $category)
                                       {
                                         ?>
                                            <option value="<?=$category->CategoryValue?>" <?=$category->CategoryValue == $job->getJobCategory()? 'selected': '' ?>><?=$category->CategoryName?></option>
                                         <?php
                                       }
                                    ?>
                                </select>
                                </div>
                                <div class="col-6 ps-2">
                                <label for="typeDD" class="form-label">Select Job Type</label>
                                <select class="form-select mb-4" id="typeDD" name="typeDD" aria-label="Default select example">
                                <?php
                                       foreach(self::$types as $type)
                                       {
                                         ?>
                                            <option value="<?=$type->JobTypeValue?>" <?=$type->JobTypeValue == $job->getJobType()? 'selected': '' ?> ><?=$type->JobTypeName?></option>
                                         <?php
                                       }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col d-flex">
                            <div class="col-6 pe-2">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control mb-3" id="companyName" name="companyName" aria-describedby="companyName"
                             value="<?= empty(self::$errors['companyName'])?$job->getCompanyName():''?>">
                             <?php
                                            if(!empty(self::$errors) && isset(self::$errors['companyName'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['companyName']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                            </div>
                            <div class="col-6 ps-2">
                            <label for="jobtitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobtitle" name="jobtitle" aria-describedby="jobtitle"
                            value="<?= empty(self::$errors['jobtitle'])?$job->getJobPosition():''?>">
                             <?php
                                            if(!empty(self::$errors) && isset(self::$errors['jobtitle'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['jobtitle']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                            </div>
                            </div>
                            <div class="mb-3 col d-flex">
                            <div class="col-6 pe-2">
                           <label for="descriptionTA" class="form-label">Job Description</label>
                            <textarea class="form-control mb-3" placeholder="Add Description" id="descriptionTA" name="descriptionTA"><?= trim($job->getJobDescription());?></textarea>
                            </div>
                            <div class="col-6 ps-2">
                            <label for="dutyTA" class="form-label">Job Duty</label>
                            <textarea class="form-control mb-3" placeholder="Add duty" id="dutyTA" name="dutyTA"><?= trim($job->getDuty());?></textarea>
                            </div>
                                    </div>

                                    <div class="mb-3 col d-flex">
                                    <div class="col-6 pe-2">
                                <label for="benefitsTA" class="form-label">Job Benefits</label>
                            <textarea class="form-control mb-3" placeholder="Add Benefits" id="benefitsTA" name="benefitsTA"><?= trim($job->getBenefits());?></textarea>
                            </div>

                            <div class="col-6 ps-2">
                            <label for="qualificationTA" class="form-label">Job Qualification</label>
                            <textarea class="form-control mb-3" placeholder="Add Qualification" id="qualificationTA" name="qualificationTA"><?= trim($job->getQualification());?></textarea>
                            </div>
                                    </div>
                            
                                    <div class="mb-3 col d-flex">
                                    <div class="col-6 pe-2">

                            <label for="jobLocation" class="form-label ">Company Location</label>
                            <input type="text" class="form-control mb-3" id="jobLocation" name="jobLocation" aria-describedby="jobLocation"
                            value="<?= empty(self::$errors['jobLocation'])?$job->getJobLocation():''?>">
                            <?php
                                            if(!empty(self::$errors) && isset(self::$errors['jobLocation'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['jobLocation']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col-6 ps-2">

                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" aria-describedby="emailHelp" required
                            value="<?= empty(self::$errors['salary'])?$job->getsalary():''?>">
                             <?php
                                            if(!empty(self::$errors) && isset(self::$errors['salary'])){
                                                ?>
                                                    <span class="text-danger mb-0 p-2">
                                                        <?= self::$errors['salary']?>
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    </div>
                            <input type="hidden" name="jobId" value="<?=!empty($_GET['id'])?$_GET['id'] : $job->getJobId()?>">
                            <input type="submit" class="btn btn-primary mt-4" value="Edit">
                            <a href="javascript:void(0)" class=" btn btn-danger mt-4 del_job" >Delete</a>
                    </form>
                        </div>
                            </div>

                        </div>


                    </div>


        </main>
        <div class="modal fade" id="deletemodal" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Delete Job</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure to delete this job?
            </div>
            <div class="modal-footer">
              <input type="hidden" id="del_jobId" value="<?=$_SERVER['PHP_SELF']."?action=delete&id="?><?=!empty($_GET['id'])?$_GET['id'] : $job->getJobId()?>">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="delJobBtn" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
      
      
<?php
                }
            }