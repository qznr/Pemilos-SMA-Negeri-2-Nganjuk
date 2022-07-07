if ("undefined" == typeof(jQuery)) {
	alert("Zero Cool Need jQuery");
	console.error("Zero Cool Need jQuery");
}
$(function() {
	$("#toggle-button").click(function() {
		$(".collapse").slideToggle(200, function() {
			$(this).toggleClass("in");
		})
	});


	$("a[rel='page-scroll']").click(function(e) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop : ($($anchor.attr("href")).offset().top) - $(".navbar").height() - 30
		},800);
		e.preventDefault();
	});
})

$.fn.zeroSlide = function(arrayImage, interval) {
	var selector = $(".cover");
	var x = arrayImage;
	selector.css({"background-image" : "url(" + x[0] + ")"});
	var i = 0;
	var css;
	setInterval(function() {
		selector.css({"background-image" : "url(" + x[i] + ")"});
		i = i+1;
		if (i >= x.length) {
			i = eval(0);
		}
	}, interval);	
}


// WINDOW SCROLLING
$(window).scroll(function() {
	var opacity = ($(".cover").height() - $(this).scrollTop()) / 100;
	if (opacity < 0) {
		opacity = 0;
	}
	if (opacity <= 1) {
		$(".navbar-default").addClass("hide-cover");
		$(".nav").addClass("collapse-cover");
	}
	else {
		$(".navbar-default").removeClass("hide-cover");
	}
	$(".cover").css({opacity : opacity})
});


// ACTIVE MENU
var pos;
$(window).bind('scroll',function(event){
	clearInterval(timeout);
	var timeout = setTimeout(function(){
		pos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
		activateNav(pos);
	},50);
}).trigger('scroll');


//activate current nav element
function activateNav(pos){
	var offset = 300;
	// $(window).unbind('hashchange', hashchange);
	$(".content").each(function(doc) {
		var contentPos = eval($(this).offset().top) - 100;
		if (contentPos <= pos + offset) {
			var id = $(this).attr("id");
			$("a[rel='page-scroll']").removeClass("active");
			$("a[rel='page-scroll'][href='#" + id + "']").addClass("active");
		}
	})
}

