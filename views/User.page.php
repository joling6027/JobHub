<?php

class UserPage
{

  private static $jobArray = [];
  public static $notification = [];

  static function showEntrance($jobData)
  {
?>
    <!-- job-posting part -->
    <?php
    $c1 = 0;
    $c2 = 0;
    $c3 = 0;

    for ($i = 0; $i < count($jobData); $i++) {
      if ($jobData[$i]->getJobCategory() == 'IT') {
        self::$jobArray['IT'][$c1] = $jobData[$i];
        $c1++;
      } elseif ($jobData[$i]->getJobCategory() == 'MT') {
        self::$jobArray['MT'][$c2] = $jobData[$i];
        $c2++;
      } elseif ($jobData[$i]->getJobCategory() == 'LB') {
        self::$jobArray['LB'][$c3] = $jobData[$i];
        $c3++;
      }
    }
    ?>
    <div class="container">
      <div class="ms-3" id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab" tabindex="0">
        <?php if (!empty(self::$jobArray['IT'])) {  ?>
          <h4 class="mt-5 ms-3">Information Technology</h4>
          <div id="carousel1" class="carousel slide">
            <div class="carousel-inner d-flex">
              <div class="carousel-item active">
                <div class="d-flex mt-2 px-5">
                  <!-- placing a for loop here -->
                  <?php

                  for ($i = 0; $i < count(self::$jobArray['IT']); $i++) {
                    if ($i < 4) {
                      $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['IT'][$i]->getJobId();
                      echo "<a class=\"joblist card me-2\" href=\"" . $link . "\">";
                      echo "<div class=\"card-body\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['IT'][$i]->getCompanyName() . "</h6>";
                      echo "<h5 class=\"card-title\">" . self::$jobArray['IT'][$i]->getJobPosition() . "</h5>";
                      echo "<p class=\"card-text\">" . substr(self::$jobArray['IT'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                      echo "<div class=\"position-absolute salType\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['IT'][$i]->getSalary() . "</h6>";
                      $job_type = '';
                      if (self::$jobArray['IT'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                      else $job_type = 'Part-Time';
                      echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                      echo "</div></div></a>";
                    }
                  }

                  ?>
                </div>
              </div>
              <?php
              $page = 1;
              $results_per_page = 4;
              $number_of_page = ceil(count(self::$jobArray['IT']) / $results_per_page); //2

              while ($page <  $number_of_page) {
                echo "<div class=\"carousel-item \">";
                echo "<div class=\"d-flex mt-3 px-5\">";
                for ($i = 4; $i < count(self::$jobArray['IT']); $i++) {
                  if (intdiv($i, 4) == $page) {
                    $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['IT'][$i]->getJobId();
                    echo "<a class=\"joblist card me-2\" href=\"" . $link . "\">";
                    echo "<div class=\"card-body\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['IT'][$i]->getCompanyName() . "</h6>";
                    echo "<h5 class=\"card-title\">" . self::$jobArray['IT'][$i]->getJobPosition() . "</h5>";
                    echo "<p class=\"card-text\">" . substr(self::$jobArray['IT'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                    echo "<div class=\"position-absolute salType\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['IT'][$i]->getSalary() . "</h6>";
                    $job_type = '';
                    if (self::$jobArray['IT'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                    else $job_type = 'Part-Time';
                    echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                    echo "</div></div></a>";
                  }
                }
                $page++;
                echo "</div></div>";
              }

              ?>
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
        <?php } ?>

        <!-- second category -->
        <?php if (!empty(self::$jobArray['MT'])) {  ?>
          <h4 class="mt-5 ms-3">Management</h4>
          <div id="carousel2" class="carousel slide ">

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
                <div class="d-flex mt-3 px-5">
                  <?php
                  for ($i = 0; $i < count(self::$jobArray['MT']); $i++) {
                    if ($i < 4) {
                      // echo "<div class=\"d-flex mt-2 px-5\">";
                      $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['MT'][$i]->getJobId();
                      echo "<a class=\" joblist card me-2\" href=\"" . $link . "\">";
                      echo "<div class=\"card-body\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['MT'][$i]->getCompanyName() . "</h6>";
                      echo "<h5 class=\"card-title\">" . self::$jobArray['MT'][$i]->getJobPosition() . "</h5>";
                      echo "<p class=\"card-text\">" . substr(self::$jobArray['MT'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                      echo "<div class=\"position-absolute salType\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['MT'][$i]->getSalary() . "</h6>";
                      $job_type = '';
                      if (self::$jobArray['MT'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                      else $job_type = 'Part-Time';
                      echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                      echo "</div></div></a>";
                    }
                  }
                  ?>
                </div>
              </div>
              <?php
              $page = 1;
              $results_per_page = 4;
              $number_of_page = ceil(count(self::$jobArray['MT']) / $results_per_page); //2

              while ($page <  $number_of_page) {
                echo "<div class=\"carousel-item \">";
                echo "<div class=\"d-flex mt-3 px-5\">";
                for ($i = 4; $i < count(self::$jobArray['MT']); $i++) {
                  if (intdiv($i, 4) == $page) {
                    $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['MT'][$i]->getJobId();
                    echo "<a class=\"joblist card me-2\" href=\"" . $link . "\">";
                    echo "<div class=\"card-body\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['MT'][$i]->getCompanyName() . "</h6>";
                    echo "<h5 class=\"card-title\">" . self::$jobArray['MT'][$i]->getJobPosition() . "</h5>";
                    echo "<p class=\"card-text\">" . substr(self::$jobArray['MT'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                    echo "<div class=\"position-absolute salType\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['MT'][$i]->getSalary() . "</h6>";
                    $job_type = '';
                    if (self::$jobArray['MT'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                    else $job_type = 'Part-Time';
                    echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                    echo "</div></div></a>";
                  }
                }
                $page++;
                echo "</div></div>";
              }

              ?>

            </div>
          </div>
        <?PHP } ?>
        <?php if (!empty(self::$jobArray['LB'])) {  ?>
          <h4 class="mt-5 ms-3">Labour</h4>
          <div id="carousel2" class="carousel slide ">
            <!-- control button -->
            <?php if (count(self::$jobArray['LB']) > 4) {  ?>
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
                <div class="d-flex mt-3  px-5">
                  <?php
                  for ($i = 0; $i < count(self::$jobArray['LB']); $i++) {
                    if ($i < 4) {
                      // echo "<div class=\"d-flex mt-2 px-5\">";
                      $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['LB'][$i]->getJobId();
                      echo "<a class=\"joblist card me-2\" href=\"" . $link . "\">";
                      echo "<div class=\"card-body\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['LB'][$i]->getCompanyName() . "</h6>";
                      echo "<h5 class=\"card-title\">" . self::$jobArray['LB'][$i]->getJobPosition() . "</h5>";
                      echo "<p class=\"card-text\">" . substr(self::$jobArray['LB'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                      echo "<div class=\"position-absolute salType\">";
                      echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['LB'][$i]->getSalary() . "</h6>";
                      $job_type = '';
                      if (self::$jobArray['LB'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                      else $job_type = 'Part-Time';
                      echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                      echo "</div></div></a>";
                    }
                  }
                  ?>
                </div>
              </div>
              <?php
              $page = 1;
              $results_per_page = 4;
              $number_of_page = ceil(count(self::$jobArray['LB']) / $results_per_page); //2

              while ($page <  $number_of_page) {
                echo "<div class=\"carousel-item \">";
                echo "<div class=\"d-flex mt-3  px-5\">";
                for ($i = 4; $i < count(self::$jobArray['LB']); $i++) {
                  if (intdiv($i, 4) == $page) {
                    $link = $_SERVER['PHP_SELF'] . "?jobdesc=true&jobid=" . self::$jobArray['LB'][$i]->getJobId();
                    echo "<a class=\"joblist card me-2\" href=\"" . $link . "\">";
                    echo "<div class=\"card-body\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">" . self::$jobArray['LB'][$i]->getCompanyName() . "</h6>";
                    echo "<h5 class=\"card-title\">" . self::$jobArray['LB'][$i]->getJobPosition() . "</h5>";
                    echo "<p class=\"card-text\">" . substr(self::$jobArray['LB'][$i]->getJobDescription(), 0, 90) . "..." . "</p>";
                    echo "<div class=\"position-absolute salType\">";
                    echo "<h6 class=\"card-subtitle mb-3 text-muted\">Pay: $" . self::$jobArray['LB'][$i]->getSalary() . "</h6>";
                    $job_type = '';
                    if (self::$jobArray['LB'][$i]->getJobType() == 'FT') $job_type = 'Full-Time';
                    else $job_type = 'Part-Time';
                    echo "<h6 class=\"card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white\">" . $job_type . "</h6>";
                    echo "</div></div></a>";
                  }
                }
                $page++;
                echo "</div></div>";
              }

              ?>
            </div>
          </div>
        <?PHP } ?>

      </div>
    </div>
  <?php
  }

  static function showJobDescription($job)
  {
  ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-9">
          <!-- job description -->
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-lg-12 col-xl-11">
                <div class="card mb-5" style="border-radius: 25px;">
                  <div class="card-body p-md-5">
                    <?php
                    if (!empty(self::$notification['fileUpload'])) echo "<p style=\"color:red;\">" . self::$notification['fileUpload'] . "</p>";
                    if (!empty(self::$notification['applySuccessMsg'])) echo "<p style=\"color:red;\">" . self::$notification['applySuccessMsg'] . "</p>";
                    ?>
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
                      <h5 class="text-left fs-5">Salary: $<?= $job->getsalary() ?></h5>
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
            <div class="btn-apply d-flex align-items-start position-fixed">
              <div class="">
                <?php
                if (isset($_SESSION['username'])) {
                  echo "<button class=\"btn btn-primary fw-bolder\" data-bs-toggle=\"modal\" data-bs-target=\"#applicationModal\">Apply Now</button>";
                ?>
                  <a href="../controllers/TeamNumber01.php" class="btn btn-secondary mt-0">Back</a>
                <?php
                } else {

                  echo "<a href=\"Login.controller.php\"><button class=\"btn btn-primary fw-bolder\" data-bs-toggle=\"modal\" data-bs-target=\"#applicationModal\" style=\"position:fixed;\">Log In To Apply</button></a>";
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

  static function applyForm(Users $user, $isApplied)
  {
  ?>
    <!-- Modal -->
    <div class="modal fade" id="applicationModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applicationModalLabel">Application Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card inneradminDetails w-100 m-auto">
                <div class="card-body">
                  <?php
                  if ($isApplied)
                    echo "<h5 style=\"color:red;\">" . self::$notification['alreadyAppliedAlert'] . "</h5>";
                  ?>
                  <!-- <span>Vancouver, BC</span> -->
                  <form class=" col mt-2" enctype="multipart/form-data" method="post" action="">
                    <div class="d-flex">
                      <div class="mb-3 me-2 w-100">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?= $user->getFname() ?>" id="fname" name="fname">
                      </div>
                      <div class="mb-3 w-100">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?= $user->getLname() ?>" id="lname" name="lname" aria-describedby="lastname">
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="mb-3 me-2 w-100">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" value="<?= $user->getPhone()  ?>" id="phone" name="phone">
                      </div>
                      <div class="mb-3 w-100">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" disabled class="form-control" value="<?= $user->getEmail() ?>" id="email" name="email" aria-describedby="emailHelp">
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="mb-3 w-100 me-2">
                        <label for="desiredPay" class="form-label">Desired Pay Per Month (Optional) </label>
                        <input type="number" class="form-control" id="desiredPay" name="desiredPay" min="0">
                      </div>
                      <div class="mb-3 w-100">
                        <label for="additionalUrl" class="form-label">Additional URL (Optional)</label>
                        <input type="url" class="form-control" id="additionalUrl" name="additionalUrl">
                      </div>
                    </div>

                    <div class="mb-3 w-100 me-2">
                      <label for="resumeUpload" class="form-label">Upload your resume (pdf only)</label>
                      <input type="file" class="resume-upload form-control" id="resumeUpload" name="resume" value="" required accept=".pdf" onchange="return fileValidation()">
                      <script>
                        function fileValidation() {
                          var fileInput =
                            document.getElementById('resumeUpload');

                          var filePath = fileInput.value;

                          // Allowing file type
                          var allowedExtensions = /(\.pdf)$/i;

                          if (!allowedExtensions.exec(filePath)) {
                            // alert('Invalid file type');
                            document.querySelector('.resume-upload').insertAdjacentHTML("afterend", "<p class=\"upload-error\" style=\"color:red;\">File should be of pdf format.</p>")
                            document.querySelector('#applyJobBtn').disabled = true;
                            fileInput.value = '';
                            return false;
                          } else {
                            document.querySelector('.upload-error').innerHTML = "";
                            document.querySelector('#applyJobBtn').disabled = false;
                          }
                        }
                      </script>
                    </div>
                    <div class="mb-3 w-100 me-2">
                      <label for="comments" class="form-label">Anything you want to tell us? (Optional)</label>
                      <textarea class="form-control" id="comments" name="comments" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4  w-autoo" id="applyJobBtn" name="applyJob" value="apply" <?= ($isApplied) ? "disabled" : ""  ?>>APPLY</button>

                </div>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
<?php
  }
}

?>