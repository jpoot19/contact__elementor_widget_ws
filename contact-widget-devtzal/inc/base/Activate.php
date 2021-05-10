<?php
/**
 * @package ContactWidgetDevtzal
 */

namespace Inc\Base;
class Activate
{
    public static function activate() {
		flush_rewrite_rules();
		/* $default = array();

		if ( ! get_option( 'contact_widget_devtzal' ) ) {
			update_option( 'contact_widget_devtzal', $default );
		} */
	}
}