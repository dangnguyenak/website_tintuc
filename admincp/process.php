<?php
error_reporting(1);
include('../includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$class_member = $systemAction->load('class_member');
$class_custom = $systemAction->load('class_custom');
$user_id = $class_member->check_login();
$user_info = $class_member->user_info($user_id);
$class_cpanel = $systemAction->load('class_cpanel');
if (isset($_REQUEST["action"])) {
    $action = addslashes($_REQUEST["action"]);
} else {
    $action = "";
}
/////////////////////////////////////////////
if ($action == "next_page_danhmuc") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM category_index ORDER BY main_id ASC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_danhmuc($page, $limit);
    }
}
/////////////////////////////////////////////
if ($action == "next_page_thanhvien") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM user_info ORDER BY user_id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_thanhvien($page, $limit);
    }
}
/////////////////////////////////////////////
if ($action == "next_page_tintuc") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM tintuc ORDER BY id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_tintuc($page, $limit);
    }
} /////////////////////////////////////////////
elseif ($action == "next_page_nhacchuong") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM nhacchuong ORDER BY id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_nhacchuong($page, $limit);
    }
} /////////////////////////////////////////////
elseif ($action == "next_page_photo") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM photo ORDER BY id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_photo($page, $limit);
    }
} /////////////////////////////////////////////
elseif ($action == "next_page_truyen") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM truyen ORDER BY id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_truyen($page, $limit);
    }
} /////////////////////////////////////////////
elseif ($action == "next_page_game") {
    $page = intval($_REQUEST['page']);
    $limit = 15;
    if ($page == "0") {
        $page = 1;
    } else {
        $page = intval($_REQUEST['page']);
    }
    $start = $limit * $page - $limit;
    $thongtin = $class_custom->query("SELECT * FROM game ORDER BY id DESC LIMIT $start,$limit");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'no';
    } else {
        echo $class_cpanel->list_game($page, $limit);
    }
} /////////////////////////////////////////////
elseif ($action == "del_photo") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM photo WHERE id='$id'");
    $total = mysqli_num_rows($thongtin);
    $r_tt = mysqli_fetch_assoc($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM photo WHERE id='$id'");
        @unlink('.' . $r_tt['minh_hoa']);
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "del_danhmuc") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM category WHERE id='$id'");
    $r_tt = mysqli_fetch_assoc($thongtin);
    $total = mysqli_num_rows($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM category WHERE id='$id'");
        @unlink('.' . $r_tt['minh_hoa']);
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "del_truyen") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM truyen WHERE id='$id'");
    $r_tt = mysqli_fetch_assoc($thongtin);
    $total = mysqli_num_rows($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM truyen WHERE id='$id'");
        @unlink('.' . $r_tt['minh_hoa']);
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "del_tintuc") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM tintuc WHERE id='$id'");
    $r_tt = mysqli_fetch_assoc($thongtin);
    $total = mysqli_num_rows($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM tintuc WHERE id='$id'");
        @unlink('.' . $r_tt['minh_hoa']);
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "del_comment") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM comments WHERE id='$id'");
    $r_tt = mysqli_fetch_assoc($thongtin);
    $total = mysqli_num_rows($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM comments WHERE id='$id'");
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "del_nhacchuong") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM nhacchuong WHERE id='$id'");
    $r_tt = $class_custom->fetch_assoc($thongtin);
    $total = $class_custom->num_rows($thongtin);
    if ($total > 0) {
        $class_custom->query("DELETE FROM nhacchuong WHERE id='$id'");
        echo '1';
    } else {
        echo 'Dữ liệu không tồn tại';
    }
} /////////////////////////////////////////////
elseif ($action == "duyet") {
    $id = intval($_REQUEST['id']);
    $value = intval($_REQUEST['value']);
    if ($value == "0") {
        $class_custom->query("UPDATE tintuc SET duyet='1' WHERE id='$id'");
        echo 'Duyệt thành công';
    } else {
        $class_custom->query("UPDATE tintuc SET duyet='0' WHERE id='$id'");
        echo 'Hủy Duyệt thành công';
    }

} /////////////////////////////////////////////
elseif ($action == "duyet_cmt") {
    $id = intval($_REQUEST['id']);
    $value = intval($_REQUEST['value']);
    if ($value == "0") {
        $class_custom->query("UPDATE comments SET active='1' WHERE id='$id'");
        echo 'Duyệt thành công';
    } else {
        $class_custom->query("UPDATE comments SET active='0' WHERE id='$id'");
        echo 'Hủy duyệt thành công';
    }

} /////////////////////////////////////////////
elseif ($action == "hot") {
    $id = intval($_REQUEST['id']);
    $value = intval($_REQUEST['value']);
    if ($value == "0") {
        $class_custom->query("UPDATE tintuc SET hot='1' WHERE id='$id'");
        echo 'Update hot thành công';
    } else {
        $class_custom->query("UPDATE tintuc SET hot='0' WHERE id='$id'");
        echo 'Hủy hot thành công';
    }

} /////////////////////////////////////////////
elseif ($action == "del_danhmuc") {
    $id = intval($_REQUEST['id']);
    $thongtin = $class_custom->query("SELECT * FROM category WHERE id='$id'");
    $total = mysqli_num_rows($thongtin);
    if ($total == "0") {
        echo 'Bạn không có quyền thực hiện hành động này';
        $noi_dung = "Cố tình xóa danh mục có id " . $id;
        $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $class_custom->query("INSERT INTO admin_log (username,action,noi_dung,date_post,ip_address,trinh_duyet)VALUES('{$_SESSION['e_name']}','delete','$noi_dung'," . time() . ",'$ip_address','$trinh_duyet')");
    } else {
        $class_custom->query("DELETE FROM category WHERE id='$id'");
        echo '1';
        $noi_dung = "Xóa danh mục có id " . $id;
        $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $class_custom->query("INSERT INTO admin_log (username,action,noi_dung,date_post,ip_address,trinh_duyet)VALUES('{$_SESSION['e_name']}','delete','$noi_dung'," . time() . ",'$ip_address','$trinh_duyet')");
    }
} /////////////////////////////////////////////
elseif ($action == "timkiem") {
    $key = addslashes($_REQUEST['key']);
    $key_blank = $check->title_blank($key);
    $kieu = addslashes($_REQUEST['kieu_timkiem']);
    $noidung_timkiem = addslashes($_REQUEST['noidung_timkiem']);
    if (intval($_REQUEST['page']) == "0") {
        $page = 1;

    } else {
        $page = intval($_REQUEST['page']);
    }
    $limit = 15;
    $start = $page * $limit - $limit;

    if ($noidung_timkiem == "1") {

        if ($kieu == "1") {
            $thongtin = $class_custom->query("SELECT * FROM tailieu_data WHERE tieu_de LIKE '%key%' OR title_blank LIKE '%$key_blank%' ORDER BY id DESC LIMIT $start,$limit");
        } elseif ($kieu == "2") {
            $thongtin = $class_custom->query("SELECT * FROM tailieu_data WHERE user_id='$key' ORDER BY id DESC LIMIT $start,$limit");
        } else {
            $thongtin = $class_custom->query("SELECT * FROM tailieu_data WHERE cat LIKE '%,$key,%' ORDER BY id DESC LIMIT $start,$limit");
        }
        $total = mysqli_num_rows($thongtin);
        if ($total > 0) {
            while ($r_tt = mysqli_fetch_assoc($thongtin)) {
                $list .= '
<tr id="dong_433">
<td><input name="chon[]" class="chon" value="433" type="checkbox"></td>
<td>' . $r_tt['tieu_de'];
            }
            echo $list;
        } else {

        }

    } ///////////
    elseif ($noidung_timkiem == "3") {
        if ($kieu == "1") {
            $thongtin = $class_custom->query("SELECT * FROM user_info WHERE username LIKE '%$key%' ORDER BY id DESC LIMIT $start,$limit");

        } elseif ($kieu == "2") {
            $thongtin = $class_custom->query("SELECT * FROM user_info WHERE user_id LIKE '%$key%' ORDER BY id DESC LIMIT $start,$limit");

        } else {
            $thongtin = $class_custom->query("SELECT * FROM user_info WHERE ho_ten LIKE '%$key%' ORDER BY ho_ten ASC LIMIT $start,$limit");

        }
        $total = mysqli_num_rows($thongtin);
        if ($total > 0) {
            while ($r_tt = mysqli_fetch_assoc($thongtin)) {
                $list .= '     
            <tr id="dong_' . $r_tt['id'] . '">
            <td>' . $r_tt['id'] . '</td>
            <td>' . $r_tt['username'] . '</td>
            <td>' . number_format($r_tt['user_money']) . '</td>
            <td>' . number_format($r_tt['upload']) . '</td>
            <td><a href="./index.php?action=edit_thanhvien&id=' . $r_tt['id'] . '"><img src="../contents/skin/backend/default1/images/user_edit.png" alt="" title="" border="0"></a></td>
            <td><a href="javascript:;" value="' . $r_tt['id'] . '" action="del_thanhvien" class="confirm"><img src="../contents/skin/backend/default1/images/trash.png" alt="" title="" border="0"></a></td>
        </tr>';
            }
            echo $list;

        } else {

        }


    } ////////////
    else {

    }

}