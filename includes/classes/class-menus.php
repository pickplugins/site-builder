<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_site_builder_menus  {
	
	public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	
	public function admin_menu() {

        add_menu_page( __( 'Site Builder', 'question-answer' ), __( 'Site Builder', 'question-answer' ), 'manage_options', 'site-builder', array( $this, 'site_builder' ), 'dashicons-schedule
' );
        //add_submenu_page( 'edit.php?post_type=question', __( 'Settings', 'question-answer' ), __( 'Settings', 'question-answer' ), 'manage_options', 'settings', array( $this, 'settings' ) );

		
	}
	
	public function site_builder(){
		include( QA_PLUGIN_DIR. 'includes/menus/site-builder.php' );
	}	
	

	
	
	
} new class_site_builder_menus();

