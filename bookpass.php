<?php
	include_once dirname(__FILE__) . '/config/db.php';
	session_start();
	if( !$_SESSION[ 'user_id' ] ) {
	    header( 'Location: login.php' );
	}

	$onedaySel = "SELECT *, month_pass_details.id as mpassID FROM month_pass_details
				 LEFT JOIN pass_type
				 ON pass_type.id = month_pass_details.type
				 WHERE month_pass_details.type=1";
	$res = mysqli_query( $GLOBALS["___mysqli_ston"], $onedaySel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
	$numrows = mysqli_num_rows( $res );

	$monthdaySel = "SELECT *, month_pass_details.id as mpassID FROM month_pass_details
					LEFT JOIN pass_type
				 	ON pass_type.id = month_pass_details.type
				 	WHERE month_pass_details.type=2";
	$res1 = mysqli_query( $GLOBALS["___mysqli_ston"], $monthdaySel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
	$numrows1 = mysqli_num_rows( $res1 );

	$sel = "SELECT *, month_pass_details.id as mpassID FROM month_pass_details
			LEFT JOIN pass_type
			ON pass_type.id = month_pass_details.type
			WHERE month_pass_details.type=3";
	$res2 = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
	$numrows2 = mysqli_num_rows( $res2 );
?>
<?php include_once dirname(__FILE__) . "/header.php"; ?>
<style>
	.card {
	    position: relative;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid rgba(0,0,0,.125);
	    border-radius: .25rem;
	}
	.card-body {
	    -ms-flex: 1 1 auto;
	    flex: 1 1 auto;
	    padding: 1.25rem;
	}
	.card-title {
	    margin-bottom: .75rem;
	}
	.mb-5, .my-5 {
	    margin-bottom: 3rem!important;
	}
	.p-3 {
	    padding: 1rem!important;
	}
	.shadow {
	    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
	}
	.rounded {
	    border-radius: .25rem!important;
	}
	.bg-white {
	    background-color: #fff!important;
	}
</style>
<div id="wrapper">
<div id="page-inner" class="container bookpass-page">
    <div id="">
      <h2 style="margin-bottom: 10px;">Book Pass</h2>
      <div class="row">
      		<div class="col-sm-12">
      			<h4>Featured Pass</h4>
      		</div>
            <div class="col-sm-3">
				<?php
				if( $numrows > 0 ) {
					$result = mysqli_fetch_array( $res );
				?>
				<div class="card shadow p-3 mb-5 bg-white rounded">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $result[ 'type' ]; ?> Pass</h5>
				    <p class="card-text">Pass type: One day Pass</p>
				    <p class="card-text">Amount: <?php echo $result[ 'amount' ]; ?></p>
				    <a href="checkout.php?prodId=<?php echo $result[ 'mpassID' ]; ?>" class="btn btn-primary">Buy</a>
				  </div>
				</div>
				<?php
				}
				?>
			</div>
			<div class="col-sm-3">
				<?php
				if( $numrows1 > 0 ) {
					$result1 = mysqli_fetch_array( $res1 );
				?>
				<div class="card shadow p-3 mb-5 bg-white rounded">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $result1[ 'type' ]; ?> Pass</h5>
				    <p class="card-text">Pass type: Season</p>
				    <p class="card-text">Amount: <?php echo $result1[ 'amount' ]; ?></p>
				    <a href="checkout.php?prodId=<?php echo $result1[ 'mpassID' ]; ?>" class="btn btn-primary">Buy</a>
				  </div>
				</div>
				<?php
				}
				?>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-12"><hr/></div>
			<div class="col-sm-12">
				<h4>General Pass</h4>
			</div>
			<?php
			if( $numrows2 > 0 ) {
				while( $result2 = mysqli_fetch_array( $res2 ) ) {
			?>
					<div class="col-sm-3">
						<div class="card shadow p-3 mb-5 bg-white rounded">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $result2[ 'type' ]; ?> Pass</h5>
						    <p class="card-text">Pass type: Normal</p>
						    <p class="card-text">From: <?php echo getcityname( $result2[ 'from_city_id' ] ); ?></p>
						    <p class="card-text">Destination: <?php echo getcityname( $result2[ 'to_city_id' ] ); ?></p>
						    <p class="card-text">Amount: <?php echo $result2[ 'amount' ]; ?></p>
						    <a href="checkout.php?prodId=<?php echo $result2[ 'mpassID' ]; ?>" class="btn btn-primary">Buy</a>
						  </div>
						</div>
					</div>
			<?php
				}
			}
			?>
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
