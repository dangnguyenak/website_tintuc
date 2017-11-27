<div class="main-content">
    <h1 class="bolder center">DANH SÁCH TIN TỨC</h1>
    <table id="simple-table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="center">ID</th>
            <th class="detail-col">Thumbnail</th>
            <th>Tiêu đề</th>
            <th>Tình trạng duyệt</th>
            <th>Hot</th>
            <th>Lượt xem</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody id="list-tintuc">

        {list_baiviet}

        </tbody>
    </table>
    <div class="phantrang">

        <div class="back disabled"><< prev</div>

        <div class="go_page">
            <input type="text" id="page_next" action="next_page_tintuc" onkeypress="return check_number(event);"
                   value="1" placeholder="Nhập số trang">
        </div>

        <div class="next">next >></div>

    </div>
</div>