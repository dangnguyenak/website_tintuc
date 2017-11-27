$(document).ready(function(){
////////////////////////////////////////

$('.buy_view').live('click',function(){
value=$('input[name=so_luong]').val();
sanpham=$('input[name=sanpham]').val();
shop=$('input[name=shop]').val();
$.ajax({
	url:"shop_process.php?action=add_cart&sanpham="+sanpham+"&so_luong="+value,
	type:"post",
	success:function(kq){
		window.location=shop+'/gio-hang.html';
	}

});
});
///////////////////////////////////////
$('.buy_index').live('click',function(){
value=$('input[name=so_luong]').val();
sanpham=$(this).attr("value");
shop=$('input[name=shop]').val();
$.ajax({
	url:"shop_process.php?action=add_cart&sanpham="+sanpham+"&so_luong="+value,
	type:"post",
	success:function(kq){
		window.location=shop+'/gio-hang.html';
	}

});
});
///////////////////////////////////////
$('#go1').live('click',function(){
var x=$("#tab1").offset();
$('body,html').animate({
            scrollTop: x.top
                },
            300);

});
///////////////////////////////////////
$('#go2').live('click',function(){
var x=$("#tab2").offset();
$('body,html').animate({
            scrollTop: x.top
                },
            300);

});
///////////////////////////////////////
$('#go3').live('click',function(){
var x=$("#tab3").offset();
$('body,html').animate({
            scrollTop: x.top
                },
            300);

});
///////////////////////////////////////
$('#go4').live('click',function(){
var x=$("#tab4").offset();
$('body,html').animate({
            scrollTop: x.top
                },
            300);

});
///////////////////////////////////////
$('.top').live('click',function(){
$('body,html').animate({
            scrollTop: 0
                },
            300);

});
///////////////////////////////////////
$('.big-buy-now').live('click',function(){
	value=$(this).attr("value");
	$.ajax({
		url:"shop_process.php?action=buy_now&sanpham="+value,
		type:"post",
		success: function(kq){
			window.location='./muahang/index.php?action=step1';
		}

	});

});
///////////////////////////////////////
$('.big-add-more').live('click',function(){
	value=$(this).attr("value");
	$.ajax({
		url:"shop_process.php?action=add_cart&sanpham="+value+"&so_luong=1",
		type:"post",
		success: function(kq){
			$('.load_ajax').html(kq);
			
		}

	});

});
///////////////////////////////////////
$('.phongto').live('hover',function(){
	link=$(this).attr("src");
	$('.img_max').attr("src",link);

});
////////////////////////////////////////
$('input[name=so_luong]').live('keyup',function(){
value=$(this).val();
sanpham=$('.big-add-more').attr("value");
	$.ajax({
		url:"shop_process.php?action=up_soluong&sanpham="+sanpham+"&so_luong="+value,
		type:"post",
		success: function(kq){
			$('.load_ajax').html(kq);
			
		}

	});

});
///////////////////////////////////////
$('.amount a.add-icon').live('click',function(){
	so_luong=$(this).parent().find('input[name=so_luong]').val();
	so_luong++;
	sanpham=$(this).attr("value");
	shop=$(this).attr("shop");
	$(this).parent().find('input[name=so_luong]').val(so_luong)
		$.ajax({
		url:"../shop_process.php?action=update_soluong_giohang&sanpham="+sanpham+"&so_luong="+so_luong+"&shop="+shop,
		type:"post",
		success: function(kq){
			$('.load_ajax_mua').html(kq);
			
		}

	});

});
////////////////////////////////////////
///////////////////////////////////////
$('.amount a.subtr-icon').live('click',function(){
	so_luong=$(this).parent().find('input[name=so_luong]').val();
	so_luong--;
	sanpham=$(this).attr("value");
	shop=$(this).attr("shop");
	if(so_luong<2){
	so_luong=1;
	$(this).parent().find('input[name=so_luong]').val('1');
	}else{
	$(this).parent().find('input[name=so_luong]').val(so_luong);
}
		$.ajax({
		url:"../shop_process.php?action=update_soluong_giohang&sanpham="+sanpham+"&so_luong="+so_luong+"&shop="+shop,
		type:"post",
		success: function(kq){
			$('.load_ajax_mua').html(kq);
			
		}

	});


});
///////////////////////////////////////
$('.remove-product').live('click',function(){
	sanpham=$(this).attr("value");
	shop=$(this).attr("shop");
		$.ajax({
		url:"../shop_process.php?action=xoa_giohang&sanpham="+sanpham+"&shop="+shop,
		type:"post",
		success: function(kq){
			$('.load_ajax_mua').html(kq);
			
		}

	});

})
///////////////////////////////////////
$('#button_payment').live('click',function(){
	ho_ten=$('input[name=ho_ten]').val();
	email=$('input[name=email]').val();
	dien_thoai=$('input[name=dien_thoai]').val();
	dia_chi=$('input[name=dia_chi]').val();
	shop=$('input[name=shop]').val();
	nguoi_mua=$('input[name=nguoi_mua]').val();
	ghi_chu=$('textarea[name=ghi_chu]').val();
	$.ajax({
		url:"../process.php?action=dat_hang&shop="+shop+"&ho_ten="+ho_ten+"&email="+email+"&dien_thoai="+dien_thoai+"&dia_chi="+dia_chi+"&ghi_chu="+ghi_chu+"&nguoi_mua="+nguoi_mua,
		type:"post",
		success: function(kq){
			$('.load_ajax_mua').html(kq);
			
		}

	});


});

///////////////////////////////////////


///////////////////////////////////////















////////////////////////////////////////

});