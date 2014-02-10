<div id="toolbar" data-bind='slideToggle: cardViewModel.previewMode'>
    <div class="pick-cover-add-block-wrap">
        <button class="btn btn-primary toolbar-button" data-bind='click: coverPickerViewModel.show'>Pick cover</button>
        <button class="btn btn-success toolbar-button" data-bind='click: cardViewModel.addBlock, enable: cardViewModel.canAddBlock()'>Add a block</button>
        <button class="btn btn-default toolbar-button" data-bind='click: cardViewModel.save'>Save to JSON</button>
    </div>

    <div class="editor-toolbar"></div>

    <div class="preview-publish-wrap">
        <button class="btn btn-default toolbar-button" data-bind='click: cardViewModel.preview'>Preview</button>
        <button class="btn btn-danger toolbar-button" data-bind='click: cardViewModel.publishCard'>Publish</button>
    </div>
</div>

<div id="top-info-bar" data-bind='slideToggle: !cardViewModel.previewMode()'>
    <div class="content">Preview mode is now activated.</div>
    <div class="buttons">
        <button class="btn btn-default" data-bind='click: cardViewModel.exitPreviewMode'>Back to editing</button>
        <button class="btn btn-danger" data-bind='click: cardViewModel.publishCard'>Publish</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(Data.card.toolbar).summernoteToolbar();
    });
</script>