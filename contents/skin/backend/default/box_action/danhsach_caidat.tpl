<div class="right_content">
    <h2>DANH SÁCH CÀI ĐẶT</h2>
    <table id="rounded-corner">
        <thead>
        <tr>
            <th></th>
            <th scope="col" class="rounded">NAME</th>
            <th scope="col" class="rounded">VALUE</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>
        <tbody class="reload">
        {list_caidat}

        </tbody>
    </table>
    <div class="phantrang">
        <div class="back disabled"><< prev</div>
        <div class="go_page"><input size="16" type="text" id="page_next" action="next_page_sach"
                                    style="text-align: center"
                                    onkeypress="return check_number(event);" value="1" placeholder="Nhập số trang">
        </div>
        <div class="next">next >></div>
    </div>

</div><!-- end of right content-->