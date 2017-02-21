<?php session_start();
header('Content-Type: application/json');
include('../../db/connect.php');
if(isset($_GET['product_cat'])){
$sql = "select id,name,price,detail,shows from product where category_prduct_id = 1 order by id asc";
} else {

  $sql = "select id,name,price,shows from product order by id asc";
}

$query = mysqli_query( $objConnect,$sql);

while($result = mysqli_fetch_array($query )){
    $product[] = array(
        "id" => $result['id'],
        "name" => $result['name'],
        "price" => $result['price'],
        "detail" => $result['detail'],
        "shows" => $result['shows'],
    );
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if(isset($_GET['id'])){
  // select * from product where id = $_GET['id']
  echo json_encode($product[$_GET['id']-1]);
} else {
  // select * from product limit = 10
  echo json_encode($product);
}

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // insert name , price in product

}
