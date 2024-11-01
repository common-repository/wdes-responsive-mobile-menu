<?php

if ( !defined('ABSPATH') ){ exit; }

$class = wdes_rmm_option( 'color_scheme' ) ? : 'wdes_rmm_accent';

if ( isset( $_GET['anton_debug'] ) ){
	echo "<pre>";
	print_r( get_option( 'wdes_rmm_settings' ) );
	echo "</pre>";
}

?>
<div id="wdes-rmm-settings" class="<?php echo $class ?>">
	<div id="import-popup" style="display:none;">
    	<div class="abosulute">
        	<div class="text">Import settings Successfully !!! Refresh now !!! </div>
        </div>
    </div>
    <div class="wdes-rmm-group">
    	<form method="post" action="options.php">
            <?php if ( ! class_exists( 'WDES_Responsive_Mobile_Menu_Layout_1' ) ) : ?>
            <div class="pro-overlay">
                <div class="group-1">
                    <div class="group-2">
                        <h2>This settings is just a DEMO, need to purchased any available LAYOUT add-ons. This are the available layouts below:</h2>
                        <p>WDES Responsive Mobile Menu Layout 1 - <a class="btn button  wdes-rmm" href="https://www.anthonycarbon.com/checkout/?add-to-cart=985">Buy Now</a></p>
                        <p><span>WDES Responsive Mobile Menu Layout 2 - <a class="btn button  wdes-rmm" href="#">coming soon</a></p>
                        <p>&nbsp;</p>
                        <a class="btn button close-overlay wdes-rmm" href="#">Close Now</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php do_action( 'wdes_rmm_hidden' ); ?>        	
        	<input type="hidden" name="reset" id="reset-option" value="">
        	<input type="hidden" name="import" id="import" value="">
			<?php settings_fields( 'wdes_rmm_settings' ); ?>
            <div class="wdes-rmm-title wdes-table">
            	<span class="wdes-cell"><?php _e( 'Responsive Mobile Menu Settings', WDES_RMM ); ?></span>
                <span class="align-right wdes-cell">
                	<input name="submit" id="submit" class="transition button" value="<?php _e( 'Save Changes', WDES_RMM ); ?>" type="submit">
                </span>
    		</div>
			<?php if ( isset( $_REQUEST['settings-updated'] ) == true ) : ?>
                <div class="notice notice-success">
					<?php if ( isset( $_REQUEST['reset'] ) == true ) : ?>
                        <?php printf( '<strong>%s</strong>', __( 'Options reset', WDES_RMM ) ); ?>
                    <?php else : ?>
                        <?php printf( '<strong>%s</strong>', __( 'Options saved', WDES_RMM ) ); ?>
                    <?php endif; ?>
                    <span class="dashicons dashicons-yes" style="color:#46b450;"></span>
                </div>
            <?php endif; ?>
            <div class="wdes-toggle-content-first"><?php wdes_rmm_fields( wdes_rmm_field_args() ); ?></div>
            <?php do_action( 'wdes_rmm_after_fields' ); ?>
            <div class="wdes-table wdes-rmm-footer">
                <div class="submit-wrap align-left wdes-cell">
                    <input name="submit" id="reset" class="transition button" value="<?php _e( 'Reset', WDES_RMM ); ?>" type="submit">
                </div>
                <div class="author wdes-center wdes-cell"><?php _e( 'Develop by', WDES_RMM ); ?> <a href="https://www.anthonycarbon.com/"><strong><?php _e( 'Anthony Carbon', WDES_RMM ); ?></strong></a></div>
                <div class="submit-wrap align-right wdes-cell">
                    <input name="submit" id="submit" class="transition button" value="<?php _e( 'Save Changes', WDES_RMM ); ?>" type="submit">
                </div>
            </div>
      	</form>
    </div>
</div>