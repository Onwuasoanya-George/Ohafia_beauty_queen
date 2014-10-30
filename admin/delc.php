<?php
ob_start();
@session_start();
	include 'config.php';
	$action = TRUE;
	include 'connect.php';
if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged'])))&& ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){ 
				
					$hds = mysql_real_escape_string($_POST['sID']);
					
					
						 $eQuery = "UPDATE  $databaseName.`article` SET  `checkcontreading` =  \"true\" WHERE
								`articleid` = $hds LIMIT 1";
						 $e_solution = mysql_query($eQuery);
							if($e_solution){
							header("Location: cancelpost.php");
							exit();
							}else{  die ( 'Error, please contact admin. Report as Delete error. ');}
					

}else{
	echo" You are not logged in. please log in";

}
 ?>