!function(){"use strict";var e={n:function(t){var o=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(o,{a:o}),o},d:function(t,o){for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}},t=window.wp.element,o=window.wp.blocks,r=window.wp.blockEditor,n=(window.wp.i18n,window.wp.serverSideRender),i=e.n(n),c=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"mdb-theme-blocks/section-separator","title":"Section Separator","description":"Separates two sections.","icon":"tag","category":"mdb-theme-blocks","textdomain":"mdb-theme-blocks","example":{},"attributes":{},"editorScript":"file:./block.js","style":"file:./block.js"}');(0,o.registerBlockType)(c,{edit:e=>{const o=(0,r.useBlockProps)();return(0,t.createElement)("div",o,(0,t.createElement)(i(),{block:"mdb-theme-blocks/section-separator"}))}})}();