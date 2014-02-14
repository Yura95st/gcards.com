<div class="main-body">
    <div class="content-slides first">
        <div class="content">
            <p class="text"><?php echo $first_slide_text; ?></p>
        </div>
        <div class="image"></div>
    </div>

    <div class="content-slides second">
        <div class="content">
            <p class="text"><?php echo $second_slide_text; ?></p>
        </div>
    </div>

    <div class="demo-slide-wrap">
        <div class="demo-slide">
        <div class="demo-slide-header">
            <h2><?php echo $demo_slide_header; ?></h2>
            <h3><?php echo $demo_slide_header_info; ?></h3>
        </div>

        <div class="cards">
            <div class="color-card left-card">
                <h4><?php echo $left_card_header; ?></h4>
                <p><?php echo $left_card_content; ?></p>
                <div class="controls">
                    <div class="control headers">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_headers; ?></div>
                    </div>
                    <div class="control style">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_style; ?></div>
                    </div>
                    <div class="control hot-keys">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_hot_keys; ?></div>
                    </div>
                    <div class="control size-color">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_size_color; ?></div>
                    </div>
                    <div class="control alignment">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_alignment; ?></div>
                    </div>
                    <div class="control resize">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_resize; ?></div>
                    </div>
                    <div class="control drag">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_drag; ?></div>
                    </div>
                    <div class="control rotate">
                        <div class="image"></div>
                        <div class="text"><?php echo $tools_rotate; ?></div>
                    </div>
                </div>
            </div>

            <div class="color-card middle-card">
                <h4><?php echo $middle_card_header; ?></h4>
                <p><?php echo $middle_card_content; ?></p>
                <div class="imac-screen">
                    <img class="cover-thumbnail" data-bind="fadeImageSlideShow: thumbnail"/>
                </div>
                <a href="<?php echo base_url(); ?>card_controller/create">
                    <button class="btn btn-danger create-card-button">
                        <?php echo $create_card_button; ?>
                    </button>
                </a>
            </div>

            <div class="color-card right-card">
                <h4><?php echo $right_card_header; ?></h4>
                <p><?php echo $right_card_content; ?></p>
                <div class="glyphicon glyphicon-link link-icon"></div>
            </div>
        </div>
        </div>
    </div>
</div>