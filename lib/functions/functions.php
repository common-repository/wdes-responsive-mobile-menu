<?php

if ( !defined('ABSPATH') ){ exit; }

function wdes_rmm_get( $key ){
	if( ! wdes_rmm_option( 'header-top-mobile-menu' ) && wdes_rmm_option( 'has_been_save' ) ){
		$classes[] = 'wdes-rmm-no-htmm';
	}
	return $classes;
}

function wdes_rmm_body_class( $classes ){
	if( ! wdes_rmm_option( 'header-top-mobile-menu' ) && wdes_rmm_option( 'has_been_save' ) ){
		$classes[] = 'wdes-rmm-no-htmm';
	}
	return $classes;
}

function wdes_rmm_settings_url( $links, $file ){
	if ( $file != WDES_RMM_BN ) { return $links; }
	array_unshift(
		$links,
		sprintf(
			'<a href="%s?page=wdes-rmm">%s</a>',
			esc_url( admin_url( 'admin.php' ) ),
			esc_html__( 'Settings', WDES_RMM )			
		)
	);
	return $links;
}

function wdes_rmm_field_name( $key ) {
 	return "wdes_rmm_settings[$key]";
}

function wdes_rmm_return_slug( $text ) {
	$slug = '';
	if( $text ){
		$slug	= str_replace( array( ".", ":", "(", ")", "/", "'", "," ), '', $text );
		$slug	= str_replace( " ", "-", $slug );
		$slug	= strtolower( $slug );
	}
	return	$slug;
}

function wdes_rmm_key( $text ) {
	$slug = '';
	if( $text ){
		$slug = str_replace( array( ".", ":", "(", ")", "/", "'", "," ), '', $text );
		$slug = str_replace( " ", "_", $slug );
		$slug = strtolower( $slug );
	}
	return $slug;
}

function wdes_rmm_slug_value( $text ) {
	return wdes_rmm_option( wdes_rmm_key( $text ) );
}

function wdes_rmm_if_save( $text, $default ='' ) {
	if( wdes_rmm_option( 'has_been_save' ) && wdes_rmm_slug_value( $text ) ){
		return true;		
	}else if( ! wdes_rmm_option( 'has_been_save' ) && ! wdes_rmm_slug_value( $text ) && $default ){
		return true;		
	}else{
		return;		
	}
}

function wdes_rmm_value( $key, $default ) {
	if( wdes_rmm_option( 'has_been_save' ) ){
		return wdes_rmm_option( $key );
	}elseif( $default ){
		return $default;
	}
	return;
}

function wdes_rmm_get_css( $property, $name, $default, $extention, $option ){
	$output		= '';
	$value 		= wdes_rmm_slug_value( $name ) . $extention;
	$default	= $default . $extention;
	$in_array	= array( 'background-image', 'content' );
	if( in_array( $property, $in_array ) ){
		$value = "url('$value')";
		$default = "url('$default')";
	}
	if( $value && $option ){
		$value = $option;
	}
	if( $value ){
		$output = "$property: $value;";
	}else if( $default ){
		$output = "$property: $default;";
	}
	return $output;
}

function wdes_rmm_get_styles( $styles ) {
	global $wdes_rmm_defaults;
	$elements = array();
	foreach( $styles as $style ) {
		$default = ! empty( $style['default'] ) ? $style['default'] : '';
		$extention = ! empty( $style['extention'] ) ? $style['extention'] : '';
		$option = ! empty( $style['option'] ) ? $style['option'] : '';
		if( isset( $wdes_rmm_defaults[wdes_rmm_key( $style['name'] )] ) ){
			if( wdes_rmm_option( wdes_rmm_key( $style['name'] ) ) == $wdes_rmm_defaults[wdes_rmm_key( $style['name'] )] ){
				continue;	
			}
		}
		if( wdes_rmm_slug_value( $style['name'] ) || $default ){
			$css = ! empty( $elements[$style['elements']]['css'] ) ? $elements[$style['elements']]['css'] : '';
			$css .= wdes_rmm_get_css( $style['property'], $style['name'], $default, $extention, $option );
			$elements[$style['elements']]['elements'] = $style['elements'];
			$elements[$style['elements']]['css'] = $css;
		}
	}
	$width = wdes_rmm_option( 'mobile-screen-starting-point' ) ? : 1024;
	echo "@media only screen and (max-width: {$width}px){ \n";
	foreach( $elements as $element ){
		printf( '%s{%s}', $element['elements'], $element['css'] );
	}
	echo wdes_rmm_slug_value( 'Custom CSS' );
	echo "\n}\n";
}

function wdes_rmm_get_theme_logo( $option_key = false, $logo_key = false ){
	global $wpdb;
	$row = new stdClass();
	$row->option_value = '';
	$options = array();
	if( $option_key && $logo_key ) {
		$row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", $option_key ) );
		if( ! empty( $row->option_value ) ) {
			$options = maybe_unserialize( $row->option_value );
		}
	}
	if( isset( $options[$logo_key] ) && $option_key && $logo_key ) {
		return $options[$logo_key];
	}
	return;
}

function wdes_rmm_default_logo(){
	// WPCargo Theme Pro Logo
	if( wdes_rmm_get_theme_logo( 'wpctp-settings', 'logo' ) ) {
		return wdes_rmm_get_theme_logo( 'wpctp-settings', 'logo' );
	}
	// Extended Pro Theme Logo
	if( wdes_rmm_get_theme_logo( 'extended-pro-settings', 'logo' ) ) {
		return wdes_rmm_get_theme_logo( 'extended-pro-settings', 'logo' );
	}
	// The7 Theme Logo
	$the7 = get_option( 'optionsframework' ); 
	if( ! empty( $the7['id'] ) ) {
		$mlogo = wdes_rmm_get_theme_logo( $the7['id'], 'header-style-mobile-logo_regular' );
		$hlogo = wdes_rmm_get_theme_logo( $the7['id'], 'header-logo_regular' );
		if( ! empty( $mlogo[0] ) ) {
			$url = explode( '/wp-content/', $mlogo[0] );
			if( in_array( get_bloginfo( 'url' ), $url ) ){
				return $mlogo[0];
			}else{
				return get_bloginfo( 'url' ) . $mlogo[0];
			}
		}elseif( ! empty( $hlogo[0] ) ){
			$url = explode( '/wp-content/', $hlogo[0] );
			if( in_array( get_bloginfo( 'url' ), $url ) ){
				return $hlogo[0];
			}else{
				return get_bloginfo( 'url' ) . $hlogo[0];
			}
		}
	}	
	return;
}