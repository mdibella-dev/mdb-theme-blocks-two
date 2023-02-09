( function( blocks, i18n, element, blockEditor ) {
    var __ = i18n.__;
    var el = element.createElement;

    blocks.registerBlockType( 'mdb-theme-blocks/post-terms', {

        edit: function() {
            return el( 'p', '', __( 'Shows the post terms as a button list.', 'mdb-theme-blocks' ) );
        }
    } );

} (
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element,
    window.wp.blockEditor
) );
