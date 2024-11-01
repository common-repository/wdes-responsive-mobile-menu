<?php

/**
 * Plugin Name: WDES Responsive Mobile Menu
 * Plugin URI: https://www.anthonycarbon.com/
 * Description: WDES Responsive Mobile Menu is a developer friendly WordPress responsive mobile menu. Providing easy access within your website in mobile with mobile friendly layout.
 * Version: 1.2.5
 * Author: <a href="https://www.anthonycarbon.com/">Anthony Carbon</a>
 * Author URI: https://www.anthonycarbon.com/
 * Donate link: https://www.paypal.me/anthonypagaycarbon
 * Tags: mobile, menu, responsive, navigation, mobile menu, responsive mobile menu, modal, popup, anthonycarbon.com
 * Requires at least: 4.4
 * Tested up to: 5.3.2
 * Stable tag: 1.2.4
 *
 * Text Domain: wdes-rmm
 * Domain Path: /i18n/languages/
 *
 * @author Anthony Carbon
 */
 
if ( ! defined( 'ABSPATH' ) ){ exit; }

if ( ! class_exists( 'WDES_Responsive_Mobile_Menu' ) ) :

class WDES_Responsive_Mobile_Menu {
	public $defaults = array();
	public $options = array();
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->options();
		$this->init_hooks();
	}
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	private function options() {
		$this->defaults = wdes_rmm_default_settings();
		if( get_option( 'wdes_rmm_settings' ) ) {
			$newoptions = array();
			$options = get_option( 'wdes_rmm_settings' );
			foreach( wdes_rmm_old_keys() as $key => $old ){
				if ( isset( $options[$old] ) ){
					$newoptions[$key] = $options[$old];
				}
			}
			$this->options = $newoptions;
		}
		$GLOBALS['wdes_rmm_defaults'] = $this->defaults;
	}
	private function define_constants() {
		$this->define( 'WDES_RMM', 'wdes-rmm' );
		$this->define( 'WDES_RMM_NAME', 'WDES Responsive Mobile Menu' );
		$this->define( 'WDES_RMM_BN', plugin_basename( __FILE__ ) );
		$this->define( 'WDES_RMM_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'WDES_RMM_IMG_URL', WDES_RMM_URL . 'assets/images' );
		$this->define( 'WDES_RMM_JS_URL', WDES_RMM_URL . 'assets/js' );
		$this->define( 'WDES_RMM_CSS_URL', WDES_RMM_URL . 'assets/css' );
		// DIR
		$this->define( 'WDES_RMM_DIR', plugin_dir_path( __FILE__ ) );
		$this->define( 'WDES_RMM_LIB_DIR', WDES_RMM_DIR . '/lib' );
		$this->define( 'WDES_RMM_ADMIN_DIR', WDES_RMM_LIB_DIR . '/admin' );
		$this->define( 'WDES_RMM_VIEW_DIR', WDES_RMM_LIB_DIR . '/view' );
		$this->define( 'WDES_RMM_FUNCTIONS_DIR', WDES_RMM_LIB_DIR . '/functions' );
		$this->define( 'WDES_RMM_TEMPLATE_DIR', WDES_RMM_LIB_DIR . '/templates' );
		// DIR
		$this->define( 'WDES_RMM_PARENT_THEME_DIR', get_template_directory() );
		$this->define( 'WDES_RMM_CHILD_THEME_DIR', get_stylesheet_directory() );
	}
	private function init_hooks() {
		add_filter( 'plugin_row_meta', array( $this, 'add_action_links' ), 10, 2 );
		add_filter( 'plugin_action_links', array( $this, 'plugin_url' ), 10, 2 );
		add_filter( "pre_option_wdes_rmm_settings", array( $this, 'pre_option' ), 10, 3 );
		add_action( 'admin_print_styles', array( $this, 'admin_styles' ) );
		add_action( 'admin_print_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles_scripts' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_setting' ) );
		//add_action( 'wdes_rmm_hidden', array( $this, 'import_options' ) );
		add_action( 'wp_ajax_import_options', array( $this, 'import_options' ) );
		add_action( 'wp_ajax_nopriv_import_options', array( $this, 'import_options' ) );
		// add mobile menus in some themes
		add_action( 'wp_head', array( $this, 'styles' ) );
		add_action( 'genesis_before_header', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'presscore_body_top', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'avada_before_header_wrapper', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'woo_top', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'theme_after_body_tag_start', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'wpctp_before_page', array( $this, 'menu' ), 1, 1, 1 );
		add_action( 'extended_pro_before_header', array( $this, 'menu' ), 1, 1, 1 );
	}
	public function add_action_links( $plugin_meta, $plugin_file ) {
		if( $plugin_file == plugin_basename(__FILE__) ){
			//$plugin_meta[] = sprintf( '<a href="https://www.anthonycarbon.com/" target="_blank">%s</a>', __( 'Documentaion', WDES_RMM ) );
			$plugin_meta[] = sprintf( '<a href="https://demo.anthonycarbon.com/" target="_blank">%s</a>', __( 'Demo', WDES_RMM ) );
			$plugin_meta[] = '<a class="dashicons-before dashicons-awards" href="https://www.paypal.me/anthonypagaycarbon" target="_blank">' . __( 'Donate', WDES_RMM ) . '</a>';
		}
		return $plugin_meta;
	}
	public function register_setting() {
		register_setting( 'wdes_rmm_settings', 'wdes_rmm_settings' );
		if( ( isset( $_REQUEST['settings-updated'] ) == true ) && ( isset( $_REQUEST['reset'] ) == true ) ) {
			delete_option( 'wdes_rmm_settings' );
		}
		if( ! get_option( 'wdes_rmm_settings' ) ) {
			update_option( 'wdes_rmm_settings', $this->defaults );
		}
		if( 
			! wdes_rmm_option( 'option_version' )
		) {
			update_option( 'wdes_rmm_settings', wp_parse_args( $this->options, $this->defaults ) );
		}
	}
	public function includes() {
		include_once( WDES_RMM_FUNCTIONS_DIR . '/options.php' );
		include_once( WDES_RMM_ADMIN_DIR . '/fields.php' );
		include_once( WDES_RMM_ADMIN_DIR . '/field-args.php' );
		include_once( WDES_RMM_FUNCTIONS_DIR . '/functions.php' );
	}
	public function import_options(){
		if( isset( $_POST['dataoptions'] ) ){
			if( ! empty( $_POST['dataoptions'] ) ){
				$encode = base64_decode( $_POST['dataoptions'] );
				update_option( 'wdes_rmm_settings', unserialize( $encode ) );
				exit();
			}
		}
		die();
	}
	public function pre_option( $bool, $option ){
		if( ! is_admin() && ! function_exists( 'wdes_rmm_layout_1' ) ){
			$bool = true;
		}
		return $bool;
	}
	public function admin_menu(){
		add_menu_page(
			'Mobile Menu',
			'WDES Mobile',
			'manage_options',
			WDES_RMM,
			array( $this, 'settings' )
		);
	}
	public function settings(){
		include( WDES_RMM_ADMIN_DIR . '/page.php' );
	}
	public function plugin_url( $links, $file ){
		if ( $file != WDES_RMM_BN ) { return $links; }
		array_unshift(
			$links,
			sprintf(
				'<a href="%s?page=%s">%s</a>',
				esc_url( admin_url( 'admin.php' ) ),
				WDES_RMM,
				esc_html__( 'Settings', WDES_RMM )			
			)
		);
		return $links;
	}
	public function admin_styles(){
		wp_register_style( WDES_RMM . '-admin', WDES_RMM_CSS_URL . '/admin.css' );
		wp_enqueue_style(  WDES_RMM . '-admin' );
	}	
	public function admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_script( 'wp-color-picker' ); 
		wp_enqueue_media();
		wp_register_script(  WDES_RMM . '-admin', WDES_RMM_JS_URL . '/admin.js', array( 'jquery' ) );
		wp_enqueue_script(  WDES_RMM . '-admin' );
		wp_localize_script(
			 WDES_RMM . '-admin',
			'wdes_rmm',
			apply_filters(
				'wdes_rmm_localize_script',
				array(
					'ajaxurl' 	=> admin_url( 'admin-ajax.php' ),
					'wdes_rmm_url' 	=> WDES_RMM_URL,
					'wdes_rmm_img_url'	=> WDES_RMM_IMG_URL,
					'site_url' 		=> get_bloginfo( 'url' ),
					'site_name' 	=> get_bloginfo( 'name' ),
				)
			)
		);
	}
	public function styles_scripts(){
		wp_register_script( 
			 WDES_RMM, 
			apply_filters( 'wdes_rmm_layout_js', WDES_RMM_JS_URL . "/layout-1.min.js" ), 
			array( 'jquery' ) 
		);
		wp_register_style( 
			WDES_RMM, 
			apply_filters( 'wdes_rmm_layout_css', WDES_RMM_CSS_URL . "/layout-1.min.css" ) 
		);	
		wp_enqueue_script( WDES_RMM );
		wp_enqueue_style( WDES_RMM );
		wp_localize_script(
			WDES_RMM,
			'wdes_rmm',
			apply_filters(
				'wdes_rmm_localize_script',
				array(
					'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
					'wdes_rmm_url'	=> WDES_RMM_URL,
					'wdes_rmm_img_url'	=> WDES_RMM_IMG_URL,
					'url'	=> get_bloginfo( 'url' ),
					'name' 	=> get_bloginfo( 'name' ),
					'status'	=> wdes_rmm_option( 'responsive_mobile-menu' ),
					'size' 		=> wdes_rmm_option( 'mobile_screen_starting_point' ) ? : $this->defaults['mobile_screen_starting_point'],
					'save' 		=> wdes_rmm_option( 'has_been_save' ),
				)
			)
		);
	}
	public function menu(){
		if( file_exists( WDES_RMM_CHILD_THEME_DIR . '/wdes-responsive-mobile-menu/layout-1.php' ) ){
 			include( apply_filters( 'wdes_rmm_layout_php', WDES_RMM_CHILD_THEME_DIR . '/wdes-responsive-mobile-menu/layout-1.php' ) );
		}else if( file_exists( WDES_RMM_PARENT_THEME_DIR . '/wdes-responsive-mobile-menu/layout-1.php' ) ){
 			include( apply_filters( 'wdes_rmm_layout_php', WDES_RMM_PARENT_THEME_DIR . '/wdes-responsive-mobile-menu/layout-1.php' ) );
		}else{
 			include( apply_filters( 'wdes_rmm_layout_php', WDES_RMM_TEMPLATE_DIR . '/layout-1.php' ) );
		}
	}
	public function styles(){
		include( apply_filters( 'wdes_rmm_layout_styles_php', WDES_RMM_FUNCTIONS_DIR . "/styles.php" ) );
	}
}

add_action( 'plugins_loaded', 'wdes_rmm', 5 );
function wdes_rmm(){
	new WDES_Responsive_Mobile_Menu;
}

/**
 * wdes_rmm_mobile_responsive_menu is deprecated functions since 1.0.9
 * @since 1.0.9
 * @deprecated 1.0.9 Use wdes_responsive_mobile_menu()
 * @see wdes_responsive_mobile_menu()
 */

function wdes_rmm_mobile_responsive_menu(){
	$menu = new WDES_Responsive_Mobile_Menu;
	$menu->menu();
}

function wdes_responsive_mobile_menu(){
	$menu = new WDES_Responsive_Mobile_Menu;
	$menu->menu();
}

endif;