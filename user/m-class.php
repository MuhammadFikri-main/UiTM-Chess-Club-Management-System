<?php include '../template/header-member.php'; ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Class</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="m-home.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Class</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid"> 
          <p>Coach List</p>
          <div class="row">
            <?php 
                $queryResults = getCoachList();
                foreach($queryResults as $row) :
            ?>
          <div class="col-xl-2">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0"><?= $row['name'] ?></h3>                  
                    </div>
                  <div class="card-body">
                    <p><?= $row['specialization'] ?></p>
                  </div>
                </div>
          </div>
          <?php endforeach; ?>
          <!-- Container-fluid Ends-->
          <!-- Container-fluid starts-->
          <div class="col-xl-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0">Register Class</h3>                  
                    </div>
                  <div class="card-body">
                  <form class="form-horizontal" action="../model/class/classAdd.php" method="POST" id="addMemberForm"><fieldset>
                    <!-- Text input-->
                    <div class="mb-3 row">
                      <div class="col-md-6">
                        <label class="col-lg-12 form-label text-lg-start" for="textinput">Date</label>
                        <div class="col-lg-12">
                          <input id="dateInputNew" name="dateInputNew" type="date" placeholder="Class-Date" class="form-control btn-square input-md">
                          <!-- <p class="help-block">help</p> -->
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="col-lg-12 form-label text-lg-start" for="textinput">Time</label>
                        <div class="col-lg-12">
                          <select id="timeInputNew" name="timeInputNew" class="form-control btn-square">
                            <?php 
                            $queryResults = getSessionList();
                            foreach($queryResults as $row) :
                            ?>
                            <option value="<?= $row['sessionID'] ?>"><?= $row['time'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="mb-3 row">
                      <div class="col-md-6">
                        <label class="col-lg-12 form-label text-lg-start" for="textinput">Coach</label>
                        <div class="col-lg-12">
                          <select id="coachInputNew" name="coachInputNew" class="form-control btn-square">
                            <?php 
                            $queryResults = getCoachList();
                            foreach($queryResults as $row) :
                            ?>
                            <option value="<?= $row['coachID'] ?>"><?= $row['name'] ?> (<?= $row['specialization'] ?>)</option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="col-lg-12 form-label text-lg-start" for="textinput">Member</label>
                        <div class="col-lg-12">
                          <?php 
                          $role = $_SESSION['role'];
                          $userId = $_SESSION['userId']; 
                          $resultQuery = getAccDetails($userId);
                          
                          if ($resultQuery) {
                            // Process the row data here
                            $row = $resultQuery;
                            ?>
                            <!-- <option value="<?= $row['userID'] ?>"><?= $row['firstName'] ?> <?= $row['lastName'] ?></option> -->
                            <input type="text" name="userInputNew" class="form-control" value="<?= $row['firstName'] ?> <?= $row['lastName'] ?>" disabled>
                            <input type="hidden" name="userInputNew" value="<?= $row['userID'] ?>">
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                  <div class="modal-footer">
                    <!-- <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button> -->
                    <input class="btn btn-secondary" type="submit" value="Save">
                  </div>
                </form>
              </div>
            </div>
            <!-- Container-fluid starts-->
          <div class="col-xl-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0">Class History</h3>                  
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Coach</th>
                            <th>Member</th>
                            <!-- <th>Id</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $id = $_SESSION['userId'];
                            $queryResults = getClassListById($id);

                            foreach($queryResults as $row) :
                          ?>
                          <tr>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['time'] ?></td>
                            <td><?= $row['coach'] ?></td>
                            <td><?= $row['memberCount'] ?></td>
                            <!-- <td><?= $row['classID'] ?></td> -->
                            
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
        <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>