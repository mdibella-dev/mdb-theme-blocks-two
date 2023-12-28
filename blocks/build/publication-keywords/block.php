<?php
/**
 * Block: Publication Keywords
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

function render_block__publication_keywords( $attributes, $content, $block ) {
    global $post;

    $terms = get_the_terms( $post->ID, 'publication_keyword' );

    if ( ! $terms ) {
        return '';
    }

    // Start rendering
    ob_start();
    ?>
    <p><?php
        foreach ( $terms as $term ) {
            ?><span class="publication-keyword"><?php echo $term->name; ?></span><?php
        }
    ?></p>
    <?php

    // Save render result
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the block.
 */

function register_block__publication_keywords() {

    if ( function_exists( 'wp_set_script_translations' ) ) {
        wp_set_script_translations( 'mdb-theme-blocks-publication-keywords-editor-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    }

    register_block_type_from_metadata(
        __DIR__,
        [
            'render_callback' => __NAMESPACE__ . '\render_block__publication_keywords',
        ]
    );
}

add_action( 'init', __NAMESPACE__ . '\register_block__publication_keywords' );
