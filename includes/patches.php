<?php
/**
 * Functions to fix bugs contained in WordPress and Gutenberg respectively.
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Fixes the path to Gutenberg related localized script files.
 *
 * @since 1.0.0
 *
 * @see https://core.trac.wordpress.org/ticket/53097
 * @see https://core.trac.wordpress.org/ticket/54797
 * @see https://awhitepixel.com/blog/how-to-translate-custom-gutenberg-blocks-with-block-json/ (solution)
 *
 * @param string $file   Path to the translation file to load.
 * @param string $handle Name of the script to register a translation domain to.
 * @param string $domain The text domain.
 *
 * @return string The modified file location.
 */

function fix_translation_location( string $file, string $handle, string $domain )
{
    if( 'mdb-theme-blocks' === $domain ) :
        $file = str_replace( WP_LANG_DIR . '/plugins', PLUGIN_DIR . 'languages', $file );
    endif;

    return $file;
}

add_filter( 'load_script_translation_file', 'mdb_theme_blocks\fix_translation_location', 10, 3 );
