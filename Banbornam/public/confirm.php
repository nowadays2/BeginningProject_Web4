<?php include '../public/header.php'; ?>
<link rel="stylesheet" href="../public/css/delivery.css">
<div class="title_page">การจัดส่ง</div>
<div class="box_step">
	<div class="cicle_step">
		<div class="step1"><a>4</a></div>
				<div class="step2"><a>1</a></div>
				<div class="line1"></div>
				<div class="step3"><a style="color:white;">2</a></div>
				<div class="line3"></div>
				<div class="step4"><a>3</a></div>
				<div class="line2"></div>
			</div>
				<a class="text1">ตะกร้าสินค้า</a>
				<a class="text1" style="margin-left:19%; ">การจัดส่ง</a>
				<a class="text1" style="margin-left:22%;">ชำระเงิน</a>
				<a class="text1" style="margin-left:19%;">เสร็จเรียบร้อย</a>
</div>
<div class="product_total">กรุณากรอกข้อมูลในการจัดส่งสินค้า</div>
<div class="section2">
	<div class="box_address">
		<button class="btn_ex-address" onclick="location.href='../public/address_db.php';">ใช้ที่อยู่เดิม</button><br>
		<p>หรือ</p>
		<?php if(@$_SESSION['user_login']!=""){?>
<form action="../public/payment.php" method="post" name="address_form">
<?php }?><input type="text" name="name" id="name" class="input_address" placeholder="ชื่อ" value="<?php echo@$_SESSION['name'];?>">
		<input type="text" name="lastname" id="lastname" class="input_address" placeholder="นามสกุล" value="<?php echo@$_SESSION['lastname'];?>">
		<input type="text" name="email" id="email" class="input_address" placeholder="E-mail"  value="<?php echo@$_SESSION['email'];?>">
		<input maxlength="10" type="text" name="tel" id="tel" class="input_address" placeholder="เบอร์โทร" value="<?php echo@$_SESSION['tel'];?>">
		<input type="text" name="address" id="address" class="input_address" placeholder="ที่อยู่" style="width: 98%;"  value="<?php echo@$_SESSION['address'];?>">
		<input type="text" name="provice" id="provice" class="input_address" placeholder="จังหวัด" style="width: 60%;"  value="<?php echo@$_SESSION['provice'];?>">
		<input maxlength="5" type="text" name="zipcode" id="zipcode" class="input_address" placeholder="รหัสไปรษณีย์" style="width: 35%;"  value="<?php echo@$_SESSION['zipcode'];?>">
			<input type="button"  class="btn_back-checkout" onclick="location.href='../public/checkout.php';"  value="ตะกร้าสินค้า" />
	</div>

	<div class="box_delivery">
		<TABLE width="100%" cellspacing="1" alight="center" bgcolor="#FAFAFA" cellpadding="4" >
			<TR bgcolor="#EAEAEA"style="margin-bottom:20px;">
				<TD width="10%" ></TD>
				<TD width="20%" >ราคา</TD>
				<TD width="40%" >รูปแบบ</TD>
				<TD width="35%" >วัน</TD>
			</TR>

			<TR style="border-bottom: 2px solid #000000;">
				<TD><input type="radio" name="delivery" value="simple" class="simple-send" data-id="simple" <?php if(@$_SESSION["delivery"]=="simple")echo"checked";?>></TD>
				<TD>30.-</TD>
				<TD>ลงทะเบียน</TD>
				<TD>4-7 วััน</TD>
			</TR>

			<TR style="border-bottom: 2px solid #000000;">
				<TD><input type="radio" name="delivery" value="ems" class="ems-send"  data-id="ems" <?php if(@$_SESSION["delivery"]=="ems")echo"checked";?>> </TD>
				<TD>50.-</TD>
				<TD>EMS</TD>
				<TD>1-2 วัน</TD>
			</TR>
		</table>

			<TABLE class="total_derively" width="100%" cellspacing="1" alight="center" bgcolor="#FAFAFA" cellpadding="4" style="
    margin-top: 14%;" >
			<TR bgcolor="#EAEAEA"style="margin-bottom:20px;">
				<TD width="20%" >สินค้า</TD>
				<TD width="5%" ></TD>
				<TD width="20%" >จัดส่ง</TD>
				<TD width="10%" ></TD>
				<TD width="30%" >ทั้งหมด</TD>
			</TR>

			<TR style="border-bottom: 2px solid #000000;">

				<TD><?php echo @$_SESSION['alltotal'];?></TD>
				<TD style="font-size:18px;">+</TD>
				<TD><?php echo @$_SESSION['send_price'];?></TD>
				<TD>=</TD>
				<TD><?php echo @$_SESSION['alltotal']+@$_SESSION['send_price'];?></TD>
			</TR>
		</table>
		<?php if(@$_SESSION['user_login']!=""){?>
User id:<?php echo$_SESSION['user_login'];?>
<?php } ?>
		<?php if(@$_SESSION['user_login']!=""){?>
<button class="btn_payment" type="submit">ชำระเงิน</button>
		</form>
<?php }else{ ?>
			<button class="btn_payment">ชำระเงิน</button>
<?php } ?>
		<div id="pop_login"></div>

	</div>
