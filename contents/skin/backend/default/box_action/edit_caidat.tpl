<script type="text/javascript" charset="utf-8" src="../contents/js/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $('.reset').live('click', function () {
        $("#reset_form").trigger('click');
    });
    /////////////////////////////////////////////////////
    $('.hoanthanh').live('click', function () {
        $("#submit_form").trigger('click');
    });
</script>
<div class="right_content">
    <h2>SỬA CÀI ĐẶT</h2>
    <div class="khung_post">
        <div id='thongbao_post'></div>
        <form action='cpanel_process.php?action=edit_caidat' enctype="multipart/form-data" method="post">
            <div class="li">
                <div class="tieu_de">NAME</div>
                <div class="noi_dung"><b>{name}</b></div>
            </div>
            <div class="li">
                <div class="tieu_de">VALUE</div>
                <div class="noi_dung"><textarea name='value' id='ckeditor' class="ckeditor">{value}</textarea></div>
            </div>
    </div>
    <input type="hidden" name="name" value="{name}">
    <input type="submit" value="hoàn thành" style="display:none;" id="submit_form">
    <input type="reset" value="Nhập lại" style="display:none;" id="reset_form">
    <a href="javascript:;" class="bt_green hoanthanh"><span class="bt_green_lft"></span><strong>Hoàn Thành</strong><span
                class="bt_green_r"></span></a>
    <a href="javascript:;" class="bt_red reset"><span class="bt_red_lft"></span><strong>Nhập Lại</strong><span
                class="bt_red_r"></span></a>
    </form>
</div><!-- end of right content-->