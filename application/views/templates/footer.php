<div id="footer">
    <div class="logo"></div>

    <ul class="navigation_bar">
        <li><a href="<?php echo base_url(); ?>"><?php echo $menu_main; ?></a></li>
        <li><a href="<?php echo base_url(); ?>card_controller/create"><?php echo $menu_create_card; ?></a></li>
        <li><a href="<?php echo base_url(); ?>about"><?php echo $menu_about; ?></a></li>
    </ul>

    <div style="float: right;">
        <ul class="social_bar">
            <li>
                <a href="#" onclick="share(1); return false;" title="Facebook">
                    <img src="<?php echo base_url(); ?>img/social_icons/facebook.png" height="16px" width="16px"/>
                </a>
            </li>
            <li>
                <a href="#" onclick="share(2); return false;" title="Twitter">
                    <img src="<?php echo base_url(); ?>img/social_icons/twitter.png" height="16px" width="16px"/>
                </a>
            </li>
            <li>
                <a href="#" onclick="share(3); return false;" title="Google+">
                    <img src="<?php echo base_url(); ?>img/social_icons/gplus.png" height="16px" width="16px"/>
                </a>
            </li>
        </ul>
        <div onclick="User.showFeedbackBox();" id="feedback_panel"><?php echo $menu_send_feedback; ?></div>
    </div>
</div>

<div id="modal_mask"></div>

<div id="modal_box"></div>

<div id="message_box_absolute">
    <div id="inner_message"></div>
</div>

<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="/js/classes/user_class.js"></script>
<script src="/js/classes/modal_class.js"></script>
<script src="/js/useful_functions.js"></script>
<script type="text/javascript">
function share(i) {
    var array = ['http://vk.com/share.php?url=', 'http://www.facebook.com/sharer.php?u=', 'http://twitter.com/share?url=', 'https://plus.google.com/share?url=']
    var url = '<?php echo SITE_URL; ?>/';
    var width = 800;
    var height = 500;
    var leftPx = ( screen.availWidth - width ) / 2;
    var topPx = ( screen.availHeight - height ) / 2;
    var params = "width=" +width+ ", height=" +height+ ", resizable=yes, scrollbars=yes, top=" +topPx+ ", left=" +leftPx;
    
    window.open(array[i]+url, '', params);
    return false;
}
</script>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37356643-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>