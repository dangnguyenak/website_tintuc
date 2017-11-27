<script type="text/javascript" charset="utf-8" src="../contents/js/lib/ckeditor/ckeditor.js"></script>
<h1 class="bolder center">Thêm tin tức</h1>
<div class="row" style="padding-left: 250px">
    <form action="cpanel_process.php?action=add_tintuc" enctype="multipart/form-data" method="post">
        <div class="li">
            <div class="form-group">Thể loại:
                <select class="" required name="loai">
                    {list_danhmuc}
                </select>
            </div>
        </div>
        <div class="li">
            <div class="form-group">Tiêu đề:
                <input name='tieu_de' value="" type="text" placeholder="Nhập tiêu đề" required></div>
        </div>
        <div class="li">
            <div class="form-group">Minh họa: <input required name='minh_hoa' value="" type="file" placeholder="Nhập tiêu đề">
            </div>
        </div>
        <div class="li">
            <div class="tieu_de">Nội dung:</div>
            <div class="noi_dung">
                <textarea name="noi_dung" id="ckeditor" class="ckeditor" required></textarea>
            </div>
        </div>
        <input type="hidden" name="name" value="{name}">
        <button class="btn btn-primary" id="submit_form">Hoàn thành</button>
        <button class="btn" type="reset">Nhập lại</button>
    </form>
</div>