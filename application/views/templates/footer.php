<div id="footer">
    <div class="logo"></div>

    <ul class="navigation_bar">
        <li><a href="<?php echo base_url(); ?>"><?php echo $menu_main; ?></a></li>
        <li><a href="<?php echo base_url(); ?>card_controller/create"><?php echo $menu_create_card; ?></a></li>
        <li><a href="<?php echo base_url(); ?>about"><?php echo $menu_about; ?></a></li>
    </ul>

    <div class="action_bar">
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
        <div id="problem_button" onclick="User.showFeedbackBox();"><?php echo $menu_send_feedback; ?></div>
    </div>
</div>

<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/knockout-3.0.0.js'></script>
<script type='text/javascript' src='http://code.jquery.com/ui/1.9.2/jquery-ui.js'></script>
<script type='text/javascript' src='http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js'></script>

<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/summernote.js'></script>

<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/position.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/block.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/data.js'></script>


<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/card_view_model.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/processors/card_processor.js'></script>