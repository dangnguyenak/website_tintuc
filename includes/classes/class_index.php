<?php

class class_index extends manage
{

    private function getConnection()
    {
        global $connectionDb;
        return $connectionDb;
    }

    function list_slide($loai, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE hot='1' AND duyet='1' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['trich'] = $check->words($r_tt['noi_dung'], 40);
            if ($loai == "photo") {
                $list .= $skin->skin_replace($check->index_setting('skin') . '/li_photo_slide', $r_tt);
            } else {
                $list .= $skin->skin_replace($check->index_setting('skin') . '/li_slide', $r_tt);
            }

        }
        return $list;

    }

    function list_baiviet_cat($loai, $page, $limit)
    {
        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$loai' AND duyet='1' ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['trich'] = $check->words($r_tt['noi_dung'], 40);
            $thongtin_category = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE id='{$r_tt['loai']}'");
            $r_c = mysqli_fetch_assoc($thongtin_category);
            $r_tt['tieude_cat'] = $r_c['tieu_de'];
            $r_tt['tieude_cat_blank'] = $check->blank($r_c['tieu_de']);
            if ($r_tt['date_post'] != '') {
                $r_tt['date_post'] = 'Đăng lúc: ' . @date('H:i:s d/M/Y', $r_tt['date_post']);
            } else {
                $r_tt['date_post'] = 'Đăng lúc: Đang cập nhật';

            }
            $list .= $skin->skin_replace($check->index_setting('skin') . '/li_baiviet_cat', $r_tt);
        }
        return $list;
    }

/////////////////
    function list_mypost($user_id, $page, $limit)
    {
        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE user_id='$user_id' ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['trich'] = $check->words($r_tt['noi_dung'], 40);
            $thongtin_post = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE user_id='$user_id'");
            $r_p = mysqli_fetch_assoc($thongtin_post);
            $r_tt['tieude_cat'] = $r_p['ho_ten'];
            if ($r_tt['duyet'] == '0') {
                $r_tt['tinh_trang'] = 'Đang chờ duyệt';
            } else {
                $r_tt['tinh_trang'] = 'Đã duyệt';

            }
            $r_tt['username'] = $r_p['username'];
            $list .= $skin->skin_replace($check->index_setting('skin') . '/li_baiviet_mypost', $r_tt);
        }
        return $list;
    }

/////////////////
    function list_mempost($user_id, $page, $limit)
    {
        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE user_id='$user_id' AND duyet='1' ORDER BY id DESC LIMIT $start,$limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['trich'] = $check->words($r_tt['noi_dung'], 40);
            $thongtin_post = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE user_id='$user_id'");
            $r_p = mysqli_fetch_assoc($thongtin_post);
            $r_tt['tieude_cat'] = $r_p['ho_ten'];
            if ($r_tt['date_post'] != '') {
                $r_tt['date_post'] = 'Đăng lúc: ' . @date('H:i:s d/M/Y', $r_tt['date_post']);
            } else {
                $r_tt['date_post'] = 'Đăng lúc: Đang cập nhật';

            }
            $list .= $skin->skin_replace($check->index_setting('skin') . '/li_baiviet_cat', $r_tt);
        }
        return $list;
    }

    function list_baiviet_timkiem($key, $from, $to, $page, $limit)
    {
        $from = strtotime($from);
        $to = strtotime($to);
        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $query = "SELECT * FROM tintuc WHERE tieu_de LIKE '%$key%'";
        if ($from !== '' && $to !== '')
            $query = "SELECT * FROM tintuc WHERE date_post BETWEEN $from AND $to";
        $query .= " AND duyet='1' ORDER BY id DESC LIMIT $start,$limit";
        $thongtin = mysqli_query($this->getConnection(), $query);
        $list = "";
        if ($thongtin != false)
            while ($r_tt = mysqli_fetch_assoc($thongtin)) {
                $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
                $r_tt['trich'] = $check->words($r_tt['noi_dung'], 40);
                $thongtin_category = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE id='{$r_tt['loai']}'");
                $r_c = mysqli_fetch_assoc($thongtin_category);
                $r_tt['tieude_cat'] = $r_c['tieu_de'];
                $r_tt['tieude_cat_blank'] = $check->blank($r_c['tieu_de']);
                if ($r_tt['date_post'] != '') {
                    $r_tt['date_post'] = 'Đăng lúc: ' . @date('H:i:s d/M/Y', $r_tt['date_post']);
                } else {
                    $r_tt['date_post'] = 'Đăng lúc: Đang cập nhật';

                }
                $list .= $skin->skin_replace($check->index_setting('skin') . '/li_baiviet_cat', $r_tt);
            }
        return $list;
    }

    function list_cat($nhom)
    {
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM category WHERE nhom='$nhom' ORDER BY id ASC");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= $skin->skin_replace($check->index_setting('skin') . '/li_cat', $r_tt);
        }
        return $list;
    }

