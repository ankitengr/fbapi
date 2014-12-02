
<?php
session_start();
require("PHPMailer/class.phpmailer.php");

require 'facebook-php-sdk-master/src/facebook.php';


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
	$_SESSION['SEND'] = 'send'; 
	//$_SESSION['PHONE'] =  $fphone;
    //       checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}


if ($user) {
	
	if($_SESSION['SEND'] == 'send'){
			  $user_name = isset($_POST['name']) ? $_POST['name'] : 'Admin';
			  $user_email = isset($_POST['email']) ? $_POST['email'] : 'admin@surrealmedialabs.com';
			  $to = "arun.kmr1602@gmail.com";
			  $subject ="Enquiry Form";
			  $msg ="<b><font  size='+2' color='red'>Enquiry Form</font></b><br><br>";
			  $msg .="<b><font color='blue'>Name:</font></b>"." ".@$_SESSION['FULLNAME']."<br><br>";
			 // $msg .="<b><font color='blue'>Contact No.:</font></b>"." ".$_POST['phone']."<br><br>";
			  $msg .="<b><font color='blue'>Email:</font></b>"." ".@$_SESSION['EMAIL']."<br><br>";
			  $headers  = 'MIME-Version: 1.0' . "\r\n";
			  $headers .= 'From:'.$user_name.'<'.$user_email.'>' . "\r\n";
			  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			  mail($to,$subject,$msg,$headers);
		}
	//echo '<pre>';print_r($user_profile);echo '</pre>';
	$facebook->destroySession();
	//print_r($_SESSION);die;
	//header("Location: fb_data.php");
} else {
	$loginUrl = $facebook->getLoginUrl(array(
		'scope' => 'email', // Permissions to request from the user
	));
	//header("Location: ".$loginUrl);
}
?>