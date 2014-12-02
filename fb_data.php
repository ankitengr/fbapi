<?php
require 'facebook-php-sdk-master/src/facebook.php';
session_start();

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '125598177640725',
  'secret' => 'b6c914efa5d41fe3a180a2dae3047bc1',
));

$user = $facebook->getUser();
    
	
 
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
       $fbid = $user_profile['id'];                 // To Get Facebook ID
    $fbuname = $user_profile['username'];  // To Get Facebook Username
    $fbfullname = $user_profile['name']; // To Get Facebook full name
    $femail = $user_profile['email'];    // To Get Facebook email ID
	// $fphone = $user_profile['phone'];    // To Get Facebook email ID
/* ---- Session Variables -----*/
    $_SESSION['FBID'] = $fbid;          
    $_SESSION['USERNAME'] = $fbuname;
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL'] =  $femail;
	//$_SESSION['PHONE'] =  $fphone;
    //       checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}


if ($user) {
	echo '<pre>';print_r($user_profile);echo '</pre>';die;
	$facebook->destroySession();
	//header("Location: fb_data.php");
} else {
	$loginUrl = $facebook->getLoginUrl(array(
		'scope' => 'email', // Permissions to request from the user
	));
	header("Location: ".$loginUrl);
}
?>