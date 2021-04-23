<?php
/*
Plugin Name: Contact Widget by Devtzal
Plugin URI: https://devtzal.com/
Description: Widget that allows start a whatsapp chat or schedule a phone call.
Version: 1.0
Author: Jonathan Poot
*/

defined ( 'ABSPATH' ) or die('Hey, you can\t access this file');

define( 'CW_DEVTZAL_LOCATION', dirname(__FILE__));
define( 'CW_DEVTZAL_URL', plugins_url( '', __FILE__ ));

class ContactWidgetDevtzal
{

    public function __construct()
    {
        // Create custom post type
        add_action( 'init', array($this, 'create_custom_post_type') );

        
    }

    function register(){
        //add assets (js, css)
        add_action('admin_enqueue_scripts', array($this, 'load_assets'));
    }
    function activate(){
        $this->create_custom_post_type();
        flush_rewrite_rules();
    }
    function deactivate(){
        flush_rewrite_rules();
    }
    function create_custom_post_type()
    {
       // echo "IT WORKS";
        $args = array(
            'public' => true,
            // 'has_archive' => true,
            // 'supports' => array('title'),
            // 'exclude_from_search' => true,
            // 'publicly_queryable' => false,
            // 'capability' => 'manage_options',
            'label' => 'Contact Widget Devtzal',
            // 'menu_icon' => 'dashicons-book'
        );
        register_post_type('contact_widget_devtzal', $args);
    }

    public function load_assets()
    {
        wp_enqueue_style('contact-widget-devtzal', plugins_url( '/admin/css/contact-widget-devtzal.css', __FILE__ ) );
    }
}

if( class_exists('ContactWidgetDevtzal')){
    $contactWidgetDevtzal = new ContactWidgetDevtzal();
}

register_activation_hook( __FILE__, array($contactWidgetDevtzal, 'activate') );
register_deactivation_hook( __FILE__, array($contactWidgetDevtzal, 'deactivate') );