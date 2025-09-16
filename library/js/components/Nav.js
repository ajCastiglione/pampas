export default function Nav( $ ) {
    // Initial settings for the nav using jQuery.
    let $toggle = $( "[data-js-nav-toggle]" );
    let $nav = $( "[data-js-nav]" );
    if ( !$toggle.length || !$nav.length ) return;

    // Toggle nav active state
    $toggle.on( "click", function ( e ) {
        $nav.toggleClass( "active" );
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
            // $toggle.attr( "src", openIcon );
        }
    } );
}
