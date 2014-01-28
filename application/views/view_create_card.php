<div class="main-body">
    <div class="card-cover">
        <img src="<?php echo $path; ?>"/>
    </div>

    <div data-bind="foreach: { data: blocks, as: 'block' }">
        <div class="card-block" data-bind="style { top: block.position.y() + 'px', left: block.position.x() + 'px', height: block.position.height() + 'px', width: block.position.width() + 'px'}, blocksDraggableResizable {}, blockDoubleClick {}">
            <div class="block-content" data-bind='text: block.content'></div>
        </div>
    </div>

</div>

<textarea data-bind='value: lastSavedJson' rows='5' cols='60' disabled='disabled'> </textarea>