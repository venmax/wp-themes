/**
 * Theme functions file
 *
 * Contains searchbar toggle.
 *
 */

( function( $ ) {
	$( function() {
		// For Search toggle.
		$( '.search-toggle' ).on( 'click', function( event ) {
			var that    = $( this ),
				wrapper = $( '.search-inner' );

			that.toggleClass( 'active' );
			wrapper.toggleClass( 'hide' );

			if ( that.is( '.active' ) || $( '.search-toggle .screen-reader-text' )[0] === event.target ) {
				wrapper.find( '#q' ).focus();
			}
		} );
		$( '#topnav .toggle' ).on( 'click', function( event ) {
			$( '#topnav ul:first' ).toggle();
		} );		
	} );

} )( jQuery );