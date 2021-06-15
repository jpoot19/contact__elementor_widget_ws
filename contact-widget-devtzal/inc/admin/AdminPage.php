<?php
/**
 * @package ContactWidgetDevtzal
 */

namespace Inc\Admin;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class AdminPage extends BaseController
{
    public $settings;
    public $pages = array();
    public $callbacks;
  

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->settings->addPages( $this->pages)->register();
        //add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Contact Widget by Devtzal', 
                'menu_title' => 'CW Devtzal', 
                'capability' => 'manage_options', 
                'menu_slug' => 'contact_widget_devtzal', 
                'callback' => array($this->callbacks, 'adminDashboard'), 
                'icon_url' => 'dashicons-store', 
                'position' => 110
            )
        );
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
