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
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        }

        public function enqueue()
        {
            wp_enqueue_style('contact-widget-devtzal', $this->plugin_url .  'assets/css/contact-widget-devtzal.css' );
            wp_enqueue_script('contact-widget-devtzal',  $this->plugin_url .'assets/js/contact-widget-devtzal.css');
        }
 }