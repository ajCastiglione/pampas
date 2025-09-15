// Import main stylesheet
import "@/css/index.css";

// Load components
import { Slider, gallerySlider } from "./components/Slider";
import aosInit from "./components/AOS";

( function ( $ ) {
    // Run the slider component.
    Slider( $ );
    aosInit( $ );
    gallerySlider( $ );
} )( jQuery );
