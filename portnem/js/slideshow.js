/**
 * Created by Turga on 15/06/2017.
 */
(function($) {

    'use strict';

    var $slides = $('[data-slides]');
    var images = $slides.data('slides');
    var count = images.length;
    var slideshow = function() {
        $slides
            .css('background-image', 'url("' + images[Math.floor(Math.random() * count)] + '")')
            .show(0, function() {
                setTimeout(slideshow, 1000);
            });
    };

    slideshow();

}(jQuery));