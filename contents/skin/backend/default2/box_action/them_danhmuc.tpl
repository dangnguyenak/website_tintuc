<h1 class="bolder center">THÊM DANH MỤC</h1>
<div class="row" style="padding-left: 250px">
    <div id='thongbao_post'></div>

    <form action='cpanel_process.php?action=them_danhmuc' enctype="multipart/form-data" method="post">

        <div class="li">

            <div class="tieu_de">Tiêu đề</div>

            <div class="noi_dung"><input name='tieu_de' value="" type="text" placeholder="Nhập tiêu đề"></div>

        </div>

        <div class="li">

            <div class="tieu_de">Thứ tự</div>

            <div class="noi_dung"><input name='thu_tu' value="" type="text"></div>

        </div>

        <div class="li">

            <div class="tieu_de">nhóm</div>

            <div class="noi_dung">

                <select name="nhom">
                    <option value="3">Tin tức</option>
                    <option value="0">Radio</option>
                    <option value="1">Truyện ngắn</option>
                    <option value="2">Sống trẻ</option>

                </select>

            </div>

        </div>

        <input type="hidden" name="id" value="{id}">
        <button type="submit" class="btn btn-primary">Hoàn thành</button>
        <button type="reset" class="btn">Nhập lại</button>
    </form>

</div>