export default function aosInit() {
    var mobile = window.matchMedia( "(max-width: 767px)" ).matches;

    AOS.init( {
        easing: "ease-out-cubic",
        once: true,
        // trigger when the section's top reaches the viewport bottom on mobile
        anchorPlacement: mobile ? "top-bottom" : "top-center",
        offset: mobile ? 120 : 80,
        startEvent: "DOMContentLoaded",
    } );

    // If images/fonts shift layout after load, refresh positions
    window.addEventListener( "load", function () {
        AOS.refresh();
    } );
}
