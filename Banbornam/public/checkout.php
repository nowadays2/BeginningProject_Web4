<?php include '../public/header.php';
include('../db/connect.php');
?>

<link rel="stylesheet" href="../public/css/checkout.css">
<div class="title_page">รายการอาหาร</div>
<div class="box_step">
	<div class="cicle_step">
			<div class="step2"><a style="color: white;
    position: relative;
    top: 15px;
    font-size: 24px;">1</a></div>
			<div class="line1"></div>
			<div class="step3"><a style="color: black;
    position: relative;
    top: 15px;
    font-size: 24px;">2</a></div>
			<div class="line3"></div>
			<div class="step4"><a style="color: black;
    position: relative;
    top: 15px;
    font-size: 24px;">3</a></div>

		</div>
			<a class="text1" style="margin-top: 6px;
    position: relative;
    right: 72%;
    top: 60px;">ตรวจสอบรายการ</a>
		<a class="text1" style=" position: absolute;
    right: 48%;
    top: 118%;">ยืนยันการซื้อ</a>

			<a class="text1" style="margin-left: 72%;">ยืนยันเวลามารับ</a>

	</div>
</div>
<div class="product_total">คุณมีสินค้า <?php echo $_SESSION['total'];?> รายการในตะกร้า</div>
<div class="box_table">

<TABLE width="60%" cellspacing="1" alight="center"  cellpadding="10" >
<TR class="tr-setting" style="border-bottom: 2px solid #000000;">
	<!-- <TD>id</TD> -->
	<TD width="10%" ></TD>
	<TD width="30%%"></TD>
	<TD width="40%%" style="text-align: -webkit-auto;"></TD>
	<TD width="20%"</TD>

</TR>

<?php $alltotal=0;
for($i=1;$i<=$_SESSION['total'];$i++){
	$price_total=$_SESSION['qty['.$i.']']*$_SESSION['price['.$i.']'];
$sql = "select shows from product where id = ".$_SESSION['id['.$i.']'];
$query = mysqli_query( $objConnect,$sql);
$result = mysqli_fetch_array($query );
?>
<div id='cart_row'>
<TR style="border-bottom: 2px solid #000000;">
	<TD><i class="fa fa-window-close close-btn" style="color: rgb(152, 0, 0);" data-id="<?= $_SESSION['id['.$i.']']; ?>"></TD>
	<TD><img src="../public/image/product/display/<?= $result['shows'];?>" width="150"></TD>
	<TD style="text-align: -webkit-auto; font-family: 'sri_sury_wongseregular'; font-size:20px;"><?= $_SESSION['name['.$i.']'];?></TD>
	<TD><input type="text" name="qty" data-id="<?= $_SESSION['id['.$i.']']; ?>" value="<?=$_SESSION['qty['.$i.']'];?>"></TD>
	<TD><?php echo $_SESSION['price['.$i.']'];?></TD>
	<TD><?php echo $price_total;?></TD>

</TR>

<?php
$alltotal+=$price_total;	}
 $_SESSION['alltotal']=$alltotal;?>
<TR>
	<TD colspan="4" style="font-size:32px; font-family:'cs_prajadbold'; margin-top:15px;">Total</TD>
	<TD></TD>
	<TD style="font-size:32px; font-family:'cs_prajadbold';"><?php echo $alltotal;?></TD>
</TR>
<div class="button_footer">
		<form action="../public/menu.php">
		<TD colspan="3"><button class="back_shop" type="submit" >เลือกซื้อสินค้า</button>
			<button class="update-test">
			update cart
			</button></TD>
		</td>
		</form>
		<TD></TD>
		<!-- <form action="../public/delivery.php"> -->
		<TD colspan="3"><a href="../public/confirm.php" class="submit_send" style="width:160%; background-color:#C35E13; border:none;">ยืนยันการซื้อ</button><td>
		<!-- </form>	 -->
</div>

</TABLE>



</div>
<?php include '../public/footer.php'; ?>
<script>



var product = [];
//
// {
// 		"id":val.id,
// 		"name":val.name,
// 		"price":val.price,
// 		"qty":'1'
// }

var input = $('input[name="qty"]');
 input.on('change', function() {
	 var _input = $(this);
	//  var key = event.keyCode || event.charCode;
	 //
	//  if( key == 8 || key == 46 || key == 13 ){
	// 	 return false;
	//  }
idx = $.map(product, function(obj, index) {
	 if(obj.id == _input.data().id) {
			 return index;
	 }
});

if(idx.length == 0) {
	product.push({id:$(this).data().id, qty: $(this).val()});
} else {
	product[idx[0]].qty = _input.val();
}

// console.log(product);
 });

 $(".update-test").on('click',function(){

        $.ajax({
          url: '../server/cart/cart.php',
          type: 'post',
          data: {'update': product},
          success: function(data, status){

            if(status == 'success'){
							window.location.reload();
            } else {
              console.log(data, status);
            }
          },
          error: function(data, status){

          }
        });
			});

$('.close-btn').on('click', function(){
	var _id = $(this).data().id;
	$.ajax({
		url: '../server/cart/cart.php',
		type: 'post',
		data: {'delete': _id},
		success: function(data, status){

			if(status == 'success'){
				window.location.reload();
			} else {
				console.log(data, status);
			}
		},
		error: function(data, status){

		}
	});
});


</script>
