/* Version: 1.2.5 */
jQuery( document ).ready( function( $ ){
	if( wdes_rmm['status'] == 0 ){ return; }
	var timeout = ( function(){
 		var timers = {};
 		return function( callback, ms, x_id ){
		   if ( !x_id ){ x_id = ''; }
		   if ( timers[x_id] ){ clearTimeout( timers[x_id] ); }
		   timers[x_id] = setTimeout( callback, ms );
 		};
	})(),
	ac_size = wdes_rmm['size'],
	ac_nav = 'nav.nav-primary',
	ac_menu_icon = '.wdes-rmm-header .wdes-rmm-menu-icon i',
	ac_main = '.wdes-rmm-main',
	ac_inner = '.wdes-rmm-main .wdes-rmm-inner';
	classes( 0, 1, $( '.wdes-rmm-menu' ).find( '.sub-menu' ).prev(), 'parent-a' );
	ac_clone();
	full_section();
	$( window ).resize( function(){
		timeout( function(){
			$( 'html.wdes-rmm-active-popup' ).height( window.innerHeight - parseInt( $( 'html' ).css( 'margin-top' ) ) ).width( window.innerWidth );
			$( 'body.wdes-rmm-active-popup' ).height( window.innerHeight - parseInt( $( 'html' ).css( 'margin-top' ) ) ).width( window.innerWidth );
			ac_clone();
			has_scroll();
			$( '#wdes-rmm .wdes-table' ).each( function( e ){
				$('body').addClass('wdes-rmm-active');
				if( $( this ).parent().width() > window.innerWidth ){
					$( this ).width( window.innerWidth  ); 
				}else{
					$( this ).width( $( this ).parent().width() ); 
				}
			});
			full_section();
			$( '#wdes-rmm .wdes-table' ).each( function( e ){
				$('body').addClass('wdes-rmm-active');
				if( $( this ).parent().width() > window.innerWidth ){
					$( this ).width( window.innerWidth  ); 
				}else{
					$( this ).width( $( this ).parent().width() ); 
				}
			});
		}, 300 );
	});
	$( window ).scroll( function(){
		if( $( this ).scrollTop() > 50 ){
			classes( 1, 1, 'body', 'active-scroll' );
		}else{
			classes( 1, 0, 'body', 'active-scroll' );
		}
	});
	$( ac_menu_icon ).click( function(){ on_open(); });
	$( '.wdes-rmm-overlay, .wdes-rmm-close' ).click( function(){ on_close(); });
	$( '.wdes-rmm-parent-a' ).click( function( e ){
		if( $( this ).next( '.sub-menu' ).css( 'display' ) == 'none' ){
			e.preventDefault();
			$( this ).parent().siblings().find( '.sub-menu:first' ).slideUp(function() {
				classes( 0, 0, $( this ).prev(), 'open' );
			});
			$( this ).next( '.sub-menu' ).slideToggle(function() {
				classes( 0, 1, $( this ).prev(), 'open' );
			});
		}else{
			return true;
		}
		has_scroll();
	});
	$( '#wdes-rmm-header-top .wdes-fa-down' ).click( function( e ){
		$( this ).toggleClass( 'wdes-fa-up' );
		$( this ).parent().parent( '.wdes-rmm-cwu' ).prev().slideToggle();
	});
	$( '#wdes-rmm .wdes-table' ).each( function( e ){
		$('body').addClass('wdes-rmm-active');
		if( $( this ).parent().width() > window.innerWidth ){
			$( this ).width( window.innerWidth  ); 
		}else{
			$( this ).width( $( this ).parent().width() ); 
		}
	});
	function has_scroll(){
		setTimeout( function(){
			if( $( '.wdes-rmm-group' ).height() > window.innerHeight ){
				$( '.wdes-rmm-scroll' ).height( window.innerHeight );
				classes( 1, 1, '.wdes-rmm-scroll', 'has-scroll' );
			}else{
				$( '.wdes-rmm-scroll' ).css( 'height', '' );
				classes( 1, 0, '.wdes-rmm-scroll', 'has-scroll' );
			}
		}, 500 );
	}
	function on_open(){
		classes( 1, 1, 'html,body', 'active' );
		classes( 1, 1, 'html,body', 'active-popup' );
		$( 'html.wdes-rmm-active-popup' ).height( window.innerHeight - parseInt( $( 'html' ).css( 'margin-top' ) ) ).width( window.innerWidth );
		$( 'body.wdes-rmm-active-popup' ).height( window.innerHeight - parseInt( $( 'html' ).css( 'margin-top' ) ) ).width( window.innerWidth );
		$( ac_main ).fadeIn( 'fast', function(){ 
			classes( 1, 1, ac_inner, 'slide' );
			has_scroll();
			$( '#wdes-rmm .wdes-table' ).each( function( e ){
				$('body').addClass('wdes-rmm-active');
				if( $( this ).parent().width() > window.innerWidth ){
					$( this ).width( window.innerWidth  ); 
				}else{
					$( this ).width( $( this ).parent().width() ); 
				}
			});
		});
	}
	function on_close(){
		classes( 1, 0, ac_inner, 'slide' );
		$( ac_main ).delay( 500 ).fadeOut( 'fast',function(){
			classes( 1, 0, 'html', 'active' );
			if( window.innerWidth > ac_size ) {
				classes( 1, 0, 'html,body', 'active' );
			}
			classes( 1, 0, 'html,body', 'active-popup' );
			$( 'html' ).height( '' ).width( '' );
			$( 'body' ).height( '' ).width( '' );
			$( '#wdes-rmm .wdes-table' ).each( function( e ){
				$('body').addClass('wdes-rmm-active');
				if( $( this ).parent().width() > window.innerWidth ){
					$( this ).width( window.innerWidth  ); 
				}else{
					$( this ).width( $( this ).parent().width() ); 
				}
			});
		});
	}
	function full_section(){
		$( '#wdes-rmm-header-top .wdes-table-wrap' ).slideDown();
		classes( 1, 0, '#wdes-rmm-header-top .wdes-left-right', 'block next-line' );
		classes( 0, 0, $( '#wdes-rmm-header-top .wdes-left-right' ).parent(), 'block' );
		var y = 20;
		var x = $( '#wdes-rmm-header-top .wdes-table-wrap .wdes-table' ).width();
		$( '#wdes-rmm-header-top .wdes-left-right' ).each( function(){
			$( this ).children().each( function(){
				y = y + $( this ).width();
				y = y + parseInt( $( this ).css( 'padding-left' ) );
				y = y + parseInt( $( this ).css( 'padding-right' ) );
				y = y + parseInt( $( this ).css( 'margin-left' ) );
				y = y + parseInt( $( this ).css( 'margin-right' ) );
			});
			if( y > x ){
				classes( 1, 1, '#wdes-rmm-header-top', 'lr-block' );
				classes( 0, 1, $( this ), 'next-line' );
				$( '#wdes-rmm-header-top .wdes-table-wrap' ).slideUp();
				$( '#wdes-rmm-header-top .wdes-fa-down' ).removeClass( 'wdes-fa-up' );
			}else{
				classes( 0, 0, $( this ), 'next-line' );
				classes( 1, 0, '#wdes-rmm-header-top', 'lr-block' );
				$( '#wdes-rmm-header-top .wdes-table-wrap' ).slideDown();
			}
		});
		if( y > x ){
			classes( 1, 1, '#wdes-rmm-header-top .wdes-left-right', 'block' );
			classes( 0, 1, $( '#wdes-rmm-header-top .wdes-left-right' ), 'block' );
		}else{
			classes( 1, 0, '#wdes-rmm-header-top .wdes-left-right', 'block' );
			classes( 0, 0, $( '#wdes-rmm-header-top .wdes-left-right' ).parent(), 'block' );
		}
	}
	function classes( i, x, y, z ){
		var a = '';
		var b = z.split( ' ' );
		for( c=1; c <= b.length; c++ ){ a = a + 'wdes-rmm-' + b[(c-1)] + ' '; }
		switch( i ){
			case 0:
				switch( x ){
					case 0:
						y.removeClass( a );
						break;
					case 1:
						y.addClass( a );
						break;
				}
				break;
			case 1:
				switch( x ){
					case 0:
						$( y ).removeClass( a );
						break;
					case 1:
						$( y ).addClass( a );
						break;
				}
				break;
		}
	}
	function ac_clone(){
		var ac_level_1 = '.wdes-rmm-menu li a,.wdes-rmm-menu ul',
			ac_level_2 = '.wdes-rmm-menu li li a,.wdes-rmm-menu ul ul',
			ac_level_3 = '.wdes-rmm-menu li li li a,.wdes-rmm-menu ul ul ul',
			ac_level_4 = '.wdes-rmm-menu li li li li a,.wdes-rmm-menu ul ul ul ul',
			ac_level_5 = '.wdes-rmm-menu li li li li li a,.wdes-rmm-menu ul ul ul ul ul';
		classes( 1, 1, ac_level_1, 'level-1' );
		classes( 1, 0, ac_level_2, 'level-1' );
		classes( 1, 1, ac_level_2, 'level-2' );			
		classes( 1, 0, ac_level_3, 'level-2' );
		classes( 1, 1, ac_level_3, 'level-3' );			
		classes( 1, 0, ac_level_4, 'level-3' );
		classes( 1, 1, ac_level_4, 'level-4' );		
		classes( 1, 0, ac_level_5, 'level-4' );
		$( '.wdes-rmm-menu li' ).each( function(){
			var itemid = $( this ).attr( 'id' );
			if(itemid){
			 	$( this ).attr( 'wdes-id', itemid );
			}
		});
		$( '.wdes-rmm-menu' ).find( 'li' ).removeAttr( 'id' ).removeAttr( 'class' ).removeAttr( 'style' );
		$( '.wdes-rmm-menu li' ).each( function(){
			var itemliid = $( this ).attr( 'wdes-id' );
			if( itemliid ){
				if(itemliid.indexOf("menu-item-") >= 0){
					var itemliid = itemliid.split( 'menu-item-' );
					$( this ).find( 'a' ).addClass( 'wdes-rmm-' + itemliid[1] ).attr( 'wdes-id', itemliid[1] );
					$( this ).attr( 'id', 'wdes-item-' + itemliid[1] );
				}
			}
		});
		if( window.innerWidth <= ac_size ) {
			classes( 1, 1, 'body', 'active' );
		}else{
			on_close();
		}
	}
});