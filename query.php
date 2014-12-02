<?php include("fb_data.php");?>
<?php 
 if(count($_POST)>0)
 {
  $flag=0;
 @$a=submitted;
 //print_r(count($_POST['house_name']));
//require("PHPMailer/class.phpmailer.php");
 $to = "arun.kmr1602@gmail.com";
 //$to = "shallu.47@gmail.com";
 $subject ="Enquiry Form";
 $msg ="<b><font  size='+2' color='red'>Enquiry Form</font></b><br><br>";
 $msg .="<b><font color='blue'>Name:</font></b>"." ".$_POST['name']."<br><br>";
 $msg .="<b><font color='blue'>Contact No.:</font></b>"." ".$_POST['phone']."<br><br>";
 $msg .="<b><font color='blue'>Email:</font></b>"." ".$_POST['email']."<br><br>";
 $msg .="<b><font color='blue'>Status:</font></b>".$a."<br><br>";
//echo $msg;
//die; 
 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'From:'.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
   if($flag==0)
   { 
   echo $msg;
   if(mail($to,$subject,$msg,$headers)){    
   }
 }
   
 }
            ?>
            <script language="JavaScript">  

function fncAutoSubmitForm()
{
    //alert('test alert');
    alert("B : "+document.getElementById('myform').id);     
    document.getElementById('myform').submit();     
    alert("A : "+document.getElementById('myform').id);
    setTimeout("fncAutoSubmitForm();",5000);}
</script>

<form action="#" method="post" id="myform" name="myform" onload='setGenLeadId();'>
          
          <table width="549" height="331" border="0" align="left" cellpadding="0" cellspacing="3">
        <tr>
          <td width="115" height="24" align="left"><strong>Name* :</strong></td>
          <td width="425" height="24" align="left">
            <input name="name" type="text" class="FormField4" id="Name2" tabindex="2" value="<?php echo $_SESSION['FULLNAME']; ?>" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="25" align="left"  class="normal_text1"><strong>E-mail* :</strong></td>
          <td width="425" height="25" align="left">
            <input name="email" type="text" class="FormField4" id="Name3" tabindex="2" value="<?php echo $_SESSION['EMAIL']; ?>" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="24" align="left"><strong>Phone Number :</strong></td>
          <td width="425" height="24" align="left">
            <input name="phone" type="text" class="FormField4" id="Phone" tabindex="2" value="" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="32">&nbsp;</td>
          <td width="425" height="32">
          
          <input type="submit" value="Submit" onClick="return validate3();"  /></td>

        </tr>
        <tr><td colspan="2" style="height:5px; overflow:hidden;">&nbsp;</td></tr>
      </table>
     </form>