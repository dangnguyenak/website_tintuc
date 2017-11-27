<?php
include('../includes/SystemGlobalFile.php');
$class_e_member = $systemAction->load('class_e_member');
$user_id = $class_e_member->check_login();
$check = $systemAction->load('class_check');
$systemSkin = $systemAction->load('class_skin');
$systemSkin_cpanel = $systemAction->load('class_skin_cpanel');
/////////////////////////////////
if (!isset($_SESSION['admin'])) {
    $title = $check->index_setting('title');
    $keywords = $check->index_setting('keywords');
    $description = $check->index_setting('description');
    $content = $check->index_setting('content');

// array cho index
    $index_replace = array(
        'header' => $systemSkin_cpanel->skin_normal('default/header'),
        'content' => $systemSkin_cpanel->skin_normal($content),
        'footer' => $systemSkin_cpanel->skin_normal('default/footer'),
        'title' => $title,
        'keywords' => $keywords,
        'description' => $description,
        'username' => $user_id,
///Het lenh thay the
    );

////////////////// Hết các action ////////////////////////////
    echo $systemSkin_cpanel->skin_replace('default/login', $index_replace);
}

