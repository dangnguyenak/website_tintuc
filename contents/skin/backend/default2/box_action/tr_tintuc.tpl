<tr id="dong_{id}">

    <td class="center">{id}</td>

    <td width="100"><img src=".{minh_hoa}" width="95" height="95"></td>

    <td width="250">{tieu_de}</td>

    <td><input type="checkbox" {checkduyet} post="{id}" name="duyet" value="{duyet}"></td>
    <td><input type="checkbox" {checkhot} post="{id}" name="hot" value="{hot}"></td>
    <td>{view}</td>
    <td>
        <a class="green" href="./index.php?action=edit_tintuc&id={id}">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
        </a>
    </td>

    <td>
        <a class="red" href="javascript:;" onClick="if(confirm('Bạn có thực sự muốn xóa tin này?')){del_tintuc({id});}else{ }">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
        </a>
    </td>
</tr>