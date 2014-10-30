<?php
ob_start();
@session_start();
$ERRORS = array();
	include 'config.php';
	$action = TRUE;
	include 'connect.php';
	

if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged'])))&& ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){
				  
				  
				  
				  ?>
				  <?php
if(!@empty($evelop)){
		 echo '
<br/><br/><br/>
<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#00FF00">
  <tr>
    <td><div align="center"><strong><font color="#000000"> '.@$evelop.' </font></strong></div></td>
  </tr>
</table>

 ';
}

?>
								<table align="center" width="537" border="2" cellspacing="5" cellpadding="4">
  <tr>
    <td width="238" height="38" bgcolor="#FFFFFF"><br /> <a href="updater.php"> View Registered </a></td>
	<td width="238" height="38" bgcolor="#FFFFFF" title =" Click so that you can restrict
	some post from beign seen"><br /> <a href="cancelpost.php"> Cancel a Post Information from being seen</a></td>
    </tr>
	<tr>
    <th width="238" height="38" bgcolor="#FFFFFF"><br /> Always remember to log out !!!! (for security reasons) </th>
    <td width="238" height="38" bgcolor="#FFFFFF"><br /> <a href="logoff.php"> Log out</a></td>
	
    </tr>
  
</table>
			<?php
		$gname =array();$groupid =array();
		$querym ="SELECT `Topic`,`articleid`,`checkcontreading` FROM article
					WHERE  `checkcontreading` =  \"false\"
					" ;
		$querym_run = mysql_query($querym);
		$querym_rows = mysql_num_rows($querym_run);
		if($querym_rows >0	){
					while($run_Assocm = mysql_fetch_assoc($querym_run)){
					$gname[] = $run_Assocm['Topic'];
					$groupid[] = $run_Assocm['articleid'];
					}
					echo "<br /><br /> <p align=\"center\">You have ".sizeof($gname)." article(s) </p><br/>";
					echo "<table align=\"center\" width=\"682\" border=\"0\" cellspacing=\"5\" cellpadding=\"4\">
						  <tr>
							<th width=\"307\" scope=\"col\">Article Name</th>
							<th width=\"344\" scope=\"col\">Option</th>
							</tr>
						  <tr>";
					  
					for($b =0;	$b < sizeof($gname);$b++){
						$gpd =$groupid[$b];
					
					?>
					
	<tr >
			<th width="307" ><?=$gname[$b]?></th>
			<th width="344" >
			<form action="delc.php" method="post" enctype="application/x-www-form-urlencoded" 	name="del">   
			   	<input type="submit"   value="Delete Article" />
            	<input name="sID" type="hidden"  value="<?=$gpd?>">
				</form>
      </th>
</tr>
		<?php
									}
								
		}else{ 
		
		echo '<br /><br /><table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFCCCC">
  <tr>
    <td><div align="center"><strong><font color="#FF0000">You do not have any article yet.</font></strong></div></td>
  </tr>
</table> ';
		
		}
		?>

<?php
		}else{ echo 'Sorry Boss i cant log you in.... ';}

?>