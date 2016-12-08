//Portfolio Script 1.0
//Author: Quema Labs
//http://www.quemalabs.com
(function($) {
  "use strict";
	jQuery(document).ready(function($) {


		
				/*
				Portfolio Thirds
				=========================================================
				*/
				var $portfolio_thirds_isotope = $('#portfolio_thirds_container');
				//Add preloader
				$portfolio_thirds_isotope.append('<div class="preloader"><i class="fa fa-cog fa-spin"></i></div>');
				$portfolio_thirds_isotope.imagesLoaded( function( $images, $proper, $broken ) {
				
					$portfolio_thirds_isotope.isotope({
						// options
						itemSelector : '.portfolio_item',
						layoutMode : 'packery',
						packery: {
					        gutter: 20
					    },
						resizable : true,
						transformsEnabled : true,
						transitionDuration: '700ms',
						getSortData : {
							year : function ( elem ) {
								return parseInt( $(elem).attr('data-year'),10);
							}
						}
					});//isotope

					//Create thumbnails
					var elems = $portfolio_thirds_isotope.isotope('getItemElements');
					elems = $(elems).clone();
					$(elems).each(function(index, el) {
						$(el).removeClass('portfolio_item portfolio').addClass('portfolio_thumbnail').find('a').remove();
					});

					$(elems).prependTo('.p_thumbnails_content');

					$(".p_thumbnails_content").isotope({
						itemSelector : '.portfolio_thumbnail',
						layoutMode : 'packery',
						packery: {						
					        gutter: 3
					    },
						transformsEnabled : true,
						transitionDuration: '700ms',
						getSortData : {
							year : function ( elem ) {
								return parseInt( $(elem).attr('data-year'),10);
							}
						}
					});//isotope
					$(".p_thumbnails_content").isotope('layout');
					$portfolio_thirds_isotope.children(".portfolio_item").hover(
					  function() {
					  	$(".p_thumbnails_content .portfolio_thumbnail").eq($(this).index()-1).addClass('hover');
					    
					  }, function() {
					  	$(".p_thumbnails_content .portfolio_thumbnail").eq($(this).index()-1).removeClass('hover');
					    
					  }
					);
					
					$('.p_thumbnails_content').affix({
					  offset: {
					    top: function () {
					      return ($("#header").height() + 30)
					    }
					  }
					})
					//---------------------------------------------------

					//Resize Items at start
					$portfolio_thirds_isotope.isotope('layout'); 

					// filter items when filter link is clicked
					$('.filter_list a').click(function(){
						var selector = $(this).attr('data-filter');
						$portfolio_thirds_isotope.isotope({ filter: selector });
						var $parent = $(this).parents(".filter_list");
						$parent.find(".active").removeClass('active');
						$(".filter_list").not($parent).find("li").removeClass('active').first().addClass("active");
						$(this).parent().addClass("active");
						return false;
					});


					//Remove preloader
					$portfolio_thirds_isotope.find('.preloader i').css('display', 'none');
					$portfolio_thirds_isotope.children('.preloader').css('opacity', 0).delay(900).fadeOut();
					
				});//images loaded









			/*
			Single Portfolio
			=========================================================
			*/
			// Single Portfolio
			$(".ql_img_info").hover(function() {
				$(this).find('.ql_img_meta').toggleClass('open');
			}, function() {
				$(this).find('.ql_img_meta').toggleClass('open');
			});
			//PhotoSwipe for Single Portfolio
			var pswp_html = '<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>';
			$(pswp_html).appendTo('body');
			initPhotoSwipe('.ql_single-portfolio_images', '.ql-slider-image');
			$('.ql_img_info_btn').on('click', function(event) {
				event.preventDefault();
			});


			/*
			Single Portfolio 2
			=========================================================
			*/
			var win_height = $(window).height() - $("#header").height();
			var portfolio_content_height = $('.ql_single-portfolio_content').height();
			if (portfolio_content_height < win_height) {
				$('.ql_single-portfolio_content').affix({
						  offset: {
						    top: function () {
						      return ($("#header").height() - 20)
						    }
					}
				})
			};


	});//document ready
})(jQuery);