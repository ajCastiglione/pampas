export function Nav( $ ) {
    // Initial settings for the nav using jQuery.
    let $toggle = $( "[data-js-nav-toggle]" ),
        $nav = $( "[data-js-nav]" ),
        $bod = $( "html, body" );
    if ( !$toggle.length || !$nav.length ) return;

    // Toggle nav active state
    $toggle.on( "click", function ( e ) {
        $nav.toggleClass( "active" );
        $bod.css( "overflow", $nav.hasClass( "active" ) ? "auto" : "hidden" );
        $toggle.find( "i" ).removeClass( "fa-bars" ).addClass( "fa-xmark" );
        if ( !$nav.hasClass( "active" ) ) {
            $toggle.find( "i" ).removeClass( "fa-xmark" ).addClass( "fa-bars" );
        }
        e.stopPropagation();
    } );

    // Close nav if clicking outside
    $( document ).on( "click", function ( e ) {
        if ( !$nav.is( e.target ) && $nav.has( e.target ).length === 0 && !$toggle.is( e.target ) ) {
            $nav.removeClass( "active" );
            $bod.css( "overflow", "auto" );
            $toggle.find( "i" ).removeClass( "fa-xmark" ).addClass( "fa-bars" );
        }
    } );
}

export function FooterNav( $ ) {
    let $footerNavToggle = $( "[data-js-footer-nav-toggle]" );
    if ( !$footerNavToggle.length ) return;

    $footerNavToggle.on( "click", function () {
        let $this = $( this );
        $this.toggleClass( "active" );
        $this.next( "div" ).slideToggle( 300 );
    } );
}
