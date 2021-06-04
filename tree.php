<?php

/*
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - Shortcode - [Tree]
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>Shortcode</strong> To create a heirarchy tree of a taxonomy
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                            CONFIGURATION                                │
// └─────────────────────────────────────────────────────────────────────────┘
$config = [];

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                           Register CONSTANTS                            │
//  └─────────────────────────────────────────────────────────────────────────┘
define( 'ANDYP_TREE_PATH', __DIR__ );
define( 'ANDYP_TREE_URL', plugins_url( '/', __FILE__ ) );
define( 'ANDYP_TREE_FILE',  __FILE__ );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
$tree = new andyp\tree\initialise;
$tree->set_config($config);
$tree->register();