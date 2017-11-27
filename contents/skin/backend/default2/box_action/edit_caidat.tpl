<script type="text/javascript" charset="utf-8" src="../contents/js/lib/ckeditor/ckeditor.js"></script>
<h1 class="bolder center">SỬA CÀI ĐẶT</h1>
<div class="row" style="padding-left: 250px">
    <div id='thongbao_post'></div>
    <form action='cpanel_process.php?action=edit_caidat' enctype="multipart/form-data" method="post">
        <div class="li">
            <div class="tieu_de">NAME</div>
            <div class="noi_dung">{name}</div>
        </div>
        <div class="li">
            <div class="tieu_de">VALUA</div>
            <div class="noi_dung"><textarea name='value' id='ckeditor' class="ckeditor">{value}</textarea></div>
        </div>
        <input type="hidden" name="name" value="{name}">
        <button type="submit" class="btn btn-primary">Hoàn thành</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>
</div>