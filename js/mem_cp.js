$(document).ready(function(){
////////////////////////////////////////
///////////////////////////////////////
$('#go1').live('click',function(){
var x=$("#tab1").offset();
$('body,html').animate({
            scrollTop: x.top
                },
            300);

});
//////////////////////////////////////
$('.btn_dangban').live('click',function(){
	tieu_de=$('input[name=tieu_de]').val();
	gia=$('input[name=gia]').val();
	cat=$('select[name=cat]').val();
	minh_hoa=$('.list_minhhoa').html();
	if(tieu_de.length<3){
		alert('Vui lòng nhập tiêu đề tin');
	}else if(gia.length<1){
		alert('Vui lòng nhập giá giao dịch');
	}else if(minh_hoa.length<10){
		alert('Vui lòng chọn ảnh minh họa');
	}else{
	$('#submit_form').click();
}
});
///////////////////////////////////////
/*$('.menu-link').live('click',function(){
	$(this).parent().parent().find('.menu-link').removeClass('selected');
	$(this).addClass('selected');
	$(this).parent().parent().find('.sub-menu').hide();
	$(this).parent().find('.sub-menu').toggle();

});*/
///////////////////////////////////////
$('.submit_thongtin_taikhoan').live('click',function(){
	ho_ten=$('input[name=ho_ten]').val();
	email=$('input[name=email]').val();
	dia_chi=$('input[name=dia_chi]').val();
	dien_thoai=$('input[name=dien_thoai]').val();
	baokim=$('input[name=baokim]').val();
	nganluong=$('input[name=nganluong]').val();
	bank_name=$('input[name=bank_name]').val();
	bank_acount=$('input[name=bank_acount]').val();
		$.ajax({
		url:"mem_process.php?action=doi_thongtin_taikhoan&ho_ten="+ho_ten+"&email="+email+"&dia_chi="+dia_chi+"&dien_thoai="+dien_thoai+"&baokim="+baokim+"&nganluong="+nganluong+"&bank_acount="+bank_acount+"&bank_name="+bank_name,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});


});
///////////////////////////////////////
$('.submit_tenmien').live('click',function(){
	tenmien=$('input[name=tenmien]').val();
	loai_index=$('select[name=loai_index]').val();
		$.ajax({
		url:"mem_process.php?action=doi_tenmien&tenmien="+tenmien+"&loai_index="+loai_index,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});


});
///////////////////////////////////////
$('.submit_napthe').live('click',function(){
	ma_the=$('input[name=ma_the]').val();
	serial=$('input[name=serial]').val();
	mang=$('select[name=mang]').val();
	alert(ma_the);
	alert(serial);
	$('.note_thongtin').html('<img src="../contents/images/loading1.gif">');
		$.ajax({
		url:"mem_process.php?action=nap_thecao&ma_the="+ma_the+"&serial="+serial+"&mang="+mang,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});
});
///////////////////////////////////////
$('.submit_danhmuc_tenmien').live('click',function(){
	$('#submit_danhmuc_tenmien').click();

});
///////////////////////////////////////
$('.submit_rut').live('click',function(){
	sotien=$('input[name=sotien]').val();
	phuongthuc=$('select[name=phuongthuc]').val();
	$('.note_thongtin').html('<img src="../contents/images/loading1.gif">');
		$.ajax({
		url:"mem_process.php?action=rut_tien&sotien="+sotien+"&phuongthuc="+phuongthuc,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});
});
///////////////////////////////////////
$('.submit_baokim').live('click',function(){
	sotien2=$('input[name=sotien2]').val();
	sotien1=$('select[name=sotien1]').val();
	$('.note_thongtin').html('<img src="../contents/images/loading1.gif">');
		$.ajax({
		url:"mem_process.php?action=nap_baokim&sotien1="+sotien1+"&sotien2="+sotien2,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});
});
///////////////////////////////////////
$('.submit_doi_matkhau').live('click',function(){
	password=$('input[name=password]').val();
	pass_new=$('input[name=pass_new]').val();
	pass_new2=$('input[name=pass_new2]').val();
		$.ajax({
		url:"mem_process.php?action=doi_matkhau&password="+password+"&pass_new="+pass_new+"&pass_new2="+pass_new2,
		type:"post",
		success:function(kq){
			$('.note_thongtin').html(kq);

		}

	});


});
///////////////////////////////////////
$('.huy_order').live('click',function(){
	id=$(this).attr('rel');
			$.ajax({
		url:"mem_process.php?action=huy_donhang&id="+id,
		type:"post",
		success:function(kq){
			$('.status-'+id).html(kq);

		}

	});
});
///////////////////////////////////////
$('.huy_order_mua').live('click',function(){
	id=$(this).attr('rel');
			$.ajax({
		url:"mem_process.php?action=huy_donhang_mua&id="+id,
		type:"post",
		success:function(kq){
			$('.status-'+id).html(kq);

		}

	});
});
///////////////////////////////////////
$('.success-order').live('click',function(){
	id=$(this).attr('rel');
			$.ajax({
		url:"mem_process.php?action=hoanthanh_donhang&id="+id,
		type:"post",
		success:function(kq){
			$('.status-'+id).html(kq);

		}

	});
});
///////////////////////////////////////
$('.delete_product').live('click',function(){
	id=$(this).attr('rel');
			$.ajax({
		url:"mem_process.php?action=delete_product&id="+id,
		type:"post",
		success:function(kq){
			if(kq.length>3){
			$('.product_'+id).remove();
		}else{

		}

		}

	});
});
///////////////////////////////////////
$('.up_lendau').live('click',function(){
	id=$(this).attr('rel');
			$.ajax({
		url:"mem_process.php?action=up_lendau&id="+id,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});
});
///////////////////////////////////////
$('.del_anh_sanpham').live('click',function(){
	id=$(this).attr('value');
			$.ajax({
		url:"mem_process.php?action=del_anh_sanpham&id="+id,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});
});
///////////////////////////////////////
$('.product_name').live('keyup',function(){
	value=$(this).val();
	sanpham=$(this).attr("sanpham");
			$.ajax({
		url:"mem_process.php?action=edit_tieude&sanpham="+sanpham+"&value="+value,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});
});
///////////////////////////////////////
$('.product_price').live('keyup',function(){
	value=$(this).val();
	sanpham=$(this).attr("sanpham");
			$.ajax({
		url:"mem_process.php?action=edit_gia&sanpham="+sanpham+"&value="+value,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});
});
///////////////////////////////////////
$('.take-photo').live('click',function(){
	value=$(this).attr("value");
	$('input[name=sanpham_edit]').val(value);
	$('#select_file').click();

});

///////////////////////////////////////
$('input.check_all').live('click',function(){
value=$(this).attr("value");
if(value=="false"){
	$('.checkbox').prop("checked",true);
	$(this).val('true');
}else{
	$('.checkbox').prop("checked",false);
	$(this).val('false');

}
});
///////////////////////////////////////
$('#delete_multi').live('click',function(){
	$('#form_all').attr("action","mem_process.php?action=xoa_nhieu_sanpham");
	$('#submit_all').click();

});
///////////////////////////////////////
$('#batch_up_product').live('click',function(){
	$('#form_all').attr("action","mem_process.php?action=up_nhieu_sanpham");
	$('#submit_all').click();

});
///////////////////////////////////////
$('.check_sanpham_tenmien').live('click',function(){
	chon=$(this).attr("chon");
	value=$(this).val();
	if(chon=="0"){
		$(this).attr("chon","1");

	}else{
		$(this).attr("chon","0");
	}
	$.ajax({
		url:"mem_process.php?action=sanpham_tenmien&sanpham="+value+"&chon="+chon,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});

});
///////////////////////////////////////
$('.check_hot_tenmien').live('click',function(){
	chon=$(this).attr("chon");
	value=$(this).val();
	if(chon=="0"){
		$(this).attr("chon","1");

	}else{
		$(this).attr("chon","0");
	}
	$.ajax({
		url:"mem_process.php?action=hot_tenmien&sanpham="+value+"&chon="+chon,
		type:"post",
		success:function(kq){
			$('.load_ajax').html(kq);

		}

	});

});
///////////////////////////////////////















////////////////////////////////////////

});