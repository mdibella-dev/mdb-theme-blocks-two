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
    register_block_type(
        __DIR__,
        array(
            'title'           => __( 'Download Container', 'mdb-theme-blocks' ),
            'description'     => __( 'A container element for providing downloads.', 'mdb-theme-blocks' ),
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__download_container' );
