<?php
/**
 * Functions to register block categories.
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks-two
 */

namespace mdb_theme_blocks_two;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Registers the block category 'mdb-theme-blocks'.
 *
 * @since 1.0.0
 * @param array                   $block_categories         Array with all block categories.
 * @param WP_Block_Editor_Context $block_editor_context     The current block editor context.
 */

function add_block_categories( $block_categories, $block_editor_context )
{
    return array_merge(
        $block_categories,
        array(
            array(
                'slug'  => 'mdb-theme-blocks',
                'title' => __( "Marco Di Bella's theme blocks", PLUGIN_DOMAIN ),
            ),
        )
    );
}

add_filter( 'block_categories_all', 'mdb_theme_blocks_two\add_block_categories', 10, 2 );
