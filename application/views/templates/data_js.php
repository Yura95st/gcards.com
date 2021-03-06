<script type='text/javascript'>

    Data.ajax = {
        loader: '<img src="<?php echo base_url(); ?>img/loader/google_loader_small.gif" />',
        url: '<?php echo base_url(); ?>card_controller/publish/'
    };

    Data.info = {
        card_publish_error: "<?php echo $card_publish_error; ?>",
        card_publish_success: "<?php echo $card_publish_success; ?>",
        card_undefined: "<?php echo $card_undefined; ?>",
        card_cover_unpicked: "<?php echo $card_cover_unpicked; ?>",
        card_no_blocks: "<?php echo $card_no_blocks; ?>",
        card_too_many_blocks: "<?php echo $card_too_many_blocks; ?>",
        card_empty_blocks: "<?php echo $card_empty_blocks; ?>"
    };

    Data.values = {
        defaultCard: {
            cover: {
                id: 0,
                mini: "",
                original: "<?php echo base_url(); ?>img/covers/default_cover.jpg"
            },
            block: {
                content: '<div class="card-init-text"><?php echo $card_init_text; ?></div>',
                position: {
                    x: 10,
                    y: 10,
                    height: 75,
                    width: 420,
                    angle: 0.0
                }
            }
        },
        coverPicker: {
            header: "<?php echo $cover_picker['header']; ?>",
            menu: [
                <?php foreach ($cover_picker['menu'] as $item): ?>
                {
                    id: <?php echo $item['id']; ?>,
                    title: "<?php echo $item['title']; ?>"
                },
                <?php endforeach; ?>
            ],
            covers: [
                <?php foreach ($coversArray as $covers): ?>
                [
                    <?php foreach ($covers as $cover): ?>
                    {
                        id: <?php echo $cover->getId(); ?>,
                        mini: "<?php echo base_url().  $cover->getPathMini(); ?>",
                        original: "<?php echo base_url(). $cover->getPathOriginal(); ?>",
                        partitionId: "<?php echo base_url(). $cover->getPartitionId(); ?>"
                    },
                    <?php endforeach; ?>
                ],
                <?php endforeach; ?>
            ]

        },
        cardPostCreatedWindow: {
            header: "<?php echo $card_post_created_window['header']; ?>",
            menu: [
                <?php foreach ($card_post_created_window['menu'] as $item): ?>
                {
                    title: "<?php echo $item; ?>"
                },
                <?php endforeach; ?>
            ]
        }
    };
</script>