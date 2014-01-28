<div id="toolbar">
    <div class="pick-cover-add-block-wrap">
        <button>Pick cover</button>
        <button data-bind='click: addBlock, enable: canAddBlock()'>Add a block</button>
        <button data-bind='click: save'>Save to JSON</button>
    </div>

    <div class="editor-toolbar"></div>

    <div class="preview-publish-wrap">
        <button onclick="CardProcessor.publishCard(this);">Preview</button>
        <button onclick="CardProcessor.publishCard(this);">Publish</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.editor-toolbar').summernoteToolbar();
    });
</script>