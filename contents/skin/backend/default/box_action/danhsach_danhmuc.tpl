<div class="right_content">
    <h2>DANH SÁCH DANH MỤC</h2>
    <table id="rounded-corner">
        <thead>
        <tr>
            <th>ID</th>
            <th scope="col" class="rounded">Tiêu đề</th>
            <th scope="col" class="rounded">Danh mục mẹ</th>
            <th scope="col" class="rounded">Thứ tự</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>
        <tbody class="reload">
        {list_danhmuc}
        </tbody>
    </table>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page">
            <input size="16" type="text" id="page_next" action="next_page_danhmuc" style="text-align: center"
                   onkeypress="return check_number(event);" value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>
</div><!-- end of right content-->