<?php
include('../includes/SystemGlobalFile.php');
$class_e_member = $systemAction->load('class_e_member');
$class_cpanel = $systemAction->load('class_cpanel');
$user_id = $class_e_member->check_login();
$custom_query = $systemAction->load('class_custom');
$user_info = $class_e_member->user_info($user_id);
//$id = (int)$_GET['id'];
$check = $systemAction->load('class_check');
$systemSkin = $systemAction->load('class_skin');
$systemSkin_cpanel = $systemAction->load('class_skin_cpanel');
if (!isset($_GET['action']) || $_GET['action'] == '') {
    $action = "danhsach_sanpham";
} else {
    $action = addslashes($_GET['action']);
}
/////////////////////////////////
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
} else {
    $user_info = $class_e_member->user_info($user_id);
    $title = $check->index_setting('title');
    $keywords = $check->index_setting('keywords');
    $description = $check->index_setting('description');

// array cho index
    $index_replace = array(
        'header' => $systemSkin_cpanel->skin_normal('default/header'),
        'admin_control' => $systemSkin_cpanel->skin_normal('default/admin_control'),
        'menu' => $systemSkin_cpanel->skin_normal('default/menu'),
        'box_left' => $systemSkin_cpanel->skin_normal('default/box_left'),
        'box_right' => $systemSkin_cpanel->skin_normal('default/box_action/' . $action),
        'box_list' => $systemSkin_cpanel->skin_normal('default/box_list'),
        'box_phantrang' => $systemSkin_cpanel->skin_normal('default/box_phantrang'),
        'footer' => $systemSkin_cpanel->skin_normal('default/footer'),
        'title' => $title,
        'keywords' => $keywords,
        'description' => $description,
        'username' => $user_info['username'],
///Het lenh thay the
    );

////////////////// Xử lý các action //////////////////////////
    if ($action == "danhsach_thanhvien") {
        if (!isset($_GET['page']) OR intval($_GET['page']) < 2) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $limit = 15;
        $thaythe = array(
            'list_thanhvien' => $class_cpanel->list_thanhvien($page, $limit),

        );
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } ///////////////////
    elseif ($action == "list_tintuc") {
        if (!isset($_GET['page']) OR intval($_GET['page']) < 2) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $limit = 15;
        $sotintuc = $custom_query->num_rows("SELECT * FROM tintuc");
        $thaythe = array(
            'list_baiviet' => $class_cpanel->list_tintuc($page, $limit),
            'total_tintuc' => $sotintuc,
        );
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } elseif ($action == "list_comments") {
        if (!isset($_GET['page']) OR intval($_GET['page']) < 2) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $limit = 15;
        $sobinhluan = $custom_query->num_rows("SELECT * FROM comments");
        $thaythe = array(
            'list_comments' => $class_cpanel->list_comments($page, $limit),
            'total_comments' => $sobinhluan,
        );
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } elseif ($action == "danhsach_caidat") {
        if (!isset($_GET['page']) OR intval($_GET['page']) < 2) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $limit = 15;
        $thaythe = array(
            'list_caidat' => $class_cpanel->list_setting($page, $limit),

        );
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } ///////////////////
    elseif ($action == "danhsach_danhmuc") {
        if (!isset($_GET['page']) OR intval($_GET['page']) < 2) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $limit = 15;
        $thaythe = array(
            'list_danhmuc' => $class_cpanel->list_danhmuc($page, $limit),

        );
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } ///////////////////
    elseif ($action == "edit_tintuc") {
        $id = intval($_GET['id']);
        $thongtin = $custom_query->query("SELECT * FROM tintuc WHERE id='$id'");
        $r_tt = mysqli_fetch_assoc($thongtin);
        $r_tt['list_danhmuc'] = $class_cpanel->list_danhmuc_loai('tintuc', $r_tt['loai']);
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $r_tt);
    } ///////////////////
    elseif ($action == "edit_danhmuc") {
        $id = intval($_GET['id']);
        $thongtin = $custom_query->query("SELECT * FROM category WHERE id='$id'");
        $r_tt = mysqli_fetch_assoc($thongtin);
        if ($r_tt['nhom'] == "0") {
            $r_tt['option_nhom'] = '
		<option value="3">Thủ thuật máy tính</option>
		<option value="0" selected>Thủ thuật Online</option>
		<option value="1">Webmaster</option>
		<option value="2">Giải trí</option>
		';
        } elseif ($r_tt['nhom'] == "1") {
            $r_tt['option_nhom'] = '
		<option value="3">Thủ thuật máy tính</option>
		<option value="0">Thủ thuật Online</option>
		<option value="1" selected>Webmaster</option>
		<option value="2">Giải trí</option>
		';

        } elseif ($r_tt['nhom'] == "3") {
            $r_tt['option_nhom'] = '
		<option value="3" selected>Thủ thuật máy tính</option>
		<option value="0">Thủ thuật Online</option>
		<option value="1">Webmaster</option>
		<option value="2">Giải trí</option>
		';
        } else {
            $r_tt['option_nhom'] = '
		<option value="3">Thủ thuật máy tính</option>
		<option value="0">Thủ thuật Online</option>
		<option value="1">Webmaster</option>
		<option value="2" selected>Giải trí</option>
		';

        }
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $r_tt);
    } ///////////////////
    elseif ($action == "edit_caidat") {
        $name = addslashes($_GET['name']);
        $thongtin = $custom_query->query("SELECT * FROM index_setting WHERE name='$name'");
        $r_tt = mysqli_fetch_assoc($thongtin);
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $r_tt);
    } ///////////////////
    elseif ($action == "add_tintuc") {
        $thaythe['list_danhmuc'] = $class_cpanel->list_danhmuc_loai('tintuc', '');
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    } ///////////////////
    elseif ($action == "add_auto") {
        $thaythe['list_danhmuc'] = $class_cpanel->list_danhmuc_loai('tintuc', '');
        $index_replace['box_right'] = $systemSkin_cpanel->skin_replace('default/box_action/' . $action, $thaythe);
    }

////////////////// Hết các action ////////////////////////////
    echo $systemSkin_cpanel->skin_replace('default/index', $index_replace);
}
