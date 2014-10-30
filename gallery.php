<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Ohafia BQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- Gallery Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'dark_rounded',
        overlay_gallery: false
    });
});
</script>
<link rel="stylesheet" href="styles/prettyPhoto.css" type="text/css">
<script type="text/javascript" src="scripts/jquery-prettyPhoto.js"></script>
<!-- End Gallery Specific Elements -->

</head>
<body id="top">
<!-- ####################################################################################################### -->
<div class="wrapper col1">
 <?php
 include 'header.php';
 ?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  
  
<div id="topnav"  >
  <p align="center">
 <ul>
        <li><a href="index.php">Home</a></li>
        <li ><a href="gallery.php"> Gallery</a></li>
        <li><a href="about.php">About</a>
        </li>
		<li><a href="#">Organizers</a>
			<ul>
			<li> <a href="person3.php">Eni Joshua</a></li>
			<li><a href="person2.php"> Kelechi Nwoke</a></li>
			<li> <a href="person1.php">Chica Enuesike</a></li>
			</ul>
        </li>
    </ul>
	 </p>
  </div>
	 <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container" >
  
  		<!-- ####################################################################################################### -->
   <p> <div id="gallery" class="clear">
      <h2 class="title">Registered Contestants </h2>
      
	  <?php
	    
		include 'core.php';
	include 'config.php';
	$action = TRUE;
	include 'connect.php';
	$pict1 = array();
	$pict1Thumb = array();
	
	$concat = array();
	$galQuery = "SELECT `pic1thumb`,`pic1`,`firstname` , `lastname`, `othername` FROM `models`";
	$runGalQuery = @mysql_query($galQuery);
	if($runGalQuery){
		while($getgalassoc = @mysql_fetch_assoc($runGalQuery)){
			$pict1[] = $getgalassoc['pic1'];
			$pict1Thumb[] = $getgalassoc['pic1thumb'];
			$concat[] = $getgalassoc['firstname']." ".$getgalassoc['lastname']." ".$getgalassoc['othername'];
		}
	}
	if(sizeof($pict1Thumb) > 0){
	echo "<ul>";
		for($q=0; $q < sizeof($pict1Thumb) ; $q++){
		echo "<li><a href=\"$pict1[$q]\" rel=\"prettyPhoto[gallery1]\"title=\"$concat[$q]\" ><img src=\"$pict1Thumb[$q]\" alt = \"\" /></a></li>";
		}
		echo"</ul>";
		}else{echo "
		<li><a href=\"uploads\gtt.jpg\" rel=\"prettyPhoto[gallery1]\" title=\" Testing Image \" ><img src=\"thumb\gtt.jpg\" alt = \"\" /></a></li>
		<li><a href=\"uploads\hfhd.jpg\" rel=\"prettyPhoto[gallery1]\" ><img src=\"thumb\hfhd.jpg\" alt = \"\" /></a></li>
		<li><a href=\"uploads\httk.jpg\" rel=\"prettyPhoto[gallery1]\" ><img src=\"thumb\httk.jpg\" alt = \"\" /></a></li>
		";}
	  
	  ?>
               
    </div>
   <p><br />
   
  
  
    	 <p></p>
  </div>
  
  
  
 
</div>  
    
    <!-- ####################################################################################################### -->
   
    
  
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
    <div class="box1">
      <h2>A Little OHAFIA BEAUTY QUEEN Information !</h2>
      <img class="imgl" src="images/demo/imgl.gif" alt="logo" />
      <p>OHAFIA BEAUTY QUEEN is a pageantry competition for ohafia girls from  17-25years who might be undergraduate,graduate, or yet to enter into any higher  institution. the competition is to select a  beautiful, intelligent, couragious, elegant and humble girl who will serve as an  ambassador to reach out to the poor, widows, fatherless, handicapped, and orphans  who are ohafians! we encourage our young girls to come home and know their  land, culture and tradition.</p>
    </div>
    <div class="box contactdetails">
      <h2>Our Contact Details !</h2>
      <ul>
        <li>OHAFIA BEAUTY QUEEN</li>
        <li>Joshua : 07039460713</li>
        <li>Kelechi : 08099839590 </li>
        <li>Chika : 08036426583 </li>
        <li></li>
        <li>Email: info@ohafiabeautyqueen.com</li>
        <li class="last"><a href="https://www.facebook.com/ohafiabeautyqueen?hc_location=stream"><img src="images/demo/facebook-2.png" alt="fb" width="60" height="60" border="0" /></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2011 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>
<!-- Gallery Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'dark_rounded',
        overlay_gallery: false
    });
});
</script>
<link rel="stylesheet" href="styles/prettyPhoto.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-prettyPhoto.js"></script>
<!-- End Gallery Specific Elements -->
</body>
</html>
