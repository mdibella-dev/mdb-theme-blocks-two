<?php
/**
 * Block: related_posts
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
 * @param array  $attributes Block attributes.
 * @param string $content    Block default content.
 * @param string $block      Block instance.
 *
 * @return string The dynamically rendered block output.
 */

function render_block__related_posts( $attributes, $content, $block ) {

    if( ! isset( $block->context['postId'] ) ) :
        return '';
    endif;


    // Determine the categories.
    $cats    = get_the_category( $block->context['postId'] );
    $cat_ids = '';

    if( $cats ) :
        foreach( $cats as $cat ) :
            $cat_id_array[] = $cat->term_taxonomy_id;
        endforeach;

        $cat_ids = implode( ',', $cat_id_array );
    endif;


    // Determine the tags.
    $tags    = get_the_tags( $block->context['postId'] );
    $tag_ids = '';

    if( $tags ) :

        foreach( $tags as $tag ) :
            $tag_id_array[] = $tag->term_taxonomy_id;
        endforeach;

        $tag_ids = implode( ',', $tag_id_array );

    endif;


    // Populate $shortcode.
    $shortcode = sprintf( '[teaserblock paged="false" orderby="rand" exclude="%1$s" show="4" cat="%2$s" tag="%3$s]',
        $block->context['postId'],
        $cat_ids,
        $tag_ids,
    );

    ob_start();

    ?>
    <?php echo do_shortcode( $shortcode ); ?>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the block.
 */

function register_block__related_posts() {

    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-related-posts-editor-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        [
            'render_callback' => 'mdb_theme_blocks\render_block__related_posts',
        ]
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__related_posts' );
