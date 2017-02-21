<?php session_start();
$index='<div class="shopping-cart"><span class="close">×</span><div id="data-cart">';
$alltotal=0;
for($i=1;$i<=$_SESSION['total'];$i++){
	$ptotal=$_SESSION['qty['.$i.']']*$_SESSION['price['.$i.']'];
$index.="<div id='cart_row'>";
// $index.=$_SESSION['id['.$i.']'];
// $index.="&nbsp;|&nbsp;";

$index.=$_SESSION['name['.$i.']'];
$index.="&nbsp;|&nbsp;";
$index.=$_SESSION['qty['.$i.']'];
$index.="&nbsp;|&nbsp;";
$index.=$ptotal;
$index.="</div>";
$alltotal+=$ptotal;
}

$index.='</div>
<div style="font-size: 20px; margin-top: 15px;">Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$alltotal.'</div>
<button style="font-size: 15px;
    width: 79px;
    height: 28px;
		margin-left: 20px;
    margin-right: 10px;
    background-color: #000;
    color: white;"><a href="#" style="text-decoration:none; color: white;" onclick="clear_cart();">Clear</a></button>';
$index.='<button style="font-size: 15px;
    width: 150px;
    height: 28px;
    background-color: #8b572a;
    color: white;"><a href="../public/checkout.php" style="text-decoration:none; color: white;">Checkout</a></button>';
$index.='</div>';
echo json_encode($index);
?>
