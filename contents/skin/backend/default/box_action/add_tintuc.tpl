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
    <h2>Thêm tin tức</h2>
    <div class="khung_post">
        <div id='thongbao_post'></div>
        <form action='cpanel_process.php?action=add_tintuc' enctype="multipart/form-data" method="post">
            <div class="li">
                <div class="tieu_de">Thể loại</div>
                <div class="noi_dung">
                    <select name="loai">
                        {list_danhmuc}
                    </select>
                </div>
            </div>
            <div class="li">
                <div class="tieu_de">Tiêu đề</div>
                <div class="noi_dung"><input name='tieu_de' value="" type="text" placeholder="Nhập tiêu đề" required>
                </div>
            </div>
            <div class="li">
                <div class="tieu_de">Minh họa</div>
                <div class="noi_dung"><input name='minh_hoa' value="" type="file" placeholder=""></div>
            </div>
            <div class="li">
                <div class="tieu_de">Nội dung</div>
                <div class="noi_dung"><textarea name='noi_dung' id='ckeditor' class="ckeditor" required></textarea>
                </div>
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