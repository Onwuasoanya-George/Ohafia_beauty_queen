<?php
ob_start();
@session_start();
$ERRORS = array();
	include 'config.php';
	$action = TRUE;
	include 'connect.php';
	

if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged'])))&& ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){
				  
				  if ((isset($_POST['tdate'])) || (isset($_POST['topi'])) ||(isset($_POST['cont'])) ||
	(isset($_POST['cpic1']))){
	
	

			$todaydate = date('Y-m-d');
			 
			$topic = (!isset($_POST['topi']) || trim($_POST['topi']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your topic</P>' : 
			@mysql_real_escape_string(trim($_POST['topi']));

			$cont = (!isset($_POST['cont']) || trim($_POST['cont']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your content</P>' : 
			@mysql_real_escape_string(trim($_POST['cont']));			
			 
			$cpic1 = @$_FILES['cpic1']['name'];
			
			if ((!empty($cpic1) ) && (isset($cpic1) ))
			
								{
								
							echo "got here 1";
			$prefix= "/home/ohafiabe/public_html/admin/uploads/";
			
				  $extention1 = strtolower(substr($cpic1,strpos($cpic1,'.') + 1 ));
				  $size1 = @$_FILES['cpic1']['size'];
				  $max_size1 = 1536000;
				  $type1 = @$_FILES['cpic1']['type'];
				  $tmp_name1 = @$_FILES['cpic1']['tmp_name'];
				
				$cpic1 = @$_FILES['cpic1']['name'];
				$pck1= array();
				$query1 = " SELECT picture FROM article";
				$run_query = @mysql_query($query1);
				if ($run_query){
					echo "got here 2";
					while($get_assoc = @mysql_fetch_assoc($run_query)){
						$pck1[] = $get_assoc['picture'];
						
					}
					for($ds =0; $ds< sizeof($pck1); $ds++){
					if(($prefix.$cpic1 ==$pck1[$ds] ))
					{   $ERRORS[] = '<p class="asteric" align="center">ERROR: The name of the Picture file you entered is already being used my another
					article. You can rename the picture or choose another picture entirely.</p>';   
						}
						else{
						
							if(( $extention1=='jpg'|| $extention1=='jpeg'|| $extention1=='JPG' || $extention1=='JPEG' )&& 
							($type1 == 'image/jpeg' || $type1 == 'image/jpg' )) 
					
							{

							if (!($size1 > $max_size1))
								 {
										$mlocation = '/home/ohafiabe/public_html/admin/uploads/'.$cpic1;
										$location = '/home/ohafiabe/public_html/admin/uploads/'.$cpic1;
										move_uploaded_file($tmp_name1,$location);
						 
										  $cpart1 = @mysql_real_escape_string("$mlocation");
										 
										 
										 
										 
								 }
								 else{  $ERRORS[] ='<p class="asteric" align="center">ERROR:Picture one File too large.</p>';}
				}else{  $ERRORS[] = "<p class=\"asteric\" align=\"center\">ERROR: $cpic1  file is not a valid image</p>";} 
						}
					}
				
				}else{
				echo mysql_error();
				 $ERRORS[] = '<p class="asteric" align="center"> Internal Error please contact Admin 4 </p>' ;
				}
								
						
		} else{ $cpart1 = "null";}
		echo sizeof($ERRORS);
		if(sizeof($ERRORS)< 1){
			$cquery = "
			INSERT INTO  `article` (
				`articleid` ,
				`Topic` ,
				`article` ,
				`picture` ,
				`todaydate` ,
				`checkdel` ,
				`checkcontreading`
				)
				VALUES (
				NULL ,  '$topic',  '$cont',  '$cpart1',  '$todaydate',  'false',  'false'
				);
			";
		$runquerynumber4 = @mysql_query($cquery) or die("There seems to be an error. please report this error as Post ERROR TWO");
		if( $runquerynumber4 ) { 
								$vgoog = 1 ;
								$evelop = "Success! Posting was sucessful.<br />
									";
								}else{ $vgood = 0; $evelop = "Sorry, Posting was Unsuccessful. report this error as Post ERROR TWO point 2." ;}	
			
		} else{ 
					foreach ($ERRORS as $e)
											{
												echo "$e";
											}}
					
	}
				  
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
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">

 
  <p align="center">&nbsp;</p>
  <table  align="center" width="551" border="0" cellspacing="5" cellpadding="7">
    
	<tr>
      <th align="right" scope="row">Today's Date : </th>
      <td bgcolor="#000"><input name="tdate"  type="text"  value="<?= date('Y-m-d')?>" size="45" maxlength="50" /></td>
    </tr>
	
	<tr>
      <th align="right" scope="row">Topic : </th>
      <td bgcolor="#000"><input name="topi"  type="text" id="topi" size="45" maxlength="150" />
      <span class="asteric">* </span></td>
    </tr>
	
  </table>
  <p align="center">----------</p>
  <p align="center">Content</p>
  <table width="602" height="111" border="0" align="center" cellpadding="4" cellspacing="5">
    <tr>
      <th width="147" height="101" align="right" scope="row">Content  :</th>
      <td width="361" bgcolor="#000"><textarea name="cont" cols="35" rows="4" id="aboutme"></textarea>
      <span class="asteric">*</span></td>
    </tr>
  </table>
  <p align="center" >---------------------</p>
  <p align="center" >Upload your picture <br /> maximum of 1.5MB  </p>
  <table align="center" width="427" border="0" cellspacing="5" cellpadding="4">
    <tr>
      <th align="right" width="162" scope="row">Picture 1 :</th>
      <td width="268" bgcolor="#cccc33"><label>
        <input type="file" name="cpic1" />
        <span class="asteric">*</span></label></td>
    </tr>
    
    <tr>
      <th colspan="2" align="right" scope="row"><div align="justify">You should upload one picture. The picture size must be less than 1.5 mb. Thank you. </div></th>
    </tr>
  </table>
  <p align="center">----------</p>
  <p align="center">&nbsp;</p>
  <table align="center" width="551" border="0" cellspacing="5" cellpadding="4">
    
	<tr>
      <th width="275" align="right" scope="row">&nbsp;</th>
      <td width="245" bgcolor="#000"  >
        <input type="submit" name="button"  value="Submit" />
        <input type="reset" name="Reset"  value="Reset" />
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>

<?php
		}else{ echo 'Sorry Boss i cant log you in.... pay up';}

?>