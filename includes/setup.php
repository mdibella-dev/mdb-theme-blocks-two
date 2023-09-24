<?php
/**
 * Functions to activate, initiate and deactivate the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * The init function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_init() {
    // Load text domain, use relative path to the plugin's language folder
    load_plugin_textdomain( 'mdb-theme-blocks', false, plugin_basename( PLUGIN_DIR ) . '/languages' );
}

add_action( 'init', __NAMESPACE__ . '\plugin_init' );



/**
 * Load the frontend scripts and styles.
 *
 * @since 1.0.0
 */

function enqueue_plugin_scripts() {

    wp_enqueue_script(
        'ajax',
        PLUGIN_URL . 'assets/build/js/ajax-loadmore.min.js',
        [
            'jquery'
        ],
        PLUGIN_VERSION,
        true
    );

    wp_localize_script(
        'ajax',
        'mdb_ajax',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
    );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_plugin_scripts', 9999 );
