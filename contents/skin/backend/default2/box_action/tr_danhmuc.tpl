<tr id="dong_{id}">

    <td>{id}</td>

    <td width="190">{tieu_de}</td>

    <td width="190">{tieude_me}</td>

    <td>{thu_tu}</td>

    <td>
        <a href="./index.php?action=edit_danhmuc&id={id}" class="green">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
        </a>
    </td>

    <td>

        <a class="red" href="javascript:;"
           onClick="if(confirm('Bạn có thực sự muốn xóa danh mục này?')){del_danhmuc({id});}else{ }">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
        </a></td>

</tr>