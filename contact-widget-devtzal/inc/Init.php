<?php
/**
 * @package ContactWidgetDevtzal
 */

 namespace Inc;

//use Inc\Admin\Pages\Admin;

final class Init
 {
    
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Admin\AdminPage::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\WidgetController::class,
        ];
    }

    /**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
    public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

    /**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
    public static function instantiate( $class )  {

            $service = new $class();
            return $service;
    }


 }



/*  use Inc\Admin\Activate;
use Inc\Admin\Deactivate;


if( ! class_exists('ContactWidgetDevtzal')){

    class ContactWidgetDevtzal
    {

        public $pluginName;
        public function __construct()
        {
            $this->pluginName = plugin_basename( __FILE__ );
            // Create custom post type
            //add_action( 'init', array($this, 'create_custom_post_type') );
        
            
        }

        function register(){
            //add assets (js, css)
           
           

            add_filter( "plugin_action_links_$this->pluginName", array( $this, 'settings_link'));
        }

        public function settings_link( $links ){
            $settings_link = '<a href = "options-general.php?page=contact_widget_devtzal_plugin" > Settings </a>';
            array_push($links, $settings_link);
            return $links;
        }

       

        function activate(){
            //require_once plugin_dir_path( __FILE__ ) . 'inc/contact-widget-devtzal-activate.php';
            Activate::activate();
            $this->create_custom_post_type();
            //add_menu_page( '', $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null )
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

        
    }




    $contactWidgetDevtzal = new ContactWidgetDevtzal();
    $contactWidgetDevtzal->register();

    register_activation_hook( __FILE__, array('$contactWidgetDevtzal', 'activate') );

    //require_once plugin_dir_path( __FILE__ ) . 'inc/contact-widget-devtzal-deactivate.php';

    register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
}

 */
