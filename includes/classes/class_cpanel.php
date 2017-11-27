<?php

class class_cpanel extends manage
{

    private function getConnection()
    {
        global $connectionDb;
        return $connectionDb;
    }

    function list_sanpham($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $class_member = $this->load('class_member');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM page ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $user_info = $class_member->user_info($r_tt['user_id']);
            $r_tt['username'] = $user_info['username'];
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_sanpham', $r_tt);
        }
        return $list;
    }

//////////////////////////////////////////////////////////////////
    function list_tintuc($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            if ($r_tt['duyet'] == "1") {
                $r_tt['checkduyet'] = 'checked';
            } else {
                $r_tt['checkduyet'] = '';
            }
            if ($r_tt['hot'] == "1") {
                $r_tt['checkhot'] = 'checked';
            } else {
                $r_tt['checkhot'] = '';
            }
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_tintuc', $r_tt);
        }
        return $list;
    }

    function list_comments($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM comments LIMIT $start,$limit");
        $list = "";
        if ($thongtin!==false)
            while ($r_tt = mysqli_fetch_assoc($thongtin)) {
                if ($r_tt['active'] == "1") {
                    $r_tt['checkduyet_cmt'] = 'checked';
                } else {
                    $r_tt['checkduyet_cmt'] = '';
                }
                $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_comment', $r_tt);
            }
        return $list;
    }

    function list_photo($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM photo ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_photo', $r_tt);
        }
        return $list;
    }

//////////////////////////////////////////////////////////////////
    function list_game($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM game ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_game', $r_tt);
        }
        return $list;
    }

//////////////////////////////////////////////////////////////////
    function list_truyen($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM truyen ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $thongtin_theloai = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE id='{$r_tt['loai']}'");
            $r_tl = mysqli_fetch_assoc($thongtin_theloai);
            $r_tt['the_loai'] = $r_tl['tieu_de'];
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_truyen', $r_tt);
        }
        return $list;
    }

//////////////////////////////////////////////////////////////////
    function list_nhacchuong($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM nhacchuong ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $thongtin_theloai = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE id='{$r_tt['loai']}'");
            $r_tl = mysqli_fetch_assoc($thongtin_theloai);
            $r_tt['the_loai'] = $r_tl['tieu_de'];
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_nhacchuong', $r_tt);
        }
        return $list;
    }

//////////////////////////////////////////////////////////////////
    function list_thanhvien($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info ORDER BY user_id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['date_reg'] = @date('H:i:s d/m/Y', $r_tt['date_reg']);
            if ($r_tt['dung_thu'] == "0") {
                $r_tt['dung_thu'] = 'Chưa tạo shop';

            } elseif ($r_tt['dung_thu'] == "1") {
                $r_tt['dung_thu'] = 'Chưa kích hoạt';

            } elseif ($r_tt['dung_thu'] == "3") {
                $r_tt['dung_thu'] = 'Đã kích hoạt';
            }
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_thanhvien', $r_tt);
        }
        return $list;
    }

    function list_danhmuc($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM category ORDER BY main_id ASC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $thongtin_me = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE main_id='{$r_tt['main_id']}'");
            $r_m = mysqli_fetch_assoc($thongtin_me);
            if ($r_tt['nhom'] == "0") {
                $r_tt['tieude_me'] = 'Radio';
            } elseif ($r_tt['nhom'] == "1") {
                $r_tt['tieude_me'] = 'Truyện ngắn';
            } elseif ($r_tt['nhom'] == "2") {
                $r_tt['tieude_me'] = 'Sống trẻ';
            } else {
                $r_tt['tieude_me'] = 'Tin tức';
            }

            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_danhmuc', $r_tt);
        }
        return $list;
    }

    function list_danhmuc_loai($loai, $id)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
//        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE loai='$loai' ORDER BY thu_tu ASC");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            if ($id == $r_tt['id']) {
                $list .= '<option value="' . $r_tt['id'] . '" selected>' . $r_tt['tieu_de'] . '</option>';
            } else {
                $list .= '<option value="' . $r_tt['id'] . '">' . $r_tt['tieu_de'] . '</option>';
            }
        }
        return $list;
    }

    function list_option_loai($id)
    {
        if (substr($id, 0, 1) == ",") {
            $id = substr($id, 1, strlen($id) - 2);
        }
        $tach_id = explode(",,", $id);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE loai='game' ORDER BY thu_tu ASC");
        $list = "";
        while ($r_m = mysqli_fetch_assoc($thongtin)) {
            if (in_array($r_m['id'], $tach_id) == true) {
                $list .= '<div class="checkbox_input"><input type="checkbox" checked="checked" name="loai[]" value="' . $r_m['id'] . '"><span>' . $r_m['tieu_de'] . '</span></div>';
            } else {
                $list .= '<div class="checkbox_input"><input type="checkbox" name="loai[]" value="' . $r_m['id'] . '"><span>' . $r_m['tieu_de'] . '</span></div>';

            }

        }
        return $list;
    }

    function list_slide($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM slide ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {

            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_slide', $r_tt);
        }
        return $list;
    }

    function list_lienhe($page, $limit)
    {
        $systemSkin_cpanel = $this->load('class_skin_cpanel');
        $start = $page * $limit - $limit;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM contact ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $thongtin_mauweb = @mysqli_query($this->getConnection(), "SELECT * FROM mauweb WHERE id='{$r_tt['mauweb']}'");
            $r_ttw = @mysqli_fetch_assoc($thongtin_mauweb);
            $r_tt['mauweb'] = $r_ttw['tieu_de'];
            $list .= $systemSkin_cpanel->skin_replace('default/box_action/tr_lienhe', $r_tt);
        }
        return $list;
    }

    function list_setting($page, $limit)
    {
        $start = $page * $limit - $limit;
        $skin_cpanel = $this->load('class_skin_cpanel');
        $check = $this->load('class_check');
        $khoahoc_data = @mysqli_query($this->getConnection(), "SELECT * FROM index_setting ORDER BY name DESC LIMIT $start,$limit");
        $list = '';
        while ($r_tt = mysqli_fetch_assoc($khoahoc_data)) {
            $r_tt['value'] = $check->words($r_tt['value'], 100);
            $list .= $skin_cpanel->skin_replace("default/box_action/tr_caidat", $r_tt);
        }
        return $list;
    }

    function thanhvien_info($id)
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE id='$id'");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $r_tt = '';
        } else {
            $r_tt = mysqli_fetch_assoc($thongtin);
        }
        return $r_tt;
    }

    function my_info()
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM e_min WHERE username='{$_SESSION['e_name']}'");
        $r_tt = mysqli_fetch_assoc($thongtin);
        return $r_tt;
    }
}

