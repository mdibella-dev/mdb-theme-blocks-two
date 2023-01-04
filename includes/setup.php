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
 * The activation function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_activation()
{
    // Do something!
}

register_activation_hook( __FILE__, 'mdb_theme_blocks\plugin_activation' );



/**
 * The deactivation function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_deactivation()
{
    // Do something!
}

register_deactivation_hook( __FILE__, 'mdb_theme_blocks\plugin_deactivation' );



/**
 * The init function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_init()
{
    // Load text domain
    load_plugin_textdomain( PLUGIN_DOMAIN, false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages' );
}

add_action( 'init', 'mdb_theme_blocks\plugin_init' );



/**
 * Load the frontend scripts and styles.
 *
 * @since 1.0.0
 */

function enqueue_scripts()
{
    wp_enqueue_script(
        'ajax',
        plugins_url( 'assets/build/js/ajax-loadmore.min.js', dirname( __FILE__ ) ),
        'jquery',
        PLUGIN_VERSION,
        true
    );

    wp_localize_script(
        'ajax',
        'mdb_ajax',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
    );
}

add_action( 'wp_enqueue_scripts', 'mdb_theme_blocks\enqueue_scripts', 9999 );
