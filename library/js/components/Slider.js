export default function Slider( $ ) {
    const $sliderContainer = $( "[data-slider-container]" );
    if ( !$sliderContainer.length ) {
        return;
    }
    let slickOptions = {
        mobileFirst: true,
        infinite: true,
        adaptiveHeight: true,
    };

    // Loop through each slider element
    $sliderContainer.each( function () {
        const $this = $( this );
        const $slider = $this.find( "[data-slider]" );
        const $prevButton = $this.find( "[data-slider-prev]" );
        const $nextButton = $this.find( "[data-slider-next]" );
        slickOptions = {
            ...slickOptions,
            prevArrow: $prevButton,
            nextArrow: $nextButton,
        };

        // Initialize the slider
        $slider.slick( slickOptions );
    } );
}
