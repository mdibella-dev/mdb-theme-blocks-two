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
 * @param  $attributes
 * @param  $content
 * @param  $block
 * @return string
 */

function render_block_post_terms_archive( $attributes, $content, $block )
{
    if( ! isset( $block->context['postId'] ) ) :
        return '';
    endif;

    ob_start();

    ?>
<h1 class="wp-block-post-title has-text-align-center no-margin-bottom"><span><?php echo __( 'Term', PLUGIN_DOMAIN ) ?></span><span><?php echo single_tag_title( '', false ); ?></span></h1>
<div class="wp-block-spacer is-style-auto"></div>
<?php echo do_shortcode( sprintf( '[teaserblock paged="true" tag="%1$s"]', get_query_var( 'tag_id' ) ) ); ?>
<?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the callback function.
 */

function register_block_post_terms_archive()
{
    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks\render_block_post_terms_archive',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block_post_terms_archive' );
