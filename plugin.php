<?php
/*
 * Plugin Name:     Marco Di Bella - Blocks 2
 * Plugin URI:      https://github.com/mdibella-dev/mdb-theme-blocks
 * Description:     This plugin adds custom blocks to the Gutenberg editor for use in Marco Di Bella's personal WordPress theme (mdb-theme-fse). Based on mdb-theme-blocks (1.2.0).
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         1.0.0
 * Text Domain:     mdb-theme-blocks
 * Domain Path:     /languages
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks-2
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions **/

$plugin_version = '1.0.0';
$plugin_path    = plugin_dir_path( __FILE__ );



/** Include files */

require_once( $plugin_path . 'includes/setup.php' );
require_once( $plugin_path . 'includes/block-categories.php' );

require_once( $plugin_path . 'includes/blocks/post-terms/block.php' );
require_once( $plugin_path . 'includes/blocks/post-terms-archive/block.php' );
require_once( $plugin_path . 'includes/blocks/related-posts/block.php' );
require_once( $plugin_path . 'includes/blocks/download-container/block.php' );
require_once( $plugin_path . 'includes/blocks/single-publication-details/block.php' );
