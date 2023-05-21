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
* Renders the block.
*
* @since  1.0.0
*
* @param array $attributes Block attributes.
* @param string $content   Block default content.
* @param string $block     Block instance.
*
* @return string The dynamically rendered block output.

 */

function render_block__section_separator( $attributes, $content, $block )
{
    ob_start();

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the block.
 */

function register_block__section_separator()
{
    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-post-section_separator-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks\render_block__section_separator',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__section_separator' );
