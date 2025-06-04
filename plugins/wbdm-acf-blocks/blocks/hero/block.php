<?php

    function wbdm_register_example_block() {
        register_block_type(WBDM_PATH . 'blocks/hero/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_hero_block' );

    require __DIR__ . '/fields.php';