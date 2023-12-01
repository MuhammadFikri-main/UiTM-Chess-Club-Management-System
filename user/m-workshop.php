<?php 
  error_reporting(0);
  //session_start();
  include '../template/header-member.php'; 
  
?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Workshop</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="m-home.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Workshop</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid"> 
          <div class="row">
            <p>Upcoming Workshop</p>
            <?php 
                $queryResults = getWorkshopListByDate();
                foreach($queryResults as $row) :
                  $workshopId = $row['workshopID'];
                  $isSubscribed = isUserSubscribed($userId, $workshopId);
            ?>

          <!-- Container-fluid starts-->
          
          <div class="col-xl-3">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0"><?= $row['title'] ?></h3>                  
                    </div>
                  <div class="card-body">
                    <p><?= $row['date'] ?></p>
                    <p><?= $row['location'] ?></p>
                    <p><?= $row['description'] ?></p>
                    <?php if ($isSubscribed) : ?>
                      <form action="../model/workshop/workshopStatus.php" method="post">
                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                      <input type="hidden" name="workshopId" value="<?= $row['workshopID'] ?>"> 
                      <input class="btn btn-primary" type="submit" value="Joined">
                    </form>
                    <?php else : ?>
                    <form action="../model/workshop/workshopSubs.php" method="post">
                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                      <input type="hidden" name="workshopId" value="<?= $row['workshopID'] ?>"> 
                      <input class="btn btn-primary" type="submit" value="Join">
                    </form>
                    <?php endif;?>
                  </div>
                </div>
          </div>
          <?php endforeach; ?>
          <!-- Zero Configuration  Starts-->
          <div class="col-xl-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0">Workshop History</h3>                  
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Description</th>
                            <!-- <th>Id</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $id = $_SESSION['userId'];
                            $queryResults = getWorkshopListById($id);

                            foreach($queryResults as $row) :
                          ?>
                          <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['location'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <!-- <td><?= $row['workshopID'] ?></td> -->
                            <td> 
                              <ul class="action"> 
                                <li class="edit"><a href="#" id="btnEdit" onClick="getWorkshopData(<?= $row['workshopID'] ?>)"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#" id="btnDelete" onClick="deleteWorkshopDatas(<?= $row['workshopID'] ?>)"><i class="icon-trash"></i></a></li>
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
          </div>
          </div>
          <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>