<?php
/**
 * Block: Single publication details
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks_two;
use function \mdb_theme_core\publication__is_publication as api_is_publication;
use function \mdb_theme_core\publication__build_citation as api_build_citation;
use function \mdb_theme_core\publication__get_data as api_get_data;



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

function render_block_single_publication_details( $attributes, $content, $block )
{
    if( ! isset( $block->context['postId'] ) or ! api_is_publication( $block->context['postId'] ) ) :
        return '';
    endif;

    $data    = api_get_data( $block->context['postId'] );
    $section = array();


    /** Section: Cover & Title */

    if( ! empty( $data['title'] ) ) :

        // Start rendering
        ob_start();
        ?>

        <div id="cover-and-title">
            <div>
                <?php
                if( has_post_thumbnail( $block->context['postId'] ) ) :
                    echo get_the_post_thumbnail( $block->context['postId'], 'full', array( 'class' => 'publication-cover' ) );
                endif;
                ?>
            </div>
            <div>
                <h1><span class="publication-title"><?php echo $data['title']; ?></span>
                    <?php
                    if( ! empty( $data['subtitle'] ) ) :
                    ?>
                        <span class="publication-subtitle"><?php echo $data['subtitle']; ?></span>
                    <?php
                    endif;
                    ?>
                </h1>
                <?php

                if( ! empty( $data['titleaddition'] ) ) :
                ?>
                    <p><span class="publication-titleadittion"><?php echo $data['titleaddition']; ?></span></p>
                <?php
                endif;
                ?>
            </div>
        </div>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Authors */

    if( ! empty( $data['authors'] ) ) :
        $count   = 0;
        $authors = array();

        foreach( $data['authors'] as $author ) :
            $authors[] .= $author['au_firstname'] . ' ' . $author['au_lastname'];
            $count++;
        endforeach;

        // Start rendering
        ob_start();
        ?>

        <h2 class="publication-section-title"><?php echo ( 1 !== $count )? __( 'Authors', PLUGIN_DOMAIN ) : __( 'Author', PLUGIN_DOMAIN ); ?></h2>
        <p><?php echo implode( ', ', $authors ); ?></p>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Abstract */

    if( '' !== get_post( $block->context['postId'] )->post_content ) :

        // Start rendering
        ob_start();
        ?>

        <h2 class="publication-section-title"><?php echo __( 'Abstract', PLUGIN_DOMAIN ); ?></h2>
        <?php echo apply_filters( 'the_content', get_the_content( $block->context['postId'] ) ); ?>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Reference */

    if( ! empty( $data['reference'] ) ) :

        // Start rendering
        ob_start();
        ?>

        <h2 class="publication-section-title"><?php echo __( 'Citation', PLUGIN_DOMAIN ); ?></h2>
        <ol>
            <?php
            foreach( $data['reference'] as $reference ) :
                ?><li><?php echo $reference; ?></li><?php
            endforeach;
            ?>
        </ol>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Citation */

    if( ! empty( $data['citation'] ) ) :

        // Start rendering
        ob_start();
        ?>

        <h2 class="publication-section-title"><?php echo __( 'Is citated in', PLUGIN_DOMAIN ); ?></h2>
        <ol>
            <?php
            foreach( $data['citation'] as $citation ) :
                ?><li><?php echo $citation; ?></li><?php
            endforeach;
            ?>
        </ol>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Keywords */

    if( ! empty( $data['keywords'] ) ) :

        // Start rendering
        ob_start();
        ?>

        <h2 class="publication-section-title"><?php echo __( 'Keywords', PLUGIN_DOMAIN ); ?></h2>
        <p><?php
            foreach( $data['keywords'] as $keyword ) :
                ?><span class="publication-keyword"><?php echo $keyword->name; ?></span><?php
            endforeach;
        ?></p>

        <?php
        // Save render result
        $section[] = ob_get_contents();
        ob_end_clean();
    endif;



    /** Section: Citation Suggestion & RIS-Generator */

    // Start rendering
    ob_start();
    ?>

    <h2 class="publication-section-title"><?php echo __( 'citation suggestion', 'mdb-theme-blocks'); ?></h2>
    <p><?php echo api_build_citation( $block->context['postId'] ); ?></p>
    <div class="wp-block-buttons is-content-justification-center" style="display: flex; padding-top: 4rem;" >
        <div class="wp-block-button" data-parentid="<?php echo $params['id']; ?>">
            <a class="wp-block-button__link" href="/citation/<?php echo $block->context['postId']; ?>" rel="nofollow"><?php echo __( 'Generate RIS file', PLUGIN_DOMAIN ); ?></a>
        </div>
    </div>

    <?php
    // Save render result
    $section[] = ob_get_contents();
    ob_end_clean();



    // Combine all sections
    $output = implode( '<hr class="wp-block-separator">', $section );


    // Improve typography (when plugin wp-typography is loaded)
    if( class_exists( 'WP_Typography' ) ) :
        $output = \WP_Typography::process_title( $output );
    endif;

    return $output;
}



/**
 * Registers the callback function.
 */

function register_block_single_publication_details()
{
    register_block_type_from_metadata(
        __DIR__,
        array(
            'render_callback' => 'mdb_theme_blocks_two\render_block_single_publication_details',
        )
    );
}

add_action( 'init', 'mdb_theme_blocks_two\register_block_single_publication_details' );
