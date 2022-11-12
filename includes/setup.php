<?php
/**
 * Functions to activate, initiate and deactivate the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks-two
 */

namespace mdb_theme_blocks_two;


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

register_activation_hook( __FILE__, 'mdb_theme_blocks_two\plugin_activation' );



/**
 * The deactivation function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_deactivation()
{
    // Do something!
}

register_deactivation_hook( __FILE__, 'mdb_theme_blocks_two\plugin_deactivation' );



/**
 * The init function for the plugin.
 *
 * @since 1.0.0
 */

function plugin_init()
{
    // Load text domain
    // The in the Codex described method to determine the path of the languages folder fails because we are in a subfolfer (/includes).
    load_plugin_textdomain( 'mdb-theme-blocks', false, '/mdb-theme-blocks-two/languages' );
}

add_action( 'init', 'mdb_theme_blocks_two\plugin_init' );



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
        false,
        true
    );

    wp_localize_script(
        'ajax',
        'mdb_ajax',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
    );
}

add_action( 'wp_enqueue_scripts', 'mdb_theme_blocks_two\enqueue_scripts', 9999 );
