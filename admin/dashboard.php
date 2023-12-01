<?php include '../template/header.php'; ?>
<?php require '../controller/dashboard_engine.php' ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid default-page">
            <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $queryResults = getTotalMember(); ?>
                        <h6 class="font-roboto">Members</h6>
                        <h2 class="mb-0 counter"><?php echo $queryResults ?></h2>
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
              <div class="col-sm-6 col-lg-3">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $queryResults2 = getTotalResources(); ?>
                        <h6 class="font-roboto">Resources</h6>
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
              <div class="col-sm-6 col-lg-3">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $queryResults3 = getTotalWorkshop(); ?>
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
              <div class="col-sm-6 col-lg-3">
                <div class="card o-hidden">
                  <div class="card-body">
                    <div class="d-flex static-widget">
                      <div class="flex-grow-1">
                        <?php $queryResults4 = getTotalCoach(); ?>
                        <h6 class="font-roboto">Coach</h6>
                        <h2 class="mb-0 counter"><?php echo $queryResults4 ?></h2>
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
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3>Resources Downloads</h3>
                  </div>
                  <div class="card-body">
                    <div id="basic-apex"></div>
                  </div>
                </div>
              </div>
              <script>
              function renderChart() {
                // Fetch the resource downloads data from the PHP function
                var resourceData = <?php echo json_encode(getResourceDownloadsByDay()); ?>;
                if (resourceData) {
                  // Extract the dates and counts from the resourceData object
                  var dates = resourceData.dates;
                  var counts = resourceData.counts;
                  // Configure the chart options
                  var options = {
                    chart: {
                      height: 350,
                      type: 'area',
                      zoom: {enabled: false},
                      toolbar:{show: false}
                    },
                    dataLabels: {enabled: false},
                  };
                  // Update the options object with the retrieved data
                  options.series = [{
                    name: "Resource Downloads",
                    data: counts
                  }];
                  options.labels = dates;
                  // Create the chart
                  var chart = new ApexCharts(document.querySelector("#basic-apex"), options);
                  chart.render();
                }
              }
              // Call the renderChart function after the chart container is rendered
              window.addEventListener('DOMContentLoaded', renderChart);
              </script>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3>Membership Tier</h3>
                  </div>
                  <div class="card-body apex-chart">
                    <div id="piechart"></div>
                  </div>
                </div>
              </div>
              <script>
                function renderPieChart() {
                    // Fetch the resource downloads data from the PHP file using AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "getMembershipTierData.php", true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var resourceData = JSON.parse(xhr.responseText);
                            if (resourceData) {
                                var roles = resourceData.roleNames; // Update variable name

                                // Convert the values in the roleCounts array to numbers
                                var roleCounts = resourceData.roleCounts.map(function (count) {
                                    return parseInt(count);
                                });

                                // Configure the chart options and create the chart
                                var options8 = {
                                    chart: {
                                        width: 500,
                                        height: 500,
                                        type: 'pie',
                                    },
                                    labels: roles,
                                    series: roleCounts,
                                    responsive: [{
                                        breakpoint: 480,
                                        options: {
                                            chart: {
                                                width: 200
                                            },
                                            legend: {
                                                position: 'bottom'
                                            }
                                        }
                                    }],
                                    colors: [KohoAdminConfig.primary, KohoAdminConfig.secondary, '#51bb25', '#a927f9', '#f8d62b']
                                };

                                var piechart = new ApexCharts(document.querySelector("#piechart"), options8);
                                piechart.render();
                            }
                        }
                    };
                    xhr.send();
                }
                // Call the renderPieChart function after the chart container is rendered
                window.addEventListener('DOMContentLoaded', renderPieChart);
            </script>
              <div class="col-xl-12 col-lg-12">
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
                    <div class="table-responsive"  style="max-height: 300px; overflow-y: auto;">
                      <table class="table table-bordernone ">
                        <tbody>
                          <?php 
                            $id = $_SESSION['userId']; 
                            // Call the function to retrieve the schedule data
                            $scheduleData = getScheduleData();

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
            </div>
          </div>
          <!-- Container-fluid Ends-->
          <?php include '../template/footer.php'; ?>