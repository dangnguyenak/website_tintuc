<h1 class="bolder center">SỬA DANH MỤC</h1>

<div class="row" style="padding-left: 250px">

    <div id='thongbao_post'></div>

    <form action='cpanel_process.php?action=edit_danhmuc' enctype="multipart/form-data" method="post">

        <div class="li">

            <div class="tieu_de">Tiêu đề</div>

            <div class="noi_dung"><input name='tieu_de' value="{tieu_de}" type="text" placeholder="Nhập tiêu đề">
            </div>

        </div>

        <div class="li">

            <div class="tieu_de">Nhóm</div>

            <div class="noi_dung"><select name="nhom">{option_nhom}</select></div>

        </div>
        <div class="li">

            <div class="tieu_de">Thứ tự</div>

            <div class="noi_dung"><input name='thu_tu' value="{thu_tu}" type="text"></div>

        </div>
        <input type="hidden" name="id" value="{id}">
        <button type="submit" class="btn btn-primary">Hoàn thành</button>
        <button type="reset" class="btn">Nhập lại</button>
    </form>

</div>