<div class="main-body">
    <div class="card-cover">
        <img src="<?php echo $path; ?>"/>
    </div>

    <div class="card-block-wrap" data-bind="foreach: { data: blocks, as: 'block' }">
        <div class="card-block" data-bind="style { top: block.position.y() + 'px', left: block.position.x() + 'px', height: block.position.height() + 'px', width: block.position.width() + 'px'}, blocksDraggableResizable {}, blockDoubleClick {}">
            <button data-bind="click: $parent.removeBlock">Remove</button>
            <div class="block-content" data-bind='text: block.content()'></div>
        </div>
    </div>

</div>