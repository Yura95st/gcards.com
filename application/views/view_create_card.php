<div class="main-body" data-bind="css: {'view-card-body': cardViewModel.previewMode}">
    <div class="card-cover">
        <img data-bind="fadeImage: cardViewModel.cover"/>
    </div>

    <div class="card-block-wrap" data-bind="foreach: { data: cardViewModel.blocks, as: 'block' }">
        <div class="card-block" data-bind="style { top: block.position.y() + 'px', left: block.position.x() + 'px', height: block.position.height() + 'px', width: block.position.width() + 'px'}, blockResizable: !cardViewModel.previewMode(), blockDraggable: (block != CardViewModel.editingBlock() && !cardViewModel.previewMode()), blockDoubleClick (block != CardViewModel.editingBlock() && !cardViewModel.previewMode())">
            <button data-bind="click: cardViewModel.removeBlock, visible: !cardViewModel.previewMode()">Remove</button>
            <div class="block-content" data-bind='text: block.content()'></div>
        </div>
    </div>
</div>