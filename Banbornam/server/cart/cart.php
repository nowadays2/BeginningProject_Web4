<?php session_start();
$check=0;
if(!isset($_SESSION['total'])) {
// echo $_SESSION['total'];
$_SESSION['total'] = 0;
}


 if(isset($_POST['add'])){
  // select * from product where id = $_GET['id']
  $product = $_POST['add'];
for($i=1;$i<=$_SESSION['total'];$i++){
if($_SESSION['id['.$i.']']==$product['id']){
$_SESSION['qty['.$i.']']++;
$check="1";
}
}
if($check=="0"){
$_SESSION['total']++;
$_SESSION['id['.$_SESSION['total'].']']=$product['id'];
$_SESSION['qty['.$_SESSION['total'].']']=$product['qty'];
$_SESSION['price['.$_SESSION['total'].']']=$product['price'];
$_SESSION['name['.$_SESSION['total'].']']=$product['name'];
}
    echo json_encode($_SESSION['total']);
} else if(isset($_POST['update'])) {
  $product = $_POST['update'];
  for($i=1;$i <= $_SESSION['total']; $i++){
    for ($j=0; $j < count($product) ; $j++) {
      if($_SESSION['id['.$i.']'] == $product[$j]['id']) {
        $_SESSION['qty['.$i.']'] = $product[$j]['qty'];
      }
    }
  }
  echo json_encode('success');
} else if (isset($_POST['delete'])) {
$n=1;
while($n<=$_SESSION['total']){
	if($_SESSION['id['.$n.']']==$_POST['delete']){
		$ccc=1;
	}elseif($ccc){
		$_SESSION['id['.($n-1).']'] = $_SESSION['id['.$n.']'];
		$_SESSION['qty['.($n-1).']'] = $_SESSION['qty['.$n.']'];
		$_SESSION['price['.($n-1).']'] = $_SESSION['price['.$n.']'];
		$_SESSION['name['.($n-1).']'] = $_SESSION['name['.$n.']'];
	}
	$n++;
}
$_SESSION['total']-=1;
  // print_r($_SESSION);
  echo json_encode('success');
// } else if (isset($_POST['send'])) {
// if ($_POST['send']=="simple") {
// $_SESSION['send_price']="30";
// $_SESSION['delivery']="simple";
//   echo json_encode('success');
// }else if ($_POST['send']=="ems") {
// $_SESSION['send_price']="50";
// $_SESSION['delivery']="ems";
//   echo json_encode('success');
// }
}
