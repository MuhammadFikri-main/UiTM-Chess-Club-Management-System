<?php require '../controller/chess_engine.php';

session_start();

$role = $_SESSION['role'];

if (!isset($role) || $role == 'admin') {
   header('Location: ../login.php');
   exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Koho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Koho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon">
    <title>Chess Club | Membership</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

    <script src="../scripts.js"></script>
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Koho .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/chess-club-logo_logo.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/chess-club-logo_logo-dark.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
            <div class="input-group">     
              <input class="form-control" type="text" placeholder="Search Here........"><span class="input-group-text mobile-search"><i data-feather="search"></i></span>
            </div>
          </div>
          <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
              <li>
                <div class="mode"><i data-feather="moon"></i></div>
              </li>
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <div class="d-flex profile-media"><img class="b-r-50" src="../assets/images/dashboard/cc-profile.png" alt="">
                  <?php 
                    $role = $_SESSION['role'];
                    $userId = $_SESSION['userId']; 

                    $resultQuery = getAccDetails($userId);

                    if ($resultQuery) {
                      // Process the row data here
                      $row = $resultQuery;

                  ?>
                  <div class="flex-grow-1"><span><?= $row['firstName'] ?></span>
                    <p class="mb-0 font-roboto"><?= $row['role'] ?><i class="middle fa fa-angle-down"></i></p>
                  </div>
                  <?php } ?>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="member.php"><i data-feather="user"></i><span>Account</span></a></li>
                  <li><a href="../controller/signout.php"><i data-feather="log-out"></i><span>Log out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper">
              <a href="m-home.php">
                <img class="img-fluid for-light" src="../assets/images/logo/chess-club-logo_logo.png" alt="">
                <img class="img-fluid for-dark" src="../assets/images/logo/chess-club-logo_logo-dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-left"> </i></div>
            </div>
            <div class="logo-icon-wrapper">
              <a href="m-home.php">
              <img class="img-fluid for-light" src="../assets/images/logo/chess-club-logo_logo-icon.png" alt="">
              <img class="img-fluid for-dark" src="../assets/images/logo/chess-club-logo_logo-icon-dark.png" alt=""></a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <a href="index.html">
                    <img class="img-fluid for-light" src="../assets/images/logo/chess-club-logo_logo-icon.png" alt="">
                    <img class="img-fluid for-dark" src="../assets/images/logo/chess-club-logo_logo-icon-dark.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">  
                    <div>       
                      <h4 class="lan-1">General</h4>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="m-home.php"><i data-feather="home"> </i><span>Home</span></a></li>
                  <?php if (isset($_SESSION['role'])) { ?>
                      <?php if ($_SESSION['role'] === 'basic' || $_SESSION['role'] === 'premium' || $_SESSION['role'] === 'vip') { ?>
                          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="m-resources.php"><i data-feather="book-open"> </i><span>Resources Library</span></a></li>
                      <?php } ?>

                      <?php if ($_SESSION['role'] === 'premium' || $_SESSION['role'] === 'vip') { ?>
                          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="m-class.php"><i data-feather="clipboard"> </i><span>Class</span></a></li>
                      <?php } ?>

                      <?php if ($_SESSION['role'] === 'vip') { ?>
                          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="m-workshop.php"><i data-feather="monitor"> </i><span>Workshop</span></a></li>
                      <?php } ?>
                  <?php } ?>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="m-upgrade.php"><i data-feather="users"> </i><span>Upgrade</span></a></li>
                </ul>
                <div class="sidebar-img-section">
                  <div class="sidebar-img-content"><img class="img-fluid" src="../assets/images/dashboard/upgrade/upgrade.png" alt="">
                    <h4>Experience with more Features</h4><a class="btn btn-primary" href="../index.php" target="_blank">Check now</a>
                  </div>
                </div>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">