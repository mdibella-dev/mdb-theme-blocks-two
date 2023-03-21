# Marco Di Bella &mdash; Block Collection (mdb-theme-fse)
This plugin adds custom blocks to the Gutenberg editor for use in Marco Di Bella's personal WordPress theme ([mdb-theme-fse](https://github.com/mdibella-dev/mdb-theme-fse)). Basically a replacement for the plugins mdb-theme-blocks (1.2.0) and mdb-theme-ajax (1.1.0).

<br>

## Development Info

### Contributors
[Marco Di Bella ](https://github.com/mdibella-dev)

### Tags
gutenberg, block-editor, blocks, full-site-editing, translation-ready, blocks, ajax, custom-post-type-support

### Requires at least

* WordPress 6.0

### Tested up to

* WordPress 6.2 RC2

<br>

## Changelog

### Latest changes to the main branch

* New: Extract changelog from README.md
* New: Add patch to fix the path to Gutenberg related localized script files (backport from blocks-lab)
* New: Add package.json
* New: Add wp_set_script_translations() support
* New: Adapt block file inclusion process from blocks-lab project
* New: Add dynamic preview of post-terms in block editor (backport from blocks-lab)
* Improve: Add serverside rendering to block post-terms (#3)
* Improve: Reorganize block related files and folder to match those in blocks-lab project
* Improve: Remove check for register_block() on every single block registration
* Improve: Create new German translation
* Improve: Remove title in post-terms-archive
* Bugfix: File not found error (ajax-loadmore.min.js)


### Previous changes

See [CHANGELOG.md](https://github.com/mdibella-dev/mdb-theme-blocks-two/blob/main/CHANGELOG.md).
