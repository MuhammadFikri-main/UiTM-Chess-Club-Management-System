<?php

if(isset($_POST['userId'])){
    $userId = $_POST["userId"];
    $subs = $_POST["subs"];
    $role = $_POST["role"];
    $price = $_POST["price"];
    // echo $userId;
    // echo $subs;
    // echo $role;
    // echo $price;
}
else{
    echo "no id found";
}
function getAccDetails($userId) {
    // Include the database connection file
    require "model/dbconn.php";

    $query = "SELECT * 
    FROM user
    WHERE userID=" . $userId;

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        echo "No data found.";
        return null;
    }
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
    <link rel="icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <title>Koho - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <!-- <div class="loader-wrapper">
      <div class="loader"></div>
    </div> -->
    <!-- Loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="assets/images/logo/chess_club_logo.png" alt="logo image"></a></div>
              <div class="login-main"> 
              <div class="checkout-details">
                      <div class="order-box">
                        <div class="title-box">
                          <div class="checkbox-title">
                            <h2 class="mb-0">Account Details</h2><span>Total</span>
                          </div>
                        </div>
                        <ul class="qty">
                            <?php $queryResults = getAccDetails($userId); ?>
                          <li>Name <span><?= $queryResults['firstName'] ?></span></li>
                          <li>Membership Tier <span style="text-transform:capitalize"><?php echo $role; ?></span></li>
                          <li>Upgrade To <span class="count" style="text-transform:capitalize"><?php echo $subs?></span></li>
                        </ul>
                        <ul class="sub-total">
                          
                        </ul>
                        <ul class="sub-total total">
                          <li>Total <span class="count">RM <?php echo $price?></span></li>
                        </ul>
                        <div class="animate-chk">
                          <div class="row">
                            <div class="col">
                              <label class="d-block" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="" data-original-title="" title="">Check Payments
                              </label>
                              <label class="d-block" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani" data-original-title="" title="">Cash On Delivery
                              </label>
                              <label class="d-block" for="edo-ani2">
                                <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="" data-original-title="" title="">PayPal<img class="img-paypal img-fluid" src="assets/images/checkout/paypal.png" alt="">
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="order-place">
                            <form action="model/upgrade/accSubs.php" method="POST">
                            <input type="hidden" name="subs" value="premium">
                                <input type="hidden" name="roleId" value="<?php echo $subs?>">
                                <input type="hidden" name="userId" value="<?php echo $userId ?>">
                                <button type="submit" class="btn btn-primary" href="model/upgrade/accSubs.php">Confirm Subscription  </button>
                            </form>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/bootstrap/popper.min.js"></script>
      <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src=".assets/js/config.js"></script>
      <!-- Theme js-->
      <script src="assets/js/script.js"></script>
    </div>
  </body>
</html>