// Import main stylesheet
import "@/css/index.css";

// Load components
import Slider from "./components/Slider";
import aosInit from "./components/AOS";

( function ( $ ) {
    // Run the slider component.
    Slider( $ );
    aosInit( $ );
} )( jQuery );
