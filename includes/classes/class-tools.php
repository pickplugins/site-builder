<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_site_builder_tools  {
	
	public function __construct(){

		//add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }

	public function site_builder(){
		include( QA_PLUGIN_DIR. 'includes/menus/site-builder.php' );
	}	
	

	
	
	
}

