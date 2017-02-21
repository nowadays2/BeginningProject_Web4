<?php session_start();
for($i=1;$i<=$_SESSION['total'];$i++){
unset($_SESSION['id['.$i.']'],$_SESSION['name['.$i.']'],$_SESSION['qty['.$i.']'],$_SESSION['price['.$i.']']);
} 
unset($_SESSION['total'],$_SESSION['alltotal'],$_SESSION['delivery'],$_SESSION['send_price']);
?>