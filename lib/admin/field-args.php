<?php

if ( !defined('ABSPATH') ){ exit; }

function wdes_rmm_social_networks(){
	return array(
		'facebook'	=> array(
			'name' => __( 'Facebook', WDES_RMM ),
			'type' => 'social_networks',
			'default' => 'https://facebook.com/'
		),
		'twitter'	=> array(
			'name'    	=> __( 'Twitter', WDES_RMM ),
			'type' 	=> 'social_networks',
			'default' => 'https://twitter.com/'
		),
		'linkedin'	=> array(
			'name'    	=> __( 'Linkedin', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'google_plus'	=> array(
			'name'    	=> __( 'Google Plus', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'dribbble'	=> array(
//			'name'    	=> __( 'Dribbble', WDES_RMM ),
//			'default' 	=> 0
//		),
		'youtube'	=> array(
			'name'    	=> __( 'YouTube', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'rss'	=> array(
			'name'    	=> __( 'Rss', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'delicious'	=> array(
			'name'    	=> __( 'Delicious', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'flickr'	=> array(
			'name'    	=> __( 'Flickr', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'forrst'	=> array(
//			label'    	=> __( 'Forrst', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'lastfm'	=> array(
			'name'    	=> __( 'Lastfm', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'vimeo'	=> array(
			'name'    	=> __( 'Vimeo', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'tumbler'	=> array(
//			'name'    	=> __( 'Tumblr', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'pinterest'	=> array(
			'name'    	=> __( 'Pinterest', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'devian'	=> array(
//			label'    	=> __( 'Deviantart', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'skype'	=> array(
			'name'    	=> __( 'Skype', WDES_RMM ),
			'type' 	=> 'social_networks',
			'placeholder' => __( 'Your Skype username.', WDES_RMM )
		),
		'github'	=> array(
			'name'    	=> __( 'Github', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'instagram'	=> array(
			'name'    	=> __( 'Instagram', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'stumbleupon'	=> array(
			'name'    	=> __( 'Stumbleupon', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'behance'	=> array(
			'name'    	=> __( 'Behance', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'website'	=> array(
//			label'    	=> __( 'Website', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
//		px-500'	=> array(
//			label'    	=> __( '500px', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
//		tripedvisor'	=> array(
//			label'    	=> __( 'TripAdvisor', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'vk'	=> array(
			'name'    	=> __( 'VK', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'foursquare'	=> array(
			'name'    	=> __( 'Foursquare', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'xing'	=> array(
			'name'    	=> __( 'XING', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'weibo'	=> array(
			'name'    	=> __( 'Weibo', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
		'odnoklassniki'	=> array(
			'name'    	=> __( 'Odnoklassniki', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'research-gate'	=> array(
//			'name'    	=> __( 'ResearchGate', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'yelp'	=> array(
			'name'    	=> __( 'Yelp', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
//		'blogger'	=> array(
//			'name'    	=> __( 'Blogger', WDES_RMM ),
//			'type' 	=> 'social_networks'
//		),
		'soundcloud'	=> array(
			'name'    	=> __( 'SoundCloud', WDES_RMM ),
			'type' 	=> 'social_networks'
		),
	);
}

function wdes_rmm_field_args(){
	$fields = array();
	$fields[]		= array(
		'type'		=> 'hidden',
		'name'		=> 'Has been save',
		'default'		=> 1
	);
	$fields[]		= array(
		'type'		=> 'hidden',
		'name'		=> 'Option Version',
		'default'	=> 1
	);
	$fields[]		= array(
		'type'		=> 'hidden',
		'name'		=> 'wdes rmm active',
		'default'		=> 'logoicon-setup'
	);
	$fields[]		= array(
		'type'		=> 'hidden',
		'name'		=> 'Color Scheme',
		'default'		=> 'wdes-rmm-accent'
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Responsive Mobile Menu',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'default'	=> 1,
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Mobile Nav Menus',
		'desc'		=> __( 'Select your mobile nav menus from the options. Default is primary menu.', WDES_RMM ),
		'select'	=> 'nav-menus'
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Mobile Screen Starting Point',
		'desc'		=> __( 'Responsive Mobile Menu will start at this mobile screen size and below. Default is 1024.', WDES_RMM ),
		'default'	=> 1024,
		'min'		=> 600,
		'max'		=> 9999
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Layout',
		'desc'		=> __( 'Select your mobile menu layout. Default is Layout 1', WDES_RMM ),
		'default'	=> 'layout-1',
		'options'	=> apply_filters( 'wdes_rmm_layout_options', array(
			'layout-1' => __( 'Layout 1', WDES_RMM ),
		)),
		'notice' => apply_filters( 'wdes_rmm_layout_notice', '<span class="wdes-notice">This plugin provides only the default layout. For better look and more features, please check our <a href="https://www.anthonycarbon.com/product-category/wdes-responsive-mobile-menu-layout-add-ons/">WDES Responsive Mobile Menu Layout Add-ons</a>.</span>' ),
	);
	
	$fields = apply_filters( 'wdes_rmm_main_field_args', $fields );
	
	// Social Networks
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Social Networks'
	);
	
	$fields = array_merge( $fields, wdes_rmm_social_networks() );
	
	$fields = apply_filters( 'wdes_rmm_social_networks_field_args', $fields );
	
	// Header Top
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Header Top'
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Header Top Mobile Menu',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'default'	=> 1
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Top Background Color'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Top Text Color',
		'default'	=> '#747474',
		'desc'		=> __( 'Default is #747474.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Top Border Color',
		'default'	=> '#e5e5e5',
		'desc'		=> __( 'Default is #e5e5e5.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Top Font Size',
		'default'	=> 14,
		'desc'		=> __( 'Default is 14.', WDES_RMM ),
		'min'		=> 1,
		'max'		=> 300
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Header Top Font Weight',
		'select' 	=> 'font-weight',
		'default'	=> 400
	);
	$fields[]		= array(
		'type'		=> 'text',
		'name'		=> 'Connect with us',
		'size'		=> 70,
		'default'	=> __( 'Connect with us', WDES_RMM ),
		'placeholder'	=> __( 'Connect with us', WDES_RMM ),
		'desc'		=> __( 'Header top text before header section.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'text',
		'name'		=> 'Text Before Contact Number',
		'size'		=> 70,
		'placeholder'		=> 'Call Us Today!',
		'default'	=> 'Call Us Today!',
		'desc'		=> __( 'Leave it empty to disable in frontend.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'text',
		'name'		=> 'Header Top Contact Number',
		'size'		=> 70,
		'default'	=> '1.333.333.333',
		'placeholder'		=> '1.333.333.333',
		'desc'		=> __( 'Leave it empty to disable in frontend.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'text',
		'name'		=> 'Header Top Email',
		'size'		=> 70,
		'placeholder'		=> 'info@yourdomain.com',
		'default'	=> 'info@yourdomain.com',
		'desc'		=> __( 'Leave it empty to disable in frontend.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Header Top Social Networks',
		'class'		=> array( 'table' => 'no-bb-pb' ),
		'select' 	=> 'icon-layout',
		'desc'		=> __( 'Select your social icon styles.', WDES_RMM ),
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Social Icon Background Color',
		'class'		=> array( 'table' => 'no-bb-pb' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Social Icon Hover Background Color',
		'class'		=> array( 'table' => 'no-bb-pb' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Social Icon Color',
		'class'		=> array( 'table' => 'no-bb-pb' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Social Icon Hover Color',
		'class'		=> array( 'table' => 'no-bb-pb' )
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Social Icon Size',
		'class'		=> array( 'table' => 'no-bb-pb' ),
		'default'	=> 12,
		'min'		=> 1,
		'max'		=> 300
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Social Icon Width',
		'default'	=> 25,
		'min'		=> 1,
		'max'		=> 300
	);
	
	$fields = apply_filters( 'wdes_rmm_header_top_field_args', $fields );
		
	// Header
	
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Header'
	);
	$fields[]		= array(
		'type'		=> 'image',
		'name'		=> 'Header Logo',
		'default'	=> wdes_rmm_default_logo(),
		'placeholder'	=> __( 'No file chosen', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'image',
		'name'		=> 'Menu Icon',
		'desc'		=> __( 'Select your best menu icon to change the default setup.' ),
		'placeholder'	=> __( 'No file chosen', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Floater Menu Icon Color',
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Floater Menu Icon Background Color',
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Menu Icon Color',
		'desc'		=> __( 'Effective if "Menu Icon" is empty.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Background Color'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Border Bottom Color',
		'default' 	=> '#e5e5e5',
		'desc'		=> __( 'Default color is #e5e5e5.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Title Color',
		'desc'		=> __( 'Effective if "Header Logo" is empty.' )
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Padding Top',
		'desc'		=> __( 'Default is 20.' ),
		'min'		=> 1,
		'max'		=> 999,
		'default'	=> 20
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Padding Bottom',
		'desc'		=> __( 'Default is 20.' ),
		'min'		=> 1,
		'max'		=> 999,
		'default'	=> 20
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Border Width',
		'desc'		=> __( 'Default is 1.' ),
		'min'		=> 0,
		'max'		=> 999,
		'default'	=> 1
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Title Font Size',
		'desc'		=> __( 'If the current logo is desplay as text.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 35
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Header Title Font Weight',
		'desc'		=> __( 'If the current logo is desplay as text.' ),
		'select' 	=> 'font-weight'
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Header Tagline',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'default'		=> 1,
		'desc'		=> __( 'Enable/Disable header tagline on front end. Default is enable' ),
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Header Tagline Color'
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Header Tagline Font Size',
		'desc'		=> __( 'If the current logo is desplay as text.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 16
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Header Tagline Font Weight',
		'desc'		=> __( 'If the current logo is desplay as text.' ),
		'select' 	=> 'font-weight'
	);
	
	$fields = apply_filters( 'wdes_rmm_header_field_args', $fields );
		
	// Popup Layout
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Popup Layout'
	);
	$fields[]		= array(
		'type'		=> 'image',
		'name'		=> 'Popup Mobile Logo',
		'desc'		=> __( 'This logo display after the popup view is active. Default is theme default set up.' ),
		'default'	=> wdes_rmm_default_logo(),
		'placeholder'	=> __( 'No file chosen', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Popup Background Color',
		'class'		=> array( 'table' => 'wdes-color ' ),
		'desc'		=> __( 'Main background color. Default is #eeeeee.' ),
		'default'	=> '#eeeeee'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Logo / Title Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #ffffff.' ),
		'default'	=> '#ffffff'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Popup Border Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #dddddd.' ),
		'default'	=> '#dddddd'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Popup Title Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Effective if "Popup Mobile Logo" is empty.' )
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Popup Title Font Size',
		'desc'		=> __( 'Effective if "Popup Mobile Logo" is empty.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 20
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Popup Title Font Weight',
		'desc'		=> __( 'Effective if "Popup Mobile Logo" is empty.' ),
		'select' 	=> 'font-weight',
		'default' 	=> 600
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Popup Title Text Transform',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'desc'		=> __( 'Transform text to uppercase (if the current logo is desplay as text). Default is normal.', WDES_RMM )
	);
	$fields[]		= array(
		'type'		=> 'html',
		'name'		=> 'Color Scheming',
		'class'		=> array( 'table' => 'wdes-span' ),
		'content'	=> wdes_rmm_color_scheming(),
		'desc'		=> __( 'Using "Accent", you can change the color scheming by group, and using "Custom", you can change the color by individual sections.' ),
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'eeeeee',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#eeeeee',
		'desc'		=> __( 'Default is #eeeeee.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> '555555',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#555555',
		'desc'		=> __( 'Default is #555555.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'ffffff',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#ffffff',
		'desc'		=> __( 'Default is #ffffff.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'dddddd',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#dddddd',
		'desc'		=> __( 'Default is #dddddd.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'cccccc',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#cccccc',
		'desc'		=> __( 'Default is #cccccc.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> '333333',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#333333',
		'desc'		=> __( 'Default is #333333.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'f7f7f7',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#f7f7f7',
		'desc'		=> __( 'Default is #f7f7f7.' )
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'f5f5f5',
		'class'		=> array( 'table' => 'color-scheme no-bb-pb' ),
		'default'		=> '#f5f5f5',
		'desc'		=> __( 'Default is #f5f5f5.' ),
		'default'	=> '#f5f5f5'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> '23282d',
		'class'		=> array( 'table' => 'color-scheme' ),
		'default'		=> '#23282d',
		'desc'		=> __( 'Default is #23282d.' )
	);
	
	$fields = apply_filters( 'wdes_rmm_popup_layout_field_args', $fields );
		
	// Menu Styles (level 1)
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Menu Styles (level 1)'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 1 Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #ffffff.' ),
		'default'	=> '#ffffff'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 1 Hover Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #f5f5f5.' ),
		'default'	=> '#f5f5f5'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 1 Border Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #dddddd.' ),
		'default'	=> '#dddddd'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 1 Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #555555.' ),
		'default'	=> '#555555'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 1 Hover Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #23282d.' ),
		'default'	=> '#23282d'
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Level 1 Font Size',
		'desc'		=> __( 'Default is 14.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 14
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Level 1 Font Weight',
		'desc'		=> __( 'Default is 600.' ),
		'select' 	=> 'font-weight',
		'default'	=> 600
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Level 1 Text Transform',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'desc'		=> __( 'Transform text to uppercase. Default is normal.', WDES_RMM )
	);
	
	$fields = apply_filters( 'wdes_rmm_menu_1_field_args', $fields );
		
	// Sub Menu Styles (level 2)
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Sub Menu Styles (level 2)'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 2 Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #ffffff.' ),
		'default'	=> '#ffffff'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 2 Hover Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #f5f5f5.' ),
		'default'	=> '#f5f5f5'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 2 Border Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #dddddd.' ),
		'default'	=> '#dddddd'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 2 Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #555555.' ),
		'default'	=> '#555555'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 2 Hover Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #23282d.' ),
		'default'	=> '#23282d'
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Level 2 Font Size',
		'desc'		=> __( 'Default is 14.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 14
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Level 2 Font Weight',
		'desc'		=> __( 'Default is 600.' ),
		'select' 	=> 'font-weight',
		'default'	=> 600
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Level 2 Text Transform',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'desc'		=> __( 'Transform text to uppercase. Default is normal.', WDES_RMM )
	);
	
	$fields = apply_filters( 'wdes_rmm_menu_2_field_args', $fields );
		
	// Sub Menu Styles (level 3)
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Sub Menu Styles (level 3)'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 3 Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #ffffff.' ),
		'default'	=> '#ffffff'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 3 Hover Background Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #f5f5f5.' ),
		'default'	=> '#f5f5f5'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 3 Border Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #eeeeee.' ),
		'default'	=> '#eeeeee'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 3 Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #333333.' ),
		'default'	=> '#333333'
	);
	$fields[]		= array(
		'type'		=> 'color',
		'name'		=> 'Level 3 Hover Font Color',
		'class'		=> array( 'table' => 'wdes-color' ),
		'desc'		=> __( 'Default is #333333.' ),
		'default'	=> '#333333'
	);
	$fields[]		= array(
		'type'		=> 'number',
		'name'		=> 'Level 3 Font Size',
		'desc'		=> __( 'Default is 14.' ),
		'min'		=> 1,
		'max'		=> 300,
		'default'	=> 14
	);
	$fields[]		= array(
		'type'		=> 'select',
		'name'		=> 'Level 3 Font Weight',
		'desc'		=> __( 'Default is 600.' ),
		'select' 	=> 'font-weight',
		'default'	=> 600
	);
	$fields[]		= array(
		'type'		=> 'checkbox',
		'name'		=> 'Level 3 Text Transform',
		'class'		=> array( 'input' => 'on-off' ),
		'style'		=> 'on-off',
		'desc'		=> __( 'Transform text to uppercase. Default is normal.', WDES_RMM )
	);
	
	$fields = apply_filters( 'wdes_rmm_menu_3_field_args', $fields );
	
	// Custom CSS
	
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Custom CSS'
	);
	$fields[]		= array(
		'type'		=> 'textarea',
		'name'		=> 'Custom CSS'
	);
	
	$fields = apply_filters( 'wdes_rmm_custom_css_field_args', $fields );
	
	// Import Options
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Import/Export'
	);
	$fields[]		= array(
		'type'		=> 'import',
		'name'		=> 'Options Code',
		'desc'		=> __( 'To export, copy the codes and save it into your notepad. To import, paste the codes in the box, then click the import button to overide the whole settings.', WDES_RMM ),
	);
		
	// Help
		
	$fields[]		= array(
		'type'		=> 'heading',
		'name'		=> 'Help'
	);
	$fields[]		= array(
		'type'		=> 'html',
		'name'		=> 'Color Scheming Examples',
		'content'	=> __( 'Need help on the color schemming? Please check my sample options in <a href="https://www.anthonycarbon.com/wdes-responsive-mobile-menu-import-demo-options" title="WDES Responsive Mobile Menu Import Demo Options" target="_blank">WDES Responsive Mobile Menu Import Demo Options</a>.' )
	);
	/*
	$fields[]		= array(
		'type'		=> 'html',
		'name'		=> 'Dark Color Scheming',
		'content'	=> __( '#23282d | #b4b9be | #32373c | #222222 | #23282d | #b4b9be | #32373c | #191e23 | #00b9eb' )
	);
	*/
	$fields[]		= array(
		'type'		=> 'html',
		'name'		=> 'Related Plugins',
		'content'	=> wdes_rmm_related_plugins()
	);
	
	$fields = apply_filters( 'wdes_rmm_help_field_args', $fields );
	
	return apply_filters( 'wdes_rmm_field_args', $fields );
}

function wdes_rmm_default_settings(){
	if( wdes_rmm_field_args() ){
		$defaults = array();
		foreach( wdes_rmm_field_args() as $field ){
			if( isset( $field['default'] ) && isset( $field['name'] ) ){
				if( ! in_array( $field['type'], array( 'html', 'heading' ) ) ){
					$defaults[wdes_rmm_key( $field['name'] )] = $field['default'];
				}
			}
		}
		return $defaults;
	}
	return;
}

function wdes_rmm_old_keys(){
	if( wdes_rmm_field_args() ){
		$defaults = array();
		foreach( wdes_rmm_field_args() as $field ){
			if( ! in_array( $field['type'], array( 'html', 'heading' ) ) ){
		 		$defaults[wdes_rmm_key( $field['name'] )] = wdes_rmm_return_slug( $field['name'] );
		 	}
		}
		return $defaults;
	}
	return;
}