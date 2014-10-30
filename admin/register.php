<?php
/*
This script was downloaded at:
LightPHPScripts.com
Please support us by visiting
out website and letting people
know of it.
Produced under: LGPL
*/

/* Start session */
if($startSession == TRUE){ session_start();}

/* Config file */
include('config.php');

/* Check for submition */
if($_POST['submitID'] == 2){
		
	/* Connect to database & query */
	if($connectDatabase == TRUE){$action=TRUE;include('connect.php');}

	/* sanitize and check info */
	$userName = mysql_real_escape_string($_POST['userName'],$dbc);
	$password = mysql_real_escape_string($_POST['password'],$dbc);
	
	if($userName == NULL) { $message = 'Please enter username.';}
	if($message == NULL && $password == NULL){ $message = 'Please enter password.';}
	if($message == NULL && $password != $_POST['password2']){ $message = 'Passwords do not match.';}
	
	if($message == NULL)
	{		
		$userQuery = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM `$tableName`
		 WHERE `$userNameField`='$userName'"));
		if($userQuery[0] > 0){
			$message = 'This username already exists. Please select another.';			
		} else {
			/* Add user */
			$addUser = mysql_query("INSERT INTO `$tableName` (`$userNameField`,`$userPasswordField`) 
				VALUES ('$userName','$password')");
			if($addUser)
			{
				/* Disconnect from database */
				if($connectDatabase == TRUE){$action=FALSE;include('connect.php');}
				
				/* Log use in */
				$_SESSION['isLoged'] = 'yes';
				$_SESSION['userName'] = $userName;
				
	
				/* Redirect to login page */
				header("Location: $loginPage");
				exit();
			} else {
				$message = 'Internal error. Please contact administrator.';
			}
		} 		
	}
	/* Disconnect from database */
	if($connectDatabase == TRUE){$action=FALSE;include('connect.php');}
}
?>
<!--
/*
This script was downloaded at:
LightPHPScripts.com
Please support us by visiting
out website and letting people
know of it.
Produced under: LGPL
*/
-->
<?php

/* Display error messages */
if($message != NULL){?>
<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFCCCC">
  <tr>
    <td><div align="center"><strong><font color="#FF0000"><?=$message;?></font></strong></div></td>
  </tr>
</table>
<?php } ?>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" name="register" id="register" style="display:inline;">
  <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#99CC33">
    <tr bgcolor="#99CC99"> 
      <td colspan="2"><div align="center"><strong>Please enter registration information: </strong></div></td>
    </tr>
    <tr> 
      <td width="47%"><strong>Username:</strong></td>
      <td width="53%"><input name="userName" type="text" id="userName"></td>
    </tr>
    <tr> 
      <td><strong>Password:</strong></td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
    <tr>
      <td><strong>Re-enter password: </strong></td>
      <td><input name="password2" type="password" id="password2" /></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"><font face="Georgia, Times New Roman, Times, serif"><strong>
          <input name="Submit" type="submit" id="Submit" value="Register">
          <input name="submitID" type="hidden" id="submitID" value="2">
</strong></font> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"><a href="http://lightphpscripts.com" target="_blank"><font size="1">Powered by LPS</font></a> </div></td>
    </tr>
  </table>
</form>
