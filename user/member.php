<?php include '../template/header-member.php'; ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Account</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="m-home.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Account</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <?php 
                    $role = $_SESSION['role'];
                    $userId = $_SESSION['userId']; 

                    $resultQuery = getAccDetails($userId);

                    if ($resultQuery) {
                      // Process the row data here
                      $row = $resultQuery;

                  ?>
          <div class="container-fluid">  
            <div class="row"> 
          <div class="col-xl-4">
          <div class="card">
                    <div class="card-header pb-0">
                      <h2 class="card-title mb-0">My Profile</h2>
                      <div class="card-options"><a class="card-options-collapse" href="javascript:void(0)" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:void(0)" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-2">
                          <!-- <div class="profile-title">
                            <div class="d-flex">
                              <div class="flex-grow-1"><a href="user-profile.html"> 
                                  <h3 class="mb-1 f-20 txt-primary"><?= $row['firstName'] ?></h3></a>
                                <p class="f-12" style="text-transform:capitalize"><?php echo $role ?></p>
                              </div>
                            </div>
                          </div> -->
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Full Name</label>
                          <p><?= $row['firstName']?> <?= $row['lastName']?></p>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <p><?= $row['email']?></p>
                        </div>
                        <!-- <div class="form-footer">
                          <button class="btn btn-primary btn-block">Save</button>
                        </div> -->
                      </form>
                    </div>
                  </div>
          </div>
          <div class="col-xl-8">
                <div class="card">
                  <div class="card-header pb-0">
                  <h2 class="card-title mb-0">Edit Profile</h2>                 
                    </div>
                  <div class="card-body">
                  <form class="form-horizontal" action="../model/membership/membershipUpdate.php" method="POST" id="addMemberForm">
                    <fieldset>
                      <!-- Text input-->
                      <div class="mb-3 row">
                        <div class="col-md-6">
                          <label class="col-lg-12 form-label text-lg-start" for="textinput">First Name</label>
                          <div class="col-lg-12">
                            <input id="firstNameInputNew" name="firstNameInput" type="text" value="<?= $row['firstName'] ?>" class="form-control btn-square input-md">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="col-lg-12 form-label text-lg-start" for="textinput">Last Name</label> 
                          <div class="col-lg-12">
                            <input id="lastNameInputNew" name="lastNameInput" type="text" value="<?= $row['lastName'] ?>" class="form-control btn-square input-md">
                          </div>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-lg-12 form-label text-lg-start" for="textinput">Email</label>
                        <div class="col-lg-12">
                          <input id="emailInputNew" name="emailInput" type="text" value="<?= $row['email'] ?>" class="form-control btn-square input-md">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label class="col-lg-12 form-label text-lg-start" for="passwordinput">Password</label>
                        <div class="col-lg-12">
                          <input id="passwordInputNew" name="passwordInput" type="password" value="<?= $row['password'] ?>" class="form-control btn-square input-md">
                        </div>
                      </div>  
                      <input type="hidden" name="userIdInput" value="<?= $row['userID'] ?>">
                    </fieldset>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="roleIdInput" value="<?= $row['roleID'] ?>">
                    <input class="btn btn-primary" type="submit" value="Save Changes">
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>