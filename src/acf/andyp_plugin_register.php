<?php

add_action( 'plugins_loaded', function() {
    do_action('register_andyp_plugin', [
        'title'     => 'Shortcode [tree]',
        'icon'      => 'file-tree-outline',
        'color'     => '#00f',
        'path'      => __FILE__,
    ]);
} );