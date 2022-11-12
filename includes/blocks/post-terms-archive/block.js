( function( blocks, i18n, element, blockEditor ) {
    var __ = i18n.__;
    var el = element.createElement;

    blocks.registerBlockType( 'mdb-theme-blocks/post-terms-archive', {

        edit: function() {
            return el( 'p', '', __( 'Overview of the articles provided with a certain term.', 'mdb-theme-blocks' ) );
        }
    } );

} (
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element,
    window.wp.blockEditor
) );
