<?php
ob_start();
@session_start();
/* Start session */
if(@$startSession == TRUE){ session_start();}

/* Config file */
include('config.php');

/* Check for submition */
if(@$_POST['submitID'] == 1){
	
	/* Connect to database */
	$connectDatabase = TRUE;
	if($connectDatabase == TRUE){$action=TRUE;include('connect.php');}
		
	/* sanitize and check info */
	$userName = mysql_real_escape_string($_POST['uame']);
	$password = mysql_real_escape_string($_POST['password']);
	
	if(@$userName == NULL) { $message = 'Please enter username.';}
	if(@$message == NULL && $password == NULL){ $message = 'Please enter password.';}
	
	if(@$message == NULL)
	{				
		$query = "SELECT * FROM " . $tableName .
		" WHERE `" . $userNameField . "`='$userName' AND `" . $userPasswordField . "`='$password'";
		$query_run = mysql_query($query);
		$query_rows = @mysql_num_rows($query_run);		
		
		/* If usercount is more than 0 -> ok */
		if($query_rows == 1){
			/* Disconnect from database */
			//if($connectDatabase == TRUE){$action=FALSE;include('connect.php');}
			$idquery = "Select id from ".$tableName .
			" WHERE `" . $userNameField . "`='$userName' AND `" . $userPasswordField . "`='$password'";
			$query_run2 = mysql_query($idquery);
			if($query_run2){
			$user_name = mysql_result($query_run,0, "userName" );
			$user_id =  mysql_result($query_run2,0, "id" );
			
			$_SESSION['isLoged'] = "yes"; // set empty to block boss
			$_SESSION['id'] = $user_id;
			
			/* Redirect to login page */
			header("Location: $loginPage");
			exit();
			
			}else{ echo 'Error';}
	        
			
		} else {
			$message = 'Invalid username and/or password!';
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
if(@$message != NULL){?>
<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFCCCC">
  <tr>
    <td><div align="center"><strong><font color="#FF0000"><?=$message;?></font></strong></div></td>
  </tr>
</table>
<?php } ?>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" name="login" id="login" style="display:inline;">
  <table width="60%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#99CC33">
    <tr bgcolor="#99CC99"> 
      <td colspan="2"><div align="center"><strong>Mr/Mrs Admin, Please log in:</strong></div></td>
    </tr>
	<tr bgcolor="#99CC99"> 
      <td colspan="2"><div align="center"><strong>Make sure you do not save the username and password. (for security reasons)</strong></div></td>
    </tr>
    <tr> 
      <td width="30%"><strong>Username:</strong></td>
      <td width="30%"><input name="uame" type="text" id="uame"></td>
    </tr>
    <tr> 
      <td><strong>Password:</strong></td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"><font face="Georgia, Times New Roman, Times, serif"><strong>
          <input name="Submit" type="submit" id="Submit" value="Sign-In">
          <input name="submitID" type="hidden" id="submitID" value="1">
</strong></font> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"> credited to: <a href="http://lightphpscripts.com" target="_blank"><font size="1">Powered by LPS</font></a></div>
	  <br/>
	  Implemented by Onwuasoanya George. ndu4george@gmail.com
	  </td>
    </tr>
  </table>
</form>