<?php
function modal_window_init() {
    include( 'includes/enqueue.php' );
    add_action( 'admin_enqueue_scripts', 'modal_window_admin_scripts' ); 
}