<?php
/**
 * Plugin Name: Knjige
 * Description: A simple Wordpress plugin that allows users to sell books
 * Version: 1.0
 * Author: Marjan Golubovic
 * Author URI: https://marjangolubovic.github.io/
 * Text Domain: knjige
 */
 
if ( !function_exists( 'add_action' ) ){
    echo 'Not allowed!';
    exit();
}

// Setup


// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );

// Hooks
register_activation_hook( __FILE__, 'cu_activate_plugin' );
add_action( 'init', 'recipe_init' );


// Shortcodes
 
 
 
 
 
 
 
 
?>