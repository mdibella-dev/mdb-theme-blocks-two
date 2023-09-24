<?php
/**
 * Class AJAX_LoadMore_Publikationsliste
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;

use mdb_theme_core\api as publication;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Class for AJAX-driven display of publications.
 *
 * @since 1.0.0
 */

class AJAX_LoadMore_Publikationsliste extends AJAX_LoadMore {

    /**
     * HTML template for dynamic output.
     *
     * @since 1.0.0
     *
     * @var string
     */

    private static $template = '';


    /**
     * A (static) constructor; sets the basic class parameters.
     *
     * @since 1.0.0
     */

    static function __constructStatic() {
        self::$template = self::prepare_template( 'ajax-template-publikationsliste' );
    }


    /**
     * Returns the (saved) HTML template for the dynamic output.
     *
     * @since 1.0.0
     *
     * @return string The HTML template.
     */

    static function get_template() {
        return self::$template;
    }


    /**
     * Determines the dynamically adding contributions (records).
     *
     * @since  1.0.0
     *
     * @param array $params The LoadMore parameters.
     *
     * @return array An array of matching WP_POST objects.
     */

    static function get_posts( $params ) {
        $tax_query = [
            'taxonomy' => 'publication_group',
            'terms'    => explode( ',', $params['form'] )
        ];

        $posts = get_posts( [
            'post_type'      => 'publication',
            'post_status'    => 'publish',
            'posts_per_page' => $params['show'],
            'order'          => 'DESC',
            'orderby'        => $params['orderby'],
            'tax_query'      => [ $tax_query ],
            'offset'         => ($params['nextpage'] - 1) * $params['show'],
        ] );

        return $posts;
    }


    /**
     * Returns the content (generated depending on the specific post) to be replaced in the HTML template.
     *
     * @since 1.0.0
     *
     * @param WP_POST $post The post (aka record) to generate the replacements for.
     *
     * @return array An associative array containing the replacement terms.
     */

    static function get_replacements( $post ) {
        $part = publication\build_citation( $post->ID, MDB_BUILD_ARRAY );

        // Create replacement terms
        $replacements = [
            '_PUBTITLE_' => $part[0],
            '_PUBCITE_'  => $part[1],
            '_DETAILS_'  => __( 'Details', 'mdb-theme-blocks' ),
            '_ID_'       => $post->ID,
            '_LINK_'     => get_permalink( $post->ID ),
        ];

        return $replacements;
    }


    /**
     * Returns an array containing the LoadMore parameters (as Key) and their default values ​​(as Value).
     *
     * @since 1.0.0
     *
     * @return array An associative array with LoadMore default parameters and values.
     */

    static function get_default_params() {

        $default = [
            'paged'    => 'false',
            'show'     => '',
            'exclude'  => '',
            'orderby'  => 'publish_date',
            'cat'      => 0,
            'tag'      => 0,
            'maxpage'  => 1,
            'nextpage' => 1,
            'form'     => '',          // publication form!
        ];

        return $default;
    }
}

add_action( 'wp_ajax_publikationsliste', [ __NAMESPACE__ . '\AJAX_LoadMore_Publikationsliste', 'handle_AJAX' ] );
add_action( 'wp_ajax_nopriv_publikationsliste', [ __NAMESPACE__ . '\AJAX_LoadMore_Publikationsliste', 'handle_AJAX' ] );


AJAX_LoadMore_Publikationsliste::__constructStatic();
