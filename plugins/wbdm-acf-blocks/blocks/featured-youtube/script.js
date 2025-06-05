jQuery(document).ready(function($) {
    $('.youtube-thumb-wrapper').on('click', function() {
        var videoId = $(this).data('video-id');
        var iframe = $('<iframe>', {
            width: '100%',
            height: '100%',
            frameborder: 0,
            allowfullscreen: true,
            src: 'https://www.youtube.com/embed/' + videoId + '?autoplay=0&rel=0'
        });
        $(this).empty().append(iframe);
    });
});

