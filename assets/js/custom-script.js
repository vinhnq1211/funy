(function ($) {
	"use strict";
	$.avia_utilities = $.avia_utilities || {};
	$.avia_utilities.supported = {};
	$.avia_utilities.supports = (function () {
		var div = document.createElement('div'),
			vendors = ['Khtml', 'Ms', 'Moz', 'Webkit', 'O'];
		return function (prop, vendor_overwrite) {
			if (div.style.prop !== undefined) {
				return "";
			}
			if (vendor_overwrite !== undefined) {
				vendors = vendor_overwrite;
			}
			prop = prop.replace(/^[a-z]/, function (val) {
				return val.toUpperCase();
			});

			var len = vendors.length;
			while (len--) {
				if (div.style[vendors[len] + prop] !== undefined) {
					return "-" + vendors[len].toLowerCase() + "-";
				}
			}
			return false;
		};
	}());

	/* Smartresize */
	(function ($, sr) {
		var debounce = function (func, threshold, execAsap) {
			var timeout;
			return function debounced() {
				var obj = this, args = arguments;

				function delayed() {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				}

				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);
				timeout = setTimeout(delayed, threshold || 100);
			}
		}
		// smartresize
		jQuery.fn[sr] = function (fn) {
			return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
		};
	})(jQuery, 'smartresize');

	//Back To top
	var back_to_top = function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-to-top').css({bottom: "15px"});
			} else {
				jQuery('#back-to-top').css({bottom: "-100px"});
			}
		});
		jQuery('#back-to-top').click(function () {
			jQuery('html, body').animate({scrollTop: '0px'}, 800);
			return false;
		});
	}

	//// stick header
	$(document).ready(function () {
		var $header = $('#masthead.sticky-header.header_default');
		var $content_pusher = $('#wrapper-container .content-pusher');
		$header.imagesLoaded(function () {
			var height_sticky_header = $header.outerHeight(true);
			$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			$(window).resize(function () {
				var height_sticky_header = $header.outerHeight(true);
				$content_pusher.css({"padding-top": height_sticky_header + 'px'})
			});
		});
	});
	$(document).ready(function () {
		var height_header = $('.wrapper-header_overlay .site-header').outerHeight(true);
		var height_header_mobile = $('#masthead').height();
		$('.wrapper-header_overlay').find('.top-site-no-image').css({"padding-top": height_header + 'px'});
		$('.wrapper-header_overlay').find('.top-site-no-image-custom').css({"padding-top": height_header + 'px'});
		if ($(window).width() < 768) {
			$('.wrapper-header_overlay').find('.page-title-wrapper').css({"padding-top": height_header_mobile + 'px'});
		}

	});


	jQuery(function ($) {
		if ($(window).width() > 768) {
			$('.header_v1 .navbar-nav >li,.header_v1 .navbar-nav li.standard,.header_v1 .navbar-nav li.standard ul li').hover(
				function () {
					$(this).children('.sub-menu').stop(true, false).slideDown(250);
				},
				function () {
					$(this).children('.sub-menu').stop(true, false).slideUp(250);
				}
			);
		}
	});

	/* ****** jp-jplayer  ******/
	var post_audio = function () {
		$('.jp-jplayer').each(function () {
			var $this = $(this),
				url = $this.data('audio'),
				type = url.substr(url.lastIndexOf('.') + 1),
				player = '#' + $this.data('player'),
				audio = {};
			audio[type] = url;
			$this.jPlayer({
				ready              : function () {
					$this.jPlayer('setMedia', audio);
				},
				swfPath            : 'jplayer/',
				cssSelectorAncestor: player
			});
		});
	}

	var post_gallery = function () {
		$('article.format-gallery .flexslider').imagesLoaded(function () {
			$('.flexslider').flexslider({
				slideshow     : true,
				animation     : 'fade',
				pauseOnHover  : true,
				animationSpeed: 400,
				smoothHeight  : true,
				directionNav  : true,
				controlNav    : false
			});
		});
	}

	$(function () {
		back_to_top();
		/* Menu Sidebar */
		jQuery('.sliderbar-menu-controller').click(function (e) {
			e.stopPropagation();
			jQuery('.slider-sidebar').toggleClass('opened');
			jQuery('html,body').toggleClass('slider-bar-opened');
		});
		jQuery('#wrapper-container').click(function () {
			jQuery('.slider-sidebar').removeClass('opened');
			jQuery('html,body').removeClass('slider-bar-opened');
		});
		jQuery(document).keyup(function (e) {
			if (e.keyCode === 27) {
				jQuery('.slider-sidebar').removeClass('opened');
				jQuery('html,body').removeClass('slider-bar-opened');
			}
		});


		/* Waypoints magic
		 ---------------------------------------------------------- */
		if (typeof jQuery.fn.waypoint !== 'undefined') {
			jQuery('.wpb_animate_when_almost_visible:not(.wpb_start_animation)').waypoint(function () {
				jQuery(this).addClass('wpb_start_animation');
			}, {offset: '85%'});
		}
	});

	function empty(data) {
		if (typeof(data) == 'number' || typeof(data) == 'boolean') {
			return false;
		}
		if (typeof(data) == 'undefined' || data === null) {
			return true;
		}
		if (typeof(data.length) != 'undefined') {
			return data.length === 0;
		}
		var count = 0;
		for (var i in data) {
			if (Object.prototype.hasOwnProperty.call(data, i)) {
				count++;
			}
		}
		return count === 0;
	}

	var windowWidth = window.innerWidth,
		windowHeight = window.innerHeight,
		$document = $(document),
		orientation = windowWidth > windowHeight ? 'landscape' : 'portrait';
	var TitleAnimation = {
		selector   : '.article__parallax',
		initialized: false,
		animated   : false,
		initialize : function () {
			var that = this;
			if (this.initialized) {
				return;
			}
			this.initialized = true;
			$(this.selector).each(function (i, header) {
				var windowHeight = window.innerHeight,
					wh = $(window).height(),
					$header = $(header),
					$headline = $header.find('.article_heading'),
					timeline = new pixGS.TimelineMax(),
					$title = $headline.find('.heading__primary'),
					$subtitle = $headline.find('.heading__secondary'),
					headerTop = $header.offset().top,
					headerHeight = $header.outerHeight();
				// ------ A
				timeline.fromTo($title, 0.89, {opacity: 0}, {opacity: 1, ease: pixGS.Expo.easeOut}, '-=0.72');
				timeline.fromTo($title, 1, {'y': 30}, {'y': 0, ease: pixGS.Expo.easeOut}, '-=0.89');
				timeline.fromTo($subtitle, 0.65, {opacity: 0}, {opacity: 1, ease: pixGS.Quint.easeOut}, '-=0.65');
				timeline.fromTo($subtitle, 0.9, {y: 30}, {y: 0, ease: pixGS.Quint.easeOut}, '-=0.65');
				// ------ B
				timeline.addLabel("animatedIn");
				if (i == 0) {
					timeline.to($headline, 1.08, {y: -60, ease: pixGS.Linear.easeNone});
					timeline.to($title, 1.08, {opacity: 0, y: -60, ease: pixGS.Quad.easeIn}, '-=1.08');
				} else {
					timeline.to($title, 1.08, {opacity: 0, y: -60, ease: pixGS.Quad.easeIn});
				}

				timeline.to($subtitle, 1.08, {opacity: 0, y: -90, ease: pixGS.Quad.easeIn}, '-=1.08');
				timeline.addLabel("animatedOut");
				// ------ C
				var animatedInTime = timeline.getLabelTime("animatedIn"),
					animatedOutTime = timeline.getLabelTime("animatedOut"),
					start = headerTop + headerHeight / 2 - wh / 2,
					end = start + headerHeight / 2,
					ab, bc;

				ab = animatedInTime / animatedOutTime;
				bc = 1 - ab;

				if (Modernizr.touch) {
					timeline.tweenTo("animatedIn");
					return;
				}

				timeline.tweenTo("animatedOut", {
					onComplete: function () {
						$headline.data("animated", true);
					},
					onUpdate  : function () {
						var progress = (1 / (end - start)) * (latestScrollY - start),
							partialProgress = progress < 0 ? ab : ab + bc * progress,
							currentProgress = timeline.progress();

						if (Math.abs(partialProgress - currentProgress) < 0.01) {
							$headline.data("animated", true);
							this.kill();
						}
					}
				});

				$headline.data('tween', {
					timeline: timeline,
					ab      : ab,
					bc      : bc,
					start   : start,
					end     : end
				});
			});
			this.update();
		},
		update     : function () {
			var that = this;
			$(this.selector).each(function (i, element) {
				var $headline = $(element).find('.article_heading'),
					options = $headline.data('tween'),
					progress = 0;
				// some sanity check
				// we wouldn't want to divide by 0 - the Universe might come to an end
				if (!empty(options) && (options.end - options.start) !== 0) {
					progress = (1 / (options.end - options.start)) * (latestScrollY - options.start);
					// point B being labeled as "animated"
					var partialProgress = options.ab + options.bc * progress;
					$headline.data('progress', partialProgress);
					if (!$headline.data("animated") || (Modernizr.touch )) {
						return;
					}
					if (0 > progress) {
						partialProgress = options.ab;
					}
					if (1 > partialProgress) {
						options.timeline.progress(partialProgress);
						return;
					}
					options.timeline.progress(1);
				}
			});
		}
	}
	/* ====== ON RESIZE ====== */
	$(window).load(function () {
		setTimeout(function () {
			TitleAnimation.initialize();
		}, 400);
		if (!empty($('#date-otreservations'))) {
			// Pikaday
			var picker = new Pikaday({
				field  : document.getElementById('date-otreservations'),
				format : 'MM/DD/YYYY',
				minDate: moment().toDate()
			});
			picker.setDate(moment().format('MM/DD/YYYY'));
		}
	})

	$(window).on("debouncedresize", function (e) {
		windowWidth = $(window).width();
		windowHeight = $(window).height();
		TitleAnimation.initialize();
	});

	$(window).on("orientationchange", function (e) {
		setTimeout(function () {
			TitleAnimation.initialize();
		}, 300)
	});

	var latestScrollY = $('html').scrollTop() || $('body').scrollTop(),
		ticking = false;

	function updateAnimation() {
		ticking = false;
		TitleAnimation.update();
	}

	function requestScroll() {
		if (!ticking) {
			requestAnimationFrame(updateAnimation);
		}
		ticking = true;
	}

	$(window).on("scroll", function () {
		latestScrollY = $('html').scrollTop() || $('body').scrollTop();
		requestScroll();
	});

	/* ====== ON DOCUMENT READY ====== */
	$(document).ready(function () {
		post_audio();
		post_gallery();
		if ($(window).width() > 768) {
			$('.article__parallax').each(function (index, el) {
				$(el).parallax("50%", 0.4);
			});
			$('.images_parallax').parallax_images({
				speed: 0.5
			});
			$(window).resize(function () {
				$('.images_parallax').each(function (index, el) {
					$(el).imagesLoaded(function () {
						var parallaxHeight = $(this).find('img').height();
						$(this).height(parallaxHeight);
					});
				});
			}).trigger('resize');
		}
	});


	jQuery(document).delegate('.bg-video-play', "click", function () {
		if (jQuery(".full-screen-video").get(0).paused) {
			jQuery('.full-screen-video').get(0).play();
			jQuery(this).addClass('bg-pause');
		} else {
			jQuery('.full-screen-video').get(0).pause();
			jQuery(this).removeClass('bg-pause');
		}
	});

	var miniCartHover = function () {
		jQuery(document).on('mouseover', '.minicart_hover', function () {
			jQuery(this).next('.widget_shopping_cart_content').slideDown();
		}).on('mouseleave', '.minicart_hover', function () {
			jQuery(this).next('.widget_shopping_cart_content').delay(100).stop(true, false).slideUp();
		});
		jQuery(document)
			.on('mouseenter', '.widget_shopping_cart_content', function () {
				jQuery(this).stop(true, false).show()
			})
			.on('mouseleave', '.widget_shopping_cart_content', function () {
				jQuery(this).delay(100).stop(true, false).slideUp()
			});
	}

	miniCartHover();

	jQuery(function ($) {
		var adminbar_height = jQuery('#wpadminbar').outerHeight();
 		jQuery('.navbar-nav li a,.arrow-scroll > a').click(function (e) {
 				if (parseInt(jQuery(window).scrollTop(), 10) < 2 ) {
					var height = 47;
 				}else height = 0;
				var sticky_height = jQuery('#masthead').outerHeight();
 				var menu_anchor = jQuery(this).attr('href');
				if (menu_anchor && menu_anchor.indexOf("#") == 0 && menu_anchor.length > 1) {
					e.preventDefault();
					$('html,body').animate({
						scrollTop: jQuery(menu_anchor).offset().top - adminbar_height - sticky_height + height
					}, 850);
				}
				jQuery('.wrapper-container').removeClass('mobile-menu-open');
 		});
	});

	var scrollTimer = false,
		scrollHandler = function () {
			var scrollPosition = parseInt(jQuery(window).scrollTop(), 10);
			jQuery('.navbar-nav li a[href^=#]').each(function () {
				var thisHref = jQuery(this).attr('href');
				if (jQuery(thisHref).length) {
					var thisTruePosition = parseInt(jQuery(thisHref).offset().top, 10);
					if (jQuery("#wpadminbar").length) {
						var admin_height = jQuery("#wpadminbar").height();
					} else admin_height = 0;
					var thisPosition = thisTruePosition - (jQuery("#masthead").outerHeight() + admin_height) ;
					if (scrollPosition <= parseInt(jQuery(jQuery('.navbar-nav li a[href^=#]').first().attr('href')).height(), 10)) {
						if (scrollPosition >= thisPosition) {
							jQuery('.navbar-nav li a[href^=#]').removeClass('nav-active');
							jQuery('.navbar-nav li a[href=' + thisHref + ']').addClass('nav-active');
						}
					} else {
						if (scrollPosition >= thisPosition || scrollPosition >= thisPosition) {
							jQuery('.navbar-nav li a[href^=#]').removeClass('nav-active');
							jQuery('.navbar-nav li a[href=' + thisHref + ']').addClass('nav-active');
						}
					}
				}
			});
		}
 	window.clearTimeout(scrollTimer);
	scrollHandler();
	jQuery(window).scroll(function () {
		window.clearTimeout(scrollTimer);
		scrollTimer = window.setTimeout(function () {
			scrollHandler();
		}, 20);
	});


	/* mobile menu */
	jQuery('.mobile-menu-container .navbar-nav>li.menu-item-has-children >a,.mobile-menu-container .navbar-nav>li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
	jQuery('.navbar-nav>li.menu-item-has-children .icon-toggle').click(function () {
		//alert('test');
		if (jQuery(this).next('ul.sub-menu').is(':hidden')) {
			jQuery(this).next('ul.sub-menu').slideDown(500, 'linear');
			jQuery(this).html('<i class="fa fa-angle-up"></i>');
		}
		else {
			jQuery(this).next('ul.sub-menu').slideUp(500, 'linear');
			jQuery(this).html('<i class="fa fa-angle-down"></i>');
		}
	});
})(jQuery);

