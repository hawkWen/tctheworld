!function(e){e.fn.preloader=function(t){function r(){c=e(i.selector)}function n(){switch(i.type){case"document":default:setTimeout(function(){o()},i.delay)}}function o(){switch(i.removeType){case"fade":a();break;case"remove":default:u()}}function u(){return c.remove()}function a(){return c.fadeOut(i.fadeDuration,f())}function f(){return function(){c.remove()}}var i=e.extend({selector:"#preloader",type:"document",removeType:"fade",fadeDuration:750,delay:0},t),c=null;return r(),this.ready(function(){e(this).trigger("preloader:before"),n(),e(this).trigger("preloader:after")})}}(jQuery);

$(window).preloader({
    delay: 600
});