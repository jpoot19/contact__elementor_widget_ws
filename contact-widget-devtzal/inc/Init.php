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
    public static function getServices()
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
    public static function registerServices() 
	{
		foreach ( self::getServices() as $class ) {
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
