<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Ohafia BQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />

</head>
<body id="top" onload="Javascript:do_load();">
<!-- ####################################################################################################### -->
<div class="wrapper col1">
<?php
include 'header.php';
?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="featured_slide">
    <div id="featured_content">
      <ul>
        <li><img src="images/demo/oha.JPG" alt="" width="385" height="422" />
            <div class="floater">
              <h2>&nbsp;</h2>
              <p>The search is on. Are you beautiful ? :: Are you Photogenic ? :: Between 17 and 25 years ? :: Do you have a beautiful face AND BODY ? :: Be part of OHAFIA BEAUTY QUEEN contest and win great prizes. REG  &#8358; 3,500 Naira only.</p>
              <p class="readmore"><a href="Register.php"> REGISTER NOW  &raquo;</a></p>
            </div>
        </li>
        <div  id="topnav">
      </ul>
    </div>
    <a href="javascript:void(0);" id="featured-item-prev"><img src="images/prev.png" alt="" /></a> <a href="javascript:void(0);" id="featured-item-next"><img src="images/next.png" alt="" /></a> </div>
  </ul>
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
</div> </div>
<!-- ####################################################################################################### -->
<div class="colm">

<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="content">
      <p>&nbsp;</p>
      <h1><strong>The Search is ON !!!! </strong></h1>
      <p><strong>:::&nbsp;&nbsp;</strong> 	Are you beautiful ?<br />
        <strong>:::&nbsp;&nbsp; </strong>Are you  Photogenic ?<br />
        <strong>:::&nbsp;&nbsp; </strong>Between 17  and 25 years ? <br />
        <strong>:::&nbsp;&nbsp; </strong>Do you have  a beautiful face AND BODY ?<br />
        <strong>&nbsp; </strong><strong>&nbsp; </strong>Come and be  part of OHAFIA BEAUTY QUEEN contest <br />
        <strong>&nbsp; </strong><strong>&nbsp; </strong>and win great prizes. REG &#8358; 3,500 only </p>
	  <img class="imgl" src="images/demo/imgl.gif" alt="" width="125" height="125" />
      <p>IT IS OHAFIA BEAUTY  QUEEN!   WINNER RECIEVES &#8358;300,000 (CASH, ONE YEAR MOVIE AND MODELING CONTRACT), 1ST PLACE Runner Up RECIEVES  &#8358;200,000 (CASH, ONE YEAR MOVIE AND MODELING CONTRACT), 3RD PLACE Runner Up  RECIEVES &#8358;100,000 PLUS ONE  YEAR MOVIE AND MODELING CONTRACT! MOST PHOTOGENIC  RECIEVES &#8358;10,000 MOST CREATIVE RECIEVES &#8358;10,000!  A GIFT FOR THE WHOLE CONTESTANTS!!!</p>
      <p>Hurry now and register. Contestant should pay the sum of  &#8358; 3,500  to the bank stated with the bank information on this website. </p>
      <div >
       <div align="center">
         <p>&nbsp;</p>
         <p><img src="images/demo/ohafia.jpg" alt="infor" width="570" height="800" /></p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         </p>
				   
       </div>
	   
     </div>
    </div>
    <div id="column">
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
  <div id="container">
    <div class="homepage">
      <ul>
	  <div>
	   <h1> &nbsp;&nbsp;&nbsp;Information Hub</h1>
	   </div>
	    <p>
	      <?php
	  include 'config.php';
	  $action = true ;
	  include 'connect.php';
	  $articleID = array();
	  $topic_of_art = array();
	  $art = array();
	  
	  $article_query = "
	  					SELECT  `articleid` ,  `Topic` ,  `article` 
						FROM  `article` 
						WHERE   `checkcontreading` = \"false\"
						ORDER BY articleid DESC 
	   ";
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
					$smallstring = substr($art[$e],0,196);
					echo '
					 <li>
					  <h2><img src="images/demo/newImage.jpg" alt="" />'.$topic_of_art[$e].'</h2>
					  <p>'.$smallstring.'...</p>
					  <p class="readmore"><a href="contreading.php?id='.$articleID[$e].'">Continue Reading &raquo;</a><br /></p>
					</li>
					
					';
				}
				
				
				
			}else{ die("Internal Error");}
	  }else{
	  }
	  ?>
	    </p>
	    <p>&nbsp;
	      
	      
	      
        </p>
      </ul>
<br class="clear" />
    </div>
  </div>
  
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
    <div class="box1">
      <h2>A Little OHAFIA BEAUTY QUEEN Information !</h2>
      <img class="imgl" src="images/demo/imgl.gif" alt="" />
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
    <p class="fl_left">Copyright &copy; 2013 - All Rights Reserved - <a href="#">OHAFIA BEAUTY QUEEN</a></p>
    <br class="clear" />
  </div>
</div>
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousel.setup.js"></script>

</body>
</html>