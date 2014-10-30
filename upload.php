<?php
  $name = $_FILES['filee']['name'];
  
  
  $extention = strtolower(substr($name,strpos($name,'.') + 1 ));
// echo "<br />";
  $size = $_FILES['filee']['size'];
  $max_size = 2536000;

  //echo "<br /> max size upload = 1.5MBkb ";
$type = $_FILES['filee']['type'];
  //echo "<br />";
  $tmp_name = $_FILES['filee']['tmp_name'];
 //echo $error = $_FILES['file']['error'];
 
 if(isset($name)){
		 if (!empty($name))
				{
					if(( $extention=='jpg'|| $extention=='jpeg' )&& 
						 ($type == 'image/jpeg' || $type == 'image/jpg' ))
							{
									 if (!($size > $max_size))
									 {
											
											
											
											$location = 'uploads/'.$name;
											 move_uploaded_file($tmp_name,$location);
											 
											 //-- Thumbnail version --
											 $the_image_size = getimagesize($location);
											 $image_width  = $the_image_size[0];
											 $image_height = $the_image_size[1];
											 
											 $new_size = ($image_width + $image_height) / ($image_width * ($image_height/154));
											 $new_width = $image_width * $new_size; 
											 $new_height = $image_height * $new_size; 
											 
											 $new_image = imagecreatetruecolor($new_width , $new_height);
											 $old_image = imagecreatefromjpeg($location);
											 
											 imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
											 imagejpeg($new_image,'thumb'.$name);
											 rename('thumb'.$name ,'thumb/'.$name);
											 
											 // --- force resolution 360px x 269px----
											 $the_image_size = getimagesize('thumb/'.$name);
											 $image_width2  = $the_image_size[0];
											 $image_height2 = $the_image_size[1];
											 
											 $new_image2 = imagecreatetruecolor(360 , 269);
											 $old_image2 = imagecreatefromjpeg('thumb/'.$name);
											 imagecopyresized($new_image2,$old_image2,0,0,0,0,360,269,$image_width2,$image_height2);
											 imagejpeg($new_image2,'thumb'.$name);
											 rename('thumb'.$name ,'thumb/'.$name);
											 
											 $part = "$location";
											 //echo '  Uploaded';
									 }
									 else{ echo 'File too large.';} 
							}
					else{ echo "$type file is not a valid image";} 		
				 }
		 
		 else{ echo 'Please choose a file';} 
 }
 
?>


<form action="upload.php" method ="POST" enctype="multipart/form-data">
	<input type="file" name="filee"><br /><br /></input>
	<input type="submit" value="Submit"> </input>
	<input type="hidden"  name = "MAX_FILE_SIZE"  value="2097152">
</form>