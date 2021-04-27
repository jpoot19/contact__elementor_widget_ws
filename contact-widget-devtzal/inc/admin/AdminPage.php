<?php
/**
 * @package ContactWidgetDevtzal
 */

namespace Inc\Admin;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
class AdminPage extends BaseController
{
    public $settings;
    public $pages = array();
   
   public function __construct()
   {
       $this->settings = new SettingsApi();
       $this->pages = array(
        array(
            'page_title' => 'Contact Widget by Devtzal', 
            'menu_title' => 'CW Devtzal', 
            'capability' => 'manage_options', 
            'menu_slug' => 'contact_widget_devtzal', 
            'callback' => function() { echo '<h1>Contact Widget by Devtzal</h1>'; }, 
            'icon_url' => 'dashicons-store', 
            'position' => 110
        )
    );
   }

    public function register()
    {
        $this->settings->addPages( $this->pages)->register();
        //add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    /* public function add_admin_pages(){
        add_menu_page( 'Contact Widget Devtzal', 'Contact Widget', 'manage_options', 'contact_widget_devtzal_plugin', array( $this, 'admin_index'), 'dashicons-book',110  );
    } */
   /*  public function  admin_index(){
        //template
       // echo "Variable". $this->plugin_path;
        require_once $this->plugin_path . 'templates/admin.php';
    } */
}
