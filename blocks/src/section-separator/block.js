import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';


/**
 * Internal dependencies
 */

import metadata from './block.json';
import './block.css';


/**
 * Register the block.
 */

registerBlockType( metadata, {
    edit: () => {
        const blockProps = useBlockProps();

        return (
            <div { ...blockProps }>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path className="circle" d="M257.2 144.4c61.6 0 111.6 49.9 111.6 111.6s-49.9 111.6-111.6 111.6-111.6-50-111.6-111.6 50-111.6 111.6-111.6zm0 239.1c70.4 0 127.5-57.1 127.5-127.5s-57.1-127.5-127.5-127.5S129.7 185.6 129.7 256s57.1 127.5 127.5 127.5z"></path>
                    <path className="line" d="M28.4 253.9h100M385.9 253.9h100"></path>
                </svg>
            </div>
        );
    },
    save: () => {
        const blockProps = useBlockProps.save();

        return (
            <div { ...blockProps }>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path className="circle" d="M257.2 144.4c61.6 0 111.6 49.9 111.6 111.6s-49.9 111.6-111.6 111.6-111.6-50-111.6-111.6 50-111.6 111.6-111.6zm0 239.1c70.4 0 127.5-57.1 127.5-127.5s-57.1-127.5-127.5-127.5S129.7 185.6 129.7 256s57.1 127.5 127.5 127.5z"></path>
                    <path className="line" d="M28.4 253.9h100M385.9 253.9h100"></path>
                </svg>
            </div>
        );
    },
} );
