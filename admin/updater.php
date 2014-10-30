<?php
ob_start();
@session_start();
	
	include 'config.php';
	$action = TRUE;
	include 'connect.php';
	

if(((isset($_SESSION['isLoged']))&&(!empty($_SESSION['isLoged'])))&& ((isset($_SESSION['id']))&&(!empty($_SESSION['id'])))  
				){
				  $number = array();
				  $reg_query = "SELECT * FROM models";
				  $reg_queryy  = mysql_query($reg_query);
				  $num_of_reg_query = mysql_num_rows($reg_queryy);
					 if( $reg_queryy  = mysql_query($reg_query)){
							if($num_of_reg_query > 0){
							echo "<br /><br/><p align= \"center\"> <strong>Welcome Boss.<br/><br/>Registered Users: ".$num_of_reg_query."</strong></p>";
							?>
								<table align="center" width="537" border="2" cellspacing="5" cellpadding="4">
  <tr>
    <th width="238" height="38" bgcolor="#FFFFFF"><br /> View Registered </th>
    <td width="238" height="38" bgcolor="#FFFFFF"><br /> <a href="postcontact.php"> Post Information</a></td>
	<td width="238" height="38" bgcolor="#FFFFFF" title =" Click so that you can restrict
	some post from beign seen"><br /> <a href="cancelpost.php">Cancel a Post Information from being seen</a></td>
    </tr>
  <tr>
    <th width="238" height="38" bgcolor="#FFFFFF"><br /> Always remember to log out !!!! (for security reasons) </th>
    <td width="238" height="38" bgcolor="#FFFFFF"><br /> <a href="logoff.php"> Log out</a></td>
	
    </tr>
</table>


    <?php 
		include 'config.php';
		@$action = true;
		include 'connect.php';
	// number of records to be displayed per page
$records_per_page = 1;
// look for starting marker
// if not available, assume 0
(!@$_GET['start']) ? @$start = 0 : $start = @$_GET['start'];

// create and execute queryy to count records
$queryy = "SELECT COUNT(*) FROM models ";
$resulty = mysql_query($queryy) or die ('Error, please contact admin. Thank You. ');
// get total number of records
$row = mysql_fetch_row($resulty);
$total_records = $row[0];
$cens =  $total_records;
// if records exist
if (($total_records > 0) && ($start < $total_records))
{	
	$query = "SELECT * FROM models
	ORDER BY  `id` ASC 
	LIMIT $start, $records_per_page";
	
		$firstname = array();
		$lastname= array();
		$othername = array();
		$state = array();
		$LGA =  array();
		$VilAddr = array();
		$stateofres = array();
		$bdate = array();
		$phone1 = array();
		$email = array();
		$gender = array();  
		$pdate = array();
		$tellnumbr = array();
		$bborfb = array();
		$nation = array(); 
		$height = array(); 
		$skincol = array(); 
		$job = array();
		$marstatus = array();
		$aboutme = array();
		$pic1url = array();
		$pic2url = array();
		
		if($runQuery = mysql_query($query)) 
     {
		
		$i = 0;
		while($query_row = mysql_fetch_assoc($runQuery))
				{
					$pic2url[$i] = $query_row['pic2thumb'];
					$pic1url[$i] = $query_row['pic1thumb'];
					$aboutme[$i] = $query_row['aboutme'];
					$marstatus[$i] = $query_row['mstatus'];
					$job[$i] = $query_row['occupation'];
					$skincol[$i] = $query_row['skincolour']; 
					$height[$i] = $query_row['Height'];
					$nation[$i] = $query_row['Nationality'];
					$bborfb[$i] = $query_row['bbfb'];
					$tellnumbr[$i] = $query_row['tellnum'];
					$pdate[$i] = $query_row['dop'];
					$gender[$i] = $query_row['gender']; 
					$email[$i] = $query_row['email'];
					$phone1[$i] = $query_row['phone1'];
					$ddate[$i] = $query_row['dob'];
					$stateofres[$i] = $query_row['stateofres'];
					$VilAddr[$i] = $query_row['villcontaddr'];
					$LGA[$i] = $query_row['lga']; 
					$state[$i] = $query_row['stateoforigin'];
					$othername[$i] = $query_row['othername'];
					$lastname[$i] = $query_row['lastname'];
					$firstname[$i] = $query_row['firstname'];
					$i++ ;
				}
		}
		
	// set up the previous page link
// this should appear on all pages except the first page
// the start point for the previous page will be 
// the start point for this page 
// less the number of records per page
if ($start >= $records_per_page) 
{
echo "<br/><br/><p align = \"center\"><a href=" . $_SERVER['PHP_SELF'] . "?start=" . ($start-$records_per_page) . ">Previous 
Page</a></p><br/>";
}
// set up the "next page" link
// this should appear on all pages except the last page
// the start point for the next page 
// will be the end point for this page
if ($start+$records_per_page < $total_records && $start >= 0) 
{
echo "<br/><br/><p align = \"center\"> <a  href=" . $_SERVER['PHP_SELF'] .
"?start=" . ($start+$records_per_page) . ">Next Person</a></p><br/>";

}				
	for($e=0;$e < sizeof($email) ;$e++){
		
 ?>
	<p align="center" >---------------------</p>
  <p align="center" >The Picture </p>
  <table align="center" width="427" border="0" cellspacing="5" cellpadding="4">
    <tr>
      <td   bgcolor="#cccc33" > 
		<img src="<?=@$pic1url[$e]?>" />
	  </td>
      <td bgcolor="#cccc33"> <img src="<?=@$pic2url[$e]?>" />
	   
	  <td>
    </tr>
    
    
  </table>
  <p align="center">----------</p>
  <table  align="center" width="551" border="0" cellspacing="5" cellpadding="7">
    <tr>
      <th align="right" width="172" height="41" scope="row">First name :</th>
      <td width="336" bgcolor="#fff">
      <?=@$firstname[$e]?>
        </td>
    </tr>
    <tr>
      <th align="right" scope="row">Last name :</th>
      <td bgcolor="#fff">
 <?=@$lastname[$e]?>
	  </td>
    </tr>
    <tr>
      <th align="right" scope="row">Other name :</th>
      <td bgcolor="#fff">
	  <?=@$othername[$e]?>
	  </td>
    </tr>
    <tr>
      <th align="right" height="39" scope="row">State of Origin :</th>
      <td bgcolor="#fff"><?=@$state[$e]?></td>
    </tr>
    <tr>
      <th align="right" scope="row">LGA :</th>
      <td bgcolor="#fff"> <?=@$LGA[$e]?> </td>
    </tr>
	<tr>
      <th align="right" scope="row">Village Contact Address :</th>
      <td bgcolor="#fff"> <?=@$VilAddr[$e]?> </td>
    </tr>
	<tr>
      <th align="right" scope="row">State of Residence : </th>
      <td bgcolor="#fff"> <?=@$stateofres[$e]?> </td>
    </tr>
    
    <tr>
      <th align="right" scope="row">Date of Birth :</th>
      <td bgcolor="#fff">
	  <?=@$ddate[$e]?>
</td>
    </tr>
    <tr>
      <th align="right" scope="row">Mobile / Phone  :</th>
      <td bgcolor="#fff" class="asteric"> <?=@$phone1[$e]?> </td>
    </tr>
    <tr>
      <th align="right" scope="row">Email :</th>
      <td bgcolor="#fff"> <?=@$email[$e]?> </td>
    </tr>
    <tr>
      <th align="right" scope="row">Gender</th>
      <td bgcolor="#fff">
	  <?=@$gender[$e]?>
      </td>
    </tr>
	<tr>
      <th align="right" scope="row">Date of Payment  : </th>
      <td bgcolor="#fff">
	  <?=@$pdate[$e]?>
	  </td>
    </tr>
	<tr>
      <th align="right" scope="row">Teller number  : </th>
      <td bgcolor="#fff">
	 <?=@$tellnumbr[$e]?>
	 </td>
    </tr>
	<tr>
      <th align="right" scope="row">BB pin/ Facebook name : </th>
      <td bgcolor="#fff">
	  <?=@$bborfb[$e]?>
	  </td>
    </tr>
    <tr>
      <th align="right" scope="row">Nationality : </th>
      <td bgcolor="#fff">
	  <?=@$nation[$e]?>
	  </td>
    </tr>
    <tr>
      <th align="right" scope="row">Height : </th>
      <td bgcolor="#fff">
	  <?=@$height[$e]?>
	  </td>
    </tr>
	<tr>
      <th align="right" scope="row">Skin Colour: </th>
      <td bgcolor="#fff">
	  <?=@$skincol[$e]?>
	  </td>
    </tr>
	<tr>
      <th align="right" scope="row">Occupation : </th>
      <td bgcolor="#fff">
	  <?=@$job[$e]?>
	  </td>
    </tr>
	<tr>
      <th align="right" scope="row">Marital Status  : </th>
      <td bgcolor="#fff">
      <?=@$marstatus[$e]?>
	  </td>
    </tr>
  </table>
  <p align="center">About me</p>
  <table width="602" height="111" border="0" align="center" cellpadding="4" cellspacing="5">
    <tr>
      <th width="147" height="101" align="right" scope="row">About me  :</th>
      <td width="361" bgcolor="#fff">
	  <?=@$aboutme[$e]?>
	  </td>
    </tr>
  </table>
  
 
 
<?php
	}}else{ 
	
	die("Internal error 3, contact the alpha and omega");
	
	}

	
	// set up the previous page link
// this should appear on all pages except the first page
// the start point for the previous page will be 
// the start point for this page 
// less the number of records per page
if ($start >= $records_per_page) 
{
echo "<p align = \"center\"><a href=" . $_SERVER['PHP_SELF'] . "?start=" . ($start-$records_per_page) . ">Previous 
Page</a></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/><br/>";
}
// set up the "next page" link
// this should appear on all pages except the last page
// the start point for the next page 
// will be the end point for this page
if ($start+$records_per_page < $total_records && $start >= 0) 
{
echo "<p align = \"center\"><a href=" . $_SERVER['PHP_SELF'] .
"?start=" . ($start+$records_per_page) . ">Next Person</a></p>
<br/><br/><br/>";

}


?>

						<?php
						}else{echo " None Registered";}
						
						
					 }else{echo " Internal error 1, please contact the Alpha and Omega of this site";}
					 
				
				}else{ echo 'Sorry Boss i cant log you in.... pay up';}

?>