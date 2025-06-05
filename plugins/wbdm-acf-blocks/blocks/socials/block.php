<?php

    function wbdm_register_socials_block() {
        register_block_type(WBDM_PATH . 'blocks/socials/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_socials_block' );

    require __DIR__ . '/fields.php';