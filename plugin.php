<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; Block Collection (mdb-theme-fse)
 * Plugin URI:      https://github.com/mdibella-dev/mdb-theme-blocks-two
 * Description:     This plugin adds custom blocks to the Gutenberg editor for use in Marco Di Bella's personal WordPress theme (mdb-theme-fse). Basically a replacement of mdb-theme-blocks (1.2.0) and mdb-theme-ajax (1.1.0).
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         1.1.1
 * Text Domain:     mdb-theme-blocks
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions **/

define( __NAMESPACE__ . '\PLUGIN_VERSION', '1.1.1' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/** Include files */

require_once( PLUGIN_DIR . 'includes/classes/index.php' );
require_once( PLUGIN_DIR . 'includes/shortcodes/index.php' );
require_once( PLUGIN_DIR . 'includes/blocks/index.php' );

require_once( PLUGIN_DIR . 'includes/block-categories.php' );
require_once( PLUGIN_DIR . 'includes/setup.php' );
