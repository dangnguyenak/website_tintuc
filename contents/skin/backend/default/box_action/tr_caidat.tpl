<tr id="dong_{id}">
    <td><input type="checkbox" name="chon[]" class="chon" value="{id}"></td>
    <td>{name}</td>
    <td>{value}</td>
    <td><a href="./index.php?action=edit_caidat&name={name}"><img
                    src="../contents/skin/backend/default/images/user_edit.png" alt="" title="" border="0"/></a></td>
    <td>
        <a href="javascript:;" onClick="if(confirm('Bạn có thực sự muốn xóa mẫu web này?')){del_mauweb({id});}else{ }">
            <img src="../contents/skin/backend/default/images/trash.png" alt="" title="" border="0"/>
        </a></td>
</tr>