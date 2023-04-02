# Changelog

*New / Improve / Bugfix*

<br>


### 1.1.2
Released: 03-03-2023

* New: Extract changelog from README.md
* New: Add patch to fix the path to Gutenberg related localized script files (backport from blocks-lab)
* New: Add package.json
* New: Add wp_set_script_translations() support
* New: Adapt block file inclusion process from blocks-lab project
* New: Add dynamic preview of post-terms in block editor (backport from blocks-lab)
* Improve: Add serverside rendering to block post-terms ([#3](https://github.com/mdibella-dev/mdb-theme-blocks-two/issues/3))
* Improve: Reorganize block related files and folder to match those in blocks-lab project
* Improve: Remove check for register_block() on every single block registration
* Improve: Remove title in post-terms-archive
* Improve: Recreate new German translation
* Bugfix: File not found error (ajax-loadmore.min.js)


### 1.1.1
Released: 05-02-2023

* Improve: Update translation


### 1.1.0
Released: 04-02-2023

* Improve: Documentation style
* Improve: Include shortcode, class and block files package-wise via index.php
* Improve: Simplify package info
* Improve: Simplify namespace
* Improve: Provide the localizable texts available in block.json in the correct source language
* Improve: Remove title from post-terms' links
* Improve: Replace text domain constant with text domain string
* Bugfix: Blocks: Fix schema path
* Bugfix: Blocks: Use translation for title and description


### 1.0.1
Released: 04-01-2023

* Improve: Change section generation in single-publication-details
* Improve: Add separator block in single-publication-details
* Bugfix: Wrong textdomain
* Bugfix: Namespace in plugin.php
* Bugfix: Translation not loaded ([#1](https://github.com/mdibella-dev/mdb-theme-blocks-two/issues/3))


### 1.0.0
Released: 12-11-2022

* Initial commit
