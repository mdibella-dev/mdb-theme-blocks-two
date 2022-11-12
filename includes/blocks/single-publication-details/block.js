( function( blocks, i18n, element, blockEditor ) {
    var __ = i18n.__;
    var el = element.createElement;

    blocks.registerBlockType( 'mdb-theme-blocks/single-publication-details', {

        edit: function() {
            return el( 'p', '', __( 'Shows the details of a single publication.', 'mdb-theme-blocks' ) );
        }
    } );

} (
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element,
    window.wp.blockEditor
) );
