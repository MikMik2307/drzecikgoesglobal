<?php

    function wbdm_register_collaboration_block() {
        register_block_type(WBDM_PATH . 'blocks/collaboration/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_collaboration_block' );

    require __DIR__ . '/fields.php';