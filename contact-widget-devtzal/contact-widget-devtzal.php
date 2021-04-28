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

if ( class_exists( 'Inc\\Init' ) ){
    Inc\Init::registerServices();
}