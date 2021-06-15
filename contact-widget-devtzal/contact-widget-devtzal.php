<?php
/*
Plugin Name: Contact Widget by Devtzal
Plugin URI: https://devtzal.com/
Description: Widget that allows start a whatsapp chat or schedule a phone call.
Version: 1.0
Author: Jonathan Poot
*/



defined ( 'ABSPATH' ) or die('Hey, you can\t access this file');


if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


/* 
define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_URL', plugin_dir_url( __FILE__));
define('PLUGIN', plugin_basename( __FILE__)); */

function activate_contact_widget_devtzal(){
   Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_contact-widget_devtzal' );

function deactivate_contact_widget_devtzal(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_contact-widget_devtzal' );

add_action( 'rest_api_init', function () {
    register_rest_route( 'devtzal/widget/v1', '/contact', array(
      'methods' => 'POST',
      'callback' => 'addLead',
      'args' => [],
    ) );
  } );


 function addLead(WP_REST_Request $request){
    $body = $request->get_json_params();
    //return $body['name'];
    if(!empty($body['name']))
    {
        $name = $body['name'];
    }
    if(!empty($body['surname']))
    {
        $surname = $body['surname'];
    }
    if(!empty($body['email']))
    {
        $email = $body['email'];
    }
    if(!empty($body['phone']))
    {
        $phone = $body['phone'];
    }
    if(!empty($body['from']))
    {
        $from = $body['from'];
    }
    if(!empty($body['country']))
    {
        $country = $body['country'];
    }
    $comentarios = "WIDGET";
    $origen=2;
    $lang="es";
    $country_iso= $country;
    $data = array(
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'phone' => $phone,
        'from' => $from,
        'comentarios' => 'WIDGET',
        'origen' => 2,
        'lang' => 'es',
        'country_iso' =>  $country_iso
    );

    $postdata = json_encode($data);
    //return $postdata;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://admin.idiomastravel.net/inbox/data/save',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postdata,        
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));

      
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      return $response;

 }

// if ( class_exists( 'Inc\\Init' ) ){
    Inc\Init::registerServices();
//}