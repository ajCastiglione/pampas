export default function Nav() {
    // Initial settings for the nav.
    const settings = {
        toggle: document.querySelector( "[data-js-nav-toggle]" ),
        nav: document.querySelector( "[data-js-nav]" ),
    };
    // Set the open/close icons without making another dom query.
    settings.openIcon = settings.toggle.getAttribute( "src" );
    settings.closeIcon = settings.toggle.getAttribute( "data-close-icon-url" );

    // If the nav doesn't exist, return.
    if ( !settings.toggle || !settings.nav ) return;

    // Add listener to toggle the nav's active state.
    settings.toggle.addEventListener( "click", () => {
        settings.nav.classList.toggle( "enabled" );

        // If the nav is enabled, change to the close icon - else, change to the open icon.
        if ( settings.nav.classList.contains( "enabled" ) ) {
            settings.toggle.src = settings.closeIcon;
        } else {
            settings.toggle.src = settings.openIcon;
        }
    } );

    // Close the nav if the user clicks outside of it.
    document.addEventListener( "click", ( e ) => {
        if ( !settings.nav.contains( e.target ) && !settings.toggle.contains( e.target ) ) {
            settings.nav.classList.remove( "enabled" );
            settings.toggle.src = settings.openIcon;
        }
    } );
}
