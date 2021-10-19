<?php
function usersAPI_add_scripts(){

    wp_enqueue_style('usersAPI-main-style', plugins_url(). '/usersAPI/css/style.css');
    // Add Main JS
    wp_enqueue_script('usersAPI-main-script', plugins_url(). '/usersAPI/js/main.js');

    // Add Google Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}
$response = wp_remote_get( 'https://api.github.com/users/blobaugh' );
$http_code = wp_remote_retrieve_response_code( $response );
add_action('wp_enqueue_scripts', 'usersAPI_add_scripts');