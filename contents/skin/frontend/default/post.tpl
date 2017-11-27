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
        <!-- iCategory -->
        <script type="text/javascript" charset="utf-8" src="./kindeditor.js"></script>
        <script type="text/javascript">
            KE.show({
                id: 'content_editer',
                skinType: 'office',
                cssPath: './index.css',
                items: [
                    'source', 'fullscreen', 'print', 'undo', 'redo', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'subscript',
                    'superscript', 'emoticons', 'link', 'unlink', '-',
                    'title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'image', 'media', 'table', 'hr'
                ]
            });

            KE.show({
                id: 'trich',
                skinType: 'office',
                cssPath: './index.css',
                items: [
                    'source', 'fullscreen', 'print', 'undo', 'redo', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'link', 'unlink', '-',
                    'title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'hr'

                ]

            });

        </script>
        <div class="i-category fl">
            <h2>Đăng bài mới</h2>
            <div class="icat-detail">
                <div class="content_post">
                    <form action="process.php?action=post" method="post" enctype="multipart/form-data">
                        <ul class="wpuf-form">
                            <li class="wpuf-el post_title">
                                <div class="wpuf-label">
                                    <label for="wpuf-post_title"><b>Tiêu đề:</b> <span class="required">*</span></label>
                                </div>
                                <div class="wpuf-fields">
                                    <input class="textfield" id="post_title" type="text" name="tieu_de" placeholder=""
                                           value="" size="40"/>
                                    <span class="wpuf-help"></span>
                                </div>
                            </li>
                            <li class="wpuf-el category">
                                <div class="wpuf-label">
                                    <label for="wpuf-category"><b>Minh họa:</b> <span class="required">*</span></label>
                                </div>
                                <div class="wpuf-fields">
                                    <input type="file" name="minh_hoa">
                                    <span class="wpuf-help"></span>
                                </div>
                            </li>
                            <li class="wpuf-el category">
                                <div class="wpuf-label">
                                    <label for="wpuf-category"><b>Chuyên mục:</b> <span
                                                class="required">*</span></label>
                                </div>
                                <div class="wpuf-fields">
                                    <select data-required="yes" data-type="select" name='category' id='category'
                                            class='category'>
                                        {option_cat}
                                    </select>
                                    <span class="wpuf-help"></span>
                                </div>
                            </li>
                            <li class="wpuf-el post_content cus-cont">
                                <div class="wpuf-label">
                                    <label for="wpuf-post_content"><b>Nội dung:</b> <span
                                                class="required">*</span></label>
                                </div>
                                <div class="wpuf-fields">
                                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                                        <div id="wp-post_content-editor-container" class="wp-editor-container">
                                            <textarea class="required wp-editor-area" style="height: 350px"
                                                      autocomplete="off" cols="40" name="noi_dung"
                                                      id="content_editer"></textarea></div>
                                    </div>
                                    <span class="wpuf-help"></span>
                                </div>
                            </li>
                            <li class="wpuf-submit">
                                <div class="wpuf-label">
                                    &nbsp;
                                </div>
                                <input type="submit" style="display:none;" name="hoanthanh_post">
                                <input type="button" class="button" name="submit_post" value="Đăng bài"/>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!-- iCategory -->
        <!-- Float Right -->
        <div class="right-n fl">
            <div class="facebook">
                <h1>Có thể bạn sẽ quan tâm!</h1>
                <div class="radio-hot">
                    <ul>{list_ngaunhien}</ul>
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