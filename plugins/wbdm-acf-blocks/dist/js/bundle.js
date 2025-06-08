/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ 113:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 352:
/***/ (() => {

jQuery(document).ready(function ($) {
  $('.slick-carousel').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: false,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
});

/***/ }),

/***/ 140:
/***/ (() => {

jQuery(document).ready(function ($) {
  $('.youtube-thumb-wrapper').on('click', function () {
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

/***/ }),

/***/ 34:
/***/ (() => {

jQuery(document).ready(function ($) {});

/***/ }),

/***/ 38:
/***/ (() => {

jQuery(document).ready(function ($) {
  function animateNumber($elem) {
    var fullText = $elem.text().trim();
    var numMatch = fullText.match(/[\d,.]+/);
    var numberPart = numMatch ? numMatch[0].replace(/,/g, '') : '0';
    var countTo = parseFloat(numberPart);
    var suffix = fullText.substring(numMatch ? numMatch.index + numberPart.length : 0);
    $elem.text('0' + suffix);
    $({
      countNum: 0
    }).animate({
      countNum: countTo
    }, {
      duration: 2000,
      easing: 'swing',
      step: function () {
        if (numberPart.indexOf('.') >= 0) {
          $elem.text(this.countNum.toFixed(1) + suffix);
        } else {
          $elem.text(Math.floor(this.countNum) + suffix);
        }
      },
      complete: function () {
        $elem.text(numberPart + suffix);
      }
    });
  }

  // Intersection Observer setup
  var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var $target = $(entry.target);
        animateNumber($target);
        observer.unobserve(entry.target); // animate once only
      }
    });
  }, {
    threshold: 0.5
  }); // triggers when 50% visible

  $('.wbdm-socialmedia-tile-followers-count').each(function () {
    observer.observe(this);
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/* harmony import */ var _blocks_hero_script__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(34);
/* harmony import */ var _blocks_hero_script__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_blocks_hero_script__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _blocks_socials_script__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(38);
/* harmony import */ var _blocks_socials_script__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_blocks_socials_script__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _blocks_featured_youtube_script__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(140);
/* harmony import */ var _blocks_featured_youtube_script__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_blocks_featured_youtube_script__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _blocks_collaboration_script__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(113);
/* harmony import */ var _blocks_collaboration_script__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_blocks_collaboration_script__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _blocks_featured_companies_script__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(352);
/* harmony import */ var _blocks_featured_companies_script__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_blocks_featured_companies_script__WEBPACK_IMPORTED_MODULE_4__);
document.addEventListener('DOMContentLoaded', function () {
  AOS.init();
});






})();

// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
//# sourceMappingURL=bundle.js.map