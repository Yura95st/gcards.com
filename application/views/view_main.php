<div class="main-body" id="main-body">
    <div class="index-background">
        <img width="100%" height="100%" src="<?php echo $img; ?>" />
    </div>
    <div class="main-words-container-wrap">
        <div class="main-words-container">
            <div class="main-words">
                <p><?php echo $headline; ?></p>
                <span><?php echo $description; ?></span>
            </div>
            <button class="create_card" onclick="location.href = '<?php echo base_url(); ?>card_controller/create'">
                <?php echo $create_card_button; ?>
            </button>
        </div>
    </div>
</div>
