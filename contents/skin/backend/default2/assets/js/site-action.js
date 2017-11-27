function check_number(e) {

    var keypressed = null;

    if (window.event) {

        keypressed = window.event.keyCode; //IE

    }

    else {


        keypressed = e.which; //NON-IE, Standard

    }

    if (keypressed < 48 || keypressed > 57) {

        if (keypressed == 8 || keypressed == 127) {

            return;

        }

        return false;

    }

}

//////////////////////////////////////////////

$(".logout").delegate('click', function () {

    $.ajax({

        url: "tlca_process.php?action=logout",

        type: "post",

        success: function () {

            window.location = 'login.php';

        }

    });

});

//////////////////////////////////////////////


$("#page_next").delegate('keyup', function () {

    page = parseInt($(this).val());

    action = $(this).attr("action");

    $.ajax({

        url: 'process.php',

        type: 'post',

        data: 'action=' + action + '&page=' + page,

        success: function (kq) {

            if (kq.length < 6) {

                alert('không tìm thấy kết quả nào');

            } else {

                $(".reload").html(kq);

            }

        }


    });

});

//////////////////////////////////////////////

$(".next").on('click', function () {

    page = $("#page_next").val();

    page++

    action = $("#page_next").attr("action");

    $.ajax({

        url: 'process.php',

        type: 'post',

        data: 'action=' + action + '&page=' + page,

        success: function (kq) {

            if (kq.length < 6) {

                alert('không tìm thấy kết quả nào');

            } else {

                $(".reload").html(kq);

                $("#page_next").attr("value", page);

            }

        }

    });

});

//////////////////////////////////////////////

//////////////////////////////////////////////

$(".back").delegate('click', function () {

    page = $("#page_next").val();

    if (page > 1) {

        page--

    }

    action = $("#page_next").attr("action");

    $.ajax({

        url: 'process.php',

        type: 'post',

        data: 'action=' + action + '&page=' + page,

        success: function (kq) {

            if (kq.length < 6) {

                alert('không tìm thấy kết quả nào');

            } else {

                $(".reload").html(kq);

                $("#page_next").attr("value", page);

            }

        }

    });

});

//////////////////////////////////////////////

function del_danhmuc(id) {

    $.ajax({

        url: "process.php",

        type: "post",

        data: "action=del_danhmuc&id=" + id,

        success: function (kq) {

            if (kq == 1) {

                $("#dong_" + id).hide("slow");

            } else {

                alert(kq);

            }

        }

    });

}

//////////////////////////////////////////////

function del_nhacchuong(id) {

    $.ajax({

        url: "process.php",

        type: "post",

        data: "action=del_nhacchuong&id=" + id,

        success: function (kq) {

            if (kq == 1) {

                $("#dong_" + id).hide("slow");

            } else {

                alert(kq);

            }

        }

    });

}

//////////////////////////////////////////////

function del_tintuc(id) {

    $.ajax({
        url: "process.php",
        type: "post",
        data: "action=del_tintuc&id=" + id,
        success: function (kq) {
            if (kq == 1) {
                $("#dong_" + id).hide("slow");
            } else {
                alert(kq);
            }
        }
    });
}

function del_comment(id) {

    $.ajax({
        url: "process.php",
        type: "post",
        data: "action=del_comment&id=" + id,
        success: function (kq) {
            if (kq == 1) {
                $("#dong_" + id).hide("slow");
            } else {
                alert(kq);
            }
        }
    });
}

//////////////////////////////////////////////
$('tbody').delegate('tr', 'click', function () {
//
// })
    value = $(this).val();
    id = $(this).attr("post");
    if (value == 0) {
        $(this).attr("value", "1");
    } else {
        $(this).attr("value", "0");
    }
    $.ajax({
        url: "process.php?action=duyet&id=" + id + "&value=" + value,
        type: "post",
        success: function (kq) {
        }

    });
});

//////////////////////////////////////////////
$('input[name=hot]').delegate('click', function () {
    value = $(this).val();
    id = $(this).attr("post");
    if (value == 0) {
        $(this).attr("value", "1");
    } else {
        $(this).attr("value", "0");
    }
    $.ajax({
        url: "process.php?action=hot&id=" + id + "&value=" + value,
        type: "post",
        success: function (kq) {
        }

    });

});

