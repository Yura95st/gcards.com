<div id="body-container">
    <div id="card_background">
        <img id="card_background_img" src="<?php echo $card->getBackground(); ?>" height="100%" width="100%"/>
    </div>

    <?php
    foreach($card->getBlocks() as $block)
    {
        printf('
                <div id="card_caption_container" class="viewCard_parts" style="%s">
                    <div id="card_caption" class="viewCard_text_areas">%s</div>
                </div>
            ', $block->getStyle(), $block->getText());
    }
    ?>

</div>

<?php

if ($isCreator) {
    printf('
        <script type="text/javascript">
            $(document).ready( function() {
                User.showCardLinkBox(%s);
            });
        </script>
    ', base_url().'card/view/'.$card->getHashCode());
}
?>