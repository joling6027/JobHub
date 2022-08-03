<?php

    class PageAdmin{
         
            static $categories;
            static $types;
            static $errors = [];

            static function adminDetails($email, $name){
                ?>
                     <main class="">
        <div class="container ">
        <div class="card mt-5 w-100 adminDetails">
            <div class="card-body">
              <h4 class="card-title">Admin Details</h4>
              <div class="card-text mt-3 float-start col">
                  <p>Username: <span> <?= $email?></span></p>
                  <p>Name: <span> <?=$name?></span></p>
              </div>
            </div>
          </div>
          </div>
          <div class="container mt-5 adminTabs">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link <?=!empty(self::$errors)?'active':''?> " id="nav-create-tab" data-bs-toggle="tab" data-bs-target="#nav-create" type="button" role="tab" aria-controls="nav-create" aria-selected="true">Create Jobs</button>
                  <button class="nav-link <?=!empty(self::$errors)?'':'active'?>" id="nav-jobs-tab" data-bs-toggle="tab" data-bs-target="#nav-jobs" type="button" role="tab" aria-controls="nav-jobs" aria-selected="true">Existing Jobs</button>
                  <button class="nav-link" id="nav-manage-users-tab" data-bs-toggle="tab" data-bs-target="#nav-manage-users" type="button" role="tab" aria-controls="nav-manage-users" aria-selected="true">Manage users</button>
                
                </div>
              </nav>
                <?php
            }


            static function createJobs(){
                ?>
 
              <div class="tab-content jobs" id="nav-tabContent">
                <div class="tab-pane fade <?=!empty(self::$errors)?'show active':''?>" id="nav-create" role="tabpanel" aria-labelledby="nav-create-tab" tabindex="0">
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
                                            <option value="<?=$category->CategoryValue?>"><?=$category->CategoryName?></option>
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
                                            <option value="<?=$type->JobTypeValue?>" ><?=$type->JobTypeName?></option>
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
                            value="<?=(!empty($_POST['companyName']) && empty(self::$errors['companyName']))? trim($_POST['companyName']): ''?>">
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
                            value="<?=(!empty($_POST['jobtitle']) && empty(self::$errors['jobtitle']))? trim($_POST['jobtitle']): ''?>">
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
                            <textarea class="form-control mb-3" placeholder="Add Description" id="descriptionTA" name="descriptionTA"></textarea>
                            
                            </div>
                            <div class="col-6 ps-2">
                            <label for="dutyTA" class="form-label">Job Duty</label>
                            <textarea class="form-control mb-3" placeholder="Add duty" id="dutyTA" name="dutyTA"></textarea>
                            </div>
                                    </div>

                                    <div class="mb-3 col d-flex">
                                    <div class="col-6 pe-2">
                                <label for="benefitsTA" class="form-label">Job Benefits</label>
                            <textarea class="form-control mb-3" placeholder="Add Benefits" id="benefitsTA" name="benefitsTA"></textarea>
                            </div>

                            <div class="col-6 ps-2">
                            <label for="qualificationTA" class="form-label">Job Qualification</label>
                            <textarea class="form-control mb-3" placeholder="Add Qualification" id="qualificationTA" name="qualificationTA"></textarea>
                            </div>
                                    </div>
                            
                                    <div class="mb-3 col d-flex">
                                    <div class="col-6 pe-2">

                            <label for="jobLocation" class="form-label ">Company Location</label>
                            <input type="text" class="form-control mb-3" id="jobLocation" name="jobLocation" aria-describedby="jobLocation"
                            value="<?=(!empty($_POST['jobLocation']) && empty(self::$errors['jobLocation']))? trim($_POST['jobLocation']): ''?>">
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
                            value="<?=(!empty($_POST['salary']) && empty(self::$errors['salary']))? trim($_POST['salary']): ''?>">
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
                            <input type="submit" class="btn btn-primary mt-4 btnSubmit" name="createJob" value="Create Job">
                    </form>
                        </div>
                      
                </div>
                <?php
            }


            static function existingJobs($jobs, $category, $type){
              if(!empty($jobs)){
                ?>
                <div class="tab-pane fade <?=!empty(self::$errors)?'':'show active'?> " id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab" tabindex="0">
                <div class="input-group mb-3 mt-4" >
                    <span class="input-group-text" id="basic-addon-job">Search</span>
                    <input type="search" id="searchJob" class="form-control" placeholder="keyword" aria-label="jobs" aria-describedby="basic-addon-job">
                </div> 
               <?php
                  foreach ($jobs as $key=>$value) {
                      ?>
                <h4 class="mt-5">
                  <?php
                    if(!empty($value))
                    {
                       if($key == $category[0])
                       {
                        echo IT;
                       }
                       if($key == $category[1])
                       {
                        echo MT;
                       }
                       if($key == $category[2])
                       {
                        echo LB;
                       }
                    }
                  ?>
                </h4>
                <div id="carousel_<?=$key?>" class="carousel slide ">
                <div class="carousel-inner d-flex">
                      <?php
                      $i=0;
                      while ($i < count($value)) { 
                        ?>
                          <div  id="jobCard" class="carousel-item <?=$i==0?'active':''?>" data-bs-interval="false">
                              <div  class="d-flex mt-2 px-5">
                                            <?php
                                             $j=0;
                                             while($j<4 && $i < count($value)){
                                                ?>
                                                <a class="card me-2" href="<?=$_SERVER['PHP_SELF'] . "?action=jobs&id=" . $value[$i]->getJobId()?>">
                                                <div class="card-body">
                                                <h6 class="card-subtitle mb-3 text-muted"><?=$value[$i]->CompanyName?></h6>
                                                  <h5 class="card-title"><?=$value[$i]->JobPosition?></h5>
                                                  <p class="card-text"><?=$value[$i]->JobDescription?></p>
                                                  <div class="position-absolute salType">
                                                  <h6 class="card-subtitle mb-3 text-muted">Pay: $<?=$value[$i]->Salary?></h6>
                                                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">
                                                    <?=($value[$i]->JobType==$type[0])?FT:PT ?>
                                                  </h6>
                                                  </div>
                                                </div>
                                            </a>
                                         
                                            <?php
                                              $j++;
                                              $i++;
                                              }
                                            ?>
                            </div>
                        </div>
                        <?php
                      }
                      ?>
                          <button style="position: absolute; left:-68px" class="carousel-control-prev" type="button" data-bs-target="#carousel_<?=$key?>" data-bs-slide="prev">
                          <svg class="carousel-control-prev-icon"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
                            <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                          </svg>
                        </button>
                        <button class="carousel-control-next" style="position: absolute; right:-60px" type="button" data-bs-target="#carousel_<?=$key?>" data-bs-slide="next">
                          <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
                            <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                        </button>
                        </div>
            </div>
            
                    <?php
                  }
                  ?>
                   </div> 
                  <?php
              }
            }


            static function manageUsers(array $users){
                ?>
                     <div class="tab-pane fade" id="nav-manage-users" role="tabpanel" aria-labelledby="nav-manage-users-tab" tabindex="0">
                      <div class="input-group mb-3 mt-4" >
                        <span class="input-group-text" id="basic-addon1">Search</span>
                        <input type="search" id="searchInput" class="form-control" placeholder="keyword" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      <?php
                                 if(!empty($users))
                                 {
                                ?>
                        <table class="table table-striped mt-3" data-filter-control="true" data-show-search-clear-button="true" data-filter-control-visible="true">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone no.</th>
                                <!-- <th scope="col">Resume</th> -->
                                <th scope="col">Options</th>
                              </tr>
                            </thead>
                            <tbody id="tblUsr">
                             
                                <?php
                                    $i=1;
                                    foreach($users as $user)  {
                                        ?>
                                         <tr>
                                            <input type="hidden" id="delete_usr_id" value="<?=$user->getUserID()?>">
                                            <th scope="row"><?=$i?></th>
                                            <td><?=$user->getFname()." ".$user->getLname()?></td>
                                            <td><?=$user->getEmail()?></td>
                                            <td><?=$user->getPhone()?></td>
                                            <!-- need to add downloadable link -->
                                            <!-- <td><a href="#">resume link</a></td> -->
                                            <!-- <td><a class="edituser" href="<?=$_SERVER['PHP_SELF']."?action=edit&id=".$user->getUserID()?>"> -->
                                            <td><a class="edituser" href="./User_details.controller.php?action=edit&id=<?=$user->getUserID()?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg></a>
                                            <!-- data-bs-target="#deletemodal" data-bs-toggle="modal"  -->
                                            <?php
                                              if($_SESSION['user_role'] != $user->getRole()){
                                                ?>
                                                <a href="javascript:void(0)" class="deleteuser" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                                </a>
                                            <?php
                                              }
                                            ?>
                                           
                                            </td>
                                          </tr>  
                                        <?php

                                        $i++;
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
          </div>
          </main>
          <div class="modal fade" id="deletemodal" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure to delete this user?
            </div>
            <div class="modal-footer">
              <input type="hidden" id="del_loc" value="<?=$_SERVER['PHP_SELF']."?action=delete&id="?>">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="delBtn" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
      
      
                <?php
            }
    }
