<?php
//error_reporting(0);
include('./includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$index = $systemAction->load('class_index');
$systemSkin = $systemAction->load('class_skin');
$limit = 5;
$key = addslashes($_REQUEST['key']);
$from = addslashes($_REQUEST['from']);
$to = addslashes($_REQUEST['to']);

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
    'title' => 'Kết quả tìm kiếm ' . $key . ' | ' . $check->index_setting('title'),
    'keywords' => 'Kết quả tìm kiếm ' . $key . ',' . $check->index_setting('keywords'),
    'description' => 'Kết quả tìm kiếm ' . $key . ',' . $check->index_setting('description'),
    'list_xemnhieu' => $index->list_top('5'),
    'list_new' => $index->list_new('5'),
    'tieu_de' => 'Kết quả tìm kiếm ' . $key,
    'list_baiviet' => $index->list_baiviet_timkiem($key, $from, $to, '1', $limit),
    'id_cat' => $key,
    'limit' => $limit,
    'link_xem' => 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'],
    'nhom_0' => $index->list_cat('0'),
    'nhom_1' => $index->list_cat('1'),
    'nhom_2' => $index->list_cat('2'),
    'nhom_3' => $index->list_cat('3'),


///Het lenh thay the
);
echo $systemSkin->skin_replace($check->index_setting('skin') . '/timkiem', $index_replace);
