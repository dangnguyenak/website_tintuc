<?php
global $systemAction;
$class_member=$systemAction->load("class_member");
$user_id=$class_member->check_login();
if($user_id>0){
$user_info=$class_member->user_info($user_id);
echo '
<div class="login-imelody">
    <div class="cont-ilogin">
        <div class="fr">
            <div class="ilogged fl">Xin chào, <a href="./tac-gia-'.$user_info['username'].'.html">'.$user_info['ho_ten'].'</a>
            </div>
            <div class="iava fl">
                <img src="'.$user_info['avatar'].'" class="avatar avatar-wordpress-social-login avatar-24 photo"
                     height="24" width="24"></div>
            <a href="./myinfo.html" title="Thông tin cá nhân" class="userinfoed">Thông tin cá nhân</a>
            <a href="javascript:;" title="Thoát" class="infoed logout">Thoát</a>
            <a href="./mypost.html" class="btn-newposted">MY POST</a>
            <a href="./post.html" class="btn-newposted">Đăng bài</a>
        </div>
    </div>
</div>';
}else{
echo '
<div class="login-imelody">
    <div class="cont-ilogin">
    </div>
</div>';
}
?>