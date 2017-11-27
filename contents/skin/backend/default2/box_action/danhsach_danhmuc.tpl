<div class="main-content">
    <h1 class="bolder center">DANH SÁCH DANH MỤC</h1>
    <table id="simple-table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th scope="col" class="rounded">Tiêu đề</th>
            <th scope="col" class="rounded">Danh mục cha</th>
            <th scope="col" class="rounded">Thứ tự</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>
        <tbody class="reload">
        {list_danhmuc}

        </tbody>
    </table>
    <div class="pagination">
        <form action="process.php?action=next_page_danhmuc" method="get">
            <input type="text" name="page" placeholder="Nhập số trang">
            <button class="btn btn-default" type="submit">GO</button>
        </form>
    </div>
</div>