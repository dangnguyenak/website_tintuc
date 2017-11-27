<?php
//error_reporting(1);
include('../includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$class_e_member = $systemAction->load('class_e_member');
$class_cpanel = $systemAction->load('class_cpanel');
$custom_query = $systemAction->load('class_custom');
if ($class_e_member->check_login() > 0) {
    $user_id = $class_member->check_login();
    $user_info = $class_member->user_info($user_id);
    if (isset($_GET["action"])) {
        $action = addslashes($_GET["action"]);
    } else {
        $action = "";
    }
    if ($action == "sua_thongtin") {
        $ho_ten = strip_tags(addslashes($_REQUEST['ho_ten']));
        $dien_thoai = strip_tags(addslashes($_REQUEST['dien_thoai']));
        $dia_chi = strip_tags(addslashes($_REQUEST['dia_chi']));
        $ngay_sinh = strip_tags(addslashes($_REQUEST['ngay_sinh']));
        $custom_query->query("UPDATE user_info SET ho_ten='$ho_ten',dien_thoai='$dien_thoai',dia_chi='$dia_chi',ngay_sinh='$ngay_sinh' WHERE id='$user_id'");

        $_SESSION['success_message'] = "Sửa thông tin thành công";
        header("Location: ./index.php?action=sua_thongtin");
    } elseif ($action == "edit_danhmuc") {
        $tieu_de = strip_tags(addslashes($_REQUEST['tieu_de']));
        $id = strip_tags(addslashes($_REQUEST['id']));
        $thu_tu = strip_tags(addslashes($_REQUEST['thu_tu']));
        $nhom = intval($_REQUEST['nhom']);
        $custom_query->query("UPDATE category SET tieu_de='$tieu_de',thu_tu='$thu_tu',nhom='$nhom' WHERE id='$id'");
        $_SESSION['success_message'] = "Sửa Danh mục thành công";
        header("Location: ./index.php?action=danhsach_danhmuc");
    } ////////////////////////////////////////////
    elseif ($action == "edit_tintuc") {
        $tieu_de = strip_tags(addslashes($_REQUEST['tieu_de']));
        $duoi_minhhoa = $check->duoi_file($_FILES['minh_hoa']['name']);
        $noi_dung = $_REQUEST['noi_dung'];
        $loai = addslashes($_REQUEST['loai']);
        $id = intval($_REQUEST['id']);
        $path = "../uploads/minh_hoa/" . $check->blank($tieu_de) . "_" . time() . "." . $duoi_minhhoa;
        $path2 = substr($path, 1);
        if (in_array($duoi_minhhoa, array("png", "gif", "jpg", "jpeg")) == true) {
            move_uploaded_file($_FILES["minh_hoa"]["tmp_name"], "./" . $path);
            $custom_query->query("UPDATE tintuc SET minh_hoa='$path2' WHERE id='$id'");
        }
        $custom_query->query("UPDATE tintuc SET  tieu_de='$tieu_de',noi_dung='$noi_dung',loai='$loai' WHERE id='$id'");
        $_SESSION['success_message'] = "Sửa tin tức thành công.";
        header("Location: ./index.php?action=edit_tintuc&id=$id");
    } ////////////////////////////////////////////
    elseif ($action == "them_danhmuc") {
        $tieu_de = strip_tags(addslashes($_REQUEST['tieu_de']));
        $id = strip_tags(addslashes($_REQUEST['id']));
        $thu_tu = strip_tags(addslashes($_REQUEST['thu_tu']));
        $nhom = addslashes($_REQUEST['nhom']);
        $custom_query->query("INSERT INTO category (tieu_de,thu_tu,loai,nhom)VALUES('$tieu_de','$thu_tu','tintuc','$nhom')");
        $_SESSION['success_message'] = "Thêm Danh mục thành công";
        header("Location: ./index.php?action=danhsach_danhmuc");
    } ////////////////////////////////////////////
    elseif ($action == "add_tintuc") {
        $tieu_de = strip_tags(addslashes($_REQUEST['tieu_de']));
        $duoi_minhhoa = $check->duoi_file($_FILES['minh_hoa']['name']);
        $noi_dung = $_REQUEST['noi_dung'];
        $loai = addslashes($_REQUEST['loai']);
        $time = time();
        $path = "../uploads/minh_hoa/" . $check->blank($tieu_de) . "_" . time() . "." . $duoi_minhhoa;
        $path2 = substr($path, 1);
        if (in_array($duoi_minhhoa, array("png", "gif", "jpg", "jpeg")) == true) {
            move_uploaded_file($_FILES["minh_hoa"]["tmp_name"], "./" . $path);
        }
        $custom_query->query("INSERT INTO tintuc (tieu_de,noi_dung,loai,minh_hoa,date_post)VALUES('$tieu_de','$noi_dung','$loai','$path2','$time')");
        $_SESSION['success_message'] = "Thêm tin tức thành công";
        header("Location: ./index.php?action=add_tintuc");
    } elseif ($action == "doi_matkhau") {
        $old = addslashes($_REQUEST['old']);
        $pass = addslashes($_REQUEST['pass']);
        $re_pass = addslashes($_REQUEST['re_pass']);
        $password = md5($pass);
        $password_cu = md5($old);
        $my_info = $class_cpanel->my_info();
        $error_message = "";
        $success_message = "";
        if ($password_cu != $my_info['password']) {
            $error_message = "Mật khẩu cũ không chính xác";
        } elseif ($pass !== $re_pass) {
            $error_message = ">Xác nhận mật khẩu không chính xác";
        } elseif (strlen($pass) < 6) {
            $error_message = "Mật khẩu phải dài hơn 6 ký tự";
        } else {
            $custom_query->query("UPDATE e_min SET password='$password' WHERE username='{$_SESSION['e_name']}'");
            $success_message = "Đổi mật khẩu thành công! Đang chuyển hướng về trang vừa xem! ";
        }
        $_SESSION['error_message'] = $error_message;
        $_SESSION['success_message'] = $success_message;
        header("Location: ./index.php?action=doi_matkhau");
    } ////////////////////////////////////////////
    elseif ($action == "edit_caidat") {
        $name = addslashes($_POST['name']);
        $value = addslashes($_POST['value']);

        $custom_query->query("UPDATE index_setting SET value='$value' WHERE name='$name'");
        $_SESSION['success_message'] = "Sửa cài đặt thành công";
        header("Location: ./index.php?action=danhsach_caidat");
    }
}
