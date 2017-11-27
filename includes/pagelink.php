<?php
global $connectionDb;
$pagelink = @mysqli_query($connectionDb,"SELECT * FROM tuyen_sinh WHERE duyet='1'");

$row_pagelink = @mysqli_fetch_array($pagelink);
$sopage = @mysqli_num_rows($pagelink);
$total_pages = ceil($sopage / $display);
if ($total_pages < 2) {
    echo "<span class=current>Trang Duy Nhất</span>";
} else {
    $select = ($start / $display) + 1;
    $next = $select + 1;
    $back = $select - 1;
    if ($select > 1) {
        echo "<a href=/tuyen-sinh-" . $back . ".html>BACK</a>";
    }
    //end back page
    if ($total_pages <= 10) {
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i != $select) {
                echo "<a href=/tuyen-sinh-" . $i . ".html>" . $i . "</a>";
            } else {
                echo "<span class=current>{$i}</span>";
            }
        }

    } //End if total page nho hon 10
    else {
        if ($select <= 5) {
            for ($i = 1; $i <= 10 && $i <= $total_pages; $i++) {
                if ($i != $select) {
                    echo "<a href=/tuyen-sinh-" . $i . ".html>" . $i . "</a>";
                } else {
                    echo "<span class=current>{$i}</span>";
                }
            }
        } //End select < total page -10
        else {
            if ($select > 5 && $select <= ($total_pages - 5)) {
                for ($i = ($select - 4); $i <= ($select + 5) && $i <= $total_pages; $i++) {
                    if ($i != $select) {
                        echo "<a href=/tuyen-sinh-" . $i . ".html>" . $i . "</a>";
                    } else {
                        echo "<span class=current>{$i}</span>";
                    }
                }
            } //end select >5 and select < total_page - 10
            else {
                for ($i = ($total_pages - 9); $i <= $total_pages; $i++) {
                    if ($i != $select) {
                        echo "<a href=/tuyen-sinh-" . $i . ".html>" . $i . "</a>";
                    } else {
                        echo "<span class=current>{$i}</span>";
                    }
                }
            }
//End select > total_page - 10
        }
//total_page >10
    }
    if ($select < $total_pages) {

        echo "<a href=/tuyen-sinh-" . $next . ".html>NEXT</a>";

    }
}
//echo "<span class=current>Có Tổng Số: ".$total_pages." Trang</span>";
