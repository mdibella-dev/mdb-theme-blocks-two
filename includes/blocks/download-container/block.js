( function( blocks, i18n, element, blockEditor ) {
    var el               = element.createElement;
    var InnerBlocks      = blockEditor.InnerBlocks;
    var useBlockProps    = blockEditor.useBlockProps;

    const MY_TEMPLATE    = [
        [ 'core/shortcode' ]
    ];

    const ALLOWED_BLOCKS = [ 'core/shortcode'];


    blocks.registerBlockType( 'mdb-theme-blocks/download-container', {
        edit: function() {
            return el(
                'div',
                useBlockProps(),
                el(
                    'div',
                    {
                        'className': 'download-container-top'
                    },
                    ''
                ),
                el(
                    'div',
                    {
                        'className': 'download-container-inner'
                    },
                    el(
                        InnerBlocks,
                        {
                            template: MY_TEMPLATE,
                            allowedBlocks: ALLOWED_BLOCKS,
                        }
                    )
                ),
                el(
                    'div',
                    {
                        'className': 'download-container-bottom',
                    },
                    ''
                )
            );
        },
        save: function() {
            return el(
                'div',
                useBlockProps.save(),
                el(
                    'div',
                    {
                        'className': 'download-container-top',
                    },
                    ''
                ),
                el(
                    'div',
                    {
                        'className': 'download-container-inner',
                    },
                    el(
                        InnerBlocks.Content
                    )
                ),
                el(
                    'div',
                    {
                        'className': 'download-container-bottom',
                    },
                    ''
                )
            );
        }
    } );

} ) (
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element,
    window.wp.blockEditor
);
