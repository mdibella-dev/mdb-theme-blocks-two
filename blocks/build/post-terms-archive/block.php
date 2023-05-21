<?php
/**
 * Block: post-terms-archive
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

function render_block__post_terms_archive( $attributes, $content, $block )
{
    if( ! isset( $block->context['postId'] ) ) :
        return '';
    endif;

    ob_start();

?>
<?php echo do_shortcode( sprintf( '[teaserblock paged="true" tag="%1$s"]', get_query_var( 'tag_id' ) ) ); ?>
<?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the block.
 */

function register_block__post_terms_archive()
{
    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-post-terms-archive-editor-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks\render_block__post_terms_archive',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__post_terms_archive' );
