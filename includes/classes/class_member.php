<?php

class class_member extends manage
{
    private function getConnection()
    {
        global $connectionDb;
        return $connectionDb;
    }
    function login($username, $password)
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE username='$username'");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $r_tt = mysqli_fetch_assoc($thongtin);
            $pass = md5($password);
            if ($pass !== $r_tt['password']) {
                $kq = 2;
            } else {
                $kq = 1;

                $hientai = time();
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $username = $r_tt['username'];
                $thoi_gian = @date("H:i:s d/m/Y", time());
                $link = "login.php";
                $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
                $gioi_han = time() - 3600;
                $thongtin_online = mysqli_query($this->getConnection(), "SELECT * FROM user_online2 WHERE username='$username' AND ip='$ip_address'");
                $total_online = mysqli_num_rows($thongtin_online);
                if ($total_online == "0") {
                    mysqli_query($this->getConnection(), "INSERT INTO user_online2 (date,ip,username,thoi_gian,dang_xem,thongtin,user_id) VALUES('$hientai','$ip_address','$username','$thoi_gian','$link','$trinh_duyet','{$r_tt['user_id']}')");
                } else {
                    mysqli_query($this->getConnection(), "UPDATE user_online2 SET date='$hientai' WHERE username='$username' AND ip='$ip_address'");
                }
            }
        }
        return $kq;
    }

    function email_login($email)
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE email='$email'");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $kq = 1;
            $r_tt = mysqli_fetch_assoc($thongtin);
            $hientai = time();
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $username = $r_tt['username'];
            $thoi_gian = @date("H:i:s d/m/Y", time());
            $link = "openid_login.php";
            $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
            $gioi_han = time() - 3600;
            $thongtin_online = mysqli_query($this->getConnection(), "SELECT * FROM user_online2 WHERE username='{$r_tt['username']}' AND ip='$ip_address'");
            $total_online = mysqli_num_rows($thongtin_online);
            if ($total_online == "0") {
                mysqli_query($this->getConnection(), "INSERT INTO user_online2 (date,ip,username,thoi_gian,dang_xem,thongtin,user_id) VALUES('$hientai','$ip_address','{$r_tt['username']}','$thoi_gian','$link','$trinh_duyet','{$r_tt['user_id']}')");
            } else {
                mysqli_query($this->getConnection(), "UPDATE user_online2 SET date='$hientai' WHERE username='{$r_tt['username']}' AND ip='$ip_address'");

            }
        }
        return $kq;

    }

    function facebook_login($id)
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE id_facebook='$id'");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $kq = 1;
            $r_tt = mysqli_fetch_assoc($thongtin);
            $hientai = time();
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $username = $r_tt['username'];
            $thoi_gian = @date("H:i:s d/m/Y", time());
            $link = "openid_login.php";
            $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
            $gioi_han = time() - 3600;
            $thongtin_online = mysqli_query($this->getConnection(), "SELECT * FROM user_online2 WHERE username='{$r_tt['username']}' AND ip='$ip_address'");
            $total_online = mysqli_num_rows($thongtin_online);
            if ($total_online == "0") {
                mysqli_query($this->getConnection(), "INSERT INTO user_online2 (date,ip,username,thoi_gian,dang_xem,thongtin,user_id) VALUES('$hientai','$ip_address','{$r_tt['username']}','$thoi_gian','$link','$trinh_duyet','{$r_tt['user_id']}')");
            } else {
                mysqli_query($this->getConnection(), "UPDATE user_online2 SET date='$hientai' WHERE username='{$r_tt['username']}' AND ip='$ip_address'");

            }


        }
        return $kq;

    }

/////////////////////////////////////////////////
    function register($username, $password, $re_password)
    {
        $check = $this->load('class_check');
        if (strlen($username) < 4 OR strlen($username) > 160) {
            $kq = 0;
        } elseif (strlen($password) < 6) {
            $kq = 1;
        } elseif ($re_password !== $password) {
            $kq = 2;
        } elseif ($check->check_username($username) == FALSE) {
            $kq = 5;
        } else {
            $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE username='$username'");
            $total = mysqli_num_rows($thongtin);
            if ($total > 0) {
                $kq = 3;
            } else {
                $kq = 4;
                $pass = md5($password);
                mysqli_query($this->getConnection(), "INSERT INTO user_info (username,password,shop)VALUES('$username','$pass','tlca_two')");
            }
        }

        return $kq;

    }

/////////////////////////////////////////////////
    function doi_matkhau($user_id, $password, $pass_new1, $pass_new2)
    {
        if (strlen($password) < 6) {
            $kq = 0;
        }
        if (strlen($pass_new1) < 6) {
            $kq = 1;
        } elseif ($pass_new1 !== $pass_new2) {
            $kq = 2;
        } else {
            $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE user_id='$user_id'");
            $r_tt = mysqli_fetch_assoc($thongtin);
            $pass = md5($password);
            $pass2 = md5($pass_new1);
            if ($pass !== $r_tt['password']) {
                $kq = 3;
            } else {
                $kq = 4;
                mysqli_query($this->getConnection(), "UPDATE user_info SET password='$pass2' WHERE user_id='$user_id'");
            }
        }

        return $kq;

    }

    function logout($user_id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        mysqli_query($this->getConnection(), "DELETE FROM user_online2 WHERE user_id='$user_id' AND ip='$ip'");
        $gioi_han = time() - 3600;
        mysqli_query($this->getConnection(), "DELETE FROM user_online2 WHERE date<'$gioi_han'");
        unset($_SESSION['id_facebook']);
        unset($_SESSION['em']);
    }

    function user_info($user_id)
    {
        $user_id = intval($user_id);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE user_id='$user_id'");
        $total = mysqli_num_rows($thongtin);

        $r_tt='';
        if ($total > 0) {
            $r_tt = mysqli_fetch_assoc($thongtin);
        }
        return $r_tt;
    }

    function acount_info($username)
    {
        $username = addslashes($username);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_info WHERE username='$username'");
        $total = mysqli_num_rows($thongtin);

        $r_tt=null;
        if ($total > 0) {
            $r_tt = mysqli_fetch_assoc($thongtin);
        }
        return $r_tt;
    }

///////////////////////////////////////////////////////////
    function check_login()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hientai = time();
        $thoi_gian = @date("H:i:s d/m/Y", $hientai);
        $link = "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'];
        $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
        $gioi_han = time() - 3600;
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_online2 WHERE thongtin='$trinh_duyet' AND ip='$ip' AND date >'$gioi_han' ORDER BY date DESC LIMIT 1");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $r_tt = mysqli_fetch_assoc($thongtin);
            $kq = $r_tt['user_id'];
            mysqli_query($this->getConnection(), "UPDATE user_online2 SET date='$hientai',thoi_gian='$thoi_gian' WHERE ip='$ip' AND username='{$r_tt['username']}'");
        }
        mysqli_query($this->getConnection(), "DELETE FROM user_online2 WHERE date<'$gioi_han'");
        return $kq;
    }
}
