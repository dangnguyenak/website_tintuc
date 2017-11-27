<div class="right_content">
    <h2 class="center bolder">DANH SÁCH TIN TỨC</h2>
    <h4>Đang hiển thị tối đa (15) / {total_tintuc} tổng số tin</h4>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page">
            <input size="16" style="text-align: center" type="text" id="page_next" action="next_page_tintuc"
                   onkeypress="return check_number(event);"
                   value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>
    <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
        <thead>
        <tr>
            <th>ID</th>
            <th scope="col" class="rounded">Minh họa</th>
            <th scope="col" class="rounded">Tiêu đề</th>
            <th scope="col" class="rounded">Duyệt</th>
            <th scope="col" class="rounded">Hot</th>
            <th scope="col" class="rounded">Xem</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>
        <tbody class="reload">
            {list_baiviet}
        </tbody>

    </table>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page">
            <input size="16" type="text" id="page_next" action="next_page_tintuc"
                   onkeypress="return check_number(event);" style="text-align: center"
                   value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>
</div>