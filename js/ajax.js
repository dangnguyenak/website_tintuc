$(document).ready(function(){
//////////////// Đóng overlay ////////////////////
$(window).scroll(function(){
    if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
        page=$('#infscr-loading').attr("page");
        cat=$('#infscr-loading').attr("cat");
        limit=$('#infscr-loading').attr("limit");
        if(page==0){
        $('#infscr-loading').css("display","none");
        }else{
        page++;
        $('#infscr-loading').attr("page",page);
        $('#infscr-loading').css("display","block"); 
        $.ajax({
            url:"process.php?action=load_baiviet&cat="+cat+"&page="+page+"&limit="+limit,
            type:"post",
            success: function(kq){
                if(kq==0){
                    $('.thongbao_load').html('<em>Không có bài viết nào tiếp theo.</em>');
                    $('#infscr-loading').attr("page","0");
                    setInterval(function(){
                    $('#infscr-loading').css("display","none");
                    },5000);
                }else{
                    $('#nav-below').before(kq);
                }

            }

        });
        }
        }else{
        $('#infscr-loading').css("display","none");
        }
});


////////////////////////////////////////////////

////////////////////////////////////////////////

////////////////////////////////////////////////
});