export function Slider( $ ) {
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

export function gallerySlider( $ ) {
    const $gallerySliderContainer = $( "[data-gallery-container]" );
    if ( !$gallerySliderContainer.length ) {
        return;
    }
    let slickOptions = {
        mobileFirst: true,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                },
            },
        ],
    };

    // Loop through each slider element
    $gallerySliderContainer.each( function () {
        const $this = $( this );

        // Initialize the slider
        $this.slick( slickOptions );
    } );
}