(function($){
	function unique_id() {
		function s4() {
			return Math.floor((1 + Math.random()) * 0x10000)
				.toString(16)
				.substring(1);
		}
		return s4() + s4() + s4() + s4();
	}
	$.fn.RevTextAnim = function( options ){
		return $.each(this, function(){
			var RevTextAnim = $(this).data('RevTextAnim');
			if( $.type( RevTextAnim ) == 'undefined' ){
				RevTextAnim = new $.RevTextAnim( this, options );
				$(this).data('RevTextAnim', RevTextAnim);
			}
			return this;
		});
	}

	$.RevTextAnim = function(elem, options){
		this.options = $.extend({
			items: '>*'
		}, options || {});
		var that = this,
			$window = $(window),
			$element = $(elem);
		$items = $element.find( this.options.items ),
			containerOffset = $element.offset();
		function initialize(){
			$window.bind('scroll.' + unique_id(), function(){
                var scrollTop = $window.scrollTop(),
                    dx = ( scrollTop - ( containerOffset.top - that.options.offset ) ) / ($element.height() / 2);
                $items = $element.find( that.options.items );
                if( scrollTop > 0 ){
                    var len = $items.length
                    $items.each(function(i){
                        var dy = ( (len - i) * dx );
                        dy = -( dy * dy * dy ) * 2;
                        $(this).css({
                            transform: 'translate3d(0px, ' + dy + 'px, 0px)',
                            opacity: Math.max( 0, 1 - ( dx / 2 ) ),
                            transition: 'initial'
                        });
                    })

                }else if( scrollTop == 0 ){
                    $items.each(function(i){
                        $(this)
                            .css('transform', '')
                            .css('opacity', '');
                    })
                }
			});
		}
		initialize();
	}

	$(document).ready(function(){
		setTimeout( function(){
			$('.tp-revslider-mainul >li,.images_parallax').RevTextAnim({
				items: '.heading__secondary, .heading__primary, .show-separator, .tp-caption .tp-button',
				offset: 200
			});
		}, 1000)

		thim_mabu.init();
	});


	$(window).load(function(){
		thim_mabu.roundslider();
		thim_mabu.feature_box_active_image();
		thim_mabu.loading();
	});

	var thim_mabu = {
		init: function(){
			this.action_toggle();
			this.product_video();
			this.popupShare();
			this.menuStick();
			this.menuToggle();
		},

		action_toggle: function(){
			$('.thim-link-panel').on('click', '.toggle', function(event){
				event.preventDefault();
				var close 	= $(this).data('close'),
					open 	= $(this).data('open');
					$('#'+close).slideToggle();
					$('#'+open).slideToggle();
			});
		},

		//  Slider image in single product
		roundslider: function(){
			var $slider = $('.thim-product-slider'),
			$control = $slider.find('.control');
			$slider.find('.sliders').roundabout({
				minScale: 0.7,
				btnNext: ".next",
				btnPrev: ".prev",
				responsive: true,
				clickToFocusCallback: function(){
					var $slider_active = $slider.find('.slider').index($('.slider.roundabout-in-focus'));
						$control.eq($slider_active).addClass('active');
						$control.eq($slider_active).siblings().removeClass('active');
				},
			});

			$control.on('click', function(event){
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
				$index = $control.index($('.control.active'));
				$slider.find('.sliders').roundabout('animateToChild', $index);
			});

			var $slider_active = $slider.find('.slider').index($('.slider.roundabout-in-focus'));
			$control.eq($slider_active).addClass('active');
		},

		product_video: function(){
			$('.thim-product-video .player').funktube({
				dimmed: false
			});
		},


		feature_box_active_image: function(){
			var $box = $('.thim-feature-box');
			var $item = $box.find('.slider .item');
			var H = 0;
			$item.each(function(index, element){
				var eH = $(element).height();
				if (H < eH){
					H = eH;
				}
			});
			$box.find('.slider').height(H);
			$box.on('click',  '.slider .item', function(){
				var $images = $(this).parent();
					$images.find('.item').toggleClass('active');
			})
		},

		// Open popup when click share
		popupShare: function(){
			$('.thim-share-social').on('click', 'a', function(event){
				event.preventDefault();
				var shareurl = $(this).attr('href');
				var top = (screen.availHeight - 500) / 2;
				var left = (screen.availWidth - 500) / 2;
				var popup = window.open(shareurl, 'social sharing', 'width=550,height=420,left=' + left + ',top=' + top + ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
				return false;
			});
		},


		// Menu fixed
		menuStick: function(){
			var $header = $('.sticky-header');
			var menuH = $header.outerHeight();
			var latestScroll = 0;
			$(window).scroll(function(){
				var current = $(this).scrollTop();
				if (current > 2){
					$header.removeClass('affix-top').addClass('affix');
				}else{
					$header.removeClass('affix').addClass('affix-top');
				}

				if (current > 2 && current > latestScroll){
					if (!$header.hasClass('menu-hidden')){
						$header.addClass('menu-hidden');
					}
				}else{
					if ($header.hasClass('menu-hidden')){
						$header.removeClass('menu-hidden');
					}
				}

				latestScroll = current;
			});
		},


		// Toggle menu mobile
		menuToggle: function(){
			var $wrapper = $('.wrapper-container');
			$('#main-content').on('click touchstart', function(){
				if ($wrapper.hasClass('mobile-menu-open')){
					$wrapper.removeClass('mobile-menu-open');
				}
			});

			$('.container').on('click', '.menu-mobile-effect', function(event){
				event.preventDefault();
				$wrapper.toggleClass('mobile-menu-open');
			});
		},



		// Loading
		loading: function(){
			$('#thim-loading').fadeOut(1000, function(){
				$('body').removeClass('loading');
			});
		},

	};

})(jQuery);