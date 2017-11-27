<div style="display: block;" id="bttop" title="Lên đầu trang">BACK TO TOP</div>
<!-- Float Right -->
<div class="clear"></div>
</div>
<!-- Content -->
<!-- Footer -->
<div id="login-needed" class="modal">
    <div class="modal-header">
        <a class="remove-login dark fr" title="Close"></a>
        <div class="clear"></div>
    </div>
    <div class="modal-body">
        <div class="popup">
            <div class="popup-header">
                <div class="headline"></div>
            </div>
            <div class="popup-body">
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop" style="display: none;"></div>
<script type="text/javascript" charset="utf-8">
    jQuery(".remove").click(function () {
        //jQuery("#modal-stages").slideToggle(0);
        jQuery("#modal-stages").removeClass("lightbox-show");
        jQuery(".modal-backdrop").slideToggle(0);
    });
    jQuery(".login-form").click(function () {
        //jQuery("#modal-stages").slideToggle(0);
        jQuery("#login-needed").addClass("lightbox-show");
        jQuery(".modal-backdrop").slideToggle(0);
    });
    jQuery(".remove-login").click(function () {
        //jQuery("#modal-stages").slideToggle(0);
        jQuery("#login-needed").removeClass("lightbox-show");
        jQuery(".modal-backdrop").slideToggle(0);
    });
</script>
<div class="wrapper-ft">
    <div class="footer">
        <div class="foot_right fr">
        </div>
        <div class="foot_left">
        </div>
    </div>
    <!-- Widget -->
    <div class="cs-widget">
        <div id="primary" class="widget-area" role="complementary">
        </div><!-- #secondary .widget-area -->
    </div>
</div>