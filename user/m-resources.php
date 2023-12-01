<?php 
  include '../template/header-member.php'; 

  $userId = $_SESSION['userId'];
  ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Resources Library</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="m-home.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Resources Librarry</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid"> 
          <div class="row">
            <?php 
                $queryResults = getResourceList();
                foreach($queryResults as $row) :
            ?>

          <!-- Container-fluid starts-->
          
          <div class="col-xl-3">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3 class="card-title mb-0"><?= $row['title'] ?></h3>                  
                    </div>
                  <div class="card-body">
                    <p><?= $row['type'] ?></p>
                    <p><?= $row['description'] ?></p>
                    <!-- <a href="../model/resources/resourcesDownload.php?fileName=<?= $row['fileName'] ?>">Download File</a> -->
                    <form action="../model/resources/resourcesDownload.php" method="get">
                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                      <input type="hidden" name="resId" value="<?= $row['resourcesID'] ?>"> 
                      <input type="hidden" name="fileName" value="<?= $row['fileName'] ?>"> 
                      <input class="btn btn-primary" type="submit" value="Download">
                    </form>
                  </div>
                </div>
          </div>
          <?php endforeach; ?>
          </div>
          </div>        
          <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>