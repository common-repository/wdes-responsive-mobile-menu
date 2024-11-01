<?php

if ( !defined('ABSPATH') ){ exit; }

function wdes_rmm_option( $key, $echo = false ){
	$key = str_replace( "-", "_", $key );
	$options = get_option( 'wdes_rmm_settings' );
	if( $echo && isset( $options[$key] ) ){
		echo $options[$key];
	}
	if( ! $echo && isset( $options[$key] ) ){
		return $options[$key];
	}
	return;
}

function wdes_rmm_get_option( $key, $echo = false ){
	$key = str_replace( "-", "_", $key );
	$options = get_option( 'wdes_rmm_settings' );
	if( $echo && isset( $options[$key] ) ){
		echo $options[$key];
	}
	if( ! $echo && isset( $options[$key] ) ){
		return $options[$key];
	}
	return;
}

function wdes_rmm_get_networks(){
	$networks = array();
	foreach( wdes_rmm_social_networks() as $key => $network ){
		if( wdes_rmm_option( wdes_rmm_key( $network['name'] ) ) ){
			$networks[] = array(
				'name' => $network['name'],
				'key' => wdes_rmm_key( $network['name'] ),
				'value' => wdes_rmm_option( wdes_rmm_key( $network['name'] ) ),
			);
		}
	}
	return $networks;
}