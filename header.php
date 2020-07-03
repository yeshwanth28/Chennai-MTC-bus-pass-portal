<?php
    function getcityname( $cityId = '' ) {
      $sel = "SELECT city_name FROM cities WHERE id = " . $cityId;
      $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $result = mysqli_fetch_array( $res );
      return $result[ 'city_name' ];
    }

    function getuserInfo( $userId = '' ) {
      $sel = "SELECT * FROM users WHERE id = " . $userId;
      $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $result = mysqli_fetch_array( $res );
      return $result;
    }

    function getOrderInfo( $where ) {
      $sel = "SELECT * FROM orders
              " . $where . "
              ";
      $res = mysqli_query( $GLOBALS["___mysqli_ston"], $sel ) or die( mysqli_error( $GLOBALS["___mysqli_ston"] ) );
      $numrows = mysqli_num_rows( $res );
      if( $numrows > 0 ) {
        $result = mysqli_fetch_array( $res );
      } else {
        $result = array();
      }
      return $result;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BUS PASS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<style type="text/css">
  .submenuHolder ul.submenu {
    position: absolute;
    width: 160px;
    background: #313131;
    left: 0px;
  }
  .submenuHolder ul.submenu li {
    float: none !important;
    text-align: left !important;
    border-top: 1px solid #000;
  }
  .submenuHolder ul.submenu li:first-child {
    border-top: 0px solid #000;
  }
  .submenuHolder ul.submenu li a {
    background: none !important;
    display: block !important;
    padding: 10px !important;
  }
  .submenuHolder ul.submenu li a:hover {
    background: #000 !important;
    border-radius: 0px !important;
  }
  .submenuHolder {
    position: relative;
  }
  .submenuHolder > a:after {
    content: "";
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    margin-left: 10px;
  }
</style>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $( document ).ready( function() {
    $( '.submenuHolder' ).click( function() {
      $( '.submenu' ).toggle();
    });
    $( document ).click( function(e) {
      if( !$(e.target).parent('li').hasClass('submenuHolder') ) {
       $( '.submenu' ).hide();
      }
    });
  });

</script>
</head>
<body>
<div id="header-wrapper">
  <div id="header" class="container">
    <div id="logo">
      <h1><a href="index.php">Bus Pass</a></h1>
    </div>
    <div id="menu">
      <ul>
        <li class=""><a href="index.php" accesskey="1" title="">Homepage</a></li>
        <li><a href="#ourservices" accesskey="2" title="">Our Services</a></li>
        <li><a href="#contactus" accesskey="3" title="">Contact Us</a></li>
        <li><a href="#" accesskey="5" title="">Feedback</a></li>
        <?php
        if( isset( $_SESSION[ 'user_id' ] ) ) {
        ?>
        <li class="submenuHolder"><a href="javascript:;" accesskey="5" title=""><?php echo $_SESSION[ 'first_name' ]; ?></a>
          <ul class="submenu" style="display: none;">
            <li><a href="myaccount.php">My Account</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php
        } else {
        ?>
        <li class="current_page_item"><a href="login.php" accesskey="5" title="">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
