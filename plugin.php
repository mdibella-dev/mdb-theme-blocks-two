<?php
/*
 * Plugin Name:     Marco Di Bella - Blocks 2
 * Plugin URI:      https://github.com/mdibella-dev/mdb-theme-blocks-two
 * Description:     This plugin adds custom blocks to the Gutenberg editor for use in Marco Di Bella's personal WordPress theme (mdb-theme-fse). Basically a replacement of mdb-theme-blocks (1.2.0) and mdb-theme-ajax (1.1.0).
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         1.1.0
 * Text Domain:     mdb-theme-blocks
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions **/

const PLUGIN_VERSION = '1.1.0';
const PLUGIN_DOMAIN  = 'mdb-theme-blocks';
const PLUGIN_DIR     = plugin_dir_path( __FILE__ );
const PLUGIN_URL     = plugin_dir_url( __FILE__ );



/** Include files */

require_once( PLUGIN_DIR . 'includes/classes/class-ajax-loadmore.php' );
require_once( PLUGIN_DIR . 'includes/classes/class-ajax-loadmore-teaserblock.php' );
require_once( PLUGIN_DIR . 'includes/classes/class-ajax-loadmore-vortragsliste.php' );
require_once( PLUGIN_DIR . 'includes/classes/class-ajax-loadmore-publikationsliste.php' );

require_once( PLUGIN_DIR . 'includes/shortcodes/shortcode-publikationsliste.php' );
require_once( PLUGIN_DIR . 'includes/shortcodes/shortcode-vortragsliste.php' );
require_once( PLUGIN_DIR . 'includes/shortcodes/shortcode-teaserblock.php' );

require_once( PLUGIN_DIR . 'includes/setup.php' );
require_once( PLUGIN_DIR . 'includes/block-categories.php' );

require_once( PLUGIN_DIR . 'includes/blocks/post-terms/block.php' );
require_once( PLUGIN_DIR . 'includes/blocks/post-terms-archive/block.php' );
require_once( PLUGIN_DIR . 'includes/blocks/related-posts/block.php' );
require_once( PLUGIN_DIR . 'includes/blocks/download-container/block.php' );
require_once( PLUGIN_DIR . 'includes/blocks/single-publication-details/block.php' );

require_once( PLUGIN_DIR . 'includes/blocks/symple/block.php' );
