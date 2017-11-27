<tr id="dong_{id}">

    <td>{id}</td>

    <td width="100"><img src=".{minh_hoa}" height="95" width="95"></td>

    <td width="250">{tieu_de}</td>

    <td><input type="checkbox" {checkduyet} post="{id}" name="duyet" value="{duyet}"></td>
    <td><input type="checkbox" {checkhot} post="{id}" name="hot" value="{hot}"></td>
    <td>{view}</td>
    <td><a href="./index.php?action=edit_tintuc&id={id}"><img
                    src="../contents/skin/backend/default/images/user_edit.png" alt="" title="" border="0"/></a></td>

    <td>

        <a href="javascript:;" onClick="if(confirm('Bạn có thực sự muốn xóa tin này?')){del_tintuc({id});}else{ }">

            <img src="../contents/skin/backend/default/images/trash.png" alt="" title="" border="0"/>

        </a></td>

</tr>