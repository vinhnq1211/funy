(function($) {
	$(window).load(function(){
		var $slider = $('.thim-roundslider'),
			$control = $slider.find('.control');
		$slider.find('.sliders').roundabout({
			minScale: 0.7,
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
	});
})(jQuery);