// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/*******

	***	Anchor Slider by Cedric Dugas   ***
	*** Http://www.position-absolute.com ***
	
	*** Firefox scrollTop bug fixed by Matheus Lima ***
	*** http://www.matheuslima.org/  @matheeusLimaaa ***
	*** Github: mattheussl ***
	
	Never have an anchor jumping your content, slide it.

	Don't forget to put an id to your anchor !
	You can use and modify this script for any project you want, but please leave this comment as credit.
	
*****/


jQuery.fn.anchorAnimate = function(settings) {

 	settings = jQuery.extend({
		speed : 1100,
		offset: 0
	}, settings);	

	return this.each(function(){
		var caller = this
		$(caller).click(function (event) {	
			event.preventDefault();
			event.returnValue = false;
			var locationHref = window.location.href;
			var elementClick = $(caller).attr("href");
			var destination = $(elementClick).offset().top - settings.offset;
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
				scrollPosition = $(window).scrollTop(); // Firefox hack
				window.location.hash = elementClick;
				$(window).scrollTop(scrollPosition); // Firefox hack

			});
		  	return false;
		})
	})
}
$(document).ready(function() {
	$("a.anchorLink").anchorAnimate({speed: 900,offset:0})
});

/****************************/