<?php
/*
Plugin Name: Site Builder
Plugin URI: https://www.pickplugins.com/item/site-builder/?ref=dashboard
Description: Zero coding skill required to build your own WordPress site.
Version: 1.0.0
Text Domain: site-builder
Domain Path: /languages
Author: PickPlugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class SiteBuilder{
	
	public function __construct(){
	
		$this->define_constants();
		$this->declare_classes();
		$this->load_script();
		$this->load_functions();
		
		register_activation_hook( __FILE__, array( $this, 'activation' ) );
		add_action( 'plugins_loaded', array( $this, 'textdomain' ));

	}
	
	public function activation() {



	}
	
	public function textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'site-builder' );
		load_textdomain('site-builder', WP_LANG_DIR .'/site-builder/site-builder-'. $locale .'.mo' );
		load_plugin_textdomain( 'site-builder', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}


	
	public function load_functions() {

		//require_once( QA_PLUGIN_DIR . 'includes/functions.php');

	}

	
	public function load_script() {
	
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
		add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}
	

	
	public function declare_classes() {
		
		//require_once( QA_PLUGIN_DIR . 'includes/classes/class-post-types.php');

		
	}
	
	public function define_constants() {

		$this->define('QA_PLUGIN_URL', plugins_url('/', __FILE__)  );
		$this->define('QA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		$this->define('QA_PLUGIN_NAME', __('Question Answer', 'site-builder') );
		$this->define('QA_PLUGIN_SUPPORT', 'http://www.pickplugins.com/questions/'  );
		
	}
	
	private function define( $name, $value ) {
		if( $name && $value )
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	
	

		
		
	public function front_scripts(){

		wp_enqueue_script('qa_front_js', plugins_url( '/assets/front/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('front_scripts-form', plugins_url( '/assets/front/js/scripts-form.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('qa-user-profile.css', QA_PLUGIN_URL.'assets/front/css/user-profile.css');

	}

	public function admin_scripts(){
		
		wp_enqueue_script('qa_admin_js', plugins_url( '/assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'qa_admin_js', 'qa_ajax', array( 'qa_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('qa_admin_style', QA_PLUGIN_URL.'assets/admin/css/style.css');

	}
	
	
} new SiteBuilder();