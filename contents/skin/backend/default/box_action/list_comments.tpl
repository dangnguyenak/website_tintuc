<div class="right_content">
    <h2>DANH SÁCH BÌNH LUẬN</h2>
    <h4>Đang hiển thị tối đa (15) / {total_comments} tổng số bình luận</h4>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page">
            <input size="16" type="text" id="page_next" action="next_page_comments"
                   onkeypress="return check_number(event);" style="text-align: center"
                   value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>
    <table id="rounded-corner">
        <thead>
        <tr>
            <th>ID</th>
            <th scope="col" class="rounded">ID bài viết</th>
            <th scope="col" class="rounded">Tên người bình luận</th>
            <th scope="col" class="rounded">Email</th>
            <th scope="col" class="rounded">Nội dung</th>
            <th scope="col" class="rounded">Ngày gửi</th>
            <th scope="col" class="rounded">Duyệt</th>
            <th scope="col" class="rounded-q4">Xóa</th>
        </tr>
        </thead>
        <tbody class="reload">
        {list_comments}
        </tbody>
    </table>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page">
            <input size="16" type="text" id="page_next" action="next_page_comments"
                   onkeypress="return check_number(event);" style="text-align: center"
                   value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>
</div>