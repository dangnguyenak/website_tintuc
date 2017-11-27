<?php
//error_reporting(0);
include('./includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$index = $systemAction->load('class_index');
$systemSkin = $systemAction->load('class_skin');
$class_member = $systemAction->load('class_member');
$custom_query = $systemAction->load('class_custom');

$user_id = $class_member->check_login();
$user_info = $class_member->user_info($user_id);
if (!isset($_GET['page']) OR intval($_GET['page']) < 1) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
}
$limit = 10;
$id = intval($_GET['id']);

$r_tt = $custom_query->fetch_assoc("SELECT * FROM tintuc WHERE id='$id'");
if ($r_tt['duyet'] == "0" AND $user_id != $r_tt['user_id']) {
    $link_back = $_SERVER['HTTP_REFERER'];
    echo "<title> Thông báo hệ thống </title>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
    echo "<center><img src='./contents/images/loading1.gif'></center>";
    echo "<center><font color=red>Bài viết này chưa được duyệt!</font></center>";
    echo "<meta http-equiv='refresh' content='3;url=./index.html'>";
    exit();
}
$view_new = $r_tt['view'] + 1;
$view_date_new = $r_tt['view_date'] + 1;
$homnay = @date("d", time());
$today = $check->index_setting('today');
if ($today == $homnay) {
    $custom_query->query("UPDATE tintuc SET view_date='$view_date_new' WHERE id='$id'");
} else {
    $custom_query->query("UPDATE index_setting SET value='$homnay' WHERE name='today'");
    $custom_query->query("UPDATE tintuc SET view_date='0' WHERE id!='$id'");
    $custom_query->query("UPDATE tintuc SET view_date='1' WHERE id='$id'");
}
$custom_query->query("UPDATE tintuc SET view='$view_new' WHERE id='$id'");
$minhhoa_facebook = 'http://' . $_SERVER['HTTP_HOST'] . '' . substr($r_tt['minh_hoa'], 1);
$r_c = $custom_query->fetch_assoc("SELECT * FROM category WHERE id='{$r_tt['loai']}'");
if ($r_tt['date_post'] != '') {
    $r_tt['date_post'] = @date('H:i:s d/m/Y', $r_tt['date_post']);

} else {
    $r_tt['date_post'] = 'Đăng lúc: Đang cập nhật';
};
/////////////////////////////////////
$index_replace = array(
    'header' => $systemSkin->skin_normal($check->index_setting('skin') . '/header'),
    'topbar' => $systemSkin->skin_normal($check->index_setting('skin') . '/topbar'),
    'banner' => $systemSkin->skin_normal($check->index_setting('skin') . '/banner'),
    'box_update' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_update'),
    'box_search' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_search'),
    'box_slide' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_slide'),
    'box_truyen_moi' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_truyen_moi'),
    'box_radio_tamsu' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_radio_tamsu'),
    'box_radio_truyenngan' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_radio_truyenngan'),
    'box_truyen' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_truyen'),
    'box_ngam' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_ngam'),
    'box_cam' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_cam'),
    'box_giadinh' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_giadinh'),
    'box_honnhan' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_honnhan'),
    'box_cudem' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_cudem'),
    'box_facebook' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_facebook'),
    'box_xemnhieu' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_xemnhieu'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),

    'footer' => $systemSkin->skin_normal($check->index_setting('skin') . '/footer'),
    'title' => $r_tt['tieu_de'],
    'keywords' => $check->index_setting('keywords'),
    'description' => $check->words($r_tt['noi_dung'], '50'),
    'list_xemnhieu' => $index->list_top_date('5'),
    'list_ngaunhien' => $index->list_ngaunhien('5'),
    'list_ngaunhien_2' => $index->list_ngaunhien_2($id, $r_tt['loai'], '5'),
    'list_new' => $index->list_new('5'),
    'minhhoa_facebook' => $minhhoa_facebook,
    'tieude_cat' => $r_c['tieu_de'],
    'tieude_cat_blank' => $check->blank($r_c['tieu_de']),
    'id_cat' => $r_c['id'],
    'id_post' => $id,
    'tieu_de' => $r_tt['tieu_de'],
    'noi_dung' => $r_tt['noi_dung'],
    'view' => number_format($r_tt['view']),
    'date_post' => $r_tt['date_post'],
    'list_cung_chude' => $index->list_cung_chude($id, $r_tt['loai'], '5'),
    'list_chude_moi' => $index->list_chude_moi($id, '5'),
    'list_comments' => $index->list_comments($id),
    'link_xem' => 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'],
    'nhom_0' => $index->list_cat('0'),
    'nhom_1' => $index->list_cat('1'),
    'nhom_2' => $index->list_cat('2'),
    'nhom_3' => $index->list_cat('3'),

);
echo $systemSkin->skin_replace($check->index_setting('skin') . '/view', $index_replace);
