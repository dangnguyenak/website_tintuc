<?php
include('../includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$class_e_member = $systemAction->load('class_e_member');
$action = addslashes($_REQUEST['action']);
if ($_REQUEST['action'] == "admin_login") {
    $password = addslashes($_REQUEST['password']);
    $username_admin = addslashes($_REQUEST['username_admin']);
    $kq = $class_e_member->login($username_admin, $password);
    $message = "";
    $redirectUrl = "login.php";
    if ($kq == "0") {
        $message = "Tài khoản không tồn tại!";
    } elseif ($kq == "2") {
        $message = "Mật khẩu không chính xác!";
    } elseif ($kq == "1") {
        $redirectUrl = "index.php";
    } else {
        $message = "Đăng nhập hệ thống không thành công!";
    }
    $_SESSION['error_message'] = $message;
    header("Location: $redirectUrl");
} elseif ($action == "logout") {
    unset($_SESSION['admin']);
    header("Location: index.php");
} else {

}
