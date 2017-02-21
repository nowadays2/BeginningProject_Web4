<?php session_start();

$username=$_POST['username1'];
$password=$_POST['password1'];
@$_SESSION['name']=$_POST['name1'];
@$_SESSION['lastname']=$_POST['lastname1'];
@$_SESSION['email']=$_POST['email1'];
@$_SESSION['tel']=$_POST['tel1'];
@$_SESSION['address']=$_POST['address1'];
@$_SESSION['provice']=$_POST['provice1'];
@$_SESSION['zipcode']=$_POST['zipcode1'];

include('../db/connect.php');
$sql_check = "select id from user where username='$username'";
$query_check = mysqli_query( $objConnect,$sql_check);
$result_check = mysqli_num_rows($query_check );

if($result_check=='0'){

$sql = "insert into user(username,password,name,lastname,address,provice,zipcode,tel,email) values ('$username','$password','$_POST[name1]','$_POST[lastname1]','$_POST[address1]','$_POST[provice1]','$_POST[zipcode1]','$_POST[tel1]','$_POST[email1]')";
$query = mysqli_query( $objConnect,$sql);

$sql_login = "select id from user where username='$username' and password='$password' ";
$query_login = mysqli_query( $objConnect,$sql_login);
$result_login = mysqli_fetch_array($query_login );
$_SESSION['user_login']=$result_login["id"];
echo "Successfully Register...";
}else{
echo "!!! Username Already Used";

}

?>