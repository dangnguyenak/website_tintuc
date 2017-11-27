{header}
<body>
<div class="container">
    <!-- Header -->
    {topbar}
    {banner}
    <div class="line-h"></div>
    <!-- Header -->
    <!-- Content -->
    <div class="content">
        {box_update}
        <!-- End Update Part -->
        <!-- Search -->
        {box_search}
        <!-- iCategory -->
        <div class="i-category fl">
            <h2>{tieude_cat}</h2>
            <div class="icat-detail">
                <h1 class="media-heading">{tieu_de}</h1>
                <span class="i-info clearfix">
    <span class="social">
       <a rel="nofollow"
          href="https://www.facebook.com/sharer/sharer.php?u={link_xem}" target="_blank" class="fb">facebook</a>
       <a rel="nofollow" href="https://twitter.com/share?url={link_xem}" target="_blank" class="tw">twitter</a>
       <a rel="nofollow" href="https://plus.google.com/share?url={link_xem}" target="_blank" class="gg">google+</a>
       <a rel="nofollow" href="http://pinterest.com/pin/create/button/?url={link_xem}" target="_blank"
          class="pt">Pin It</a>
       <a rel="nofollow" href="https://www.linkedin.com/cws/share?{link_xem}" target="_blank" class="ln">LinkedIn</a>
    </span>
<a class="user" href="./danh-muc-{tieude_cat_blank}-{id_cat}.html">{tieude_cat}</a> | {date_post} - <i
                            style="color:#b5b5b5">{view} Lượt xem</i>
     
</span>
                <div class="fb-like" data-href="{link_xem}" data-width="610"
                     data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="standard"
                     data-action="like" data-show-faces="false" data-send="true"></div>

                <div class="content_post">{noi_dung}</div>

                <div class="releted-post">
                    <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo">
                            <li id="yarpp_widget-2" class="widget-container widget_yarpp_widget"><h3
                                        class="widget-title"></h3>
                                <div class='yarpp-related-widget'>
                                    <ol>{list_ngaunhien_2}</ol>
                                </div>
                            </li>
                        </ul>
                    </div><!-- #secondary .widget-area -->
                </div>


                <div class="comments">
                    <p>Bình luận</p>
                    <div class="listcomments">
                        {list_comments}
                    </div>
                </div>
                <div class="send-comment">
                    <div class="head-send-comment">Gửi bình luận</div>
                    <div class="body-send-comment">
                        <form action="./process.php?action=send_comment" method="post">
                            <div class="form-group">
                                <div class="form-label">Tên (*):</div>
                                <div class="form-control"><input required type="text" name="name" placeholder="Tên" class="comment-input"/></div>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Email (*): </div>
                                <div class="form-control"><input required type="text" name="email" placeholder="Email" class="comment-input"/></div>
                            </div>
                            <div class="form-group">Nội dung (*): <textarea required name="noi_dung" id="ckeditor" class="ckeditor"></textarea></div>
                            <div class="send-button"><button class="btn">Gửi</button> </div>
                            <input type="hidden" name="id_post" value="{id_post}">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Bai viet moi & xem nhieu -->
            <div class="popular-content popular-content-detail">
                <h3 class="title-bar ibar-1 fl">Chủ đề cùng chuyên mục</h3>
                <h3 class="title-bar ibar-2 fr">Chủ đề mới nhất</h3>
                <div class="clear"></div>
                <div style="border-right:1px solid #ddd;padding-top:15px; width:325px;" class="ire-2 fl">
                    {list_cung_chude}
                </div>
                <div style="padding-top:15px" class="ire-1 fr">
                    {list_chude_moi}
                </div>
                <div class="clear"></div>
            </div>
            <!-- Bai viet moi & xem nhieu -->
        </div>
        <!-- iCategory -->
        <!-- Float Right -->
        <div class="right-n fl">
            <div class="facebook">
                <h1>CÓ THỂ BẠN QUAN TÂM!</h1>
                <div class="radio-hot">
                    <ul>{list_ngaunhien}</ul>
                </div>
            </div>
            <div class="smartBannerIdentifier"></div>
            <div id="sticky">
                <div class="radio-hot">
                    <h1>XEM NHIỀU TRONG NGÀY</h1>
                    <ul>{list_xemnhieu}</ul>
                </div>
            </div>
        </div>
        <br clear="all"/>

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