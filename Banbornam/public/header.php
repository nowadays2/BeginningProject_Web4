<?php
session_start();
$urlpath =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
?>

</script>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width">
	<title>BanBornam Resturant</title>
	<link rel="stylesheet" href="../public/css/header.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php if($urlpath=="menu.php"){?>
    <script src="js/render.js"></script>
<?php }?>

<script>
function setText()
{
document.getElementById('cart-count').innerHTML = '<?php echo $_SESSION["total"];?>';
}

function clear_cart()
{  		$('.show_cart').empty();
document.getElementById('cart-count').innerHTML = ''

$.ajax({
    type: 'GET',
    url: '../public/clear.php',
    data: { get_param: 'value' },
    dataType: 'json',
    success: function (data) {
							window.location.reload();
},
});
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="setText();">
	<div class="menu">
		<div class="menu_main">
			<div class="logo"></div>
				<button class="menu_list"><a href="href="../public/menu.php"" class="active">อาหารจานเดียว</a></button>
				<button class="menu_list"><a>ประเภทสุกี้</a></button>

				<button class="menu_list3"><a> Login </a></button>
				<button class="menu_list2"><i class="fa fa-shopping-cart" style="font-size:20px; color:white;"></i> <a>&nbsp; &nbsp;&nbsp; &nbsp;<span class="cart-count" id="cart-count"></span></a>
				</button>


				<div class="show_cart"></div>
				<div class="clear"></div>
			</div>
	</div><!-- menu -->
</body>
