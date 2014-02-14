<div id="toolbar" data-bind='slideUpDown: cardViewModel.previewMode, visible: !cardViewModel.cardPublishedMode()'>
    <div class="pick-cover-add-block-wrap">
        <button class="btn btn-primary toolbar-button" data-bind='click: coverPickerViewModel.show'><?php echo $button_pick_cover; ?></button>
        <button class="btn btn-success toolbar-button" data-bind='click: cardViewModel.addBlock, enable: cardViewModel.canAddBlock()'>
            <?php echo $button_add_block; ?>
        </button>

<!--        <button class="btn btn-default toolbar-button" data-bind='click: cardViewModel.save'>Save to JSON</button>-->

    </div>

    <div class="editor-toolbar"></div>

    <div class="preview-publish-wrap">
        <button class="btn btn-default toolbar-button" data-bind='click: cardViewModel.preview'>
            <?php echo $button_preview; ?>
        </button>
        <button class="btn btn-danger toolbar-button card-publish-button" data-bind='click: cardViewModel.publishCard'>
            <?php echo $button_publish; ?>
        </button>
    </div>
</div>

<div id="top-info-bar" data-bind='slideUpDown: !cardViewModel.previewMode(), visible: !cardViewModel.cardPublishedMode()'>
    <div class="content">
        <?php echo $info_bar_preview_mode_activated; ?>
    </div>
    <div class="buttons">
        <button class="btn btn-default" data-bind='click: cardViewModel.exitPreviewMode'>
            <?php echo $button_back_to_editing; ?>
        </button>
        <button class="btn btn-danger card-publish-button" data-bind='click: cardViewModel.publishCard'>
            <?php echo $button_publish; ?>
        </button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(Data.card.toolbar).summernoteToolbar();
    });
</script>