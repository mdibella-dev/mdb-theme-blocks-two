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

    ?>
    <div class="section-separator">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
            <g>
                <path d="M257.2,144.4c61.6,0,111.6,49.9,111.6,111.6s-49.9,111.6-111.6,111.6S145.6,317.6,145.6,256S195.6,144.4,257.2,144.4z M257.2,383.5c70.4,0,127.5-57.1,127.5-127.5s-57.1-127.5-127.5-127.5S129.7,185.6,129.7,256S186.8,383.5,257.2,383.5z"/>
                <line class="line" x1="28.4" y1="253.9" x2="128.4" y2="253.9"/>
                <line class="line" x1="385.9" y1="253.9" x2="485.9" y2="253.9"/>
            </g>
        </svg>
    </div>
    <?php

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
        wp_set_script_translations( 'mdb-theme-blocks-section-separator-script', 'mdb-theme-blocks', PLUGIN_DIR . 'languages/' );
    endif;

    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks\render_block__section_separator',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block__section_separator' );
