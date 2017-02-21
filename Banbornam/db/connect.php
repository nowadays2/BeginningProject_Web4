
<?php

$connect ="localhost";
	$db_user ="root";
	$db_password="";
	$db_select="Banbornam";


	$objConnect = mysqli_connect($connect,$db_user,$db_password,$db_select);
	if (!$objConnect) {

		echo "db error";
	}
$objConnect->set_charset("utf8");


?>
