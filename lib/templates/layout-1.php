<?php global $wdes_rmm_defaults; ?>
<?php do_action( 'wdes_rmm_before' ); ?>
<div id="wdes-rmm">
	<div class="wdes-rmm-wrap">
        <div class="wdes-rmm-main wdes-rmm-top-0" style="display:none;">
            <div class="wdes-rmm-overlay wdes-rmm-absolute wdes-rmm-top-0"></div>
            <div class="wdes-rmm-inner wdes-rmm-absolute wdes-rmm-top-0 wdes-transition">
                <div class="wdes-rmm-scroll">
                    <div class="wdes-rmm-group">
                        <div class="wdes-rmm-popup-title">
                            <div class="wdes-table">
                                <div class="wdes-cell wdes-rmm-logo">
                                    <?php if( ! empty( $wdes_rmm_defaults['popup_mobile_logo'] ) ) : ?>
                                        <a class="wdes-rmm-site-logo" href="<?php echo get_bloginfo( 'url' ); ?>">
                                            <img src="<?php echo $wdes_rmm_defaults['popup_mobile_logo']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                                        </a>
                                    <?php else : ?>
                                        <a class="wdes-rmm-site-name" href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
                                    <?php endif; ?>
                                    <?php do_action( 'wdes_rmm_popup_logo' ); ?>
                                </div>
                                <div class="wdes-cell wdes-rmm-close"></div>
                            </div><?php // wdes-table ?>
                        </div><?php // wdes-rmm-popup-title ?>
                        <?php do_action( 'wdes_rmm_header_menu_before' ); ?>
						<?php
                            $menu_locations = wp_parse_args( 
								get_nav_menu_locations(), 
								array( 
									'primary' => 0 
								) 
							);
                            $args = array(
                                'menu' => apply_filters( 'wdes_rmm_menu', $menu_locations['primary'], $menu_locations ),
                                'container' => '',
                                'menu_id' => 'wdes-rmm-menu',
                                'menu_class' => 'wdes-rmm-menu',
                                'link_before' => '<span class="wdes-table"><span class="wdes-cell">',
                                'link_after' => '</span><span class="wdes-cell wdes-icon wdes-fa wdes-fa-down"></span>'
                            );
                            if( $menu_locations['primary'] ){
                                wp_nav_menu( $args );
                            }else{
                                printf(
                                    '<ul class="wdes-rmm-menu"><li><a class="wdes-rmm-lever-1">%s</a></li></ul>',
                                    apply_filters( 'wdes_rmm_menu_default', __( 'No Selected Menu', WDES_RMM ) )
                                );	
                            }
                        ?>
                        <?php do_action( 'wdes_rmm_header_menu_after' ); ?>
                    </div><?php // wdes-rmm-group ?>
                </div><?php // wdes-rmm-scroll ?>
            </div><?php // wdes-rmm-inner ?>
        </div><?php // wdes-rmm-main ?>
        <?php do_action( 'wdes_rmm_header_before' ); ?>
        <div class="wdes-rmm-header" itemscope="" itemtype="http://schema.org/WPHeader" style="display:none;">
            <div class="wdes-wrap">
                <div class="wdes-content">
                    <div class="wdes-table">
                        <div class="wdes-rmm-site-title wdes-cell">
                            <?php if( ! empty( $wdes_rmm_defaults['header_logo'] ) ) : ?>
                                <a class="wdes-rmm-site-logo" href="<?php echo get_bloginfo( 'url' ); ?>">
                                    <img src="<?php echo $wdes_rmm_defaults['header_logo']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                                </a>
                              	<?php do_action( 'wdes_rmm_header_logo' ); ?>
                            <?php else : ?>
                                <a class="wdes-rmm-site-name" href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
                              	<?php do_action( 'wdes_rmm_header_logo' ); ?>
                                <div class="wdes-rmm-site-description" itemprop="description">
                                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                                    <?php do_action( 'wdes_rmm_site_description' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="wdes-rmm-menu-icon wdes-cell"><i class="wdes-fa wdes-fa-menu"></i></div>
                        <?php do_action( 'wdes_rmm_header' ); ?>
                    </div><?php // wdes-table end ?>
                </div><?php // wdes-content end ?>
            </div><?php // wdes-wrap end ?>
        </div><?php // wdes-rmm-header end ?>
        <?php do_action( 'wdes_rmm_header_after' ); ?>
	</div><?php // wdes-rmm-wrap end ?>
</div><?php // wdes-rmm end ?>
<?php do_action( 'wdes_rmm_after' ); ?>