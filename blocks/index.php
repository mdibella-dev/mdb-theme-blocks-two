<?php
/**
 * Include all block files.
 *
 * @author  Marco Di Bella
 * @package blocks-lab
 */

namespace blocks_lab;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;


$block_names = require( 'require-block-list.php' );

foreach( $block_names as $block_name ) :
    require_once( 'build/' . $block_name . '/block.php' );
endforeach;
