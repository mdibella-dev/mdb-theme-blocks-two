/**
 * WordPress dependencies
 */

import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';


/**
 * Internal dependencies
 */

import metadata from './block.json';


/**
 * Register the block.
 */

registerBlockType( metadata, {
    edit: ( props ) => {
        const blockProps = useBlockProps();
        return (
            <div { ...blockProps }>
                <ServerSideRender
                    block="mdb-theme-blocks/publication-terms"
                />
            </div>
        ) },
} );
