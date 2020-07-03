<?php
  include_once dirname(__FILE__) . '/config/db.php';
  session_start();
  if( !$_SESSION[ 'user_id' ] ) {
    header( 'Location: login.php' );
  }
  include_once dirname(__FILE__) . "/header.php";
  // Active pass check
  $acsel = "SELECT * FROM orders
          WHERE o_user_id = " . $_SESSION[ 'user_id' ] . " AND is_active = 1
          ";
  $acres = mysqli_query( $GLOBALS["___mysqli_ston"], $acsel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
  $acnumrows = mysqli_num_rows( $acres );
  if( $acnumrows > 0 ) {
    while( $acresult = mysqli_fetch_array( $acres ) ) {
      $todayDate = date( 'Y-m-d' );
      $expiryDate = $acresult[ 'o_expiry_on' ];
      $orderID = $acresult[ 'id' ];
      if( strtotime( $todayDate ) > strtotime( $expiryDate ) ) {
        $update = "UPDATE orders SET is_active = 2
                  WHERE id = " . $orderID;
        mysqli_query( $GLOBALS["___mysqli_ston"], $update ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      }
    }
  }


  if( isset( $_POST ) && isset( $_POST[ 'register_submit' ] ) ) {
    $firstName = $_POST[ 'first_name' ];
    $lastName = $_POST[ 'last_name' ];
    $email = $_POST[ 'email' ];
    $mobile = $_POST[ 'mobile' ];
    $govt_proof = $_POST[ 'govt_proof' ];
    $govt_proof_nu = $_POST[ 'govt_proof_nu' ];
    $update = "UPDATE users
              SET first_name = '$firstName', last_name = '$lastName', email = '$email', mobile = '$mobile', govt_proof_type = '$govt_proof', govt_proof_val = '$govt_proof_nu' 
              WHERE id = " . $_SESSION[ 'user_id' ];
      mysqli_query( $GLOBALS["___mysqli_ston"], $update ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $message = "Profile info updated successfully.";
      $messageStatus = 'Success';
  }

  if( isset( $_POST ) && isset( $_POST[ 'pass_upd_submit' ] ) ) {
    $old_password = md5( $_POST[ 'old_password' ] );
    $confirm_password = md5( $_POST[ 'confirm_password' ] );
    $sel = "SELECT password FROM users WHERE id = " . $_SESSION[ 'user_id' ];
    $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
    $numRows = mysqli_num_rows( $res );
    $result = mysqli_fetch_array( $res );
    if( $result[ 'password' ] != $old_password ) {
      $message = "Old password not matched.";
      $messageStatus = 'Error';
    } else {
      $update = "UPDATE users
                SET password = '$confirm_password'
                WHERE id = " . $_SESSION[ 'user_id' ];
      mysqli_query( $GLOBALS["___mysqli_ston"], $update ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $message = "Password updated successfully.";
      $messageStatus = 'Success';
    }
  }

  if( isset( $_POST ) && isset( $_POST[ 'created_data' ] ) ) {
    // baseFromJavascript will be the javascript base64 string retrieved of some way (async or post submited)
    $baseFromJavascript = $_POST[ 'created_data' ];
    // We need to remove the "data:image/png;base64,"
    $base_to_php = explode(',', $baseFromJavascript);
    // the 2nd item in the base_to_php array contains the content of the image
    $data = base64_decode($base_to_php[1]);
    // here you can detect if type is png or jpg if you want
    // Save the image in a defined path
    $file = 'pass.png';
    if( file_put_contents($file, $data) ) {
      if (file_exists($file))
      {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.basename($file));
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      ob_clean();
      flush();
      readfile($file);
      exit;
      }
    } 
  }

  $sel = "SELECT *
          FROM users
          WHERE id = " . $_SESSION[ 'user_id' ];
  $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
  $result = mysqli_fetch_array( $res );

  $sel2 = "SELECT * FROM orders
          WHERE o_user_id = " . $_SESSION[ 'user_id' ] . " AND is_active = 1
          ";
  $res2 = mysqli_query( $GLOBALS["___mysqli_ston"], $sel2 ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
  $numrows2 = mysqli_num_rows( $res2 );

  $sel1 = "SELECT * FROM orders
          WHERE o_user_id = " . $_SESSION[ 'user_id' ] . " AND is_active = 2
          ";
  $res1 = mysqli_query( $GLOBALS["___mysqli_ston"], $sel1 ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
  $numrows1 = mysqli_num_rows( $res1 );
?>
<div id="wrapper">
<div id="page-inner" class="container">
      <h2 style="margin-bottom: 10px;">My Account</h2>
      <?php
        if( isset( $messageStatus ) ) {
          if( $messageStatus == 'Error' ) {
            $messageClass = "Error!";
            $divClass = "alert-warning";
          } else {
            $divClass = "alert-success";
            $messageClass = "Success";
          }
        ?>
        <div class="alert <?php echo $divClass; ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="fa fa-warning"></i> <?php echo $messageClass; ?></h4>
          <?php echo $message; ?>
        </div>
        <?php
        }
        ?>
      <div class="row">
          <div class="col-sm-3">
            <div class="list-group" id="myList" role="tablist">
              <a class="list-group-item list-group-item-action active" data-toggle="tab" href="#profile-info" role="tab">Profile</a>
              <a class="list-group-item list-group-item-action" data-toggle="tab" href="#change-pass" role="tab">Change Password</a>
              <a class="list-group-item list-group-item-action" data-toggle="tab" href="#curr-act-pass" role="tab">Current Active Pass</a>
              <a class="list-group-item list-group-item-action" data-toggle="tab" href="#pass-history" role="tab">Pass History</a>
            </div>
          </div>
          <div class="col-sm-9"> 
            <div class="tab-content">
              <div class="tab-pane active" id="profile-info">
                <form action="myaccount.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $result[ 'first_name' ]; ?>" placeholder="First Name" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" name="last_name" id="last_name"  value="<?php echo $result[ 'last_name' ]; ?>" placeholder="Last Name" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control"  value="<?php echo $result[ 'email' ]; ?>" placeholder="Email" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control"  value="<?php echo $result[ 'mobile' ]; ?>" placeholder="Mobile" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mobile">Govt. Proof</label>
                        <select name="govt_proof" class="form-control">
                          <option value="PAN">PAN</option>
                          <option value="AADHAR">AADHAR</option>
                          <option value="Voter Id">Voter Id</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="govt_proof_nu">Govt. Proof Number</label>
                        <input type="text" name="govt_proof_nu" id="govt_proof_nu"  value="<?php echo $result[ 'govt_proof_val' ]; ?>" class="form-control" placeholder="Govt. Proof Number" />
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success" name="register_submit" id="register_submit" value="Update" />
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="change-pass">
                <form action="myaccount.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input class="form-control" type="password" name="new_password" id="new_password" placeholder="New Password" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success" name="pass_upd_submit" id="pass_upd_submit" value="Update" />
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="curr-act-pass">
                <div class="col-sm-9">
                  <?php 
                  if( $numrows2 > 0 ) {
                  while( $orderInfo = mysqli_fetch_array( $res2 ) ) { ?>
                  <div id="download_card_<?php echo $orderInfo[ 'id' ]; ?>" class="weater pass_card">
                    <div class="city-selected">
                      <article>
                        <div class="info">
                          <div class="night">ID: #<?php echo $orderInfo[ 'order_id' ]; ?></div>
                          <div class="city">Passenger: <?php echo $_SESSION[ 'first_name' ] . $_SESSION[ 'last_name' ]; ?></div>
                          <div class="night">Pass Type - <?php echo $orderInfo[ 'o_pass_type' ]; ?></div>
                          <div class="night"><?php echo $orderInfo[ 'o_govt_proof' ]; ?> - <?php echo $orderInfo[ 'o_govt_proof_val' ]; ?></div>
                          <div class="temp">Rs.<?php echo $orderInfo[ 'o_amount' ]; ?></div>
                          <div class="wind">
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="days">
                      <div class="row row-no-gutter">
                        <div class="col-md-4">
                          <div class="day">
                            <h1>Validity<br/><b><?php echo date( 'd-m-Y', strtotime( $orderInfo[ 'o_created_on' ] ) ); ?> to <?php echo date( 'd-m-Y', strtotime( $orderInfo[ 'o_expiry_on' ] ) ); ?></b></h1>
                            
                          </div>
                        </div>
                        <?php if( $orderInfo[ 'o_pass_type_id' ] != 1 && $orderInfo[ 'o_pass_type_id' ] != 2 ) { ?>
                        <div class="col-md-4">
                          <div class="day">
                            <h1>From<br/><b><?php echo $orderInfo[ 'o_from_city_name' ]; ?></b></h1>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="day">
                            <h1>Destination<br/><b><?php echo $orderInfo[ 'o_to_city_name' ]; ?></b></h1>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div style="margin-top: 10px; margin-bottom: 10px;">
                    <a href="javascript:;" onclick="renderData(<?php echo $orderInfo[ 'id' ]; ?>);" class="btn btn-success">Download</a>
                  </div>
                  <?php } } else { ?>
                  <div class="alert alert-warning">No active Pass.</div>
                  <a href="bookpass.php" class="btn btn-success">Book Pass</a>
                  <?php } ?>
                  <form action="myaccount.php" method="post" id="download_form">
                    <input type="hidden" name="created_data" id="created_data" value="" />
                  </form>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="pass-history">
                <?php
                if( $numrows1 > 0 ) {
                  while( $orderHistory = mysqli_fetch_array( $res1 ) ) {
                ?>
                <div class="col-sm-6">
                <div class="weater pass_card">
                    <div class="city-selected">
                      <article>
                        <div class="info">
                          <div class="night">ID: #<?php echo $orderHistory[ 'order_id' ]; ?></div>
                          <div class="city">Passenger: <?php echo $_SESSION[ 'first_name' ] . $_SESSION[ 'last_name' ]; ?></div>
                          <div class="night">Pass Type - <?php echo $orderHistory[ 'o_pass_type' ]; ?></div>
                          <div class="night"><?php echo $orderHistory[ 'o_govt_proof' ]; ?> - <?php echo $orderHistory[ 'o_govt_proof_val' ]; ?></div>
                          <div class="temp">Rs.<?php echo $orderHistory[ 'o_amount' ]; ?></div>
                          <div class="wind">
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="days">
                      <div class="row row-no-gutter">
                        <div class="col-md-4">
                          <div class="day">
                            <h1>Validity<br/><b><?php echo date( 'd-m-Y', strtotime( $orderHistory[ 'o_created_on' ] ) ); ?> to <?php echo date( 'd-m-Y', strtotime( $orderHistory[ 'o_expiry_on' ] ) ); ?></b></h1>
                            
                          </div>
                        </div>
                        <?php if( $orderHistory[ 'o_pass_type_id' ] != 1 && $orderHistory[ 'o_pass_type_id' ] != 2 ) { ?>
                        <div class="col-md-4">
                          <div class="day">
                            <h1>From<br/><b><?php echo $orderHistory[ 'o_from_city_name' ]; ?></b></h1>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="day">
                            <h1>Destination<br/><b><?php echo $orderHistory[ 'o_to_city_name' ]; ?></b></h1>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  }
                } else {
                ?>
                <div class="alert alert-warning">No records found.</div>
                <a href="bookpass.php" class="btn btn-success">Book Pass</a>
                <?php
                }
                ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
      </div>
    </div>
  </div>
</div>
<div id="copyright" class="container">
  <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="plugins/html2canvas/html2canvas.min.js"></script>
<script type="text/javascript">
  var cvdata = '';
  $( document ).ready( function() {
    $( '#myList a' ).on( 'click', function(e) {
      $( '.list-group-item' ).removeClass( 'active' );
      $( e.currentTarget ).addClass( 'active' );
      /*if( $(e.target).attr('href') == '#curr-act-pass' ) {
        renderData();
      }*/
    });
  });
  function renderData(orderid) {
    html2canvas([document.getElementById('download_card_'+orderid)], {
        onrendered: function(canvas) {
          debugger;
          document.body.appendChild(canvas);
          $('canvas').hide();
          cvdata = canvas.toDataURL('image/png');
          $( '#created_data' ).val( cvdata );
          $( '#download_form' ).submit();
        }
    });
  }
</script>
</body>
</html>