{header}
<body>
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
        <!-- iRadio -->
        {box_slide}
        <!-- iRadio -->
        <!-- Trắc nghiệm vui -->
        {box_truyen_moi}
        <!-- Trắc nghiệm vui -->
        <div class="clear"></div>
        <!-- List Radio -->
        {box_radio_tamsu}
        <!-- end .category -->
        <!-- end .featCategory -->
        {box_radio_truyenngan}
        <!-- end .category -->
        <!-- end .featCategory -->
        <!-- end .featCategories -->
    </div>
    <!-- List Radio -->
    <!-- Bài viết -->
    <div class="fix-res fl">

        <!-- Family -->
        {box_giadinh}
        <!-- Family -->
        <!-- Thi tham -->
        {box_honnhan}
        <!-- Chia se -->
        {box_ngam}
        <!-- Chia se -->
        <!-- Cảm xúc -->
        {box_cam}
        <!-- Cảm xúc -->
        <!-- Cú đêm -->
        {box_cudem}
        <!-- Cú đêm -->
    </div>
    <!-- Bài viết -->
    <!-- Float Right -->
    <div class="right-n fl">
        {box_tho}
        {box_facebook}
        <div class="smartBannerIdentifier"></div>
        {box_xemnhieu}
    </div>
    <br clear="all">
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