//////////////////////////////////////////////

function del_truyen(id) {

    $.ajax({

        url: "process.php",

        type: "post",

        data: "action=del_truyen&id=" + id,

        success: function (kq) {

            if (kq == 1) {

                $("#dong_" + id).hide("slow");

            } else {

                alert(kq);

            }

        }

    });

}

//////////////////////////////////////////////

function del_game(id) {

    $.ajax({

        url: "process.php",

        type: "post",

        data: "action=del_game&id=" + id,

        success: function (kq) {

            if (kq == 1) {

                $("#dong_" + id).hide("slow");

            } else {

                alert(kq);

            }

        }

    });

}

///////////////////////////////////////////////////////

$(".confirm").delegate('click', function () {

    if (confirm('Bạn có thực sự muốn thực hiện hành động này?')) {

        id = $(this).attr("value");

        action = $(this).attr("action");

        $.ajax({

            url: "process.php",

            type: "post",

            data: "action=" + action + "&id=" + id,

            success: function (kq) {

                if (kq == 1) {

                    $("#dong_" + id).hide("slow");

                } else {

                }

            }

        });

    } else {

    }


});

///////////////////////////////////////////////////////

$(".td_duyet").delegate('click', function () {

    alert('ok');


})

///////////////////////////////////////////////////////

$(".loai_tailieu").delegate('click', function () {

    value = $(this).val();

    loai_download = $("input.loai_download[type='radio']:checked").val();

    if (value == '2' || value == "3") {

        $(".tr_loai_download").show("slow");

        if (loai_download == "3") {

            $(".tr_gia").show("slow");

        }

    } else {

        $(".tr_loai_download").hide("slow");

        $(".tr_gia").hide("slow");

    }


});

$(".loai_download").delegate('click', function () {

    loai_download = $(this).val();

    if (loai_download == '3') {

        $(".tr_gia").show("slow");

    } else {

        $(".tr_gia").hide("slow");

    }


});

///////////////////////////////////////////////////////

$("#chon_het").delegate('click', function () {

    status = this.checked;

    if (status == "true") {

        $("input[name=chon[]]").each(function () {

            this.checked = 'true';

        });


    } else {

        $("input[name=chon[]]").each(function () {

            this.checked = 'false';

        });

    }


});

////////////////////////////////////////////////////////

$(".submit_form").delegate('click', function () {

    $("#thuc_hien").click();

});

///////////////////////////////////////////////////////

$('select[name=noidung_timkiem]').delegate('change', function () {

    $('input[name=hidden_noidung_timkiem]').val($(this).val());

});

///////////////////////////////////////////////////////

$('select[name=kieu_timkiem]').delegate('change', function () {

    $('input[name=hidden_kieu_timkiem]').val($(this).val());

});

///////////////////////////////////////////////////////

$(".button_timkiem").delegate('click', function () {

    key = $("input[name=keywords]").val();

    kieu_timkiem = $('input[name=hidden_kieu_timkiem]').val();

    noidung_timkiem = $('input[name=hidden_noidung_timkiem]').val();

    $.ajax({

        url: "process.php?action=timkiem&key=" + key + "&kieu_timkiem=" + kieu_timkiem + "&noidung_timkiem=" + noidung_timkiem,

        type: "post",

        success: function (kq) {

            $(".reload").html(kq);

        }


    });


});

///////////////////////////////////////////////////////

$("input[name=keywords]").delegate('keypress', function (e) {

    if (e.which == 13) {

        key = $("input[name=keywords]").val();

        kieu_timkiem = $('input[name=hidden_kieu_timkiem]').val();

        noidung_timkiem = $('input[name=hidden_noidung_timkiem]').val();

        $.ajax({

            url: "process.php?action=timkiem&key=" + key + "&kieu_timkiem=" + kieu_timkiem + "&noidung_timkiem=" + noidung_timkiem,

            type: "post",

            success: function (kq) {

                $(".reload").html(kq);

            }


        });

    }

});

///////////////////////////////////////////////////////