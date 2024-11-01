<?php

if ( !defined('ABSPATH') ){ exit; }

function wdes_rmm_field( $field ) {
	$default_args = array(
		'min' 			=> '',
		'max' 			=> '',
		'name'			=> '',
		'type'			=> '',
		'size' 			=> '',
		'desc' 			=> '',
		'class'			=> array(),
		'style' 		=> '',
		'value' 		=> '',
		'select' 		=> '',
		'default' 		=> '',
		'content' 		=> '',
		'options'		=> array(),
		'placeholder' 	=> '',
		'option-version' => 0
	);
	$r = wp_parse_args( $field, $default_args );
	$r['class'] = wp_parse_args( $r['class'], array( 'table' => '', 'cell' => '', 'input' => '', 'data_class' => '' ) );
	$active = '';
	$slug = wdes_rmm_return_slug( $r['name'] );
	$key = wdes_rmm_key( $r['name'] );
	$field_name = wdes_rmm_field_name( $key );
	$value = $r['default'];
	if( wdes_rmm_option( $key ) ){
		$value = wdes_rmm_option( $key );
	}
	if( wdes_rmm_option( 'has_been_save' ) && ! wdes_rmm_option( $key ) ){
		$value = wdes_rmm_option( $key );
	}
	$display	= 'none';
	$fw			= array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );
	$iconlayout	= array( 'Default', 'Circle', 'Boxed' );
	$current 	= wdes_rmm_option( 'wdes_rmm_active' ) ? wdes_rmm_option( 'wdes_rmm_active' ) : 'logoicon-setup';
	$submit_1 	= $r['value'] ? __( 'Change image', WDES_RMM ) : __( 'Upload image', WDES_RMM );
	if( $current == $slug ){
		$display	= 'block';
		$active 	= ' wdes-active';
	}
	ob_start();
	switch( $r['type'] ){
		case 'hidden':		
			printf(
				'<input type="%s" name="%s" id="%s" class="wdes-rmm %s" value="%s" />',
				$r['type'], $field_name, $slug, $r['class']['input'], $value
			);
			break;
		case 'social_networks':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><input type="%s" name="%s" id="%s" class="wdes-rmm %s" value="%s" size="%s" placeholder="%s" /><i>%s</i></div>',
				$r['class']['cell'], $r['type'], $field_name, $slug, $r['class']['input'], $value, 70, $r['placeholder'] ? $r['placeholder'] : __( "Your {$r['name']} page URL here.", WDES_RMM ), __( 'Leave it empty to disable in frontend.', WDES_RMM )
			);
			echo '</div>';
			break;
		case 'text':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><input type="%s" name="%s" id="%s" class="wdes-rmm %s" value="%s" size="%s" placeholder="%s" /><i>%s</i></div>',
				$r['class']['cell'], $r['type'], $field_name, $slug, $r['class']['input'], $value, $r['size'], $r['placeholder'], $r['desc']
			);
			echo '</div>';
			break;
		case 'number':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><input type="%s" name="%s" id="%s" class="wdes-rmm %s" value="%s" min="%s" max="%s" placeholder="%s" /><i>%s</i></div>',
				$r['class']['cell'], $r['type'], $field_name, $slug, $r['class']['input'], $value, $r['min'], $r['max'], $r['default'], $r['desc']
			);
			echo '</div>';
			break;
		case 'color':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><input type="text" name="%s" id="%s" class="wdes-color-picker %s" value="%s" /><i>%s</i></div>',
				$r['class']['cell'], $field_name, $slug, $r['class']['input'], $value, $r['desc']
			);
			echo '</div>';
			break;
		case 'checkbox':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			if( $r['style'] == 'on-off' ){
				printf(
					'<div class="%s"><input type="%s" name="%s" id="%s" class="wdes-rmm %s" data-class="%s" value="1" %s /><i>%s</i></div>',
					$r['class']['cell'], $r['type'], $field_name, $slug, $r['class']['input'], $r['class']['data_class'], checked( 1, wdes_rmm_option( $key ), false ), $r['desc']
				);
			}
			if( $r['style'] == 'multiple' ){
				foreach( $fw as $weight ){
					printf(
						'<div class="%s"><input type="%s" name="%s" id="%s" class="wdes-rmm %s" data-class="%s" value="%s" %s /><i>%s</i></div>',
						$r['class']['cell'], $r['type'], $field_name, $slug, $r['class']['input'], $r['class']['data_class'], $value, checked( 1, $value, false ), $r['desc']
					);
				}
			}
			echo '</div>';
			break;
		case 'textarea':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><textarea name="%s" id="%s" class="wdes-rmm %s">%s</textarea><i>%s</i></div>',
				$r['class']['cell'], $field_name, $slug, $r['class']['input'], $value, $r['desc']
			);
			echo '</div>';
			break;
		case 'import':
			$encode = base64_encode( serialize( get_option( 'wdes_rmm_settings' ) ) );
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="import-wrap %s"><textarea id="%s" class="wdes-rmm %s">%s</textarea><i>%s</i><span><a href="%s?page=%s&import=true" class="button">Import</a></span></div>',
				$r['class']['cell'], $slug, $r['class']['input'], $encode, $r['desc'], esc_url( admin_url( 'admin.php' ) ), WDES_RMM
			);
			echo '</div>';
			break;
		case 'select':			
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s"><select name="%s" id="%s" class="wdes-rmm %s">',
				$r['class']['cell'], $field_name, $slug, $r['class']['input']
			);
			if( $r['select'] == 'icon-layout' && empty( $r['options'] ) ){
				foreach( $iconlayout as $item ){
					printf(
						'<option value="%s"%s>%s</option>',
						wdes_rmm_return_slug( $item ),
						selected( $value, wdes_rmm_return_slug( $item ), false ),
						$item
					);
				}
			}
			if( $r['select'] == 'font-weight' && empty( $r['options'] ) ){
				foreach( $fw as $item ){
					printf( '<option value="%s"%s>%s</option>', $item, selected( $value, $item, false ), $item );
				}
			}
			if( $r['select'] == 'nav-menus' && empty( $r['options'] ) ){
				$nav_menus = wp_get_nav_menus();
				$menu_locations = get_nav_menu_locations();
				$primary = $menu_locations['primary'];
				$value = $value ? $value : $primary;
				printf( '<option value="0"%s>%s</option>', selected( $value, 0, false ), __( "Select a menus", WDES_RMM ) );
				foreach ( (array) $nav_menus as $_nav_menu ){
					printf(
					'<option value="%s"%s>%s</option>',
						esc_attr( $_nav_menu->term_id ),
						selected( $value, $_nav_menu->term_id, false ),
						esc_html( $_nav_menu->name )
					);
				}
			}
			if( $r['options'] ){
				foreach( $r['options'] as $key => $option ){
					printf( '<option value="%s"%s>%s</option>', $key, selected( wdes_rmm_option( 'layout' ), $key, false ), $option );
				}
			}
			printf( '</select><i>%s</i> %s</div>', $r['desc'], $r['notice'] );
			echo '</div>';
			break;
		case 'image':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s %s"><input type="text" name="%s" id="%s" class="wdes-rmm %s" value="%s" size="70" placeholder="%s" />',
				$r['class']['cell'], $slug, $field_name, $slug, $r['class']['input'], wdes_rmm_option( $key ), $r['placeholder']
			);
			printf(
				'<input class="wdes-rmm wdes-change-image button" type="button" data-id="%s" value="%s">',
		 		$slug, $submit_1
			);
			printf(
				'<input class="wdes-rmm wdes-clear-value button" type="button" data-id="%s" value="%s">',
		 		$slug, __( 'Clear', WDES_RMM )
			);
			printf(
				'<i>%s</i></div>',
		 		$r['desc']
			);
			echo '</div>';
			break;
		case 'heading':
			printf(
				'</div><h4 class="wdes-table wdes-h4 %s">%s</h4><div class="wdes-toggle-content %s" style="display:%s;">',
				$active, $r['name'], $slug, $display
			);
			break;
		case 'html':
			printf( '<div class="wdes-table %s">', $r['class']['table'] );
			printf( '<div class="wdes-cell h4">%s</div>', $r['name'] );
			printf(
				'<div class="%s">%s<i>%s</i></div>',
				$r['class']['cell'], $r['content'], $r['desc']
			);
			echo '</div>';
			break;
	}
	return	ob_get_clean();
}

