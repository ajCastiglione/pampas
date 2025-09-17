( function VideoLightbox( $ ) {
    let $trigger = $( "[data-js-play-video]" ),
        $lightBox = $( "[data-js-video-lightbox]" ),
        $videoIframe = $( "[data-js-video]" ),
        $closeVideo = $( "[data-js-close-video]" ),
        videoId = $trigger.data( "video-id" ),
        $bod = $( "html, body" );

    $trigger.on( "click", function () {
        $lightBox.show();
        $videoIframe.attr( "src", $videoIframe.data( "src" ).replace( /{vid_id_placeholder}/ig, videoId ) );
        $videoIframe.removeAttr( "data-src" );
        $bod.css( "overflow", "hidden" );
    } );

    $closeVideo.on( "click", function () {
        $lightBox.hide();
        $videoIframe.attr( "data-src", $videoIframe.attr( "src" ).replace( videoId, "{vid_id_placeholder}" ) );
        $videoIframe.removeAttr( "src" );
        $bod.css( "overflow", "auto" );
    } );
} )( jQuery );
