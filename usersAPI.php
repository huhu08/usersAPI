
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'USERS_LOCATION', dirname( __FILE__ ) );
define( 'USERS_LOCATION_URL', plugins_url( '', __FILE__ ) );

require 'vendor/autoload.php';
require 'js/main.js';



add_shortcode('APIData','callback_func');
 function callback_func(){
    $url='https://jsonplaceholder.typicode.com/users/';
    $arguments = array(
        'method' => 'GET'
    );
    $response = wp_remote_get( $url, $arguments );
    //var_dump( wp_remote_retrieve_body( $response ) );
    
    $results = json_decode(wp_remote_retrieve_body($response));
    
//var_dump($results);
//print_r($results);

$html .="";

$html .= "<table>";

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
    $html .= '<td a href="#" class="rml_bttn" data-id="' . get_the_id() . '">Read Me Later</td>';
    $html .= "</tr>";

}


$html .= "</table>";

return $html;
echo $html;


}
function getUserInfo(){
if (isset($_REQUEST)){
    $user_id=$_REQUEST;
    echo $user_id;
}
}
add_action('wp_ajax_user_info','getUserInfo');

?>
