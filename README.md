# Marco Di Bella &mdash; Blocks for Marco Di Bella's personal theme (mdb-theme-fse)
This plugin adds custom blocks to the Gutenberg editor for use in Marco Di Bella's personal WordPress theme (mdb-theme-fse). Basically a replacement for mdb-theme-blocks (1.2.0) and mdb-theme-ajax (1.1.0).

__Contributors:__ mdibella-dev

__Tags:__ gutenberg, block-editor, blocks, full-site-editing, translation-ready, blocks, ajax, custom-post-type-support

__Requires at least:__ WordPress 6.0

__Tested up to:__ WordPress 6.1


## Changelog
*New / Improve / Bugfix*


### main
* New: package.json
* New: Add wp_set_script_translations() support.
* New: Adapt block file inclusion process from blocks-lab project.
* Improve: Reorganize block related files and folder to match those in blocks-lab project.
* Improve: Remove check for register_block() on every single block registration.
* Improve: Create new German translation.


### 1.1.0
* Improve: Documentation style.
* Improve: Include shortcode, class and block files package-wise via index.php
* Improve: Simplify package info.
* Improve: Simplify namespace.
* Improve: Provide the localizable texts available in block.json in the correct source language.
* Improve: Remove title from post-terms' links.
* Improve: Replace text domain constant with text domain string.
* Bugfix: Blocks: Fix schema path.
* Bugfix: Blocks: Use translation for title and description.


### 1.0.1
* Improve: Change section generation in single-publication-details.
* Improve: Add separator block in single-publication-details.
* Bugfix: Wrong textdomain.
* Bugfix: Namespace in plugin.php.
* Bugfix: Translation not loaded (#1).


### 1.0.0
* Initial commit.
