<?php
  include_once dirname(__FILE__) . '/config/db.php';
  session_start();
  if( isset( $_POST ) && isset( $_POST[ 'register_submit' ] ) ) {
    $firstName = $_POST[ 'first_name' ];
    $lastName = $_POST[ 'last_name' ];
    $email = $_POST[ 'email' ];
    $password = md5( $_POST[ 'confirm_password' ] );
    $mobile = $_POST[ 'mobile' ];
    $govt_proof = $_POST[ 'govt_proof' ];
    $govt_proof_nu = $_POST[ 'govt_proof_nu' ];
    $createdOn = date( 'Y-m-d h:i:s' );
    $sel = "SELECT id FROM users WHERE email = '$email'";
    $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
    $numRows = mysqli_num_rows( $res );
    if( $numRows > 0 ) {
      $messageStatus = 'Error';
      $message = 'User email already exists. Please login to continue';
    } else {
      $insert = "INSERT INTO users SET first_name = '$firstName', last_name = '$lastName', email = '$email', password = '$password', mobile = '$mobile', govt_proof_type = '$govt_proof', govt_proof_val = '$govt_proof_nu', created_on = '$createdOn'";
      mysqli_query( $GLOBALS["___mysqli_ston"], $insert ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $message = "Registered successfully. Please login to proceed";
      $messageStatus = 'Success';
    }
  }
?>
<?php include_once dirname(__FILE__) . "/header.php"; ?>
<div id="wrapper">
<div id="page-inner" class="container">
    <div id="" class="col-sm-8">
      <h2 style="margin-bottom: 10px;">Register</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="well">
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
          <form action="register.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" />
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
                  <input type="text" name="govt_proof_nu" id="govt_proof_nu" class="form-control" placeholder="Govt. Proof Number" />
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <input type="submit" class="btn btn-success" name="register_submit" id="register_submit" value="Register" />
                <span style="padding: 0px 5px; color: #999797; font-weight: bold;">or</span>
                <a href="login.php" class="btn btn-info">Existing User</a>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="copyright" class="container">
  <p>&copy; Untitled. All rights reserved.</p>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
