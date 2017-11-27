<?php

class class_e_member extends manage
{
    private function getConnection()
    {
        global $connectionDb;
        return $connectionDb;
    }

    function login($username, $password)
    {
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM e_min WHERE username='$username'");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $r_tt = mysqli_fetch_assoc($thongtin);
            $pass = md5($password);
            if ($pass !== $r_tt['password']) {
                $kq = 2;
            } else {
                $_SESSION['admin'] = $username;

                $kq = 1;
                $hientai = time();
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $username = $r_tt['username'];
                $thoi_gian = @date("H:i:s d/m/Y", time());
                $link = "login.php";
                $trinh_duyet = $_SERVER['HTTP_USER_AGENT'];
                $gioi_han = time() - 3600;
                $thongtin_online = mysqli_query($this->getConnection(), "SELECT * FROM user_online3 WHERE username='$username' AND ip='$ip_address'");
                $total_online = mysqli_num_rows($thongtin_online);
                if ($total_online == "0") {
                    mysqli_query($this->getConnection(), "INSERT INTO user_online3 (date,ip,username,thoi_gian,dang_xem,thongtin,user_id) VALUES('$hientai','$ip_address','$username','$thoi_gian','$link','$trinh_duyet','{$r_tt['id']}')");
                } else {
                    mysqli_query($this->getConnection(), "UPDATE user_online3 SET date='$hientai' WHERE username='$username' AND ip='$ip_address'");
                }
            }
        }
        return $kq;

    }

//////////////////////////////////////////////////////////
    function logout($user_id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        mysqli_query($this->getConnection(), "DELETE FROM user_online3 WHERE user_id='$user_id' AND ip='$ip'");
        $gioi_han = time() - 3600;
        mysqli_query($this->getConnection(), "DELETE FROM user_online3 WHERE date<'$gioi_han'");
    }

///////////////////////////////////////////////////////////
    function user_info($user_id)
    {
        $user_id = intval($user_id);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM e_min WHERE id='$user_id'");
        $total = mysqli_num_rows($thongtin);

        $r_tt = null;
        if ($total > 0) {
            $r_tt = mysqli_fetch_assoc($thongtin);
        }
        return $r_tt;
    }

///////////////////////////////////////////////////////////
    function acount_info($username)
    {
        $username = addslashes($username);
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM e_min WHERE username='$username'");
        $total = mysqli_num_rows($thongtin);

        if ($total > 0) {
            $r_tt = mysqli_fetch_assoc($thongtin);

            return $r_tt;
        }
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
        $thongtin = mysqli_query($this->getConnection(), "SELECT * FROM user_online3 WHERE thongtin='$trinh_duyet' AND ip='$ip' AND date >'$gioi_han' ORDER BY date DESC LIMIT 1");
        $total = mysqli_num_rows($thongtin);
        if ($total == "0") {
            $kq = 0;
        } else {
            $r_tt = mysqli_fetch_assoc($thongtin);
            $kq = $r_tt['id'];
            mysqli_query($this->getConnection(), "UPDATE user_online3 SET date='$hientai',thoi_gian='$thoi_gian' WHERE ip='$ip' AND username='{$r_tt['username']}'");
        }
        mysqli_query($this->getConnection(), "DELETE FROM user_online3 WHERE date<'$gioi_han'");
        return $kq;
    }


}

