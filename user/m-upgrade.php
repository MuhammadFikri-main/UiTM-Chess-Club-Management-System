<?php include '../template/header-member.php'; ?>

          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Upgrade Membership</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="member.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Upgrade Membership</li>
                  </ol>
                </div>
              </div>
            </div>
          <!-- Container-fluid starts-->
          <div class="col-sm-12">
                    <p>Subscription</p>
                    <div class="row pricing-col">
                      <?php 
                      $userId = $_SESSION['userId'];
                      $role = $_SESSION['role'];
                      ?>
                      <div class="col-md-4 box-col-25">
                        <div class="pricing-block card text-center">
                          <div class="pricing-header">
                            <h2>Basic</h2>
                            <div class="price-box">
                              <div>
                                <h3>Free</h3>
                              </div>
                            </div>
                          </div>
                          <div class="pricing-list">                                     
                            <ul class="pricing-inner">
                              <li>
                                <h6>Regular<span>club meetings and events.</span></h6>
                              </li>
                              <li>
                                <h6>Unlimited<span> learning resources</span></h6>
                              </li>
                            </ul>
                            <?php if ($role == 'basic') : ?>
                              <button class="btn btn-secondary btn-lg" type="submit" data-original-title="btn btn-secondary btn-lg" title="">Subscribed</button>
                            <?php else : ?>
                              <form action="../subsConfirmation.php" method="POST">
                                <input type="hidden" name="subs" value="basic">
                                <input type="hidden" name="role" value="<?php echo $role ?>">
                                <input type="hidden" name="userId" value="<?php echo $userId ?>">
                                <input type="hidden" name="price" value="free">
                                <button class="btn btn-primary btn-lg" type="submit" data-original-title="btn btn-primary btn-lg" title="">Subscribe</button>
                              </form>
                            <?php endif;?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 box-col-25">
                        <div class="pricing-block card text-center">
                          <div class="pricing-header">
                            <h2>Premium</h2>
                            <div class="price-box">
                              <div>
                                <h3>RM25</h3>
                                <p>/ month</p>
                              </div>
                            </div>
                          </div>
                          <div class="pricing-list">                                     
                            <ul class="pricing-inner">
                              <li>
                                <h6>All<span> benefits of Basic Membership</span></h6>
                              </li>
                              <li>
                                <h6>Personalized<span> coaching</span></h6>
                              </li>
                              <li>
                                <h6>Enhanced<span> game analysis feedback</span></h6>
                              </li>
                              
                              <li>
                                <h6>Priority<span>  support, exclusive access</span></h6>
                              </li>
                            </ul>
                            <?php if ($role == 'premium') : ?>
                              <button class="btn btn-secondary btn-lg" type="submit" data-original-title="btn btn-secondary btn-lg" title="">Subscribed</button>
                            <?php else : ?>
                              <form action="../subsConfirmation.php" method="POST">
                                <input type="hidden" name="subs" value="premium">
                                <input type="hidden" name="role" value="<?php echo $role ?>">
                                <input type="hidden" name="userId" value="<?php echo $userId ?>">
                                <input type="hidden" name="price" value="25">
                                <button class="btn btn-primary btn-lg" type="submit" data-original-title="btn btn-primary btn-lg" title="">Subscribe</button>
                              </form>
                            <?php endif;?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 box-col-25">
                        <div class="pricing-block card text-center">
                          <div class="pricing-header">
                            <h2>VIP </h2>
                            <div class="price-box">
                              <div>
                                <h3>RM50</h3>
                                <p>/ month</p>
                              </div>
                            </div>
                          </div>
                          <div class="pricing-list">
                            <ul class="pricing-inner">
                              <li>
                                <h6>All<span> benefits of Basic Membership</span></h6>
                              </li>
                              <li>
                              <h6>All<span> benefits of Premium Membership</span></h6>
                              </li>
                              <li>
                                <h6>Exclusive<span> VIP events and networking</span></h6>
                              </li>
                            </ul>
                            <?php if ($role == 'vip') : ?>
                              <button class="btn btn-secondary btn-lg" type="submit" data-original-title="btn btn-secondary btn-lg" title="">Subscribed</button>
                            <?php else : ?>
                              <form action="../subsConfirmation.php" method="POST">
                                <input type="hidden" name="subs" value="vip">
                                <input type="hidden" name="role" value="<?php echo $role ?>">
                                <input type="hidden" name="userId" value="<?php echo $userId ?>">
                                <input type="hidden" name="price" value="50">
                                <button class="btn btn-primary btn-lg" type="submit" data-original-title="btn btn-primary btn-lg" title="">Subscribe</button>
                              </form>
                            <?php endif;?>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
          
          <!-- Container-fluid Ends-->
<?php include '../template/footer.php'; ?>