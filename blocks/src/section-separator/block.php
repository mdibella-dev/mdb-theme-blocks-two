<?php
/**
 * Block: section-separator
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

function register_block__section_separator()
{
    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-section-separator-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        array()
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__section_separator' );
