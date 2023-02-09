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



/**
 * Registers the block.
 */

function register_block__download_container()
{
    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-download-container-editor-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__download_container' );
