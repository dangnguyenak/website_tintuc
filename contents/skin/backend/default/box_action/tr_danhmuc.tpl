<tr id="dong_{id}">

    <!--<td><input type="checkbox" name="chon[]" class="chon" value="{id}"></td>-->

    <td>{id}</td>

    <td width="190">{tieu_de}</td>

    <td width="190">{tieude_me}</td>

    <td>{thu_tu}</td>

    <td><a href="./index.php?action=edit_danhmuc&id={id}"><img
                    src="../contents/skin/backend/default/images/user_edit.png" alt="" title="" border="0"/></a></td>

    <td>

        <a href="javascript:;"
           onClick="if(confirm('Bạn có thực sự muốn xóa danh mục này?')){del_danhmuc({id});}else{ }">

            <img src="../contents/skin/backend/default/images/trash.png" alt="" title="" border="0"/>

        </a></td>

</tr>