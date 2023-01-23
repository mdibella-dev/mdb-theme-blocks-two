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




if( function_exists( 'register_block_type' ) ) :

    /**
     * Registers the block.
     */

    function register_block_download_container()
    {
        register_block_type(
            __DIR__,
            array(
                'title'           => __( 'Download Container', PLUGIN_DOMAIN ),
                'description'     => __( 'A container element for providing downloads.', PLUGIN_DOMAIN ),
            )
        );
    }

    add_action( 'init', 'mdb_theme_blocks\register_block_download_container' );

endif;
