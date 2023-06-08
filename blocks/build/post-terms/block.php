<?php
/**
 * Block: Post terms
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

function render_block__post_terms( $attributes, $content, $block )
{
    global $post;

    $tags = get_the_tags( $post->ID );

    if( ! $tags ) :
        return '';
    endif;

    ob_start();

    ?>
    <div class="wp-block-buttons is-layout-flex tags " aria-hidden="true">
        <?php
        foreach( $tags as $tag ) :
        ?>
        <div class="wp-block-button is-style-default">
            <a class="wp-block-button__link wp-element-button"
               href="<?php echo get_tag_link( $tag->term_id ); ?>"
               rel="tag"
               target="_self"><?php echo trim($tag->name); ?></a>
        </div>
        <?php
        endforeach;
        ?>
    </div>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the block.
 */

function register_block__post_terms()
{
    if( function_exists( 'wp_set_script_translations' ) ) :
        wp_set_script_translations( 'mdb-theme-blocks-post-terms-editor-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks\render_block__post_terms',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__post_terms' );
