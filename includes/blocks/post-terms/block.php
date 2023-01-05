<?php
/**
 * Block: Post terms
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Renders the block.
 *
 * @since  1.0.0
 * @param  $attributes
 * @param  $content
 * @param  $block
 * @return string
 */

function render_block_post_terms( $attributes, $content, $block )
{
    global $post;

    $tags = get_the_tags( $post->ID );

    if( ! $tags ) :
        return '';
    endif;

    ob_start();

?>
<nav class="tags" aria-hidden="true">
    <ul>
        <?php
        foreach( $tags as $tag ) :
        ?>
        <li>
            <a class="button button-tag"
               href="<?php echo get_tag_link( $tag->term_id ); ?>"
               rel="tag"
               target="_self"><?php echo trim($tag->name); ?></a>
        </li>
        <?php
        endforeach;
        ?>
    </ul>
</nav>
<?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}



/**
 * Registers the callback function.
 */

function register_block_post_terms()
{
    // Check if Gutenberg exist
    if( ! function_exists( 'register_block_type_from_metadata' ) ) :
        return;
    endif;


    // Register block
    register_block_type_from_metadata(
        __DIR__,
        array(
            'title'           => __( 'Article Tags Navigation', PLUGIN_DOMAIN ),
            'description'     => __( 'Creates a button navigation with the post tags.', PLUGIN_DOMAIN ),
            'render_callback' => 'mdb_theme_blocks\render_block_post_terms',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks\register_block_post_terms' );
