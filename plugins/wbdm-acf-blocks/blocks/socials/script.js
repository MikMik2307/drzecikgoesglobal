jQuery( document ).ready( function( $ ) {
    function animateNumber($elem) {
        var fullText = $elem.text().trim();

        var numMatch = fullText.match(/[\d,.]+/);
        var numberPart = numMatch ? numMatch[0].replace(/,/g, '') : '0';
        var countTo = parseFloat(numberPart);

        var suffix = fullText.substring(numMatch ? numMatch.index + numberPart.length : 0);

        $elem.text('0' + suffix);

        $({ countNum: 0 }).animate({ countNum: countTo }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                if (numberPart.indexOf('.') >= 0) {
                    $elem.text(this.countNum.toFixed(1) + suffix);
                } else {
                    $elem.text(Math.floor(this.countNum) + suffix);
                }
            },
            complete: function() {
                $elem.text(numberPart + suffix);
            }
        });
    }

    // Intersection Observer setup
    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var $target = $(entry.target);
                animateNumber($target);
                observer.unobserve(entry.target); // animate once only
            }
        });
    }, { threshold: 0.5 }); // triggers when 50% visible

    $('.wbdm-socialmedia-tile-followers-count').each(function() {
        observer.observe(this);
    });

});