function wdes_rmm_fields( $fields ) {
	foreach( $fields as $field ) {
		echo wdes_rmm_field( $field );
	}
}

function wdes_rmm_color_scheming(){
	$accent	= wdes_rmm_option( 'color_scheme' ) == 'wdes-rmm-accent' || ! wdes_rmm_option( 'color_scheme' ) ? 'wdes-active' : '';
	$custom	= wdes_rmm_option( 'color_scheme' ) == 'wdes-rmm-custom' ? 'wdes-active' : '';
	$html	= sprintf( '<span><span id="wdes-rmm-accent" class="wdes-chose-one wdes-rmm-accent %s"><img src="%sassets/images/accent.jpg" /><br>Accent</span>', $accent, WDES_RMM_URL );
	$html	.= '<span id="wdes-rmm-custom" class="wdes-chose-one wdes-rmm-custom ' . $custom . '"><img src="' . WDES_RMM_URL . 'assets/images/custom.jpg" /><br>Custom</span></span>';
	return	$html;
}

function wdes_rmm_related_plugins(){
 	$html = __( 'Find my plugins <a href="https://www.anthonycarbon.com/product-category/wordpress-plugins/" target="_blank">here</a>. I have created some plugins that might help you on your development tasks. Also visit my website <a href="https://www.anthonycarbon.com/" target="_blank">anthonycarbon.com</a> for more WordPress blogs, and tutorials.', WDES_RMM );
	return	$html;
}

add_filter( "option_wdes_rmm_settings", 'wdes_rmm_default_option', 10, 3 );
function wdes_rmm_default_option( $options, $key ){
	if( ! is_admin() && ! function_exists( 'wdes_rmm_layout_1' ) ){
		$options = array();
	}
	return $options;
}