<?php

    function wbdm_register_featured_companies_block() {
        register_block_type(WBDM_PATH . 'blocks/featured-companies/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\wbdm_register_featured_companies_block' );

    require __DIR__ . '/fields.php';