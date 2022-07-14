<?php

    class PageIndex{
         
            static function adminDetails(){
                ?>
                     <main class="">
        <div class="container ">
        <div class="card mt-5 w-100 adminDetails">
            <div class="card-body">
              <h4 class="card-title">Admin Details</h4>
              <div class="card-text mt-3 float-start col">
                  <p>Username: <span> Johndoe@gmail.com</span></p>
                  <p>Name: <span> John Doe</span></p>
              </div>
            </div>
          </div>
          </div>
                <?php
            }


            static function createJobs(){
                ?>
 <div class="container mt-5 adminTabs">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-create-tab" data-bs-toggle="tab" data-bs-target="#nav-create" type="button" role="tab" aria-controls="nav-create" aria-selected="true">Create Jobs</button>
                  <button class="nav-link " id="nav-jobs-tab" data-bs-toggle="tab" data-bs-target="#nav-jobs" type="button" role="tab" aria-controls="nav-jobs" aria-selected="true">Existing Jobs</button>
                  <button class="nav-link" id="nav-manage-users-tab" data-bs-toggle="tab" data-bs-target="#nav-manage-users" type="button" role="tab" aria-controls="nav-manage-users" aria-selected="false">Manage users</button>
                
                </div>
              </nav>
              <div class="tab-content jobs" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-create" role="tabpanel" aria-labelledby="nav-create-tab" tabindex="0">
                    <div class="d-flex">
                    <form class=" col-6 mt-5">
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
                        <button type="submit" class="btn btn-primary mt-4">Create Job</button>
                      </form>
                      <div class="image mt-5 pt-5 ms-5 flex-end">
                      <img src="../../images/createjobs.png" alt="create job" height="400">
                      </div>
                      </div>
                      
                </div>
                <?php
            }


            static function existingJobs(){
                ?>

<div class="tab-pane fade " id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab" tabindex="0">
                    <h4 class="mt-5">Information Technology</h4>
                    <div id="carousel1" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-inner d-flex">
                          <div class="carousel-item active">
                            <div class="d-flex mt-2 px-5">
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                    <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                      <h5 class="card-title">Job title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                      <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                    </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                        </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                        </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                    </div>
                                </a>
                            </div>
                            
                            
                          </div>
                          <div class="carousel-item ">
                            <div class="d-flex mt-3 px-5">
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                    <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                      <h5 class="card-title">Job title 2</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                      <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                    </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                        </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                        </div>
                                </a>
                                <a class="card me-2" href="#">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                          <h5 class="card-title">Job title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                          <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                    </div>
                                </a>
                            </div>
                          </div>
                       
                        <button style="position: absolute; left:-68px" class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                          <svg class="carousel-control-prev-icon"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000"><path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                        
                        </button>
                        <button class="carousel-control-next" style="position: absolute; right:-60px" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                          <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000"><path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                        </button>
                      </div>
               </div>
               <h4 class="mt-5">Labour</h4>
               <div id="carousel2" class="carousel slide " data-bs-ride="carousel">
                <button style="position: absolute; left:-68px" class="carousel-control-prev" id="carousel-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                  <svg class="carousel-control-prev-icon"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000"><path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                </button>
                <button style="position: absolute; right:-60px" class="carousel-control-next" id="carousel-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                  <svg class="carousel-control-next-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000"><path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                </button>
                   <div class="carousel-inner d-flex">
                     <div class="carousel-item active">
                       <div class="d-flex mt-2  px-5">
                           <a class="card me-2" href="#">
                               <div class="card-body">
                               <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                 <h5 class="card-title">Job title</h5>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                 <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                 <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                               </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                     <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                     <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                   </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                     <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                     <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                   </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                     <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                     <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                               </div>
                           </a>
                       </div>
                       
                       
                     </div>
                     <div class="carousel-item ">
                       <div class="d-flex mt-3  px-5">
                           <a class="card me-2" href="#">
                               <div class="card-body">
                               <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                 <h5 class="card-title">Job title 2</h5>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                 <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                 <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                               </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                     <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                     <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                   </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                     <h6 class="card-subtitle mb-3 text-muted">Pay $16-$18</h6>
                                     <h6 class="card-subtitle mb-2 px-2 badge rounded-pill bg-primary text-white">Part-time</h6>
                                   </div>
                           </a>
                           <a class="card me-2" href="#">
                               <div class="card-body">
                                   <h6 class="card-subtitle mb-3 text-muted">Company name</h6>
                                     <h5 class="card-title">Job title</h5>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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


            static function manageUsers(){
                ?>
                     <div class="tab-pane fade" id="nav-manage-users" role="tabpanel" aria-labelledby="nav-manage-users-tab" tabindex="0">
                      <div class="input-group mb-3 mt-4" >
                        <span class="input-group-text" id="basic-addon1">Search</span>
                        <input type="search" class="form-control" placeholder="keyword" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                        <table class="table table-striped mt-3">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone no.</th>
                                <th scope="col">Resume</th>
                                <th scope="col">Options</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>mark12@gmail.com</td>
                                <td>6047439820</td>
                                <td><a href="#">resume link</a></td>
                                <td><a class="edituser" href="User_details.html">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg></a>
                                  <a class="deleteuser" href="User_details.html"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg></a>
                                </td>  
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Mark</td>
                                <td>mark12@gmail.com</td>
                                <td>6047439820</td>
                                <td><a href="#">resume link</a></td>
                                <td><a class="edituser" href="User_details.html">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg></a>
                                  <a class="deleteuser" href="User_details.html"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg></a>
                                </td>   
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Mark</td>
                                <td>mark12@gmail.com</td>
                                <td>6047439820</td>
                                <td><a href="#">resume link</a></td>
                                <td><a class="edituser" href="User_details.html">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg></a>
                                  <a class="deleteuser" href="User_details.html"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#000" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg></a>
                                </td>  
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    
                    </div>
               
              
              </div>
          </div>
          </main>
                <?php
            }
    }


?>