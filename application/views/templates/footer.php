<div id="footer">
    <div class="logo"></div>

    <ul class="navigation_bar">
        <li><a href="<?php echo base_url(); ?>"><?php echo $menu_main; ?></a></li>
        <li><a href="<?php echo base_url(); ?>card_controller/create"><?php echo $menu_create_card; ?></a></li>
        <li><a href="<?php echo base_url(); ?>about"><?php echo $menu_about; ?></a></li>
    </ul>
</div>

<!-- Modal -->
<div id="modal">
    <div class="mask" data-bind="fadeVisible: modalViewModel.displayMask, style { height: modalViewModel.maskHeight() + 'px'}"></div>
    <div class="loader" data-bind="visible: modalViewModel.displayLoader"></div>
    <div class="content-wrap" data-bind="visible: modalViewModel.displayContent, style { left: modalViewModel.contentX() + 'px', top: modalViewModel.contentY() + 'px'}">
        <span class="glyphicon glyphicon-remove close-button" data-bind="click: modalViewModel.hide" data-toggle="tooltip" data-placement="bottom" title="Close"></span>
        <div class="content" data-bind="html: modalViewModel.content"></div>
    </div>
</div>

<!-- InfoMessage -->
<div id="info-message" data-bind="fadeVisible: infoMessageViewModel.displayMessage, style { left: infoMessageViewModel.positionX() + 'px'}">
    <div class="content" data-bind="html: infoMessageViewModel.content"></div>
</div>

<?php if (isset($createPage) && $createPage === true): ?>

<!-- Libraries import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/knockout-3.0.0.js'></script>
<script type='text/javascript' src='http://code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/jquery_scroll_to.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/jquery_rotatable.js'></script>
<script type='text/javascript' src='http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/ajaxfileupload.js'></script>

<!-- Editor import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/summernote.js'></script>

<!-- Models import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/position.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/block.js'></script>

<!-- ViewModels import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/card_view_model.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/modal_view_model.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/info_message_view_model.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/cover_picker_view_model.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/post_creation_window_view_model.js'></script>

<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/view_models/main_view_model.js'></script>

<!-- Processors import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/processors/card_validator.js'></script>

<!-- Views import -->
<script type='text/javascript' src='<?php echo base_url(); ?>js/classes/views/block_view.js'></script>

<?php endif; ?>