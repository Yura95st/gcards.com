<div class="main-body" data-bind="css: {'view-card-body': cardViewModel.previewMode}">
    <div class="card-cover">
        <img data-bind="fadeImage: cardViewModel.cover"/>
    </div>

    <div class="card-block-wrap" data-bind="foreach: { data: cardViewModel.blocks, as: 'block' }">
        <div class="card-block" data-bind="style { top: block.position.y() + 'px', left: block.position.x() + 'px', height: block.position.height() + 'px', width: block.position.width() + 'px'}, blockResizable: !cardViewModel.previewMode(), blockDraggable: (block != cardViewModel.editingBlock() && !cardViewModel.previewMode()), blockDoubleClick (block != cardViewModel.editingBlock() && !cardViewModel.previewMode()), blockRotatable: {}">
            <span class="glyphicon glyphicon-remove close-button" data-bind="click: cardViewModel.removeBlock, visible: !cardViewModel.previewMode()" data-toggle="tooltip" data-placement="top" title="Remove"></span>
            <span class="glyphicon glyphicon-repeat rotate-button" data-bind="visible: !cardViewModel.previewMode()" data-toggle="tooltip" data-placement="top" title="Rotate"></span>
            <div class="block-content" data-bind='html: block.content()'></div>
        </div>
    </div>
</div>
<!---->
<!--<h1>Upload File</h1>-->
<!--<form data-bind="submit: coverPickerViewModel.uploadCover" method="post" enctype="multipart/form-data" />-->
<!--    <input type="file" name="userfile" id="userfile" size="20" />-->
<!--    <input type="submit" name="submit" />-->
<!--</form>-->