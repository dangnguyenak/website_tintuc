<?php

class class_tach extends manage
{

    function photo($content, $i)
    {
        $p = 0;
        $patt = '/<img[^>]* src\="([^"]+)"[^>]*>/i';
        if (preg_match_all($patt, $content, $ms)) {
            $rt = '';
            foreach ($ms[1] as &$link) {
                $p = $p + 1;
                if ($i == "0") {
                    $rt .= $link . ',';
                } else {
                    if ($p < $i) {
                        $rt .= $link . ',';
                    } else {
                        $rt .= '';
                    }
                }
            }
            return $rt;
        }
        return '';
    }

    function title_imelody($content, $i)
    {
        $p = 0;
        $patt = '/<h4 class=\"media-heading\"><a href=\"(.*)\" title=\"(.*)\" class=\"cat\">(.*)<\/a><\/h4>/i';
        if (preg_match_all($patt, $content, $ms)) {
            $rt = '';
            foreach ($ms[3] as &$link) {
                $p = $p + 1;
                if ($i == "0") {
                    $rt .= $link . ',';
                } else {
                    if ($p < $i) {
                        $rt .= $link . ',';
                    } else {
                        $rt .= '';
                    }
                }
            }
            return $rt;
        }

        return '';
    }

    function link_imelody($content, $i)
    {
        $p = 0;
        $patt = '/<h4 class=\"media-heading\"><a href=\"(.*)\" title=\"(.*)\" class=\"cat\">(.*)<\/a><\/h4>/i';
        if (preg_match_all($patt, $content, $ms)) {
            $rt = '';
            foreach ($ms[1] as &$link) {
                $p = $p + 1;
                if ($i == "0") {
                    $rt .= $link . ',';
                } else {
                    if ($p < $i) {
                        $rt .= $link . ',';
                    } else {
                        $rt .= '';
                    }
                }
            }
            return $rt;
        }

        return '';
    }

    function anh_imelody($link)
    {
        $x = explode('src=', $link);
        $y = explode('&', $x[1]);
        return $y[0];
    }
///////////////////////////// HẾT THAO TÁC VỚI ẢNH ////////////////////////////////////////
}

