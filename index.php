<?php
// error_reporting(0);
include('./includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$index = $systemAction->load('class_index');
$custom_query=$systemAction->load('class_custom');
$systemSkin = $systemAction->load('class_skin');

if (!isset($_GET['page']) || intval($_GET['page']) < 1) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
}
$limit = 10;
$query ="SELECT * FROM photo ORDER BY rand()ASC LIMIT 1";
$r_ttm = $custom_query->fetch_assoc($query);
$minhhoa_facebook = 'http://' . $_SERVER['HTTP_HOST'] . '' . substr($r_ttm['minh_hoa'], 1);
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
    'box_tho' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_tho'),
    'box_facebook' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_facebook'),
    'box_xemnhieu' => $systemSkin->skin_normal($check->index_setting('skin') . '/box_xemnhieu'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),
    '' => $systemSkin->skin_normal($check->index_setting('skin') . '/'),

    'footer' => $systemSkin->skin_normal($check->index_setting('skin') . '/footer'),
    'title' => $check->index_setting('title') . ' trang số ' . $page,
    'keywords' => $check->index_setting('keywords'),
    'description' => $check->index_setting('description') . ' trang số ' . $page,
    'list_photo_slide' => $index->list_slide('photo', '6'),
    'list_slide' => $index->list_slide('', '6'),
    'list_tin_cong_nghe' => $index->list_truyenmoi('26', '4'),
    'list_tt_phan_mem' => $index->list_truyen('25', '4'),
    'list_tt_phan_cung' => $index->list_truyen('27', '4'),
    'list_radio_kinhdi' => $index->list_radio('3', '4'),
    'list_sachnoi' => $index->list_radio('4', '4'),
    'list_truyendai' => $index->list_radio('5', '4'),
    'list_phanmemhay' => $index->list_box_1('14', '3'),
    'list_internet' => $index->list_box_3('17', '2'),
    'list_tt_facebook' => $index->list_box_2('24', '3'),
    'list_share_code' => $index->list_box_1('28', '3'),
    'list_ahbp' => $index->list_box_2('10', '3'),
    'list_xemnhieu' => $index->list_top_date('5'),
    'list_new' => $index->list_new('5'),
    'list_giaitritonghop' => $index->list_tho('29', '5'),
    'nhom_0' => $index->list_cat('0'),
    'nhom_1' => $index->list_cat('1'),
    'nhom_2' => $index->list_cat('2'),
    'nhom_3' => $index->list_cat('3'),
    'minhhoa_facebook' => $minhhoa_facebook,


///Het lenh thay the
);
echo $systemSkin->skin_replace($check->index_setting('skin') . '/index', $index_replace);

