<?php

class UserPage
{

  private static $jobArray = [];

  static function showEntrance($jobData)
  {
?>
    <!-- job-posting part -->
    <?php
    $c1 = 0;
    $c2 = 0;

    for ($i = 0; $i < count($jobData); $i++) {
      if ($jobData[$i]->getJobCategory() == 'IT') {
        self::$jobArray['IT'][$c1] = $jobData[$i];
        $c1++;
      } elseif ($jobData[$i]->getJobCategory() == 'MT') {
        self::$jobArray['MT'][$c2] = $jobData[$i];
        $c2++;
      }
    }
    ?>
    <div class="ms-3" id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab" tabindex="0">
      <h4 class="mt-5 ms-3">Information Technology</h4>
      <div id="carousel1" class="carousel slide " <?= (count(self::$jobArray['IT']) > 4) ? "data-bs-ride=\"carousel\"" : "" ?>>
        <div class="carousel-inner d-flex">
          <div class="carousel-item active">
            <div class="d-flex mt-2 ms-5 px-5">
              <!-- placing a for loop here -->
              <?php

              // echo "<pre>";
              // echo print_r(self::$jobArray['MT']);
              // echo "</pre>";

              // for ($i = 0; $i < count($jobData); $i++) {
              //   if ($jobData[$i]->getJobCategory() == 'IT' && $i < 4) {
              //     $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . $jobData[$i]->getJobId();
              //     echo "<a class=\"card me-2\" href=\"" . $link . "\" style=\"z-index:1 ;max-width: 15rem;\">";
              //     echo "<div class=\"card-body\">";
              //     echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . $jobData[$i]->getCompanyName() . "</h6>";
              //     echo "<h5 class=\"card-title\">" . $jobData[$i]->getJobPosition() . "</h5>";
              //     echo "<p class=\"card-text\">" . substr($jobData[$i]->getJobDescription(), 0, 90) . "..." . "</p>";
              //     echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . $jobData[$i]->getSalary() . " a month</h6>";
              //     $job_type = '';
              //     if ($jobData[$i]->getJobType() == 'FT') $job_type = 'Full-Time';
              //     else $job_type = 'Part-Time';
              //     echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
              //     echo "</div></a>";
              //   }
              // }

              for ($i = 0; $i < count(self::$jobArray['IT']); $i++) {
                if ($i < 4) {
                  $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . $jobData[$i]->getJobId();
                  echo "<a class=\"card me-2\" href=\"" . $link . "\" style=\"z-index:1 ;max-width: 15rem;\">";
                  echo "<div class=\"card-body\">";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . $jobData[$i]->getCompanyName() . "</h6>";
                  echo "<h5 class=\"card-title\">" . $jobData[$i]->getJobPosition() . "</h5>";
                  echo "<p class=\"card-text\">" . substr($jobData[$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . $jobData[$i]->getSalary() . " a month</h6>";
                  $job_type = '';
                  if ($jobData[$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                  else $job_type = 'Part-Time';
                  echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                  echo "</div></a>";
                }
              }

              ?>
            </div>
          </div>
          <?php
          //show the carousel-itme div only when job index number is from 4 - 8
          foreach (self::$jobArray['MT'] as $key => $value) {
            if (intdiv($key, 4) == '1') {
            }
          }
          ?>
          <div class="carousel-item ">
            <div class="d-flex mt-3 ms-5 px-5">
              <!-- second for loop here -->
              <?php
              for ($i = 4; $i < count($jobData); $i++) {
                if ($jobData[$i]->getJobCategory() == 'IT') {

                  $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . $jobData[$i]->getJobId();
                  echo "<a class=\"card me-2\" href=\"" . $link . "\" style=\"z-index:1; max-width: 15rem;\">";
                  echo "<div class=\"card-body\">";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . $jobData[$i]->getCompanyName() . "</h6>";
                  echo "<h5 class=\"card-title\">" . $jobData[$i]->getJobPosition() . "</h5>";
                  echo "<p class=\"card-text\">" . substr($jobData[$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . $jobData[$i]->getSalary() . " a month</h6>";
                  $job_type = '';
                  if ($jobData[$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                  else $job_type = 'Part-Time';
                  echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                  echo "</div></a>";
                }
              }
              // }
              // }
              ?>
            </div>
          </div>
          <!-- control button -->
          <?php
          if (count(self::$jobArray['IT']) > 4) {
          ?>
            <button style="position: absolute; left:-60px" class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
              <svg class="carousel-control-prev-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
                <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg>

            </button>
            <button class="carousel-control-next" style="position: absolute; right:-60px" type="button" data-bs-target="#carousel1" data-bs-slide="next">
              <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
                <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
              </svg>
            </button>
          <?php }  ?>
        </div>
      </div>

      <!-- second category -->
      <h4 class="mt-5 ms-3">Management</h4>

      <div id="carousel2" class="carousel slide " <?= (count(self::$jobArray['MT']) > 4) ? "data-bs-ride=\"carousel\"" : "" ?>>

        <!-- control button -->
        <?php if (count(self::$jobArray['MT']) > 4) {  ?>
          <button style="position: absolute; left:-60px" class="carousel-control-prev" id="carousel-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
            <svg class="carousel-control-prev-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
              <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>
          </button>
          <button style="position: absolute; right:-60px" class="carousel-control-next" id="carousel-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
            <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
              <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
        <?php } ?>
        <div class="carousel-inner d-flex">
          <div class="carousel-item active">
            <div class="d-flex mt-2 ms-5 px-5">
              <?php
              $counter = 0;
              for ($i = 0; $i < count($jobData); $i++) {
                if ($jobData[$i]->getJobCategory() == 'MT') {
                  // echo "<div class=\"d-flex mt-2 px-5\">";
                  $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . $jobData[$i]->getJobId();
                  echo "<a class=\"card me-2\" href=\"" . $link . "\" style=\"z-index:1 ;max-width: 15rem;\">";
                  echo "<div class=\"card-body\">";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . $jobData[$i]->getCompanyName() . "</h6>";
                  echo "<h5 class=\"card-title\">" . $jobData[$i]->getJobPosition() . "</h5>";
                  echo "<p class=\"card-text\">" . substr($jobData[$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . $jobData[$i]->getSalary() . "  a month</h6>";
                  $job_type = '';
                  if ($jobData[$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                  else $job_type = 'Part-Time';
                  echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                  echo "</div></a>";

                  $counter++;
                }
                if ($counter > 4) {
                  break;
                }
              }
              ?>
            </div>
          </div>
          <?php
          //show the carousel-itme div only when job index number is from 4 - 8
          // foreach(self::$jobArray['MT'] as $key=>$value){
          //   if(intdiv($key,4) == '1'){

          ?>
          <div class="carousel-item ">
            <?php
            for ($i = 4; $i < count($jobData); $i++) {
              if ($jobData[$i]->getJobCategory() == 'MB' && $i < 8) {
                // echo "<div class=\"d-flex mt-2 px-5\">";
                $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . $jobData[$i]->getJobId();
                echo "<a class=\"card me-2\" href=\"" . $link . "\" style=\"z-index:1 ;\">";
                echo "<div class=\"card-body\">";
                echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . $jobData[$i]->getCompanyName() . "</h6>";
                echo "<h5 class=\"card-title\">" . $jobData[$i]->getJobPosition() . "</h5>";
                echo "<p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's
                      content.</p>";
                echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . $jobData[$i]->getSalary() . " a month</h6>";
                echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $jobData[$i]->getJobType() . "</h6>";
                echo "</div></a>";
              }
            }
            //   }
            // }

            ?>
          </div>
        </div>
      </div>
    </div>
  <?php
  }

  static function showJobDescription($job)
  {
    // echo "<pre>";
    // var_dump($job);
    // echo "</pre>";
  ?>
    <div class="container mt-5">

      <div class="row">
        <div class="col-md-10">
          <!-- job description -->
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-lg-12 col-xl-11">
                <div class="card mb-5" style="border-radius: 25px;">
                  <div class="card-body p-md-5">

                    <div class="row">
                      <!-- SQL ATTR: jobPosition -->
                      <h3 class="text-left"><?= $job->getJobPosition() ?></h3>
                      <!-- SQL ATTR: companyName -->
                      <h5 class="text-left fs-5"><?= $job->getCompanyName() ?></h5>
                      <!-- SQL ATTR: jobLocation -->
                      <h5 class="text-left fs-5"><?= $job->getJobLocation() ?></h5>
                      <!-- SQL ATTR: jobType -->
                      <?php
                      $job_type = '';
                      if ($job->getJobType() == 'FT') $job_type = 'Full-Time';
                      else $job_type = 'Part-Time';
                      ?>
                      <h5 class="text-left fs-5"><?= $job_type ?></h5>
                      <!-- SQL ATTR: salary -->
                      <h5 class="text-left fs-5">Salary: $<?= $job->getsalary() ?> a month</h5>
                      <p></p>
                      <hr>
                      <div class="job-description-content">
                        <!-- SQL ATTR: jobDescription -->
                        <h4 class="fs-5">Full Job Description</h4>
                        <?php echo "<p style=\"white-space: pre-line\">" . $job->getJobDescription() . "</p>" ?>

                        <!-- SQL ATTR: duty -->
                        <?php if ($job->getDuty() != '') {
                          echo "<h4 class=\"fs-5\">What You'll Do</h4>";
                        } ?>
                        <p style="white-space: pre-line"><?= $job->getDuty() ?></p>
                        <!-- SQL ATTR: qualification -->
                        <?php if ($job->getQualification() != '') {
                          echo "<h4 class=\"fs-5\">About you</h4>";
                        }

                        ?>
                        <p style="white-space: pre-line"><?= $job->getQualification() ?></p>
                        <!-- SQL ATTR: benefits -->
                        <?php
                        if ($job->getBenefits() != '') {
                          echo "<h4 class=\"fs-5\">Benefits</h4>";
                        } ?>
                        <p style="white-space: pre-line"><?= $job->getBenefits() ?></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class=" col-md-2">
          <div class=" container h-100">
            <div class="btn-apply row d-flex justify-content-center align-items-center">
              <div class="col-lg-12 col-xl-11">
                <?php
                if (isset($_SESSION['username'])) {
                  echo "<button class=\"btn btn-primary fw-bolder\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" style=\"position:fixed;\">Apply Now</button>";
                } else {
                  echo "<a href=\"Login.controller.php\"><button class=\"btn btn-primary fw-bolder\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" style=\"position:fixed;\">Log In To Apply</button></a>";
                }

                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }

  static function applyForm(Users $user)
  {
  ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Application Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="innerMain">
              <div class="container p-5">
                <div class="card inneradminDetails w-100 m-auto">
                  <div class="card-body">
                    <!-- <h4> Software Engineer Entry Level</h4>
                          <span>Vancouver, BC</span> -->
                    <form class=" col mt-4" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                      <div class="mb-3">
                        <label for="username" class="form-label">Name</label>
                        <input type="text" disabled class="form-control" value="<?= $user->getFname() . " " . $user->getLname() ?>" id="username" name="username">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" disabled class="form-control" value="<?= $user->getEmail() ?>" id="email" name="email" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="desiredPay" class="form-label">Desired Pay Per Month</label>
                        <input type="number" class="form-control" id="desiredPay" name="desiredPay">
                      </div>
                      <div class="mb-3">
                        <label for="additionalUrl" class="form-label">Additional URL (Optional)</label>
                        <input type="url" class="form-control" id="additionalUrl" name="additionalUrl">
                      </div>

                      <div class="mb-3">
                        <label for="resumeUpload" class="form-label">Upload your resume (pdf only)</label>
                        <input type="file" class="form-control" id="resumeUpload" name="resume" value="" required accept=".pdf">
                      </div>
                      <div class="mb-3">
                        <label for="comments" class="form-label">Anything you want to tell us? (Optional)</label>
                        <textarea class="form-control" id="comments" name="comments" rows="2"></textarea>
                      </div>
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-4 " name="submit" value="apply">APPLY</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    </div>
<?php
  }
}

?>