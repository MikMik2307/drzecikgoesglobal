<?php

    function wbdm_register_featured_youtube_block() {
        register_block_type(WBDM_PATH . 'blocks/featured-youtube/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_featured_youtube_block' );

    require __DIR__ . '/fields.php';