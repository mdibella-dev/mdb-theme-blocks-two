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
                    <g>
                        <path d="M257.2,144.4c61.6,0,111.6,49.9,111.6,111.6s-49.9,111.6-111.6,111.6S145.6,317.6,145.6,256S195.6,144.4,257.2,144.4z M257.2,383.5c70.4,0,127.5-57.1,127.5-127.5s-57.1-127.5-127.5-127.5S129.7,185.6,129.7,256S186.8,383.5,257.2,383.5z"/>
                        <line class="line" x1="28.4" y1="253.9" x2="128.4" y2="253.9"/>
                        <line class="line" x1="385.9" y1="253.9" x2="485.9" y2="253.9"/>
                    </g>
                </svg>
            </div>
        );
    },
    save: () => {
        const blockProps = useBlockProps.save();

        return (
            <div { ...blockProps }>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <g>
                        <path d="M257.2,144.4c61.6,0,111.6,49.9,111.6,111.6s-49.9,111.6-111.6,111.6S145.6,317.6,145.6,256S195.6,144.4,257.2,144.4z M257.2,383.5c70.4,0,127.5-57.1,127.5-127.5s-57.1-127.5-127.5-127.5S129.7,185.6,129.7,256S186.8,383.5,257.2,383.5z"/>
                        <line class="line" x1="28.4" y1="253.9" x2="128.4" y2="253.9"/>
                        <line class="line" x1="385.9" y1="253.9" x2="485.9" y2="253.9"/>
                    </g>
                </svg>
            </div>
        );
    },
} );
