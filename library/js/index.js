// Import main stylesheet
import "@/css/index.css";

// Load components
import Nav from "./components/Nav";
import { Slider, gallerySlider } from "./components/Slider";
import aosInit from "./components/AOS";

( function ( $ ) {
    Nav( $ );
    Slider( $ );
    aosInit( $ );
    gallerySlider( $ );
} )( jQuery );
