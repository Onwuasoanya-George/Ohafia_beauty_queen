<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Ohafia BQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <?php
   	include 'config.php';
	$action = true ;
	include 'connect.php';
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
        <li><a href="about.php">About</a></li>
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
  <div id="container">
    <div id="content">
	<br /><br /><br /><br />
	<?php
	
	 @$articleID = @mysql_real_escape_string($_GET['id']);
	$query = "SELECT  `Topic` ,  `article` ,  `picture` 
FROM  `article` 
WHERE  `articleid` = '$articleID' ";
	
	$query_num_rows = @mysql_num_rows($query);
	if($query_num_rows = 1){
		if($run_query = @mysql_query($query)){
			while($query_assoc = @mysql_fetch_assoc($run_query)){
			 $topic_array = $query_assoc['Topic'];
			 $article_array = $query_assoc['article'];
			 $pic_array = $query_assoc['picture'];
			}
			echo "
			 
			  <div id=\"content\">
			  <h1> $topic_array</h1>
			  <img src=\"$pic_array\" />
			  $article_array
			</div>
			";
			
		}else{echo "<H1>Broken URL. or Content is no longer available.</H1>";}
	}else{echo "<H1>Advanced Error. Broken URL. or Content is no longer available.</H1>";}
	
	?>
     
  
      
     
    </div>
    <div id="column">
      <div class="subnav"><br/>
          <h2 align="center">~~ Notifications ~~</h2>
        <br/>
          <ul>
            <?php
	 
	  $articleID = array();
	  $topic_of_art = array();
	  $art = array();
	  
	  $article_query = "SELECT  `articleid` ,  `Topic` ,  `article` 
							FROM  `article` 
							WHERE  `checkcontreading` = \"false\"
							ORDER BY articleid DESC ";
	  $run_article_query = @mysql_query($article_query);
	  $num_articles = @mysql_num_rows($run_article_query);
	  if($num_articles > 0 ){
			if($run_article_query ){
				while( $run_art_assco = @mysql_fetch_assoc($run_article_query)){
					$articleID[] = $run_art_assco['articleid'];
					$topic_of_art[] = $run_art_assco['Topic'];
					$art[] = $run_art_assco['article'];
				}
				
				for($e=0; $e< sizeof($art); $e++){
					echo '
					 <li>
					  <h4><img align="left" src="images/next.png" alt="" />'.$topic_of_art[$e].'</h4>
					  
					  <p class="readmore"><a href="contreading.php?id='.$articleID[$e].'">Read &raquo;</a></p>
					</li>
					
					';
				}
				
				
				
			}else{ die("Internal Error");}
	  }else{
	  }
	  ?>
          </ul>
      </div>
	  <div class="holder">
        <div class="imgholder"><a href="Register.php"><img src="images/register.jpg" alt="" /></a></div>
        <h2 class="title"><img src="images/demo/60x60.png" alt="" width="40" height="40" />Bank Information</h2>
        <p> <strong>Account Name: Ohafia Beauty Queen </strong><br />
          <strong>Account Number: 5482031866 </strong><br />
          <strong>Bank:&nbsp; Eco Bank&nbsp; </strong></p>
        <p>&nbsp;</p>
      </div>
      
	<img src ="addvert/kele2.jpg" /><p><img src ="addvert/tytty.jpg" />	 XCULTURE FILM PRODUCTION 38C OKIGWE ROAD OWERRI(TO OPEN SOON) TEL:08102425634...EMAIL:xcultureem@gmail.com </p>
	  <div class="holder"> <br/><br/>
	  <h2 class="title"><img src="images/demo/thumb.png" alt="info" width="40" height="40" />Sponsors</h2>
		 <?php include 'theslid.php';?>
      </div>
    </div>
    <br class="clear" />
	  
    </div>
    <br class="clear" />
  </div>
</div>
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
</body>
</html>
