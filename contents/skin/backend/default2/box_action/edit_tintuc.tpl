<script type="text/javascript" charset="utf-8" src="../contents/js/lib/ckeditor/ckeditor.js"></script>
<h1 class="bolder center">Sửa tin tức</h1>
<div class="row" style="padding-left: 250px">
    <div id='thongbao_post'></div>
    <form action='cpanel_process.php?action=edit_tintuc' enctype="multipart/form-data" method="post">
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
            <div class="noi_dung"><input name='tieu_de' value="{tieu_de}" type="text" placeholder="Nhập tiêu đề">
            </div>
        </div>
        <div class="li">
            <div class="tieu_de">Minh họa</div>
            <div class="noi_dung"><input name='minh_hoa' value="" type="file" placeholder="Nhập tiêu đề"></div>
        </div>
        <div class="li">
            <div class="tieu_de">Nội dung</div>
            <div class="noi_dung"><textarea name='noi_dung' id='ckeditor' class="ckeditor">{noi_dung}</textarea>
            </div>
        </div>

        <input type="hidden" name="id" value="{id}">
        <button type="submit" class="btn btn-primary">Hoàn thành</button>
        <button type="reset" class="btn">Nhập lại</button>
    </form>
</div>