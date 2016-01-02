(function($){
	var thim_widget_features_list = {
		init: function(){
			this.showmore();
		},

		/* Event click on button "Show More" */
		showmore: function(){
			$('.thim-features-list').on('click', 'a.btn-show-more', function(event){
				event.preventDefault();
				var id 			= $(this).data('id');
				var json 		= $(this).data('showmore');
				var $list_features = $('#'+id).find('.list_features');
					$(this).parent().remove();
					$(json).appendTo($list_features);
			});
		},
	};

	$(document).ready(function(){
		thim_widget_features_list.init();
	});
})(jQuery);