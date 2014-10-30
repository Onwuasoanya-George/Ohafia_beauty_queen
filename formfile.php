<?php

include 'core.php';
include 'config.php';	
$ERRORS = array();

			

if ((isset($_POST['firstname'])) || (isset($_POST['lastname'])) ||(isset($_POST['othername'])) ||
	(isset($_POST['stateoforigin'])) || (isset($_POST['LGA'])) || (isset($_POST['country'])) ||
	(isset($_POST['villAddr'])) ||(isset($_POST['phone1'])) ||  (isset($_POST['stateofres'])) ||
	(isset($_POST['email'])) ||	(isset($_POST['Bday'])) || (isset($_POST['Bmonth'])) ||
	(isset($_POST['Byear'])) || (isset($_POST['Pday'])) || (isset($_POST['Pmonth'])) || 
	(isset($_POST['Pyear'])) || (isset($_POST['job'])) ||  (isset($_POST['mariagestatus'])) ||
	(isset($_POST['gender'])) || (isset($_POST['aboutme'])) || (isset($_POST['bborfb'])) || 
	(isset($_POST['height'])) ||(isset($_POST['skinColour'])) ||(isset($_POST['checkbox'])) ||(isset($_POST['tellernumber'])) ||
	(isset($_POST['pic1'])) || (isset($_POST['pic2']))

	)
	{
			$firstname = trim($_POST['firstname']) == "" ?
			$ERRORS[] ='<p class="asteric" align="center">ERROR: Enter your Firstname</p>' : 
			@mysql_real_escape_string(trim($_POST['firstname']));

			 
			$lastname = (!isset($_POST['lastname']) || trim($_POST['lastname']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Lastname</P>' : 
			@mysql_real_escape_string(trim($_POST['lastname']));

			$othername = (!isset($_POST['othername']) || trim($_POST['othername']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your othername</P>' : 
			@mysql_real_escape_string(trim($_POST['othername']));			
			 
			 //$nickname = @mysql_real_escape_string(htmlentities($_POST['nickname']));
			

			$stateoforigin = (!isset($_POST['stateoforigin']) || trim($_POST['stateoforigin']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter a state of origin</p>' : 
			@mysql_real_escape_string(trim($_POST['stateoforigin']));


			$LGA = (!isset($_POST['LGA']) || trim($_POST['LGA']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your LGA</p>' : 
			@mysql_real_escape_string(trim($_POST['LGA']));

			$villAddr = (!isset($_POST['villAddr']) || trim($_POST['villAddr']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Village address</p>' : 
			@mysql_real_escape_string(trim($_POST['villAddr']));

			$phone1 = (!isset($_POST['phone1']) || trim($_POST['phone1']) == ""|| 
			 !@ereg('^([0-9]){11,13}$', $_POST['phone1']))
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your phone number </p>' : 
			"tell:".@mysql_real_escape_string(($_POST['phone1'])).". ";
			
			$theteller = (!isset($_POST['tellernumber']) || trim($_POST['tellernumber']) == ""|| 
			 !@ereg('^([0-9]){1,30}$', $_POST['tellernumber']))
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your teller number </p>' : 
			"teller:".@mysql_real_escape_string(($_POST['tellernumber'])).". ";
			 
			
			
			 $email = (!isset($_POST['email']) || trim($_POST['email']) == "" || 
			 !@ereg('^([a-zA-Z0-9_-]+)([\.a-zA-Z0-9_-]+)@([a-zA-Z0-9_-]+) ?(\.[a-zA-Z0-9_-]+)+$', $_POST['email'])) 
			 ? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter a valid Email</p>' : 
			 @mysql_real_escape_string(trim($_POST['email']));
				
				
					
				//$dob = "$year-$month-$day";
			 if((!@checkdate($_POST['Pday'],$_POST['Pmonth'],$_POST['Pyear'] ) ) ||
				 empty($_POST['Pday']) || empty($_POST['Pmonth']) || empty($_POST['Pyear']) ||
				 (!@checkdate($_POST['Bday'],$_POST['Bmonth'],$_POST['Byear'] ) ) ||
				 empty($_POST['Bday']) || empty($_POST['Bmonth']) || empty($_POST['Byear'])
				 )
				 
			 {  
			 $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter a valid date of birth and Date of payment. </p>' ;
			 }else{
				 $Pday = @mysql_real_escape_string($_POST['Pday']) ;
				 $Pmonth = @mysql_real_escape_string($_POST['Pmonth']) ;
				 $Pyear = @mysql_real_escape_string($_POST['Pyear'] );
				 $Bday = @mysql_real_escape_string($_POST['Bday']) ;
				 $Bmonth = @mysql_real_escape_string($_POST['Bmonth']) ;
				 $Byear = @mysql_real_escape_string($_POST['Byear'] );
				 $dob = "$Byear-$Bmonth-$Bday";
				 $pdate = "$Pyear-$Pmonth-$Pday";
			 } 
					

			
			$country = (!isset($_POST['country']) || trim($_POST['country']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your country</p>' : 
			@mysql_real_escape_string(trim($_POST['country']));			

			
			 $stateofres = (!isset($_POST['stateofres']) || trim($_POST['stateofres']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your state of resident</p>' : 
			@mysql_real_escape_string(trim($_POST['stateofres']));
			
			
			$job = (!isset($_POST['job']) || trim($_POST['job']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Occupation</p>' : 
			@mysql_real_escape_string(trim($_POST['job']));			

			
			 $mariagestatus = (!isset($_POST['mariagestatus']) || trim($_POST['mariagestatus']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Marriage status</p>' : 
			@mysql_real_escape_string(trim($_POST['mariagestatus']));
			
			$gender = (!isset($_POST['gender']) || trim($_POST['gender']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your gender</p>' : 
			@mysql_real_escape_string(trim($_POST['gender']));
			
			$bborfb = (!isset($_POST['bborfb']) || trim($_POST['bborfb']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your BB pin or FB username </p>' : 
			@mysql_real_escape_string(trim($_POST['bborfb']));
			
			$skinColour = (!isset($_POST['skinColour']) || trim($_POST['skinColour']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your Skin Colour </p>' : 
			@mysql_real_escape_string(trim($_POST['skinColour']));
			
			$height = (!isset($_POST['height']) || trim($_POST['height']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: Enter your height </p>' : 
			@mysql_real_escape_string(trim($_POST['height']));
			
			$about = trim($_POST['aboutme']) == "" ?
			$ERRORS[] ='<p class="asteric" align="center">ERROR: Enter text About you</p>' : 
			@mysql_real_escape_string(trim($_POST['aboutme']));
			
			$checkbox = (!isset($_POST['checkbox']) || trim($_POST['checkbox']) == "") 
			? $ERRORS[] = '<p class="asteric" align="center">ERROR: You have to check the Read Tearms and Condition box</p>' : 
			@mysql_real_escape_string(trim($_POST['checkbox']));
			
			
			$pic1 = @$_FILES['pic1']['name'];
			$pic2 = @$_FILES['pic2']['name'];
			$prefix= "uploads/";
			//$pic1 = @mysql_real_escape_string($prefix.$pic1);
			//$pic2 = @mysql_real_escape_string($prefix.$pic2);
				  $extention1 = strtolower(substr($pic1,strpos($pic1,'.') + 1 ));
				  $size1 = @$_FILES['pic1']['size'];
				  $max_size1 = 1536000;
				  $type1 = @$_FILES['pic1']['type'];
				  $tmp_name1 = @$_FILES['pic1']['tmp_name'];
				 
				 $extention2 = strtolower(substr($pic2,strpos($pic2,'.') + 1 ));
				  $size2 = @$_FILES['pic2']['size'];
				  $max_size2 = 1536000;
				  $type2 = @$_FILES['pic2']['type'];
				  $tmp_name2 = @$_FILES['pic2']['tmp_name'];
				

				$emailp= array();
				
				$phone1p= array();
				$pck1= array();
				$pck2= array();$gkk2= array();
				
				
				
				
			
				
				if( !sizeof($ERRORS) > 0) {
				 if(isset($pic1) || isset($pic2) ){
						 if ((!empty($pic1) ) && (!empty($pic2) ))
								{
									if((( $extention1=='jpg'|| $extention1=='jpeg'|| $extention1=='JPG' || $extention1=='JPEG' )&& 
										 ($type1 == 'image/jpeg' || $type1 == 'image/jpg' )) &&
										 (( $extention2=='jpg'|| $extention2=='jpeg'|| $extention2=='JPG' || $extention2=='JPEG' )&& 
										 ($type2 == 'image/jpeg' || $type2 == 'image/jpg' || $type2 == 'image/JPG'|| $type2 == 'image/JPEG')))
										 
										 
											{
													 if (!($size1 > $max_size1))
													 {
															$location = 'uploads/'.$pic1;
											 move_uploaded_file($tmp_name1,$location);
											 
											 
											 // --- force resolution 360px x 269px----
											 $the_image_size = getimagesize('/home/ohafiabe/public_html/uploads/'.$pic1);
											 $image_width2  = $the_image_size[0];
											 $image_height2 = $the_image_size[1];
											 
											 $new_image2 = imagecreatetruecolor(300 , 380);
											 $old_image2 = imagecreatefromjpeg('/home/ohafiabe/public_html/uploads/'.$pic1);
											 imagecopyresized($new_image2,$old_image2,0,0,0,0,300,380,$image_width2,$image_height2);
											imagejpeg($new_image2,'/home/ohafiabe/public_html/thumb/'.$pic1);
											 
															  $part1 = @mysql_real_escape_string("$location");
															 $thumbpart1 = @mysql_real_escape_string('thumb/'.$pic1);
															  $part2 = null;
															  $thumbpart2 = null;
															 //echo 'Uploaded';
															 
															 
															 
													 }
													 else{  $ERRORS[] ='<p class="asteric" align="center">ERROR:Picture one File too large.</p>';}

													if (!($size2 > $max_size2))
													 {
															$location2 = 'uploads/'.$pic2;
											 move_uploaded_file($tmp_name2,$location2);
											 
											 
											 // --- force resolution 360px x 269px----
											 $the_image_size = getimagesize('/home/ohafiabe/public_html/uploads/'.$pic2);
											 $image_width2  = $the_image_size[0];
											 $image_height2 = $the_image_size[1];
											 
											 $new_image2 = imagecreatetruecolor(300 , 380);
											 $old_image2 = imagecreatefromjpeg('/home/ohafiabe/public_html/uploads/'.$pic2);
											 imagecopyresized($new_image2,$old_image2,0,0,0,0,300,380,$image_width2,$image_height2);
											 imagejpeg($new_image2,'/home/ohafiabe/public_html/uploads/'.$pic2);
											 
											 
															  $part2 = "$location2";
															  $thumbpart2 = @mysql_real_escape_string('thumb/'.$pic2);
															 //echo 'Uploaded';
													 }
													 else{  $ERRORS[] ='<p class="asteric" align="center">ERROR:Picture two File too large.</p>';}													 
											}
									else{  $ERRORS[] = "<p class=\"asteric\" align=\"center\">ERROR: $pic1 or $pic2 file is not a valid image</p>";} 		
								 }
 						 elseif ((!empty($pic1) ) && ( empty($pic2) ))
						 
						 {
						 
								if (!($size1 > $max_size1))
													 {
															$location = 'uploads/'.$pic1;
											 move_uploaded_file($tmp_name1,$location);
											
											 // --- force resolution 300px x 380px----
											 $the_image_size = getimagesize('/home/ohafiabe/public_html/uploads/'.$pic1);
											 $image_width2  = $the_image_size[0];
											 $image_height2 = $the_image_size[1];
											 
											 $new_image2 = imagecreatetruecolor(300 , 380);
											 $old_image2 = imagecreatefromjpeg('/home/ohafiabe/public_html/uploads/'.$pic1);
											 @imagecopyresized($new_image2,$old_image2,0,0,0,0,300,380,$image_width2,$image_height2);
											@imagejpeg($new_image2,'/home/ohafiabe/public_html/thumb/'.$pic1);
											 
															  $part1 = @mysql_real_escape_string("$location");
															 $thumbpart1 = @mysql_real_escape_string('thumb/'.$pic1);
															  $part2 = null;
															  $thumbpart2 = null;
															 //echo 'Uploaded';
													 }
								 else{  $ERRORS[] ='<p class="asteric" align="center">ERROR: Picture one File too large.</p>';}													 
						 }
									
						 
						 else{  $ERRORS[] = '<p class="asteric" align="center">ERROR: Please choose a picture file</p>';} 
				 }
				 }
				
				
				
				
				

				if(sizeof($ERRORS) > 0) 
									{
									// format and display error list
									echo '<p class="asteric" align="center">'.sizeof($ERRORS).' error(s) was(were) caught';
											foreach ($ERRORS as $e)
											{
												echo "$e";
											}
												$correct = false;
												//die(); 
									}else {$correct = true ;} 
							if(  (@$correct == true ))
								{
								
								
									
									$contentofemail = "
									 
									firstname ='$firstname',;
									lastname = '$lastname', ;  
									othername = '$othername', ; 
									staetof origin = '$stateoforigin',; 
									lga = '$LGA',  ;
									village addr = '$villAddr', ;
									state : '$stateofres', ;  
									date of birth = '$dob',  ;
									paymentdate = '$pdate', ;
									teller numner = '$theteller',
									phine number = '$phone1', ;
									email = '$email', ;
									gender = '$gender', ;
									bborFb = '$bborfb', ;
									country = '$country', 
									height = '$height', 
									skincolor = '$skinColour',  
									job = '$job', 
									status = '$mariagestatus',
									about = '$about', 
									
									first pic :'$part1' ,
									2nd pic : '$part2',
									thumbnail of firstpic '$thumbpart1' ,
									thumbnail of second pic : '$thumbpart2',
									";
									
								$headers = "From:Administration@ohafiabeautyqueen.com\r\n";
								$recipients = "ndu4george@gmail.com,baronhandsom@gmail.com";
								mail($recipients, "Somebody have registered, Boss",$contentofemail, $headers);
								
								//
								 
								$vgoog = 1 ;
								$evelop = "Success! Registration was sucessful. ";
							
							
								}else{ $vgood = 0; $evelop = "Sorry, Registration was Unsuccessful. Please try again." ;}
								
}
						
						
					
					
					
				




?>


<html>



<style type="text/css">
<!--
.asteric {
	color: #F00;
}
.fivestar {
	color: #FC3;
}
body{
	line-height:14px;
	background-color:#fff;}
-->
</style>
<title>Ohafial BQ</title>



<body>
<?php
if(!@empty($evelop)){
		 echo '

<table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#00FF00">
  <tr>
    <td><div align="center"><strong><font color="#000000"> '.@$evelop.' </font></strong></div></td>
  </tr>
</table>

 ';
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">

 
  <p align="center">&nbsp;</p>
  <table  align="center" width="551" border="0" cellspacing="5" cellpadding="7">
    <tr>
      <th align="right" width="172" height="41" scope="row">First name :</th>
      <td width="336" bgcolor="#000">
      
        <input  type="text" name="firstname" size="30" maxlength="30" >        
        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Last name :</th>
      <td bgcolor="#000"><input type="text" name="lastname" size="30" maxlength="30" />        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Other name :</th>
      <td bgcolor="#000"><input  type="text" name="othername" size="30" maxlength="30" />        <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th align="right" height="39" scope="row">State of Origin :</th>
      <td bgcolor="#000"><input  type="text" name="stateoforigin" size="20" maxlength="20" />
      <span class="asteric">*</span></td>
    </tr>
    <tr>
      <th align="right" scope="row">LGA :</th>
      <td bgcolor="#000"><input  type="text" name="LGA" size="30" maxlength="30" />        <span class="asteric">*</span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Village Contact Address :</th>
      <td bgcolor="#000"><textarea name="villAddr" cols="35" rows="4" id="villAddr"></textarea>        <span class="asteric">*</span></td>
    </tr>
	<tr>
      <th align="right" scope="row">State of Residence : </th>
      <td bgcolor="#000"><input name="stateofres"  type="text" id="stateofres" size="45" maxlength="50" />
      <span class="asteric">* </span></td>
    </tr>
    
    <tr>
      <th align="right" scope="row">Date of Birth :</th>
      <td bgcolor="#000">
	  
 <input name="Bday" type="text" id="Bday" size="3"> 
 <input name="Bmonth" type="text" id="Bmonth" size="3"> 
 <input name="Byear" type="text" id="Byear" size="4"> 	  
	  
	  
	  (dd-mm-yyyy)
      <span class="asteric">* </span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Mobile / Phone  :</th>
      <td bgcolor="#000" class="asteric"><input  type="text" name="phone1" size="30" maxlength="30" />
      * xxxxxxxxxxx</td>
    </tr>
    <tr>
      <th align="right" scope="row">Email :</th>
      <td bgcolor="#000"><input  type="text" name="email" size="45" maxlength="50" />
      <span class="asteric">* </span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Gender</th>
      <td bgcolor="#000"><label>
        <select name="gender" id="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
      </label>
      <span class="asteric">* </span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Date of Payment  : </th>
      <td bgcolor="#000"><input name="Pday" type="text" id="Pday" size="3">
        <input name="Pmonth" type="text" id="Pmonth" size="3">
        <input name="Pyear" type="text" id="Pyear" size="4">
(dd-mm-yyyy) <span class="asteric">* </span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Teller number :</th>
      <td bgcolor="#000" class="asteric"><input  type="text" name="tellernumber" size="30" maxlength="30" />
      </td>
    </tr>
	<tr>
      <th align="right" scope="row">BB pin/ Facebook name : </th>
      <td bgcolor="#000"><input name="bborfb"  type="text" id="bborfb" size="45" maxlength="50" /> <span class="asteric">* </span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Nationality : </th>
      <td bgcolor="#000"><input name="country"  type="text" id="country" value="Nigerian" size="45" maxlength="50" /> 
      <span class="asteric">* </span></td>
    </tr>
    <tr>
      <th align="right" scope="row">Height : </th>
      <td bgcolor="#000"><input name="height"  type="text" id="height" size="45" maxlength="50" /> <span class="asteric">* </span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Skin Colour: </th>
      <td bgcolor="#000"><input name="skinColour"  type="text" id="skinColour" size="45" maxlength="50" /> <span class="asteric">* </span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Occupation : </th>
      <td bgcolor="#000"><input name="job"  type="text" id="job" size="45" maxlength="50" />
      <span class="asteric">* </span></td>
    </tr>
	<tr>
      <th align="right" scope="row">Marital Status  : </th>
      <td bgcolor="#000"><label>
        <select name="mariagestatus">
          <option>Single</option>
          <option>Married</option>
          <option>Divorced</option>
        </select>
      </label>
      <span class="asteric">* </span></td>
    </tr>
  </table>
  <p align="center">----------</p>
  <p align="center">About me</p>
  <table width="602" height="111" border="0" align="center" cellpadding="4" cellspacing="5">
    <tr>
      <th width="147" height="101" align="right" scope="row">About me  :</th>
      <td width="361" bgcolor="#000"><textarea name="aboutme" cols="35" rows="4" id="aboutme"></textarea>
      <span class="asteric">*</span></td>
    </tr>
  </table>
  <p align="center" >---------------------</p>
  <p align="center" >Upload your picture <br /> maximum of 1.5MB  </p>
  <table align="center" width="427" border="0" cellspacing="5" cellpadding="4">
    <tr>
      <th align="right" width="162" scope="row">Picture 1 :</th>
      <td width="268" bgcolor="#cccc33"><label>
        <input type="file" name="pic1" />
        <span class="asteric">*</span></label></td>
    </tr>
    <tr>
      <th align="right" scope="row">Picture 2 :</th>
      <td bgcolor="#cccc33"><input type="file" name="pic2"  /></td>
    </tr>
    <tr>
      <th colspan="2" align="right" scope="row"><div align="justify">You must upload at least one picture. The picture size must be less than 1.5 mb. Also, a clear or studio picture photograph that shows your face clearly is highly recommended. Thank for. </div></th>
    </tr>
  </table>
  <p align="center">----------</p>
  <p align="center">&nbsp;</p>
  <table align="center" width="551" border="0" cellspacing="5" cellpadding="4">
    <tr>
      <th colspan="2" align="right" scope="row"><label>
        <div align="justify">
          <input type="checkbox" name="checkbox" value="check">
          I have read and accept the terms and conditions as stated .<br>
          <a href="terms.php"> Read the Terms and Conditions</a>          </div>
      </label></th>
    </tr>
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
</body>
</html>