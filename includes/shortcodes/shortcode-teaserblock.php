<?php
/**
 * The shortcode [teaserblock].
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Generates a teaser block with the most recently published articles.
 *
 * @since 1.0.0
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content (encapsulated).
 *
 * @return string The output.
 */

function shortcode_teaserblock( $atts, $content = null ) {
    // Set variables
    $output = '';
    $params = [];


    // Read parameters
    extract( shortcode_atts(
        [
            'paged'   => 'false',
            'show'    => '4',
            'exclude' => '',
            'orderby' => 'publish_date',
            'cat'     => 0,
            'tag'     => 0,
        ],
        $atts
    ) );


    // Get the total number of items
    $max = sizeof( get_posts(
        [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'orderby'        => $orderby,
            'exclude'        => $exclude,
            'cat'            => $cat,
            'tag_id'         => $tag,
        ]
    ) );


    // Set LoadMore parameters
    $params['show']     = empty( $show )? get_option( 'posts_per_page' ) : (int) $show;
    $params['action']   = 'teaserblock';
    $params['exclude']  = $exclude;
    $params['orderby']  = $orderby;
    $params['cat']      = $cat;
    $params['tag']      = $tag;
    $params['maxpage']  = 1;
    $params['nextpage'] = 1;
    $params['paged']    = strtolower( $paged );
    $params['id']       = sprintf( 'loadmore_%1$s', random_int( 1000, 9999 ) );

    if ( 'true' === $params['paged'] ) {
        $params['show']    = get_option( 'posts_per_page' );  // always take the information from the backend.
        $params['maxpage'] = (int) ceil( $max / $params['show'] );
    }


    // Get the content of the first 'page'
    $ajax = AJAX_LoadMore_Teaserblock::render_dynamic_content( $params );

    return AJAX_LoadMore::prepare_output( $params, $ajax );
}

add_shortcode( 'teaserblock', __NAMESPACE__ . '\shortcode_teaserblock' );
