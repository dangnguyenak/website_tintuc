$(document).ready(function(){
//////////////// Đóng overlay ////////////////////
//////////////////
$('.logout').click(function(){
	$.ajax({
		url:"process.php?action=logout",
		type:"post",
		success:function(kq){
			location.reload(); 
		}

	});

});
//////////////////////////
$('#submit_thongtin').click(function(){
    ho_ten=$('input[name=nickname]').val();
	$.ajax({
		url:"process.php?action=update_thongtin&ho_ten="+ho_ten,
		type:"post",
		success:function(kq){
			location.reload(); 
		}

	});
});
/////////////////////////////////////////////////
$('input[name=submit_post]').click(function(){
	$('input[name=hoanthanh_post]').click();

});
////////////////////////////////////////////////
});