</div>

<div class="hide-display" style="display:none;">
  <div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link">Login</a>
      <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login" style="margin-right:auto; margin-left:auto;">
      <a href="#">
        <i class="fa fa-facebook fa-lg"></i>
        Login in with facebook
      </a>

    </div>
    <form class="email-login">
      <div class="u-form-group">
        <input type="text" placeholder="Username" id="l_username"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Password" id="l_password"/>
      </div>
      <div class="u-form-group">

        	<button id="login" value="Log in">

      </div>
      <div class="u-form-group">
				<a href="#" class="forgot-password">Forgot password?</a>
      </div>
    </form>


    <form class="email-signup" method="post" action="#">
      <div class="u-form-group">
        <input type="text" placeholder="Username" id="username"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Password" id="password"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Confirm Password" id="cpassword"/>
      </div>
      <div class="u-form-group">
        	<button id="register" value="Sign Up"></button>
      </div>
    </form>
  </div>

	<script>
	$(".email-signup").hide();
	$("#signup-box-link").click(function(){
		$(".email-login").fadeOut(100);
		$(".email-signup").delay(100).fadeIn(100);
		$("#login-box-link").removeClass("active");
		$("#signup-box-link").addClass("active");
	});
	$("#login-box-link").click(function(){
		$(".email-login").delay(100).fadeIn(100);;
		$(".email-signup").fadeOut(100);
		$("#login-box-link").addClass("active");
		$("#signup-box-link").removeClass("active");
});
		$('.btn_payment').on('click', function(){
 		$('.hide-display').show();
	});
	</script>

</div>
<script>
 $(".simple-send").on('click',function(){
	var _id = $(this).data().id;
        $.ajax({
          url: '../server/cart/cart.php',
          type: 'post',
          data: {'send': _id},
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

$('.ems-send').on('click', function(){
	var _id = $(this).data().id;
	$.ajax({
		url: '../server/cart/cart.php',
		type: 'post',
          data: {'send': _id},
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



$(document).ready(function() {
$("#register").on('click',function() {
var username = $("#username").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
var name = $("#name").val();
var lastname = $("#lastname").val();
var email = $("#email").val();
var tel = $("#tel").val();
var address = $("#address").val();
var provice = $("#provice").val();
var zipcode = $("#zipcode").val();
if (username == '' || password == '' || cpassword == '') {
alert("Please fill all fields...!!!!!!");
return false;
} else if ((password.length) < 4) {
alert("Password should atleast 4 character in length...!!!!!!");
return false;
} else if (!(password).match(cpassword)) {
alert("Your passwords don't match. Try again?");
return false;
} else {
$.post("register.php", {username1: username,password1: password,name1: name,lastname1: lastname,email1: email,tel1: tel,address1: address,provice1: provice,zipcode1: zipcode}, function(data) {
				alert(data);
				//window.location.reload();
});
}
});

$("#login").on('click',function(){
var l_username = $("#l_username").val();
var l_password = $("#l_password").val();
var name = $("#name").val();
var lastname = $("#lastname").val();
var email = $("#email").val();
var tel = $("#tel").val();
var address = $("#address").val();
var provice = $("#provice").val();
var zipcode = $("#zipcode").val();
// Checking for blank fields.
if( l_username =='' || l_password ==''){
alert("Please fill all fields...!!!!!!");
}else {
$.post("login.php",{ l_username1: l_username, l_password1:l_password,name1: name,
lastname1: lastname,
email1: email,
tel1: tel,
address1: address,
provice1: provice,
zipcode1: zipcode
},
function(data) {
				alert(data);
				window.location.reload();
});
}
});

});
</script>
