<?php
/**
 * @package ContactWidgetDevtzal
 */

 namespace Inc\Base;

 use \Inc\Base\BaseController;
 class Enqueue extends BaseController
 {

        public function register()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        }

        public function enqueue()
        {
            wp_enqueue_script('jquery_3.6.0',  $this->plugin_url .'assets/js/jquery-3.6.0.min.js');
            wp_enqueue_style('contact-widget-devtzal_css', $this->plugin_url .  'assets/css/contact-widget-devtzal.css?v='.rand() );
            wp_enqueue_script('contact-widget-devtzal_js',  $this->plugin_url .'assets/js/contact-widget-devtzal.js?v='.rand());

            wp_enqueue_style('fontawesome_css', $this->plugin_url .  'assets/fontawesome/css/all.min.css' );
            //Bootstrap
            wp_enqueue_style('bootstrap_css', $this->plugin_url .  'assets/bootstrap/css/bootstrap.min.css' );
            wp_enqueue_script('bootstrap_js',  $this->plugin_url .'assets/bootstrap/js/bootstrap.min.js');

           

           
            // Countries

            wp_enqueue_style('country_flags', $this->plugin_url .  'assets/countries/css/flags/es.png' );
            wp_enqueue_script('contry_js',  $this->plugin_url .'assets/countries/js/countrypicker.js?v='.rand());

            
        }
 }