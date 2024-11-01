/* Version: 1.2.5 */
jQuery( document ).ready( function( $ ){ 
	if( $( '#wdes-rmm-settings' ).length == 0 ){ return; }
	
	var wdes_media_upload = '',
		data_id = '',
		ac_checkbox = '',
		getPostValue = function getPostValue(key) {
		var pageURL = decodeURIComponent(window.location.search.substring(1)),
			URLvar = pageURL.split('&'),
			keyName,
			i;
	  
		for (i = 0; i < URLvar.length; i++) {
			keyName = URLvar[i].split('=');
	  
			if (keyName[0] === key) {
				return keyName[1] === undefined ? true : keyName[1];
			}
		}
	};
	$( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val( $( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val().replace( '&reset=true', '' ) );
	$( '#wdes-rmm-settings form .wdes-table.wdes-h4' ).click(function(e) {
		if( $( this ).hasClass( 'wdes-active' ) ){ return; }
		$( '#wdes-rmm-settings .wdes-toggle-content' ).each(function(index, element) {
			$( this ).hide( 'show' ).prev( '.wdes-h4' ).removeClass( 'wdes-active' );
		});
		var activeclass = $( this ).next( '.wdes-toggle-content' ).attr( 'class' );
		var activeclass = activeclass.replace( 'wdes-toggle-content ', '' );
		$( '#wdes-rmm-active' ).val( activeclass );
		$( this ).addClass( 'wdes-active' ).next( '.wdes-toggle-content' ).show( 'show', function(){
			var scrollto = $( this ).offset().top - 90;
			$( 'html,body' ).animate({ scrollTop: scrollto }, 500 );
		});
	});
	$( '.close-overlay' ).click(function(e) {
		e.preventDefault();
		$( '.pro-overlay').remove();
	});
	$( '.wdes-chose-one' ).click(function(e) {
		var data_id = $( this ).attr( 'id' );
		$( '.wdes-chose-one' ).removeClass( 'wdes-active' );
		$( this ).addClass( 'wdes-active' );
		$( '#color-scheme' ).val( data_id );
		$( '#wdes-rmm-settings' ).removeClass( 'wdes-rmm-custom wdes-rmm-accent' );
		$( '#wdes-rmm-settings' ).addClass( data_id );
	});
	
	$( '#wdes-rmm-settings .wdes-change-image' ).click(function(e) {
		e.preventDefault();
		data_id = $( this ).attr( 'data-id' );
		if( wdes_media_upload ) {
			wdes_media_upload.open();
			return;
		}

		wdes_media_upload = wp.media.frames.file_frame = wp.media({
			title: 'Choose an image',
			button: { text: 'Choose image' },
			multiple: false
		});

		wdes_media_upload.on( 'select', function() {
			attachment = wdes_media_upload.state().get( 'selection' ).first().toJSON();
			$( '#' + data_id + '_preview' ).empty();
			$( '#' + data_id ).val( attachment.url );
			$( '#' + data_id + '_preview' ).append( '<img src="' + attachment.url + '" />' );
		});

		wdes_media_upload.open();
	});
 
	$( '#wdes-rmm-settings .wdes-clear-value' ).click(function(e) {
		e.preventDefault();
		data_id = $( this ).attr( 'data-id' );
		$( '#' + data_id ).val( '' );
	});
	
	$( '#wdes-rmm-settings input[type="checkbox"]' ).click(function(e) {/*
		var hs_id = $( this ).attr( 'data-id' );
		if( $( this ).is( ':checked' ) ){
			$( this ).val( 1 ).attr('checked','1');
		}else{
			$( this ).val( 0 ).removeAttr('checked');
		}
		if( $( this ).val() == 0 ){
			$( '#wdes-rmm-settings .hide-show' ).addClass( 'wdes-rmm-hide ' );
		}else{
			$( '#wdes-rmm-settings .hide-show' ).removeClass( 'wdes-rmm-hide ' );
		}
	*/});
	$( '.import-wrap a.button' ).click(function(e) {
		e.preventDefault();
		$.ajax({
			type	: "POST",
			url		: wdes_rmm.ajaxurl,
			data	: {
				action		: 'import_options',
				dataoptions	: $( '#wdes-rmm-settings textarea#options-code' ).val(),
			},
			beforeSend: function( response ) {
				$( '.import-wrap a.button' ).after( '<img src="'+wdes_rmm.site_url+'/wp-includes/images/spinner.gif" alt="">' );
				/*gfloading = true;
				if( gftype == 'single' ){
					$( '.gf-' + gfhiddenid.replace('#','').replace(' ','') ).css({
						'background-image' : 'url(http://wedsetplan.com/temp/wp-includes/images/spinner-2x.gif)',
						'background-position' : 'center center',
						'background-repeat' : 'no-repeat',
						'background-size' : 'auto',
					});
				}	*/	
			},
			success: function( response ){
				console.log(response);
				$( '.import-wrap span img' ).remove();
				$( '#import-popup' ).fadeIn( 'slow' );
			},		
		});		
	});
	$( '#import-popup' ).click(function() {
		window.location.replace(window.location.href.replace('&reset=true',''));
	});
	$( '#wdes-rmm-settings input#reset' ).click(function(e) {
		$( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val( $( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val() + '&reset=true' );
	});
	
	$( '#wdes-rmm-settings input#submit' ).click(function(e) {
		$( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val( $( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val().replace( '&reset=true', '' ) );
	});
	if( getPostValue( 'import' ) == 'true' ){
		$( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val( $( '#wdes-rmm-settings input[name="_wp_http_referer"]' ).val().replace( '&import=true', '' ) );
	}
 	wdes_color_picker();
	 
	function wdes_color_picker() {
		if( $( '#wdes-rmm-settings .wdes-color-picker' ).length ){
			Color.prototype.toString = function() {
				if (this._alpha < 1) {
					return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
				}
				var hex = parseInt(this._color, 10).toString(16);
				if (this.error) return '';
				if (hex.length < 6) {
					for (var i = 6 - hex.length - 1; i >= 0; i--) {
						hex = '0' + hex;
					}
				}
				return '#' + hex;
			};
			$('#wdes-rmm-settings .wdes-color-picker').each(function( index ) {
				var $control = $(this),
					value = $control.val().replace(/\s+/g, ''),
					alpha_val = 100,
					$alpha, $alpha_output;
				if (value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
					alpha_val = parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]) * 100;
				}
				$control.wpColorPicker({
					clear: function(event, ui) {
						$alpha.val(100);
						$alpha_output.val(100 + '%');
					}
				});
				$('<div class="wdes-alpha-wrap" style="display:none;">' + '<label>Alpha: <output class="rangevalue">' + alpha_val + '%</output></label>' + '<input type="range" min="1" max="100" value="' + alpha_val + '" name="alpha" class="wdes-alpha-field">' + '</div>').appendTo($control.parents('.wp-picker-container:first').addClass('wdes-color-picker-group').find('.wp-picker-holder')); 
				
				$alpha = $control.parents('.wp-picker-container:first').find('.wdes-alpha-field');
				$alpha_output = $control.parents('.wp-picker-container:first').find('.wdes-alpha-wrap output')
				$alpha.bind('change keyup', function() {
					var alpha_val = parseFloat($alpha.val()),
						iris = $control.data('a8cIris'),
						color_picker = $control.data('wpWpColorPicker');
					$alpha_output.val($alpha.val() + '%');
					iris._color._alpha = alpha_val / 100.0;
					$control.val(iris._color.toString());
					color_picker.toggler.css({
						backgroundColor: $control.val()
					});
				}).val(alpha_val).trigger('change');
			});
		}
	}
});