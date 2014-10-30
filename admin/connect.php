<?php

/*
This script was downloaded at:
LightPHPScripts.com
Please support us by visiting
out website and letting people
know of it.
Produced under: LGPL
*/

/* Are we opening a connection, or closing it? */
$databaseUserName = 'ohafiabe_mvdeesx';
$databaseUserPassword = 'DIa4aO4kTazE';
$databaseHostName = 'www.ohafiabeautyqueen.com';
$databaseName = 'ohafiabe_vvetre';


$conn_err = '<p > Could not connect</p>';
$mysql_host = 'www.ohafiabeautyqueen.com';
$mysql_user = 'ohafiabe_mvdeesx';
$mysql_pass = 'DIa4aO4kTazE';
$mysql_db =  'ohafiabe_vvetre';


$conn_err = '<p > Could not connect</p>';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db =  'mbgohafia';

if(@mysql_connect($mysql_host, $mysql_user, $mysql_pass)){
	if(@mysql_select_db($mysql_db) ){
		echo '';

	}
		else{
		 die($conn_err);
		}
}
else{
 die ($conn_err);
}

?>