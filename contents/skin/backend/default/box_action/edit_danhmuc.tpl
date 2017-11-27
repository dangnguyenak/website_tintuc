<script type="text/javascript">
    $('.reset').live('click', function () {
        $("#reset_form").trigger('click');
    });
    $('.hoanthanh').live('click', function () {
        $("#submit_form").trigger('click');
    });
</script>
<div class="right_content">
    <h2>SỬA DANH MỤC</h2>
    <div class="khung_post">
        <div id='thongbao_post'></div>
        <form action='cpanel_process.php?action=edit_danhmuc' enctype="multipart/form-data" method="post">
            <div class="li">
                <div class="tieu_de">Tiêu đề</div>
                <div class="noi_dung">
                    <input name='tieu_de' value="{tieu_de}" type="text" placeholder="Nhập tiêu đề" required/>
                </div>
            </div>
            <div class="li">
                <div class="tieu_de">Nhóm</div>
                <div class="noi_dung"><select name="nhom">{option_nhom}</select></div>
            </div>
            <div class="li">
                <div class="tieu_de">Thứ tự</div>
                <div class="noi_dung"><input required name='thu_tu' value="{thu_tu}" type="text"></div>
            </div>
    </div>

    <input type="hidden" name="id" value="{id}">
    <input type="submit" value="hoàn thành" style="display:none;" id="submit_form">
    <input type="reset" value="Nhập lại" style="display:none;" id="reset_form">
    <a href="javascript:;" class="bt_green hoanthanh">
        <span class="bt_green_lft"></span><strong>Hoàn Thành</strong><span class="bt_green_r"></span>
    </a>
    <a href="javascript:;" class="bt_red reset">
        <span class="bt_red_lft"></span><strong>Nhập Lại</strong><span class="bt_red_r"></span>
    </a>
    </form>
</div><!-- end of right content-->