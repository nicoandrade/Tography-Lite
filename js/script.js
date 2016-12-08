(function($) {
  "use strict";

	var ql_animateNav, ql_animateControls, ql_animateSliderDots, ql_resizeVideo, ql_animatePosts, ql_animateTitle, ql_animateSidebar;


//Detect IE
if (document.documentElement) {
    var cn = document.documentElement.className;
    var ie = (function(){
	    var undef, v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i');
	    while (
	        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
	        all[0]
	    );
	    return v > 4 ? v : undef;
	}());
    if (ie && ie < 10) {
    	document.documentElement.className = cn.replace(/js/,'no-js');
    }
}





	jQuery(document).ready(function($){
			
			//Scroll to top		 
			$(".ql_scroll_top").click(function() {
			  $("html, body").animate({ scrollTop: 0 }, "slow");
			  return false;
			});

			//Scroll for Header items
			$(".nav_sidebar_wrap").niceScroll({
				touchbehavior: true,
				cursoropacitymax: 0.2,
				bouncescroll: true,
				cursorcolor:"#fff",
				railpadding: {top:0,right:4,left:0,bottom:0},
				//bouncescroll: true,
				grabcursorenabled: false,
				nativeparentscrolling: false,
				horizrailenabled: false
			});


				

				//Anomation at load -----------------
				Pace.on('done', function(event) {
					$("#wrap").addClass('fade-in');
				});//Pace



				/*Dropdown menu on hover */
				$('body').on('mouseenter', '#ql_main-navigation:not(.in) ul li', function(event) {
					event.preventDefault();
					$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideDown(400, function(){
						$(this).addClass('open');
					});
				});
				$('body').on('mouseleave', '#ql_main-navigation:not(.in) ul li', function(event) {
					event.preventDefault();
					$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp(200, function(){
						$(this).removeClass('open');
					});
				});

				



				$(".collapse").collapse({
				  toggle: false,
				  parent: ".panel-group"
				})


				//Accordion Icons (+ & -) Bootstrap-------------->
				$("body").on('hidden.bs.collapse', '.accordion .collapse', function(event) {
					var $a_i = $(this).prev().find(".accordion-toggle").children("i");
						$a_i.removeClass("fa-minus").addClass("fa-plus");
				});
				$("body").on('show.bs.collapse', '.accordion .collapse', function(event) {
					var $a_i = $(this).prev().find(".accordion-toggle").children("i");
						$a_i.removeClass("fa-plus").addClass("fa-minus");
				});
				//End Accordion Icons (+ & -) Bootstrap--------------<
				

				$('.dropdown-toggle').dropdown();
				//Tabs for Bootstrap-------------->
				$("body").on('click', '.ql_tabs a', function(e) {
					e.preventDefault();
				  	$(this).tab('show');
				});

				

				//Nav Menu for Bootstrap-------------->
				$(".jqueryslidemenu ul.nav > li .children, .jqueryslidemenu ul.nav > li .sub-menu").each(function(index) {
				    $(this).parent("li").addClass("dropdown");
				    $(this).prev("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown').append('<b class="caret"></b>');
				    $(this).addClass("dropdown-menu");
				});
				//Nav Menu for Bootstrap-------------->

				/*Navigation Sidebar
				------------------------------------------------*/
				$(".ql_nav_btn, .ql_nav_close").on('click', function(event){
					$(".nav_sidebar, .ql_nav_btn").toggleClass('open');
					$("html").toggleClass('menu_open');
					return false;
				});
				$('#nav .dropdown').hover(function() {
					$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideDown();
					console.log(this);
					}, function() {
					$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
				});

				
		
				var isMobile = {
				    Android: function() {
				        return /Android/i.test(navigator.userAgent);
				    },
				    BlackBerry: function() {
				        return /BlackBerry/i.test(navigator.userAgent);
				    },
				    iOS: function() {
				        return /iPhone|iPad|iPod/i.test(navigator.userAgent);
				    },
				    Windows: function() {
				        return /IEMobile/i.test(navigator.userAgent);
				    },
				    any: function() {
				        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
				    }
				};
				if (isMobile.any()) {
					$("html, body").css('height', 'auto');
				};
				
				
				
			
				
				
				
				//Tooltips
				$("*[rel^='tooltip']").tooltip();
				$('*[data-toggle="tooltip"]').tooltip();
				 


				//Don't use Fade in in IE
				var ie = (function(){
				    var undef, v = 3, div = document.createElement('div');
				    while (
				        div.innerHTML = '<!--[if gt IE '+(++v)+']><i></i><![endif]-->',
				        div.getElementsByTagName('i')[0]
				    );
				    return v> 4 ? v : undef;
				}());
				if(ie){
					$("#wrap").removeClass('fade-in');
				}
				
				
				
				  
				//Sidebar Menu Function
				$('#sidebar .widget ul li ul').parent().addClass('hasChildren').append("<i class='fa fa-angle-down'></i>");
				var children;
				$("#sidebar .widget ul li").hoverIntent(
											  function () {
												children = $(this).children("ul");
												if($(children).length > 0){
														$(children).stop(true, true).slideDown('fast');	   
												}
											  }, 
											  function () {
												  $(this).children('ul').stop(true, true).slideUp(500);
											  }
				);
				//Footer Menu Function
				$('footer .widget ul li ul').parent().addClass('hasChildren').append("<i class='fa fa-angle-down'></i>");
				var children;
				$("footer .widget ul li").hoverIntent(
											  function () {
												children = $(this).children("ul");
												if($(children).length > 0){
														$(children).stop(true, true).slideDown('fast');	   
												}
											  }, 
											  function () {
												  $(this).children('ul').stop(true, true).slideUp(500);
											  }
				);	
				


				//Just for the demos site, adds the password on private galleries
				if(window.location.host == 'themes.quemalabs.com' || window.location.host == 'themeforest.net'){
					if($(".password_p").length){
						$(".password_p").append('<small style="color: #CAC3C3;">Tip: the password is 1234</small>');
					}
				}


				$(".wpcf7 input").on('focus', function(event) {
					$(this).removeClass("wpcf7-not-valid");
				});




	});//Dom ready






})(jQuery);




function stringToBoolean(string){
        switch(string.toLowerCase()){
                case "true": case "yes": case "1": return true;
                case "false": case "no": case "0": case null: return false;
                default: return Boolean(string);
        }
}
function scrollToElement(selector, time, verticalOffset) {
    time = typeof(time) != 'undefined' ? time : 1000;
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = jQuery(selector);
    offset = element.offset();
    offsetTop = offset.top + verticalOffset;
    jQuery('html, body').animate({
        scrollTop: offsetTop
    }, time);
}

//Debounce Function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};