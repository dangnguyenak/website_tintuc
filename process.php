<?php
include('./includes/SystemGlobalFile.php');
$check = $systemAction->load('class_check');
$index = $systemAction->load('class_index');
$class_member = $systemAction->load('class_member');
$custom_query = $systemAction->load('class_custom');
$user_id = $class_member->check_login();
$user_info = $class_member->user_info($user_id);
$systemSkin = $systemAction->load('class_skin');

if (!isset($_REQUEST['action']) OR $_REQUEST['action'] == "") {
    header("location: index.html");
} else {
    $action = $_REQUEST['action'];
    if ($action == "load_baiviet") {

        $page = intval($_REQUEST['page']);
        $cat = intval($_REQUEST['cat']);
        $limit = intval($_REQUEST['limit']);
        $start = $limit * $page - $limit;
        $query = "SELECT * FROM tintuc WHERE loai='$cat' ORDER BY id DESC LIMIT $start,$limit";
        $totalPosts = $custom_query->num_rows($query);
        if ($totalPosts == "0") {
            echo '0';
        } else {
            echo $index->list_baiviet_cat($cat, $page, $limit);
        }

    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "load_baiviet_timkiem") {
        $page = intval($_REQUEST['page']);
        $key = addslashes($_REQUEST['key']);
        $from = isset($_REQUEST['from']) && strlen($_REQUEST['from']) >= 10 ? addslashes($_REQUEST['from']) : '';
        $to = isset($_REQUEST['to']) && strlen($_REQUEST['to']) >= 10 ? addslashes($_REQUEST['to']) : '';
        $limit = intval($_REQUEST['limit']);
        $start = $limit * $page - $limit;
        $query = "SELECT * FROM tintuc WHERE tieu_de LIKE '%$key%'";
        if ($from !== '' && $to !== '')
            $query = "SELECT * FROM tintuc WHERE date_post BETWEEN $from AND $to";
        $query .= " ORDER BY id DESC LIMIT $start,$limit";
        $totalPosts = $custom_query->num_rows($query);
        if ($totalPosts == "0") {
            echo '0';
        } else {
            echo $index->list_baiviet_timkiem($key, $from, $to, $page, $limit);
        }

    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "load_mypost") {
        $page = intval($_REQUEST['page']);
        $limit = intval($_REQUEST['limit']);
        $start = $limit * $page - $limit;
        $query = "SELECT * FROM tintuc WHERE user_id = '$user_id' ORDER BY id DESC LIMIT $start,$limit";
        $totalPosts = $custom_query->num_rows($query);
        if ($totalPosts == "0") {
            echo '0';
        } else {
            echo $index->list_mypost($user_id, $page, $limit);
        }
    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "load_mempost") {
        $page = intval($_REQUEST['page']);
        $limit = intval($_REQUEST['limit']);
        $user_id = intval($_REQUEST['id']);
        $start = $limit * $page - $limit;
        $query = "SELECT * FROM tintuc WHERE user_id = '$user_id' AND duyet='1' ORDER BY id DESC LIMIT $start,$limit";
        $totalPosts = $custom_query->num_rows($query);
        if ($totalPosts == "0") {
            echo '0';
        } else {
            echo $index->list_mempost($user_id, $page, $limit);
        }
    } ///////////////////////////////////////
    elseif ($action == "upload_avatar") {
        $duoi_minhhoa = $check->duoi_file($_FILES['anh_minhhoa']['name']);
        $file_size = $_FILES['anh_minhhoa']['size'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        if (in_array($duoi_minhhoa, array("png", "gif", "jpg", "jpeg")) == true AND $file_size <= '4000000') {
            @unlink($user_info['avatar']);
            $folder = './uploads/avatar/' . @date('d-m-Y', time());
            if (is_dir($folder) == "1") {
                move_uploaded_file($_FILES["anh_minhhoa"]["tmp_name"], $folder . "/" . $user_info['username'] . "." . $duoi_minhhoa);
                $hinh_mh = $folder . "/" . $user_info['username'] . "." . $duoi_minhhoa;
            } else {
                mkdir($folder);
                move_uploaded_file($_FILES["anh_minhhoa"]["tmp_name"], $folder . "/" . $user_info['username'] . "." . $duoi_minhhoa);
                $hinh_mh = $folder . "/" . $user_info['username'] . "." . $duoi_minhhoa;
            }
            $query = "UPDATE user_info SET avatar='$hinh_mh' WHERE user_id='$user_id'";
            $custom_query->query($query);
            echo '<li class="image-wrap thumbnail" style="width: 100px"><div class="attachment-name">
                <img src="' . $hinh_mh . '" alt="' . $user_info['username'] . '"></div>
                </li>';
        } else {
            echo '';
        }
    } elseif ($action == "post") {
        $duoi_minhhoa = $check->duoi_file($_FILES['minh_hoa']['name']);
        $file_size = $_FILES['minh_hoa']['size'];
        $tieu_de = addslashes($_REQUEST['tieu_de']);
        $cat = intval($_REQUEST['category']);
        $noi_dung = addslashes($_REQUEST['noi_dung']);
        if (in_array($duoi_minhhoa, array("png", "gif", "jpg", "jpeg")) == true AND $file_size <= '4000000' AND strlen($tieu_de) > 3 AND strlen($noi_dung) > 10) {
            $folder = './uploads/minh_hoa/' . @date('d-m-Y', time());
            if (is_dir($folder) == "1") {
                move_uploaded_file($_FILES["minh_hoa"]["tmp_name"], $folder . "/" . $check->blank($tieu_de) . "-" . $user_id . "." . $duoi_minhhoa);
                $hinh_mh = $folder . "/" . $check->blank($tieu_de) . "-" . $user_id . "." . $duoi_minhhoa;
            } else {
                mkdir($folder);
                move_uploaded_file($_FILES["minh_hoa"]["tmp_name"], $folder . "/" . $check->blank($tieu_de) . "-" . $user_id . "." . $duoi_minhhoa);
                $hinh_mh = $folder . "/" . $check->blank($tieu_de) . "-" . $user_id . "." . $duoi_minhhoa;
            }
            if ($user_info['duyet'] == "1") {
                $query = "INSERT INTO tintuc (user_id,tieu_de,minh_hoa,noi_dung,loai,duyet,date_post)
                    VALUES('$user_id','$tieu_de','$hinh_mh','$noi_dung','$cat','1'," . time() . ")";
                $custom_query->query($query);
                echo "<title> Thông báo hệ thống </title>";
                echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
                echo "<center><img src='./contents/images/loading1.gif'></center>";
                echo "<center><font color=red>Đăng bài thành công! Bài viết đã hiển thị cho người xem</font></center>";
                echo "<meta http-equiv='refresh' content='3;url=./mypost.html'>";
            } else {
                $query = "INSERT INTO tintuc (user_id,tieu_de,minh_hoa,noi_dung,loai,date_post)VALUES('$user_id','$tieu_de','$hinh_mh','$noi_dung','$cat'," . time() . ")";
                $custom_query->query($query);
                echo "<title> Thông báo hệ thống </title>";
                echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
                echo "<center><img src='./contents/images/loading1.gif'></center>";
                echo "<center><font color=red>Đăng bài thành công! Bài viết sẽ được hiển thị khi được ban quản trị duyệt</font></center>";
                echo "<meta http-equiv='refresh' content='3;url=./mypost.html'>";
            }
        } else {
            echo "<title> Thông báo hệ thống </title>";
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
            echo "<center><img src='./contents/images/loading1.gif'></center>";
            echo "<center><font color=red>Vui lòng nhập đầy đủ thông tin!</font></center>";
            echo "<meta http-equiv='refresh' content='3;url=./post.html'>";
        }
    } //////////////////////////////////
    elseif ($action == "del_avatar") {
        $id = intval($_REQUEST['id']);
        $query = "SELECT * FROM up_avatar WHERE id='$id' AND user_id='$user_id'";
        $total = $custom_query->num_rows($query);
        if ($total > 0) {
            $r_tt = mysqli_fetch_assoc($thongtin);
            $query = "DELETE FROM up_avatar WHERE id='$id'";
            $custom_query->query($query);
            unlink($r_tt['minh_hoa']);
            echo '1';
        } else {
            echo '0';
        }
    } //////////////////////////////////
    elseif ($action == "update_thongtin") {
        $ho_ten = addslashes($_REQUEST['ho_ten']);
        $query = "UPDATE user_info SET ho_ten='$ho_ten' WHERE user_id='$user_id'";
        $custom_query->query($query);
        echo 'ok';
    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "logout") {
        $class_member->logout($user_id);
    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "openid_login") {
        $email = addslashes($_REQUEST['email']);
        if ($_SESSION['em'] !== $email) {
            echo "<title> Thông báo hệ thống </title>";
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
            echo "<center><img src='./contents/images/loading1.gif'></center>";
            echo "<center><font color=red>Vui lòng đăng nhập " . $email . " trước khi thực hiện thao tác này!</font></center>";
            echo "<meta http-equiv='refresh' content='3;url=./index.html'>";

        } else {
            $kq = intval($class_member->email_login($email));
            if ($kq == "0") {
                echo "<title> Thông báo hệ thống </title>";
                echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
                echo "<center><img src='./contents/images/loading1.gif'></center>";
                echo "<center><font color=red>Địa chỉ email " . $email . " không tồn tại trên hệ thống!</font></center>";
                echo "<meta http-equiv='refresh' content='3;url=./index.html'>";

            } else {
                echo "<title> Thông báo hệ thống </title>";
                echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
                echo "<center><img src='./contents/images/loading1.gif'></center>";
                echo "<center><font color=red>Đăng nhập hệ thống bằng " . $email . " thành công!</font></center>";
                echo "<meta http-equiv='refresh' content='3;url=./index.html'>";
            }
        }

    } ////////////////////////////////////////////////////////////////////
    elseif ($action == "send_comment") {
        $referUrl = $_SERVER['HTTP_REFERER'];
        $name = addslashes($_REQUEST['name']);
        $email = addslashes($_REQUEST['email']);
        $content = $_REQUEST['noi_dung'];
        $idPost = addslashes($_REQUEST['id_post']);

        if (empty($content))
            header("Location: $referUrl");
        $query = "INSERT INTO comments(id_post,email,ten,noi_dung)VALUES ($idPost,'$email','$name','$content')";
        $custom_query->query($query);
        header("Location: $referUrl");

    } ////////////////////////////////////////////
    else {
        echo 'ok';
    }
}
