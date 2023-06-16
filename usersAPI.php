
<?php
/*
Plugin Name:  users Plugin 
Plugin URI:   https://
Description:  A short little description of the plugin. It will display users info. 
Version:      1.0
Author:       Huda-IPSYDE
Author URI:   https://www.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpb-tutorial
Domain Path:  /languages
*/
//require('wp-blog-header.php');
//require_once( 'wp-load.php' );
//require 'vendor/autoload.php';
//require 'assets/js/script.js';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'USERS_LOCATION', dirname( __FILE__ ) );
define( 'USERS_LOCATION_URL', plugins_url( '', __FILE__ ) );



 


 add_shortcode('APIData','callback_func');
 //create endpoint to provide data
$url='';
 function callback_func(){
 $url='https://jsonplaceholder.typicode.com/users/';
  
    $arguments = array(
        'method' => 'GET'
    );
    $response = wp_remote_get( $url, $arguments );
    //var_dump( wp_remote_retrieve_body( $response ) );
    
    $results = json_decode(wp_remote_retrieve_body($response));
    
// var_dump($results);
//print_r($results);



$html = "<table>";

$html .= "<tr >";
$html .= " <th >ID</th>";
$html .= " <th>name</th>";
$html .= " <th>username</th>";
$html .= "<th>Email</th>";
$html .= " <th>More Information</th>";
$html .= " </tr>";
foreach($results as $result)
{   
    
    $html .= "<tr  >" ;
    $html .="<td>" .$result->id ."</td>";
    $html .="<td>" .$result->name ."</td>";
    $html .="<td>" .$result->username ."</td>"; 
    $html .="<td >" .$result->email ."</td>";
    $html .= "<td> <button class='btn'  id='#read-one-btn'  data-id=''> .'Read more'. </button></td>";
    //
    $html .= "</tr>";

}

//` ". $result->id ." `

$html .= "</table>";

return $html;
echo $html;


} 
function rest_ajax_shortcode () {
   
    // Write AJAX to show the infomation in the shortcode.
    wp_enqueue_script( 'script', plugins_url( 'assets/js/script.js', __FILE__ ), ['jquery'], '0.1.0', true );
  //  wp_localize_script( 'script', '', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

// Create new endpoint to provide data.
add_action( 'rest_api_init', 'rest_ajax_endpoint' );

function rest_ajax_endpoint() {
    register_rest_route(
       
        'rest-ajax',
        [
            'methods'             => 'GET',
            'permission_callback' => '__return_true',
            'callback'            => 'rest_ajax_callback',
        ]
    );
}

// REST Endpoint information.
function rest_ajax_callback() {

    $data = '';

    $args = [
        'methods' => 'GET',
    ];

    $reponse = wp_remote_get( 'https://jsonplaceholder.typicode.com/users/1', $args );
    $reponse = wp_remote_retrieve_body($reponse);
    $reponse = json_decode($reponse);

    return $reponse;
}

?>
