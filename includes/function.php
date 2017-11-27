<?php
function check_link($url = NULL)
{
    if ($url == NULL) return false;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);//lay code tra ve cua http
    curl_close($ch);
    if ($httpcode >= 200 && $httpcode < 300) {
        return true;
    } else {
        return false;
    }
}

function duoi_file($filename)
{
    return strtolower(substr(basename($filename), strrpos(basename($filename), ".") + 1));
}

function check_email($email_address)
{
    return ((preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", trim($email_address)) == true) ? true : false);
}

function check_username($string, $valid_chars = "-_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789")
{
    for ($i = 0; $i < strlen($string); $i++) {
        $string_preg_match = preg_quote(substr($string, $i, 1));
        if (preg_match("/{$string_preg_match}/", $valid_chars) == false) {
            return false;
        }
    }
    return true;
}

function check_phone($string, $valid_chars = "0123456789")
{
    if (strlen($string) > '11' OR strlen($string) < '10') {
        return false;
    } else {
        for ($i = 0; $i < strlen($string); $i++) {
            $string_preg_match = preg_quote(substr($string, $i, 1));
            if (preg_match("/{$string_preg_match}/", $valid_chars) == false) {
                return false;
            }
        }
        if (strlen($string) == "10") {
            $dau = substr($string, 0, 3);
        } else {
            $dau = substr($string, 0, 4);
        }
        if (in_array($dau, array("090", "093", "0120", "0121", "0122", "0126", "0128", "091", "094", "0123", "0124", "0125", "0127", "0129", "097", "098", "0162", "0163", "0164", "0165", "0166", "0167", "0168", "0169", "095", "096", "092", "0188", "099", "0199")) == false) {
            return false;
        } else {
            return true;
        }
    }
}

function random_string($max_length = 20, $random_chars = "abcdefghijklmnopqrstuvwxyz0123456789")
{
    $random_string = '';
    for ($i = 0; $i < $max_length; $i++) {
        $random_key = mt_rand(0, strlen($random_chars));
        $random_string .= substr($random_chars, $random_key, 1);
    }
    return strtolower(str_shuffle($random_string));
}

function rand_code($max_length = 20, $random_chars = "abcdefghijklmnopqrstuvwxyz0123456789")
{
    $random_string='';
    for ($i = 0; $i < $max_length; $i++) {
        $random_key = mt_rand(0, strlen($random_chars));
        $random_string .= substr($random_chars, $random_key, 1);
    }
    return strtolower(str_shuffle($random_string));
}

function date_count()
{
    $month = date("d", time());
    $year = date("Y", time());
    if (in_array($month, array("1", "3", "7", "5", "8", "10", "12")) == true) {
        $date = "31";

    } elseif (in_array($month, array("4", "6", "9", "11")) == true) {
        $date = "30";

    } else {
        if ($year % 100 != 0 AND $year % 4 == 0) {
            $date = "29";
        } else {
            $date = "28";
        }

    }
    return $date;
}

function unti_hack($id)

{

    $id = str_replace("+", "", $id);

    $id = str_replace("'", "''", $id);

    $id = str_replace("UNI0N", "", $id);

    $id = str_replace("select", "", $id);

    $id = str_replace("*", "", $id);

    $id = str_replace("%", "", $id);

    $id = str_replace("%", "", $id);

    $id = str_replace("2b", "", $id);

    if (strlen($id) > 10) {

        $id = "";

    }

    return $id;

}

function blank($str)
{
    $chars = array(
        'a' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă', 'A'),
        'e' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'E'),
        'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'I'),
        'o' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ', 'O', 'Ờ'),
        'u' => array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'U'),
        'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Y'),
        'b' => array('b', 'B'),
        'c' => array('c', 'C'),
        'f' => array('f', 'F'),
        'g' => array('g', 'G'),
        'h' => array('h', 'H'),
        'j' => array('j', 'J'),
        'k' => array('k', 'K'),
        'l' => array('l', 'L'),
        'm' => array('m', 'M'),
        'n' => array('n', 'N'),
        'p' => array('p', 'P'),
        'q' => array('q', 'Q'),
        'r' => array('r', 'R'),
        's' => array('s', 'S'),
        't' => array('t', 'T'),
        'v' => array('v', 'V'),
        'x' => array('x', 'X'),
        'z' => array('z', 'Z'),
        'd' => array('đ', 'Đ', 'D'),
        '-' => array('_', ' ', '?', ':', '"', ')', '(', '}', '{', '`', ',', '--', ':', '%', ']', '/', '[', '|', "'"),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function title_blank($str)
{
    $chars = array(
        'a' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă', 'A'),
        'e' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'E'),
        'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'I'),
        'o' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ', 'O', 'Ờ'),
        'u' => array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'U'),
        'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Y'),
        'b' => array('b', 'B'),
        'c' => array('c', 'C'),
        'f' => array('f', 'F'),
        'g' => array('g', 'G'),
        'h' => array('h', 'H'),
        'j' => array('j', 'J'),
        'k' => array('k', 'K'),
        'l' => array('l', 'L'),
        'm' => array('m', 'M'),
        'n' => array('n', 'N'),
        'p' => array('p', 'P'),
        'q' => array('q', 'Q'),
        'r' => array('r', 'R'),
        's' => array('s', 'S'),
        't' => array('t', 'T'),
        'v' => array('v', 'V'),
        'x' => array('x', 'X'),
        'z' => array('z', 'Z'),
        'd' => array('đ', 'Đ', 'D'),
        ' ' => array('_', ' ', '?', ':', '"', ')', '(', '}', '{', '`'),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function mao_danh($str)
{
    $chars = array(
        '***' => array('admin', 'zomua', 'admin', 'ban quan tri', 'Ban Quản Trị', 'adminstartor', 'zOmua', 'ZOMUA', 'ZoMua', 'Hệ thống nhắn tin', 'Hệ Thống Nhắn Tin', 'Ban quan trị'),
    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function tukhoa($str)
{
    $chars = array(
        '' => array('<p>', '</p>', '/', ')', '(', '{', '}', '[', ']', '<', '>'),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function gia($str)
{
    $chars = array(
        '' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă', 'A'),
        '' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', E),
        '' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'I'),
        '' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ', 'O', 'Ờ'),
        '' => array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'U'),
        '' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Y'),
        '' => array('b', 'B'),
        '' => array('c', 'C'),
        '' => array('f', 'F'),
        '' => array('g', 'G'),
        '' => array('h', 'H'),
        '' => array('j', 'J'),
        '' => array('k', 'K'),
        '' => array('l', 'L'),
        '' => array('m', 'M'),
        '' => array('n', 'N'),
        '' => array('p', 'P'),
        '' => array('q', 'Q'),
        '' => array('r', 'R'),
        '' => array('s', 'S'),
        '' => array('t', 'T'),
        '' => array('v', 'V'),
        '' => array('x', 'X'),
        '' => array('z', 'Z'),
        '' => array('đ', 'Đ', 'D'),
        '' => array('_', ' ', '?', ':', '"', ')', '(', '}', '{', '`', ' ', '.'),
        '' => array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z'),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function text($string)
{
    $string = str_replace('&amp;', '&', $string);
    $string = str_replace("'", "'", $string);
    $string = str_replace('&quot;', '"', $string);
    $string = str_replace('&lt;', '<', $string);
    $string = str_replace('&gt;', '>', $string);
    $string = str_replace('\"', '/"', $string);
    return $string;
}

function money($string)
{
    $string = str_replace(' ', '', $string);
    $string = str_replace('.', '', $string);
    $string = str_replace(',', '', $string);
    return $string;
}

function words($str, $num)
{
    $limit = $num - 1;
    $str_tmp = '';
    $str = str_replace(']]>', ']]&gt;', $str);
    $str = strip_tags($str);
    $arrstr = explode(" ", $str);
    if (count($arrstr) <= $num) {
        return $str;
    }
    if (!empty($arrstr)) {
        for ($j = 0; $j < count($arrstr); $j++) {
            $str_tmp .= " " . $arrstr[$j];
            if ($j == $limit) {
                break;
            }
        }
    }
    return $str_tmp . "...";
}

function tenshop($str, $num)
{
    if (strlen($str) <= $num) {
        return $str;
    } else {
        $str_tmp = substr($str, 0, $num);
        $sl = count(explode(" ", $str_tmp));
        if ($sl > 2) {
            $ten_chuan = words($str_tmp, ($sl - 1));
        } else {
            $ten_chuan = $str_tmp . "...";
        }
        return $ten_chuan;
    }
}

function tenthanhvien($str, $num)
{
    if (strlen($str) <= $num) {
        return $str;
    } else {
        $tamthoi = explode(" ", $str);
        $sl = count(explode(" ", $str));
        $ten = "Hi! " . $tamthoi[$sl - 1];
        return $ten;
    }
}

function link_youtube($string)
{
    $string = str_replace('http://www.youtube.com/watch?NR=1&feature=endscreen&v=', '', $string);
    $string = str_replace('http://www.youtube.com/watch?v=', '', $string);
    return $string;
}

function link_phim($string)
{
    $duoi_file = strtolower(substr(basename($string), strrpos(basename($string), ".") + 1));
    $thaythe = str_replace("http://", "", $string);
    $thaythe = str_replace("http://www.", "", $string);
    if (substr($thaythe, 0, 7) == "youtube") {
        $server = "youtube";
    } elseif (substr($thaythe, 0, 10) == "nhaccuatui") {
        $server = "nhaccuatui";
    } elseif (strpos($thaythe, 'vimeo') > 0) {
        $server = "vimeo";
    } elseif (strtolower($duoi_file) == "flv") {
        $server = "flv";
    } elseif (strtolower($duoi_file) == "wmv" OR strtolower($duoi_file) == "avi" OR strtolower($duoi_file) == "mpeg") {
        $server = "media";
    } elseif (strtolower($duoi_file) == "mp3" OR strtolower($duoi_file) == "wma") {
        $server = "mp3";
    } else {
        $server = "no_support";
    }
    return $server;
}


function photo($content, $i, $max_width, $max_height)
{
    $p = 0;
    $patt = '/<img[^>]* src\="([^"]+)"[^>]*>/i';
    if (preg_match_all($patt, $content, $ms)) {
        $rt = '';
        foreach ($ms[1] as &$link) {
            $p = $p + 1;
            if ($i == "0") {
                $rt .= '<img border="0" src="' . $link . '" />' . PHP_EOL;
            } else {
                if ($p < $i) {
                    $rt .= '<img border="0" src="' . $link . '" width="' . $max_width . '" height="' . $max_height . '" />' . PHP_EOL;
                } else {
                    $rt .= '' . PHP_EOL;
                }
            }
        }
        return $rt;
    }

    return '';
}

function index_setting($name)
{
    global $connectionDb;
    $index_setting = @mysqli_query($connectionDb,"SELECT value FROM index_setting WHERE name = '$name'");
    $row_index_setting = @mysqli_fetch_array($index_setting);
    $total = @mysqli_num_rows($index_setting);
    if ($total < 1) {
        $name = "Chưa Thiết Lập mục này";
    } else {
        $name = $row_index_setting['value'];
    }
    return $name;
}

function thang($value)
{

    $value = str_replace("January", "01", $value);
    $value = str_replace("February", "02", $value);
    $value = str_replace("March", "03", $value);
    $value = str_replace("April", "04", $value);
    $value = str_replace("May", "05", $value);
    $value = str_replace("June", "06", $value);
    $value = str_replace("July", "07", $value);
    $value = str_replace("August", "08", $value);
    $value = str_replace("September", "09", $value);
    $value = str_replace("October", "10", $value);
    $value = str_replace("November", "11", $value);
    $value = str_replace("December", "12", $value);
    $value = str_replace(",", " Ngày ", $value);
    return $value;
}

function phut($value)
{

    $value = str_replace(":", "Phút", $value);
    return $value;
}

function pass_nen($str)
{
    $chars = array(
        '1-' => array('b'),
        '2--' => array('c'),
        '3-' => array('f'),
        '4--' => array('g'),
        '5--' => array('h'),
        '6-' => array('j'),
        '7__' => array('k'),
        '8--' => array('l'),
        '9___' => array('m'),
        '0__-' => array('n'),
        '1_' => array('p'),
        '2_--' => array('q'),
        '3_' => array('r'),
        '4__-' => array('s'),
        '0--' => array('a'),
        '5_--' => array('o'),
        '6__-' => array('e'),
        '7--_-' => array('d'),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function view_pass($str)
{
    $chars = array(
        'b' => array('1-'),
        'c' => array('2--'),
        'f' => array('3-'),
        'g' => array('4--'),
        'h' => array('5--'),
        'j' => array('6-'),
        'k' => array('7__'),
        'l' => array('8--'),
        'm' => array('9___'),
        'n' => array('0__-'),
        'p' => array('1_'),
        'q' => array('2_--'),
        'r' => array('3_'),
        's' => array('4__-'),
        'a' => array('0--'),
        'o' => array('5_--'),
        'e' => array('6__-'),
        'd' => array('7--_-'),

    );
    foreach ($chars as $key => $arr)
        foreach ($arr as $val)
            $str = str_replace($val, $key, $str);
    return $str;
}

function striptags($text)
{
    $esc = array('color', 'span', 'style', 'b', 'u', 'i', 'a', 'img', 'font', 'br', 'p', 'td', 'tr', 'th', 'size', 'hr', 'width', 'height', 'border');
    foreach ($esc as $i) {
        $text = preg_replace("/<$i>/i", "&lt;$i>", $text);
        $text = preg_replace("/<$i (.*)>/i", "&lt;$i $1>", $text);
        $text = preg_replace("/<\/$i>/i", "&lt;/$i>", $text);
    }
    $text = strip_tags($text);
    foreach ($esc as $i) {
        $text = preg_replace("/&lt;$i>/i", "<$i>", $text);
        $text = preg_replace("/&lt;$i (.*)>/i", "<$i $1>", $text);
        $text = preg_replace("/&lt;\/$i>/i", "</$i>", $text);
    }
    return $text;
}

function null($string)
{
    return ((empty($string) == false) ? false : true);
}

function format_number($number)
{
    return strrev(preg_replace("/(\d{3})(?=\d)(?!\d*\.)/", "$1,", strrev(intval($number))));
}

function thumbnail_name($filename)
{
    $extension = duoi_file($filename);
    return preg_replace("/([-_a-zA-Z0-9]{1,20})\.{$extension}/i", "$1_thumb.{$extension}", $filename);
}

function mobile_detect()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return TRUE;

    } else {
        return FALSE;
    }
}

///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// MỘT SỐ THAO TÁC VỚI ẢNH /////////////////////////////////////
function load_img($filename)
{

    $image_info = getimagesize($filename);
    $this->image_type = $image_info[2];
    if ($this->image_type == IMAGETYPE_JPEG) {

        $this->image = imagecreatefromjpeg($filename);
    } elseif ($this->image_type == IMAGETYPE_GIF) {

        $this->image = imagecreatefromgif($filename);
    } elseif ($this->image_type == IMAGETYPE_PNG) {

        $this->image = imagecreatefrompng($filename);
    }
}

function save_img($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
{

    if ($image_type == IMAGETYPE_JPEG) {
        imagejpeg($this->image, $filename, $compression);
    } elseif ($image_type == IMAGETYPE_GIF) {

        imagegif($this->image, $filename);
    } elseif ($image_type == IMAGETYPE_PNG) {

        imagepng($this->image, $filename);
    }
    if ($permissions != null) {

        chmod($filename, $permissions);
    }
}

function output_img($image_type = IMAGETYPE_JPEG)
{

    if ($image_type == IMAGETYPE_JPEG) {
        imagejpeg($this->image);
    } elseif ($image_type == IMAGETYPE_GIF) {

        imagegif($this->image);
    } elseif ($image_type == IMAGETYPE_PNG) {

        imagepng($this->image);
    }
}

function getWidth_img()
{

    return imagesx($this->image);
}

function getHeight_img()
{

    return imagesy($this->image);
}

function resizeToHeight_img($height)
{

    $ratio = $height / $this->getHeight_img();
    $width = $this->getWidth_img() * $ratio;
    $this->resize_img($width, $height);
}

function resizeToWidth_img($width)
{
    $ratio = $width / $this->getWidth_img();
    $height = $this->getHeight_img() * $ratio;
    $this->resize_img($width, $height);
}

function scale_img($scale)
{
    $width = $this->getWidth_img() * $scale / 100;
    $height = $this->getHeight_img() * $scale / 100;
    $this->resize_img($width, $height);
}

function resize_img($width, $height)
{
    $new_image = imagecreatetruecolor($width, $height);
    imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth_img(), $this->getHeight_img());
    $this->image = $new_image;
}

///////// ví dụ 1: resize ảnh picture.jpg thành kích thước 250x400 sau đó lưu thành file picture2.jpg
//$image = new class_check();
//$image->load_img('picture.jpg');
//$image->resize_img(250,400);
//$image->save_img('picture2.jpg');
//////// ví dụ 2: resize theo chiều rộng và vẫn giữ đc tỷ lệ giữa chiều rộng và chiêu cao
//$image = new class_check();
//$image->load_img('picture.jpg');
//$image->resizeToWidth_img(250);
//$image->save_img('picture2.jpg');
/////// ví dụ 3 : resize file ảnh giảm xuống còn 1 nửa (50%) 
//$image = new class_check();
//$image->load_img('picture.jpg');
//$image->scale_img(50);
//$image->save_img('picture2.jpg');
////// ví dụ 4: resize từ 1 file sau đó xuất ra nhiều file khác nhau. ví dụ sau sẽ resize file picture.jpg có nhiều cao 500px lưu thành file picture2.jpg và chiều cao 200px lưu thành file picture3.jpg 
//$image = new SimpleImage();
//$image->load('picture.jpg');
//$image->resizeToHeight(500);
//$image->save('picture2.jpg');
//$image->resizeToHeight(200);
//$image->save('picture3.jpg');
///// ví dụ 5: xuất thẳng xuống trình duyệt và cho trình duyệt nhận biết đây là ảnh qua header và không cần lưu thành file.
//header('Content-Type: image/jpeg');
//include('SimpleImage.php');
//$image = new SimpleImage();
//$image->load('picture.jpg');
//$image->resizeToWidth(150);
//$image->output()
///// ví dụ 6: Lấy ảnh thừ get rùi resize sau đó lưu lại
//if( isset($_GET['link']) ) {
//   header('Content-Type: image/jpeg');
//   $image = new SimpleImage();
//   $image->load($_GET['link']);
//   $image->resizeToWidth(150);
//   $image->save('./uploads/minh_hoa/picture2.jpg');
//   $image->output();
//   exit();
//}


///////////////////////////// HẾT THAO TÁC VỚI ẢNH ////////////////////////////////////////
?>
