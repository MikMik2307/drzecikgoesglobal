<?php

    function wbdm_register_about_block() {
        register_block_type(WBDM_PATH . 'blocks/about/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_about_block' );

    require __DIR__ . '/fields.php';