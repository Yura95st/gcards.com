<div class="main-body view-card-body">
    <div class="card-cover">
        <img src="<?php echo base_url().$card->getCover()->getPathOriginal(); ?>" />
    </div>

    <?php
    foreach($card->getBlocks() as $block)
    {
        printf('
                <div class="card-block" style="%s">
                    <div class="block-content">%s</div>
                </div>
            ', $block->getStyle(), $block->getContent());
    }
    ?>

</div>

<?php

if ($isCreator) {
//    printf('
//        <script type="text/javascript">
//            $(document).ready( function() {
//                User.showCardLinkBox(%s);
//            });
//        </script>
//    ', base_url().'card/view/'.$card->getHashCode());
}
?>