/////////////////
    function list_option_cat()
    {
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM category ORDER BY id ASC");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $list .= '<option class="level-1" value="' . $r_tt['id'] . '">' . $r_tt['tieu_de'] . '</option>';
        }
        return $list;
    }

/////////////////
    function list_truyenmoi($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $moi_nhat = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT 1");
        $r_mn = mysqli_fetch_assoc($moi_nhat);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' AND id!='{$r_mn['id']}' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['title'] = $check->words($r_tt['tieu_de'], '9');
            $list .= '<li><a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '" rel="bookmark">' . $r_tt['title'] . '</a></li>';

        }
        $return = '
<div class="list-r1">
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html">
	<img src="' . $r_mn['minh_hoa'] . '" alt="' . $r_mn['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" title="' . $r_mn['tieu_de'] . '" width="300" height="124">
</a>
<a title="' . $r_mn['tieu_de'] . '" href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html">' . $check->words($r_mn['tieu_de'], '9') . '</a>
<p>' . $check->words($r_mn['noi_dung'], '25') . '</p>
</div>
<ul>' . $list . '</ul>';
        return $return;
    }

/////////////////
    function list_truyen($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $moi_nhat = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT 1");
        $r_mn = mysqli_fetch_assoc($moi_nhat);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' AND id!='{$r_mn['id']}' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['title'] = $check->words($r_tt['tieu_de'], '9');
            $list .= '	
	<li>
	<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">
	<img src="' . $r_tt['minh_hoa'] . '" alt="' . $r_tt['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="59" height="42" title="' . $r_tt['tieu_de'] . '"></a>
    <a id="title" href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '" rel="bookmark">' . $r_tt['tieu_de'] . '</a>
    </li>';

        }
        $return = '
 <div class="hot fl">               
    <a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html">
        <img src="' . $r_mn['minh_hoa'] . '" alt="' . $r_mn['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="203" height="128" title="' . $r_mn['tieu_de'] . '">
    </a>  
    <a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html" title="' . $r_mn['tieu_de'] . '">' . $check->words($r_mn['tieu_de'], '6') . '</a>
    <p>' . $check->words($r_mn['noi_dung'], '25') . '</p>
</div>
<ul>' . $list . '</ul>';
        return $return;
    }

/////////////////
    function list_radio($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $moi_nhat = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT 1");
        $r_mn = mysqli_fetch_assoc($moi_nhat);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' AND id!='{$r_mn['id']}' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $r_tt['title'] = $check->words($r_tt['tieu_de'], '9');
            $list .= '<li><a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '" rel="bookmark">' . $r_tt['title'] . '</a></li>';

        }
        $return = '
