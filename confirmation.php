<?php
	include_once dirname(__FILE__) . '/config/db.php';
	session_start();
	if( !$_SESSION[ 'user_id' ] ) {
	    header( 'Location: login.php' );
	}
	include_once dirname(__FILE__) . "/header.php";
?>
<div id="wrapper">
<div id="page-inner" class="container bookpass-page">
    <div id="">
      <h2 style="margin-bottom: 10px;">Confirmation</h2>
      <div class="row">
      	<div class="col-md-12">
			<div class="jumbotron">
				<h4>Thank you your purchase. Please download the pass from "current active pass" section in my account page.</h4>
				<div class="text-center">
					<a href="myaccount.php" class="btn btn-primary">Go to My account</a>
				</div>
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
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
