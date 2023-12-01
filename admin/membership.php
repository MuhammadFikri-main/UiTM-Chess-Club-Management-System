<?php include '../template/header.php'; ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Membership</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Membership</li>
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
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i data-feather="plus-square"></i>Add New Member</button>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add New Member</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" action="../model/membership/membershipAdd.php" method="POST" id="addMemberForm">
                                  <fieldset>
                                  <!-- Text input-->
                                  <div class="mb-3 row">
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">First Name</label>  
                                    <div class="col-lg-12">
                                    <input id="firstNameInputNew" name="firstNameInputNew" type="text" placeholder="placeholder" class="form-control btn-square input-md" required>
                                    <p class="help-block">help</p>  
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Last Name</label>  
                                    <div class="col-lg-12">
                                    <input id="lastNameInputNew" name="lastNameInputNew" type="text" placeholder="placeholder" class="form-control btn-square input-md" required>
                                    <p class="help-block">help</p>  
                                    </div>
                                    </div>
                                  </div>
                                  <!-- Text input-->
                                  <div class="mb-3 row">
                                    <label class="col-lg-12 form-label text-lg-start" for="textinput">Email</label>  
                                    <div class="col-lg-12">
                                    <input id="emailInputNew" name="emailInputNew" type="text" placeholder="placeholder" class="form-control btn-square input-md" required>
                                    <p class="help-block">help</p>  
                                    </div>
                                  </div>

                                  <!-- Password input-->
                                  <div class="mb-3 row">
                                    <label class="col-lg-12 form-label text-lg-start" for="passwordinput">Password</label>
                                    <div class="col-lg-12">
                                      <input id="passwordInputNew" name="passwordInputNew" type="password" placeholder="placeholder" class="form-control btn-square input-md" required>
                                      <span class="help-block">help</span>
                                    </div>
                                  </div>

                                  <!-- Select Basic -->
                                  <div class="mb-3 row">
                                    <label class="col-lg-12 form-label text-lg-start" for="selectbasic">Membership Type </label>
                                    <div class="col-lg-12">
                                      <select id="accType" name="accType" class="form-control btn-square" required>
                                        <option value="3">Basic</option>
                                        <option value="4">Premium</option>
                                        <option value="5">VIP</option>
                                      </select>
                                    </div>
                                  </div>
                                  </fieldset>
                                  
                          </div>
                          <div class="modal-footer">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-secondary" type="submit" value="Save">
                                <!-- <button class="btn btn-secondary" type="button" id="btnAdd">Save</button> -->
                                <!-- <button class="btn btn-secondary" type="button" id="btnAdd" onclick="addMember(this.form)">Save</button> -->
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
                    <h2 class="card-title mb-0">Members List</h2>                  
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Account Type</th>
                            <!-- <th>Id</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $queryResults = getMembershipList();

                            foreach($queryResults as $row) :
                          ?>
                          <tr>
                            <td><?= $row['firstName'] ?></td>
                            <td><?= $row['lastName'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td style="text-transform:capitalize"><?= $row['accType'] ?></td>
                            <!-- <td id="userId" value="<?= $row['userID'] ?>"><?= $row['userID'] ?></td> -->
                            <td>
                              <ul class="action"> 
                                <li class="edit"><a href="#" id="btnEdit" onClick="getMemberData(<?= $row['userID'] ?>)"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#" id="btnDelete" onClick="deleteMemberDatas(<?= $row['userID'] ?>)"><i class="icon-trash"></i></a></li>
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
                      <h2 class="card-title mb-0">Edit Member</h2>
                    </div>
                    <div class="card-body member-profile">
                      <form action="../model/membership/membershipUpdate.php" method="POST"">
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="d-flex">
                              <div class="flex-grow-1">
                                  <h3 class="mb-1 f-20 txt-primary" id="memberTitle">Member Name</h3>
                                <p class="f-12" id="memberAcc" style="text-transform:capitalize">Membership Tier</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">First Name</label>
                          <input class="form-control" id="firstNameInput" name="firstNameInput" placeholder="first name" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input class="form-control" id="lastNameInput" name="lastNameInput" placeholder="last name" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email-Address</label>
                          <input class="form-control" id="emailInput" name="emailInput" type="email" placeholder="email@domain.com" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input class="form-control" id="passwordInput" name="passwordInput" type="password" placeholder="password" required>
                        </div>
                        <div class="form-footer">
                          <input class="form-control" type="hidden" id="userIdInput" name="userIdInput" placeholder="User ID">
                          <input class="form-control" type="hidden" id="roleIdInput" name="roleIdInput" placeholder="Role ID">
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