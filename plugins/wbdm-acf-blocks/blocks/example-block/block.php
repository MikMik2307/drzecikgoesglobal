<?php

    function cab_register_example_block() {
        register_block_type(CAB_PATH . 'blocks/example-block/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_example_block' );

    require __DIR__ . '/fields.php';