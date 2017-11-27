<tr id="dong_{id}">

    <td>{id}</td>
    <td>{id_post}</td>
    <td width="100">{ten}</td>
    <td width="100">{email}</td>
    <td width="250">{noi_dung}</td>
    <td width="100">{created_at}</td>
    <td><input type="checkbox" {checkduyet_cmt} post="{id}" name="duyet_cmt" value="{active}"></td>
    <td>
        <a href="javascript:;" onClick="if(confirm('Bạn có thực sự muốn xóa bình luận này?')){del_comment({id});}else{ }">
            <img src="../contents/skin/backend/default/images/trash.png" alt="" title="" border="0"/>
        </a>
    </td>
</tr>