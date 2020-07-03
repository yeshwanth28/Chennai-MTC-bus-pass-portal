<?php
	include_once dirname(__FILE__) . '/config/db.php';
	session_start();
	$_SESSION[ 'first_name' ] = '';
 	$_SESSION[ 'last_name' ] = '';
  	$_SESSION[ 'email' ] = '';
  	$_SESSION[ 'user_id' ] = '';

  	unset( $_SESSION[ 'first_name' ] );
	unset( $_SESSION[ 'last_name' ] );
	unset( $_SESSION[ 'email' ] );
	unset( $_SESSION[ 'user_id' ] );
	session_destroy();
	header( 'Location: login.php' );
?>