<div class="list-r1">
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html"><img src="' . $r_mn['minh_hoa'] . '" alt="' . $r_mn['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="300" height="124" title="' . $r_mn['tieu_de'] . '"></a>
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html">' . $check->words($r_mn['tieu_de'], '8') . '</a>
<p>' . $check->words($r_mn['noi_dung'], '25') . '</p>
</div>
<ul>' . $list . '</ul>';
        return $return;
    }

    function list_box_1($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $moi_nhat = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT 1");
        $r_mn = mysqli_fetch_assoc($moi_nhat);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' AND id!='{$r_mn['id']}' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li class="clearfix">
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"><img src="' . $r_tt['minh_hoa'] . '" width="120" onerror="this.src=\'./contents/images/no_images.png\';" height="90" alt="' . $r_tt['tieu_de'] . '" title="' . $r_tt['tieu_de'] . '"></a>
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '9') . '</a>
<p>' . $check->words($r_tt['noi_dung'], '25') . '</p>
</li>';

        }
        $return = '
<div class="hot-news fl">
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html"><img src="' . $r_mn['minh_hoa'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="212" height="149" alt="' . $r_mn['tieu_de'] . '" title="' . $r_mn['tieu_de'] . '"></a>
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html" title="' . $r_mn['tieu_de'] . '">' . $check->words($r_mn['tieu_de'], '10') . '</a>
<p>' . $check->words($r_mn['noi_dung'], '25') . '</p>
</div>
<ul>' . $list . '</ul>';
        return $return;
    }

    function list_box_2($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li>
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"><img src="' . $r_tt['minh_hoa'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="201" height="141" alt="' . $r_tt['tieu_de'] . '" title="' . $r_tt['tieu_de'] . '"></a>
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '10') . '</a>
<p>' . $check->words($r_tt['noi_dung'], '30') . '</p>
</li>';
        }
        return $list;

    }

/////////////////
    function list_top($limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE  duyet='1' ORDER BY view DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li class="clearfix">
    <a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">
    <img src="' . $r_tt['minh_hoa'] . '" width="90" height="68" alt="' . $r_tt['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '7') . '</a>
    <a title="' . $r_tt['tieu_de'] . '" href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"></a>
    <p>' . $check->words($r_tt['noi_dung'], '20') . '</p>
</li>';
        }
        return $list;
    }

/////////////////
    function list_top_date($limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE  duyet='1' ORDER BY view_date DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li class="clearfix">
    <a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">
    <img src="' . $r_tt['minh_hoa'] . '" width="90" height="68" alt="' . $r_tt['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '7') . '</a>
    <a title="' . $r_tt['tieu_de'] . '" href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"></a>
    <p>' . $check->words($r_tt['noi_dung'], '20') . '</p>
</li>';
        }
        return $list;
    }

/////////////////
    function list_ngaunhien($limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE  duyet='1' ORDER BY rand() DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li class="clearfix">
    <a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">
    <img src="' . $r_tt['minh_hoa'] . '" width="90" height="68" alt="' . $r_tt['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '7') . '</a>
    <a title="' . $r_tt['tieu_de'] . '" href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"></a>
    <p>' . $check->words($r_tt['noi_dung'], '20') . '</p>
</li>';
        }
        return $list;
    }

/////////////////
    function list_tho($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE  duyet='1' AND loai='$id' ORDER BY rand() DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li class="clearfix">
    <a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">
    <img src="' . $r_tt['minh_hoa'] . '" width="90" height="68" alt="' . $r_tt['tieu_de'] . '" onerror="this.src=\'./contents/images/no_images.png\';" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '7') . '</a>
    <a title="' . $r_tt['tieu_de'] . '" href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html"></a>
    <p>' . $check->words($r_tt['noi_dung'], '20') . '</p>
</li>';
        }
        return $list;
    }

/////////////////
    function list_ngaunhien_2($id, $loai, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE id!='$id' AND duyet='1' AND loai='$loai' ORDER BY rand() DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '<li><a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" rel="bookmark">' . $r_tt['tieu_de'] . '</a></li>';
        }
        return $list;
    }

