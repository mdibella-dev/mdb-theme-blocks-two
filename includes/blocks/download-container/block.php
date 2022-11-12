<?php
/**
 * Block: Download-Container
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;


if ( function_exists( 'register_block_type' ) ) :

    function register_block()
    {
        // Register the block by passing the location of block.json to register_block_type.
        register_block_type( __DIR__ );
    }

    add_action( 'init', 'mdb_theme_blocks\register_block' );

endif;
