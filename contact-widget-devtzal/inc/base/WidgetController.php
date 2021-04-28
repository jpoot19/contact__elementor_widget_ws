<?php
/**
 * @package ContactWidgetDevtzal
 */

 namespace Inc\Base;

 use Inc\Base\BaseController;
 use Inc\Api\Widgets\ContactWidget;

 class WidgetController extends BaseController{

    public function register(){
      
         //if(! $this-> activated('widget_devtzal')) return;

         $widget_devtzal = new ContactWidget();
         $widget_devtzal->register();
         
    }
 }