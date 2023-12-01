<?php include '../template/header-member.php'; ?>
<?php require '../controller/dashboard_engine.php' ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="m-home.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid default-page">
            <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card profile-greeting">
                  <div class="card-body">                   
                    <div>
                      <?php 
                        $role = $_SESSION['role'];
                        $userId = $_SESSION['userId']; 

                        $resultQuery = getAccDetails($userId);

                        if ($resultQuery) {
                          // Process the row data here
                          $row = $resultQuery;

                      ?>
                      <h1>Welcome, <?= $row['firstName'] ?></h1>
                      <?php } ?>
                      <p> You have joined the UiTM Chess Club! Start a new goal & improve your result</p><a class="btn" href="member.php">Continue<i data-feather="arrow-right"></i></a>
                    </div>
                    <!-- <div class="greeting-img"><img class="img-fluid" src="../assets/images/dashboard/profile-greeting/bg.png" alt=""></div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                <div class="card activity-review">
                  <div class="card-header pb-0">
                    <h3> Activity </h3>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li>
                          <div><i class="icon-settings"></i></div>
                        </li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive"  style="max-height: 155px; overflow-y: auto;">
                      <table class="table table-bordernone ">
                        <tbody>
                          <?php 
                            $id = $_SESSION['userId']; 
                            // Call the function to retrieve the schedule data
                            $scheduleData = getScheduleDataById($id);

                            // Iterate over the schedule data and populate the table rows
                            foreach ($scheduleData as $schedule) {
                           ?>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <!-- <img class="img-fluid" src="../assets/images/dashboard/activity/1.jpg" alt=""> -->
                                <div class="flex-grow-1">
                                    <h5><?=$schedule['title']?></h5>
                                  <p><?=$schedule['date']?> <?=$schedule['sessionTime']?> at <?=$schedule['location']?></p>
                                </div>
                                <div class="time-badge"> 
                                  <p><?=$schedule['type']?>  </p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $id = $_SESSION['userId']; $queryResults2 = getResourceDownload($id); ?>
                        <h6 class="font-roboto">Download Resources</h6>
                        <h2 class="mb-0 counter"><?php echo $queryResults2 ?></h2>
                      </div>
                    </div>
                    <div class="progress-widget">
                      <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-secondary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $id = $_SESSION['userId']; $queryResults3 = getTotalWorkshopById($id); ?>
                        <h6 class="font-roboto">Upcoming Workshop</h6>
                        <h2 class="mb-0 counter"><?php echo $queryResults3 ?></h2>
                      </div>
                    </div>
                    <div class="progress-widget">
                      <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-secondary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $id = $_SESSION['userId']; $queryResults3 = getTotalClassById($id); ?>
                        <h6 class="font-roboto">Upcoming Class</h6>
                        <h2 class="mb-0 counter"><?php echo $queryResults3 ?></h2>
                      </div>
                    </div>
                    <div class="progress-widget">
                      <div class="progress sm-progress-bar progress-animate">
                        <div class="progress-gradient-secondary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          <?php include '../template/footer.php'; ?>