<?php include '../template/header.php'; ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Coach</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Coach</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 project-list">
                <div class="card">
                  <div class="row">
                    <div class="col-md-6 p-0 d-flex">
                      <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>Basic</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Premium</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>VIP</a></li>
                      </ul>
                    </div>
                    <div class="col-md-6 p-0">                    
                      <!-- <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="projectcreate.html"> <i data-feather="plus-square"> </i>Add New Member</a> -->
                        <!-- Large modal-->
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i data-feather="plus-square"></i>Add New Coach</button>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add New Coach</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form class="form-horizontal" action="../model/coach/coachAdd.php" method="POST" id="addMemberForm">
                                  <fieldset>
                                  <!-- Text input-->
                                  <div class="mb-3 row">
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Name</label>  
                                    <div class="col-lg-12">
                                    <input id="nameInputNew" name="nameInputNew" type="text" placeholder="Coach-Name" class="form-control btn-square input-md" required>
                                    
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Specialization</label>  
                                    <div class="col-lg-12">
                                    <input id="specInputNew" name="specInputNew" type="text" placeholder="Coach-Specialization" class="form-control btn-square input-md" required>
                                    
                                    </div>
                                    </div>
                                  </div>
                                  <!-- Text input-->
                                  <div class="mb-3 row">
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Email</label>  
                                    <div class="col-lg-12">
                                    <input id="emailInputNew" name="emailInputNew" type="text" placeholder="Coach-Email" class="form-control btn-square input-md" required>
                                     
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Contact Number</label>  
                                    <div class="col-lg-12">
                                    <input id="contactInputNew" name="contactInputNew" type="text" placeholder="Coach-Contact" class="form-control btn-square input-md" required>
                                     
                                    </div>
                                    </div>
                                  </div>
                                  </fieldset>
                                  
                          </div>
                          <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-secondary" type="submit" value="Save">
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Zero Configuration  Starts-->
              <div class="col-xl-8">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0">Coach List</h3>                  
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <!-- <th>Id</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $queryResults = getCoachList();

                            foreach($queryResults as $row) :
                          ?>
                          <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['specialization'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['contactNumber'] ?></td>
                            <!-- <td><?= $row['coachID'] ?></td> -->
                            <td> 
                              <ul class="action"> 
                                <li class="edit"><a href="#" id="btnEdit" onClick="getCoachData(<?= $row['coachID'] ?>)"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#" id="btnDelete" onClick="deleteCoachDatas(<?= $row['coachID'] ?>)"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Zero Configuration  Ends-->
              <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h3 class="card-title mb-0">Coach Details</h3>
                      <div class="card-options">
                        <a class="card-options-collapse" href="javascript:void(0)" data-bs-toggle="card-collapse">
                          <i class="fe fe-chevron-up"></i>
                        </a>
                        <a class="card-options-remove" href="javascript:void(0)" data-bs-toggle="card-remove">
                            <i class="fe fe-x"></i>
                        </a>
                      </div>
                    </div>
                    <div class="card-body member-profile">
                      <form action="../model/coach/coachUpdate.php" method="POST">
                        <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input class="form-control" id="nameInput" name="nameInput" placeholder="coach-name" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Specialization</label>
                          <input class="form-control" id="specInput" name="specInput" placeholder="coach-specialization" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input class="form-control" id="emailInput" name="emailInput" placeholder="coach-email" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Contact Number</label>
                          <input class="form-control" id="contactInput" name="contactInput" placeholder="coach-Contact Number" required>
                        </div>
                        <div class="form-footer">
                          <input class="form-control" type="hidden" id="coachIdInput" name="coachIdInput" placeholder="coach ID">
                          <input class="btn btn-primary btn-block" type="submit" value="Save Changes">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>