<?php
  include_once dirname(__FILE__) . '/config/db.php';
  session_start();
  if( isset( $_POST ) && isset( $_POST[ 'login_submit' ] ) ) {
    $email = $_POST[ 'email' ];
    $password = md5( $_POST[ 'password' ] );
    $sel = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
    $numRows = mysqli_num_rows( $res );
    if( $numRows > 0 ) {
      $result = mysqli_fetch_array( $res );
      $_SESSION[ 'first_name' ] = $result[ 'first_name' ];
      $_SESSION[ 'last_name' ] = $result[ 'last_name' ];
      $_SESSION[ 'email' ] = $result[ 'email' ];
      $_SESSION[ 'user_id' ] = $result[ 'id' ];
      header( 'Location: myaccount.php' );
    } else {
      $message = "Please check your email or password";
      $messageStatus = 'Error';
    }
  }
?>
<?php include_once dirname(__FILE__) . "/header.php"; ?>
<div id="wrapper">
<div id="page-inner" class="container">
    <div id="" class="col-sm-8">
      <h2 style="margin-bottom: 10px;">Login</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="well">
          <form action="login.php" method="post">
            <div class="row">
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
              <div class="col-md-12">
                <input type="submit" class="btn btn-success" name="login_submit" id="login_submit" value="Login" />
                <span style="padding: 0px 5px; color: #999797; font-weight: bold;">or</span>
                <a href="register.php" class="btn btn-info">Register</a>
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
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
