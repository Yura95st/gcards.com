<div id="toolbar">
    <div class="pick-cover-add-block-wrap">
        <button data-bind='click: coverPickerViewModel.showPicker'>Pick cover</button>
        <button data-bind='click: cardViewModel.addBlock, enable: cardViewModel.canAddBlock()'>Add a block</button>
        <button data-bind='click: cardViewModel.save'>Save to JSON</button>
    </div>

    <div class="editor-toolbar"></div>

    <div class="preview-publish-wrap">
        <button onclick="CardProcessor.publishCard(this);">Preview</button>
        <button onclick="CardProcessor.publishCard(this);">Publish</button>
    </div>

    <textarea data-bind='value: cardViewModel.lastSavedJson' rows='5' cols='60' disabled='disabled'> </textarea>
</div>

<script>
    $(document).ready(function () {
        $(Data.card.toolbar).summernoteToolbar();
    });
</script>