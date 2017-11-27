{header}
<body>
<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
                page = $('#infscr-loading').attr("page");
                limit = $('#infscr-loading').attr("limit");
                if (page == 0) {
                    $('#infscr-loading').css("display", "none");
                } else {
                    page++;
                    $('#infscr-loading').attr("page", page);
                    $('#infscr-loading').css("display", "block");
                    $.ajax({
                        url: "process.php?action=load_mypost&page=" + page + "&limit=" + limit,
                        type: "post",
                        success: function (kq) {
                            if (kq == 0) {
                                $('.thongbao_load').html('<em>Không có bài viết nào tiếp theo.</em>');
                                $('#infscr-loading').attr("page", "0");
                                setInterval(function () {
                                    $('#infscr-loading').css("display", "none");
                                }, 5000);
                            } else {
                                $('#nav-below').before(kq);
                            }

                        }

                    });
                }
            } else {
                $('#infscr-loading').css("display", "none");
            }
        });

    });
</script>
<div class="container">
    <!-- Header -->
    {topbar}
    {banner}
    <!-- Header -->
    <!-- Content -->
    <div class="content">
        {box_update}
        <!-- End Update Part -->
        <!-- Search -->
        {box_search}
        <div class="clear"></div>
        <!-- iCategory -->
        <div class="i-category fl">
            <h2>{tieu_de}</h2>
            <div id="content" class="icat clearfix">
                {list_baiviet}
                <div id="nav-below" class="navigation"></div>
                <div id="infscr-loading" style="display:none;" page="1" limit="{limit}">
                    <img alt="Loading..." src="./contents/skin/frontend/default/images/ajax-loader.gif">
                    <div style="opacity: 1;"><p style="text-align: center" class="thongbao_load"><em>Đang xử lý dữ liệu.</em></p></div>
                </div>
                <!-- #nav-below -->
            </div>
        </div>
        <!-- iCategory -->
        <!-- Float Right -->
        <div class="right-n fl">
            {box_facebook}
            <div class="smartBannerIdentifier"></div>
            <div id="sticky">
                <div class="radio-hot">
                    <h1>Được xem nhiều nhất</h1>
                    <ul>{list_xemnhieu}</ul>
                </div>
            </div>
        </div>
        <br clear="all"/>
        <div id='bttop'>BACK TO TOP</div>
        <!-- Float Right -->
        <div class="clear"></div>
    </div>
    <!-- Content -->
    <!-- Footer -->
    {footer}
    <!-- Footer -->
    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript" src="./contents/skin/frontend/default/js/jquery_002.js"></script>
    <script type="text/javascript">
        // Because the `wp_localize_script` method makes everything a string
        infinite_scroll = jQuery.parseJSON(infinite_scroll);

        jQuery(infinite_scroll.contentSelector).infinitescroll(infinite_scroll, function (newElements, data, url) {
            eval(infinite_scroll.callback);
        });
    </script>
</div>
</body></html>