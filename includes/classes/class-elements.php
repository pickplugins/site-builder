<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_site_builder_elements{
	
	public function __construct(){


    }


	
	public function elements_group(){

	   $groups['general'] = array(
	       "groupName" => "General",
           "groupKey" => "general",
           "items" => array(
               "sidebar" => array("key" => "sidebar", "name" => __("Sidebar", 'site-builder')),
               "menu" => array("key" => "menu", "name" => __("Menu", 'site-builder')),
               "logo" => array("key" => "logo", "name" => __("Logo", 'site-builder')),
               "image" => array("key" => "image", "name" => __("Image", 'site-builder')),
               "button" => array("key" => "button", "name" => __("Button", 'site-builder')),
               "heading" => array("key" => "heading", "name" => __("Heading", 'site-builder')),
               "paragraph" => array("key" => "paragraph", "name" => __("Paragraph", 'site-builder')),
           )
       );
        return $groups;
	}	
	


	
	
	
}

