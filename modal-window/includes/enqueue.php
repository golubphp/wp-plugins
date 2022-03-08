<?php
function modal_window_admin_scripts() {
    if(!isset($_GET['page']) || $_GET['page'] != "opcije_mp"){
        return;
    }
	wp_register_style('add_bootstrap',get_template_directory_uri().'/assets/bootstrap-4.2.1/css/bootstrap.min.css');
	wp_enqueue_style('add_bootstrap');
	
	wp_register_script('add_jQuery',get_template_directory_uri().'/assets/jQuery/jquery-3.3.1.min.js');
	wp_enqueue_script('add_jQuery');
	
	wp_register_script('add_bootstrap_js',get_template_directory_uri().'/assets/bootstrap-4.2.1/js/bootstrap.min.js');
	wp_enqueue_script('add_bootstrap_js');
	
}