<?php
/**
 * The shortcode [publikationsliste].
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Generates a list of publications.
 *
 * @since 1.0.0
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content (encapsulated).
 *
 * @return string The output.
 */

function shortcode_publikationsliste( $atts, $content = null ) {
    // Set variables
    $output = '';
    $params = [];


    // Read parameters
    extract( shortcode_atts(
        [
            'paged'   => 'false',
            'show'    => '',
            'orderby' => 'publish_date',
            'form'    => '',
        ],
        $atts
     ) );


    // Get the total number of items
    $tax_query = [
        'taxonomy' => 'publication_group',
        'terms'    => explode( ',', $form )
    ];

    $max = sizeof( get_posts(
        [
            'post_type'      => 'publication',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'orderby'        => $orderby,
            'tax_query'      => [ $tax_query ]
        ]
    ) );


    // Set LoadMore parameters
    $params['show']     = empty( $show )? get_option( 'posts_per_page' ) : (int) $show;
    $params['action']   = 'publikationsliste';
    $params['form']     = $form;
    $params['orderby']  = $orderby;
    $params['maxpage']  = 1;
    $params['nextpage'] = 1;
    $params['paged']    = strtolower( $paged );
    $params['id']       = sprintf( 'loadmore_%1$s', random_int( 1000, 9999 ) );

    if ( 'true' === $params['paged'] ) {
        $params['maxpage'] = (int) ceil( $max / $params['show'] );
    }


    // Get the content of the first 'page'
    $ajax = AJAX_LoadMore_Publikationsliste::render_dynamic_content( $params );

    return AJAX_LoadMore::prepare_output( $params, $ajax );
}

add_shortcode( 'publikationsliste', __NAMESPACE__ . '\shortcode_publikationsliste' );
