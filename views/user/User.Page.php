<?php

class UserPage
{


  static function showEntrance($jobData)
  {
?>
    <!-- job-posting part -->
    <div class="ms-3" id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab" tabindex="0">
      <h4 class="mt-5 ms-3">Information Technology</h4>
      <div id="carousel1" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner d-flex">
          <div class="carousel-item active">
            <!-- placing a for loop here -->
            <div class="d-flex mt-2 px-5">
              <a class="card me-2" href="jobDescription.html" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted"><?php $jobData->getCompanyName() ?></h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              
            </div>
          </div>
          <div class="carousel-item ">
            <div class="d-flex mt-3 px-5">
              <!-- second for loop here -->
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
            </div>
          </div>

          <button style="position: absolute; left:-110px" class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
            <svg class="carousel-control-prev-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
              <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>

          </button>
          <button class="carousel-control-next" style="position: absolute; right:-110px" type="button" data-bs-target="#carousel1" data-bs-slide="next">
            <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
              <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
        </div>
      </div>
      <h4 class="mt-5 ms-3">Labour</h4>
      <div id="carousel2" class="carousel slide " data-bs-ride="carousel">
        <button style="position: absolute; left:-110px" class="carousel-control-prev" id="carousel-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
          <svg class="carousel-control-prev-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
            <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
          </svg>
        </button>
        <button style="position: absolute; right:-110px" class="carousel-control-next" id="carousel-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
          <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000">
            <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
        <div class="carousel-inner d-flex">
          <div class="carousel-item active">
            <div class="d-flex mt-2  px-5">
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
            </div>


          </div>
          <div class="carousel-item ">
            <div class="d-flex mt-3  px-5">
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
              <a class="card me-2" href="#" style="z-index:1 ;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                  <h5 class="card-title">Job title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                  <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                  <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                </div>
              </a>
            </div>
          </div>


        </div>
      </div>
    </div>
  <?php
  }

  static function showJobDescription()
  {
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
                      <h3 class="text-left">Software Engineer Entry Level</h3>
                      <!-- SQL ATTR: companyName -->
                      <span class="text-left fs-5">Keycafe</span>
                      <!-- SQL ATTR: jobLocation -->
                      <span class="text-left fs-5">Vancouver, BC</span>
                      <!-- SQL ATTR: jobType -->
                      <span class="text-left fs-5">Full-time</span>
                      <!-- SQL ATTR: salary -->
                      <span class="text-left fs-5">Salary (monthly): </span>
                      <p></p>
                      <hr>
                      <div class="job-description-content">
                        <ul>
                          <!-- SQL ATTR: jobDescription -->
                          <li class="fs-5">Full Job Description</li>
                          <p>
                            Keycafe (http://www.keycafe.com/) is a rapidly growing software company seeking talented, self-starting software
                            engineers who can learn quickly and build out new features of our platform.

                            You will work across the stack and have the opportunity to develop new infrastructure that our customers will use to
                            manage their operations and fleet of assets. As a vertically integrated hardware/software solution that is deployable
                            worldwide, our product presents unique challenges including IOT, cloud, security, firmware, billing, analytics,
                            iOS/Android apps, etc. As an early member of our engineering team, you'll have many opportunities to forge our best
                            practices, technical decisions, and create areas of ownership for yourself.

                            The ideal candidate is analytical, thorough and independent by nature. If you are motivated and results-driven, and
                            enjoy shipping superb code, we'd like to meet you.
                          </p>
                          <!-- SQL ATTR: duty -->
                          <li class="fs-5">What You'll Do:</li>
                          <p>Write code. Our languages and frameworks include Groovy/Grails, Java, JS/Node.js/AngularJS, C++, Python, PostgreSQL
                            and
                            others.
                            Architect your own features. Engineers at Keycafe are given wide latitude on how to approach problems, but be ready
                            for
                            technical feedback.
                            Collaborate with product management and other teams to achieve customer experience objectives.
                            Own the quality of the features you develop including comprehensive testing and documentation
                          </p>
                          <!-- SQL ATTR: qualification -->
                          <li class="fs-5">About you:</li>
                          <p>Bachelor's degree in Computer Science or Sofware Engineering
                            Experience with object oriented programming languages and APIs
                            Ability to work within a team and accept technical feedback
                            An eye for design and experience with UI languages a plus
                            Resident in Canada
                          </p>
                          <!-- SQL ATTR: benefits -->
                          <li class="fs-5">Benefits:</li>
                          <p>Competitive salary<br>
                            Benefits plan<br>
                            Generous and flexible paid time off<br>
                            Parental leave policy<br>
                            Remote-friendly work environment<br>
                          </p>
                          <!-- SQL ATTR: compayInfo -->
                          <li class="fs-5">About Company</li>
                          <p>Keycafe (http://www.keycafe.com/) is a SaaS company based in Vancouver, BC that has developed a device and cloud based
                            service that lets businesses manage access to their vehicle and facility keys. Businesses are able to manage tens,
                            hundreds or thousands of keys and configure access and workflows involving their employees, guests, and customers across
                            many locations.

                            Customers from more than 40 industries use Keycafe including major vacation rental/hotels (hospitality), car rental
                            agencies, car dealerships, real estate/property management, and just about any company that has a large vehicle fleet or
                            property fleet. Keycafe has customers and operations across the EU, North America, Asia, and Australia.

                            We pride ourselves on being a great place to work with 4.7 stars on Glassdoor
                            (https://www.glassdoor.ca/Overview/Working-at-Keycafe-EI_IE2161579.11,18.htm) from current and former employees. We look
                            forward to working with new hires and supporting their personal career development.</p>
                        </ul>
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
                <button class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                      <form class=" col mt-4">
                        <div class="mb-3">
                          <label for="username" class="form-label">Name</label>
                          <input type="text" disabled class="form-control" placeholder="John Doe" id="username">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" disabled class="form-control" placeholder="johndoe@gmail.com" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="desiredPay" class="form-label">Desired Pay Per Month</label>
                          <input type="number" class="form-control" id="desiredPay">
                        </div>
                        <div class="mb-3">
                          <label for="additionalUrl" class="form-label">Additional URL (Optional)</label>
                          <input type="url" class="form-control" id="additionalUrl">
                        </div>

                        <div class="mb-3">
                          <label for="resumeUpload" class="form-label">Upload your resume</label>
                          <input type="file" class="form-control" id="resumeUpload" required>
                        </div>
                        <div class="mb-3">
                          <label for="comments" class="form-label">Anything you want to tell us? (Optional)</label>
                          <textarea class="form-control" id="comments" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 ">Apply</button>

                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
    <?php
  }


}

    ?>