/////////////////
    function list_new($limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE  duyet='1' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li><a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" rel="bookmark" title="' . $r_tt['tieu_de'] . '">' . $r_tt['tieu_de'] . '</a></li>';
        }
        return $list;
    }

/////////////////
    function list_cung_chude($id, $loai, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$loai' AND duyet='1' AND id!='$id' ORDER BY rand() DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $list .= '						
<div class="popular-media-content"> 
	<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" class="pull-l"> 
	<img src="' . $r_tt['minh_hoa'] . '" width="100" height="80" onerror="this.src=\'./contents/images/no_images.png\';" class="media-object"></a>
	<div class="media-body">
		<h4 class="p-media-heading">
		<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">' . $r_tt['tieu_de'] . '</a>
		</h4>
	</div>
	<div class="clear"></div>
</div>';
        }
        return $list;
    }

    function list_comments($id_post)
    {
        $query = "SELECT * from comments WHERE id_post=$id_post AND active=1";
        $thongtin = mysqli_query($this->getConnection(), $query);
        $list = "";
        if ($thongtin !== false)
            while ($cmt = mysqli_fetch_assoc($thongtin)) {
                $list .= '
                <div class="comment-info">
                <div class="comment_header">
                <div class="user">' . $cmt['ten'] . ' - ' . $cmt['email'] . '</div>
                <div class="date-cmt">' . $cmt['created_at'] . '</div>
                <div class="comment_content">' . $cmt['noi_dung'] . '</div>
                </div></div>';
            }
        return $list;
    }

    function list_chude_moi($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE duyet='1' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $list .= '						
<div class="popular-media-content"> 
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" class="pull-l"><img src="' . $r_tt['minh_hoa'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="100" height="80" class="media-object"> </a>
<div class="media-body">
<h4 class="p-media-heading"><a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html">' . $r_tt['tieu_de'] . '</a></h4>
</div>
</div>
<div class="clear"></div>';
        }
        return $list;
    }

/////////////////
    function list_box_3($id, $limit)
    {
//        $start = $page * $limit - $limit;
        $check = $this->load('class_check');
        $skin = $this->load('class_skin');
        $moi_nhat = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' ORDER BY id DESC LIMIT 1");
        $r_mn = mysqli_fetch_assoc($moi_nhat);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM tintuc WHERE loai='$id' AND duyet='1' AND id!='{$r_mn['id']}' ORDER BY id DESC LIMIT $limit");
        $list = "";
        while ($r_tt = mysqli_fetch_assoc($thongtin)) {
            $r_tt['tieude_blank'] = $check->blank($r_tt['tieu_de']);
            $list .= '
<li>
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" class="fix-a fl"><img src="' . $r_tt['minh_hoa'] . '" onerror="this.src=\'./contents/images/no_images.png\';" width="64" height="48" alt="' . $r_tt['tieu_de'] . '" title="' . $r_tt['tieu_de'] . '"></a>
<a href="./xem-' . $check->blank($r_tt['tieu_de']) . '-' . $r_tt['id'] . '.html" title="' . $r_tt['tieu_de'] . '">' . $check->words($r_tt['tieu_de'], '10') . '</a>
<p>' . $check->words($r_tt['noi_dung'], '15') . '</p>
</li>';

        }
        $return = '
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html" class="fix-a fl">
<img src="' . $r_mn['minh_hoa'] . '" width="280" height="196" alt="' . $r_mn['tieu_de'] . '" title="' . $r_mn['tieu_de'] . '"></a>
<div class="i-shoes">
<a href="./xem-' . $check->blank($r_mn['tieu_de']) . '-' . $r_mn['id'] . '.html" title="' . $r_mn['tieu_de'] . '">' . $check->words($r_mn['tieu_de'], '10') . '</a>
<p>' . $check->words($r_mn['noi_dung'], '45') . '</p>
<ul>' . $list . '</ul>
</div>';
        return $return;
    }
}
