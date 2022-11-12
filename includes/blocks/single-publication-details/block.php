<?php
/**
 * Block: Single publication details
 *
 * @author  Marco Di Bella
 * @package mdb-theme-blocks
 */

namespace mdb_theme_blocks_two;


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
    if( ! isset( $block->context['postId'] ) ) :
        return '';
    endif;

    $data = \mdb_theme_core\publication__get_data( $block->context['postId'] ); // add a fail safe here?


    // Start rendering
    ob_start();
    ?>
<section id="cover-and-title" class="publication-section">
    <div>
        <?php
        if( has_post_thumbnail( $block->context['postId'] ) ) :
            echo get_the_post_thumbnail( $block->context['postId'], 'full', array( 'class' => 'publication-cover' ) );
        endif;
        ?>
    </div>
    <div>
        <?php
        if( ! empty( $data['title'] ) ) :
        ?>
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
        endif;

        if( ! empty( $data['titleaddition'] ) ) :
        ?>
            <p><span class="publication-titleadittion"><?php echo $data['titleaddition']; ?></span></p>
        <?php
        endif;
        ?>
    </div>
</section>

<?php
    if( ! empty( $data['authors'] ) ) :
        $count   = 0;
        $authors = array();

        foreach( $data['authors'] as $author ) :
            $authors[] .= $author['au_firstname'] . ' ' . $author['au_lastname'];
            $count++;
        endforeach;
        ?>
            <section class="publication-section">
                <h2><?php echo ( 1 !== $count )? __( 'Authors', 'mdb-theme-blocks') : __( 'Author', 'mdb-theme-blocks'); ?></h2>
                <p><?php echo implode( ', ', $authors ); ?></p>
            </section>
        <?php
    endif;
?>


<?php
    if( '' !== get_post( $block->context['postId'] )->post_content ) :
    ?>
        <section class="publication-section">
            <h2><?php echo __( 'Abstract', 'mdb-theme-blocks'); ?></h2>
            <?php echo apply_filters( 'the_content', get_the_content( $block->context['postId'] ) ); ?>
        </section>
    <?php
    endif;
?>

<?php
    if( ! empty( $data['reference'] ) ) :
    ?>
        <section class="publication-section">
            <h2><?php echo __( 'Citation', 'mdb-theme-blocks'); ?></h2>
            <ol>
                <?php
                foreach( $data['reference'] as $reference ) :
                    ?><li><?php echo $reference; ?></li><?php
                endforeach;
                ?>
            </ol>
        </section>
    <?php
    endif;
?>

<?php
    if( ! empty( $data['citation'] ) ) :
    ?>
        <section class="publication-section">
            <h2><?php echo __( 'Is citated in', 'mdb-theme-blocks'); ?></h2>
            <ol>
                <?php
                foreach( $data['citation'] as $citation ) :
                    ?><li><?php echo $citation; ?></li><?php
                endforeach;
                ?>
            </ol>
        </section>
    <?php
    endif;
?>

<?php
    if( ! empty( $data['keywords'] ) ) :
    ?>
        <section class="publication-section">
            <h2><?php echo __( 'Keywords', 'mdb-theme-blocks'); ?></h2>
            <p><?php
                foreach( $data['keywords'] as $keyword ) :
                    ?><span class="publication-keyword"><?php echo $keyword->name; ?></span><?php
                endforeach;
            ?></p>
        </section>
    <?php
    endif;
?>

<section class="publication-section">
    <h2><?php echo __( 'citation suggestion', 'mdb-theme-blocks'); ?></h2>
    <p><?php echo \mdb_theme_core\publication__build_citation( $block->context['postId'] ); ?></p>
    <div class="wp-block-buttons is-content-justification-center" style="display: flex; padding-top: 4rem;" >
        <div class="wp-block-button" data-parentid="<?php echo $params['id']; ?>">
            <a class="wp-block-button__link" href="/citation/<?php echo $block->context['postId']; ?>" rel="nofollow"><?php echo __( 'Generate RIS file', 'mdb-theme-blocks'); ?></a>
        </div>
    </div>
</section>
<?php

    $output = ob_get_contents();
    ob_end_clean();


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
