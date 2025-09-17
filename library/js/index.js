// Import main stylesheet
import "@/css/index.css";

// Load components
import { Nav, FooterNav } from "./components/Nav";
import { Slider, gallerySlider } from "./components/Slider";
import aosInit from "./components/AOS";

( function ( $ ) {
    Nav( $ );
    FooterNav( $ );
    Slider( $ );
    aosInit( $ );
    gallerySlider( $ );
} )( jQuery );
