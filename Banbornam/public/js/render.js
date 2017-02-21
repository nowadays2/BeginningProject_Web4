$(function(){

    $.get( "../server/product/product.php?product_cat=1", function( product ) {
      console.log(product);
      product.forEach(function(val){
        $('#app').append('<div class="card_pro"><div class="price_pro"><a class="price" style="font-size:36px;">'+val.price+'.-</a></div><div class="display"><img src ="../public/image/product/display/'+val.shows+'"></div><div class="title_name"><a> '+val.name+'</a><div class="detail_pro">'+val.detail+'</div><div class="button_shop"><button class="cart" data-id="'+val.id+'" data-name="'+val.name+'" data-price="'+val.price+'" style="width=40%;background-color: #C35E13;">หยิบใส่ตะกร้า</button></div></div>');
      });



  	$(".cart").on('click',function(){
        var val = $(this).data();
		//alert('add cart id'+val.id+' name '+val.name+'price'+val.price);
        //stringifty คือการปั้น json
		var _product =
                {
                    "id":val.id,
                    "name":val.name,
                    "price":val.price,
						        "qty":'1'
                }
        $.ajax({
          url: '../server/cart/cart.php',
          type: 'post',
          data: {'add': _product},
          success: function(data, status){

            if(status == 'success'){
            $('.cart-count').text(data);
            var qty = JSON.parse(data);
            var amount = 0;
            $.each(qty, function(k,v){
            amount += v;
            });
              //console.log(amount);
            } else {
              console.log(data, status);
            }
          },
          error: function(data, status){

          }
        });

	});

});


    $('.menu_list2').on('click', function(){
    $.ajax({
    type: 'GET',
    url: 'show_cart_data.php',
    data: { get_param: 'value' },
    dataType: 'json',
    success: function (data) {
            $('.show_cart').html(data);
			show_cart_close();
    }
});

});

function show_cart_close() {
	$('.close').on('click', function(){
  		$('.show_cart').empty();
  	})
}

function model_detail (data){
  var model = '<div class="modal"><div class="modal-content"><span class="close">×</span><a>'+data.name+ '</a><div class="catagory"><button class="cata_otop"><a>หยิบใส่ตะกร้า</a></button></div></div></div>'

  return model;
}

function modal_close() {
	$('.close').on('click', function(){
  		$('.modal').remove();
  	})
}
});
