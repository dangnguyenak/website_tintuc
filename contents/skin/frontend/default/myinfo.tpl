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
        <div class="i-category fl">
            <h2>Thông tin cá nhân</h2>
            <!-- START INFO -->
            <div class="profile-info-user">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:10px">Tên hiển thị:</td>
                        <td>{ho_ten}</td>
                        <td align="right" style="font-weight:bold;padding-right:10px">Địa chỉ Email:</td>
                        <td>{email}</td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:10px">Tên tài khoản:</td>
                        <td>{username}</td>
                        <td align="right" style="font-weight:bold;padding-right:10px">Là thành viên từ:</td>
                        <td>{date_reg}</td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:10px">Mã tài khoản:</td>
                        <td>{user_id}</td>
                        <td align="right" style="font-weight:bold;padding-right:10px">Số điểm hiện có:</td>
                        <td><span class="error">{money} Điểm</span></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:10px">Cấp bậc:</td>
                        <td><span class="error"><font color=\"Yellow\">{user_group}</font></span></td>
                        <td align="right" style="font-weight:bold;padding-right:10px">Tổng số bài viết:</td>
                        <td><span class="error">{total_post} Bài</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- END INFO -->
            <div class="title-gray" style="margin-top:15px">
                Thay đổi thông tin cá nhân
            </div>
            <script type="text/javascript" src="./ajaximage/scripts/jquery.form.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    /////////////////////
                    $("#wpuf-avatar-pickfiles").click(function () {
                        $("#select_file").trigger("click");
                    });
                    /////////////////////
                    $("#select_file").change(function () {
                        $(".wpuf-help").html('<img src="./contents/images/loading1.gif">');
                        $("#form_loidhk").ajaxForm({
                            success: function (kq) {
                                if (kq.length > 30) {
                                    $(".thumbnails").html(kq)
                                    $(".wpuf-help").html('Chấp nhận ảnh png,jpeg,jpg,gif,dung lương lớn nhất 1MB');

                                } else {
                                    $(".wpuf-help").html('Chấp nhận ảnh png,jpeg,jpg,gif,dung lương lớn nhất 1MB');
                                }
                            }
                        }).submit();

                    });
                    ////////////////////////////////////////////
                    ///////////////
                });
            </script>
            <div class="icat-detail">
                <div class="content_post">
                    <ul class="wpuf-form">
                        <li class="wpuf-el avatar avatar-thumb-user">
                            <div class="wpuf-label">
                                <label for="wpuf-avatar"><b>Ảnh đại diện:</b></label>
                            </div>
                            <div class="wpuf-fields">
                                <div id="wpuf-avatar-upload-container">
                                    <div class="wpuf-attachment-upload-filelist">
                                        <a id="wpuf-avatar-pickfiles" class="button file-selector" href="javascript:;">Thay
                                            ảnh khác</a>
                                        <span class="wpuf-file-validation" data-required="no" data-type="file"></span>
                                        <ul class="wpuf-attachment-list thumbnails">
                                            <li class="image-wrap thumbnail" style="width: 100px">
                                                <div class="attachment-name">
                                                    <img src="{avatar}" alt="{username}">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .container -->
                                <span class="wpuf-help">Chấp nhận ảnh png,jpeg,jpg,gif,dung lương lớn nhất 1MB</span>

                            </div> <!-- .wpuf-fields -->
                        </li>
                        <li class="wpuf-el nickname">
                            <div class="wpuf-label">
                                <label for="wpuf-nickname"><b>Tên hiển thị:</b></label>
                            </div>

                            <div class="wpuf-fields">
                                <input class="textfield" id="nickname" type="text" name="nickname" value="{ho_ten}"
                                       size="40"/>

                            </div>

                        </li>
                        <li class="wpuf-submit">
                            <div class="wpuf-label">
                                &nbsp;
                            </div>
                            <input type="submit" id="submit_thongtin" style="cursor:pointer;" name="submit"
                                   value="Lưu tên mới"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="form_loidhk" method="post" enctype="multipart/form-data" action="process.php?action=upload_avatar">
            <table style="display:none;">
                <tr id="form_file">
                    <td class="li_select">
                        <input type="file" name="anh_minhhoa" id="select_file" value="">
                    </td>
                </tr>
            </table>
        </form>
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