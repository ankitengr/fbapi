<?php
session_start(); ?>
<form name="form1" action="#" method="post">
          
          <table width="549" height="331" border="0" align="left" cellpadding="0" cellspacing="3">
           <tr>
          <td width="115" height="24" align="left"><strong>ID* :</strong></td>
          <td width="425" height="24" align="left">
            <input name="id" type="text" class="FormField4" id="id" tabindex="2" value="<?php echo $_SESSION['FBID']; ?>" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="24" align="left"><strong>Name* :</strong></td>
          <td width="425" height="24" align="left">
            <input name="username" type="text" class="FormField4" id="Name2" tabindex="2" value="<?php echo $_SESSION['USERNAME']; ?>" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="24" align="left"><strong>Full Name* :</strong></td>
          <td width="425" height="24" align="left">
            <input name="name" type="text" class="FormField4" id="Name2" tabindex="2" value="<?php echo $_SESSION['FULLNAME']; ?>" size="25" />          </td>
        </tr>
        <tr>
          <td width="115" height="25" align="left"  class="normal_text1"><strong>E-mail* :</strong></td>
          <td width="425" height="25" align="left">
            <input name="email" type="text" class="FormField4" id="Name3" tabindex="2" value="<?php echo $_SESSION['EMAIL']; ?>" size="25" />          </td>
        </tr>
        
        <tr>
          <td width="115" height="32">&nbsp;</td>
          <td width="425" height="32"><input type="submit" value="Submit" onClick="return validate3();"  /></td>

        </tr>
        <tr><td colspan="2" style="height:5px; overflow:hidden;">&nbsp;</td></tr>
      </table>
     </form>