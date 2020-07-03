<?php
	include_once dirname(__FILE__) . '/config/db.php';
	session_start();
	if( !$_SESSION[ 'user_id' ] ) {
	    header( 'Location: login.php' );
	}
	if( isset( $_POST ) && isset( $_POST[ 'checkout_submit' ] ) ) {
		$o_user_id = $_POST[ 'o_user_id' ];
		$o_pass_type_id = $_POST[ 'o_pass_type_id' ];
		$o_pass_type = $_POST[ 'o_pass_type' ];
		$o_govt_proof = $_POST[ 'o_govt_proof' ];
		$o_govt_proof_val = $_POST[ 'o_govt_proof_val' ];
		$o_amount = $_POST[ 'o_amount' ];
		$o_from_city_id = $_POST[ 'o_from_city_id' ];
		$o_from_city_name = $_POST[ 'o_from_city_name' ];
		$o_to_city_id = $_POST[ 'o_to_city_id' ];
		$o_to_city_name = $_POST[ 'o_to_city_name' ];
		$o_route_id = $_POST[ 'o_route_id' ];
		$o_created_on = date( 'Y-m-d' );
		if( $o_pass_type_id == 1 ) {
			$o_expiry_on = date( 'Y-m-d' );
		} else {
			$o_expiry_on = date( 'Y-m-d', strtotime('+1 month') );
		}
		$orderID = 'BP-'.date('dmyhis');
		$insert = "INSERT INTO orders
				   SET order_id = '$orderID', o_user_id = '$o_user_id', o_pass_type_id = '$o_pass_type_id', o_pass_type = '$o_pass_type', o_govt_proof = '$o_govt_proof', o_govt_proof_val = '$o_govt_proof_val', o_amount = '$o_amount', o_created_on = '$o_created_on', o_expiry_on = '$o_expiry_on', o_from_city_id = '$o_from_city_id', o_from_city_name = '$o_from_city_name', o_to_city_id = '$o_to_city_id', o_to_city_name = '$o_to_city_name', o_route_id = '$o_route_id'";
		mysqli_query( $GLOBALS["___mysqli_ston"], $insert ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
		header( 'Location: confirmation.php' );
	}
	$sel = "SELECT *, month_pass_details.id as mpassID, month_pass_details.type as passtypeID FROM month_pass_details
			LEFT JOIN pass_type
			ON pass_type.id = month_pass_details.type
			WHERE month_pass_details.id=" . $_GET[ 'prodId' ];
	$res2 = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
	$numrows2 = mysqli_num_rows( $res2 );
	$result = mysqli_fetch_array( $res2 );
	include_once dirname(__FILE__) . "/header.php";
	$userInfo = getuserInfo( $_SESSION[ 'user_id' ] );
	if( $result[ 'passtypeID' ] != 1 || $result[ 'passtypeID' ] != 2 ) {
		$fromCityName = getcityname( $result[ 'from_city_id' ] );
		$toCityName = getcityname( $result[ 'to_city_id' ] );
	}
?>
<div id="wrapper">
<div id="page-inner" class="container bookpass-page">
    <div id="">
      <h2 style="margin-bottom: 10px;">Checkout</h2>
      <div class="row">
      	<div class="col-md-12">
			<div class="jumbotron">
			  <h1 class="display-4">Pass Info - Confirmation</h1>
			  <p class="lead">Please confirm the from and destination before proceeding the book options.</p>
			  <hr class="my-4">
			  <?php if( $result[ 'passtypeID' ] != 1 && $result[ 'passtypeID' ] != 2 ) { ?>
			  <p>From : <?php echo $fromCityName; ?> - Destination : <?php echo $toCityName; ?></p>
			  <?php } ?>
			  <p>Pass Type - <?php echo $result[ 'type' ]; ?> Pass
			  <p>Amount to be paid - <?php echo $result[ 'amount' ]; ?>
			  <p>
			  	<form action="checkout.php" method="post">
			  		<input type="hidden" name="o_user_id" id="o_user_id" value="<?php echo $_SESSION[ 'user_id' ]; ?>" />
			  		<input type="hidden" name="o_pass_type_id" id="o_pass_type_id" value="<?php echo $result[ 'passtypeID' ]; ?>">
			  		<input type="hidden" name="o_pass_type" id="o_pass_type" value="<?php echo $result[ 'type' ]; ?>" />
			  		<input type="hidden" name="o_govt_proof" id="o_govt_proof" value="<?php echo $userInfo[ 'govt_proof_type' ]; ?>" />
			  		<input type="hidden" name="o_govt_proof_val" id="o_govt_proof_val" value="<?php echo $userInfo[ 'govt_proof_val' ]; ?>" />
			  		<input type="hidden" name="o_amount" id="o_amount" value="<?php echo $result[ 'amount' ]; ?>" />
			  		<input type="hidden" name="o_from_city_id" id="o_from_city_id" value="<?php echo $result[ 'from_city_id' ]; ?>" />
			  		<input type="hidden" name="o_from_city_name" id="o_from_city_name" value="<?php echo $fromCityName; ?>" />
			  		<input type="hidden" name="o_to_city_id" id="o_to_city_id" value="<?php echo $result[ 'to_city_id' ]; ?>" />
			  		<input type="hidden" name="o_to_city_name" id="o_to_city_name" value="<?php echo $toCityName; ?>" />
			  		<input type="hidden" name="o_route_id" id="o_route_id" value="<?php echo $result[ 'mpassID' ]; ?>" />
			  		<input type="submit" class="btn btn-primary" name="checkout_submit" id="checkout_submit" value="Confirm &amp; Pay" />
			  		<a class="btn btn-danger" href="bookpass.php" role="button">Cancel</a>
			  	</form>
			  </p>
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
