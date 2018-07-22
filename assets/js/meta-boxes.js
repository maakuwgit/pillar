/**
 * Theme admin functions file.
 * @todo plug this into the admin so that switching the template switches on the options. Possibly refer to Zyflo, which has this functionality
 */
( function( $ ) {
	$( document ).ready( function() {
		//Shortcuts
		var template_select  	= $('#page_template'),
				callout_box 			= $('#callout_box_settings'),
				gradient_box 			= $('#gradient_box_settings'),
				gradient2_box 		= $('#gradient2_box_settings'),
				vector_box 				= $('#vector_box_settings'),
				pushdown 					= $('#pushdown_settings'),
				photo_box 				= $('#photo_box_settings'),
				meta_boxes 				= $('#callout_box_settings, #gradient_box_settings, #gradient2_box_settings, #vector_box_settings, #photo_box_settings, #pushdown_settings');

		$(meta_boxes).hide();

		//Execute/Display changes
		function checkTemplate(event){
			var template = template_select.val();
			$(meta_boxes).hide();
			$('#postdivrich').hide();

			switch(template){
				case 'template-callout.php':
					$(callout_box).show();
				break;
				case 'template-callout_gradient_box.php':
					$(callout_box).show();
					$(gradient_box).show();
					$('#postdivrich').show();
				break;
				case 'template-careers.php':
					$(gradient_box).show();
					$('#postdivrich').show();
				break;
				case 'template-gradient_photo_box.php':
					$(gradient_box).show();
					$(photo_box).show();
				break;
				case 'template-vector_gradient_box_x2.php':
					$(meta_boxes).hide();
					$(vector_box).show();
					$(gradient_box).show();
					$(gradient2_box).show();
				break;
				case 'template-vector_gradient_pushdown.php':
					$(meta_boxes).hide();
					$(vector_box).show();
					$(gradient_box).show();
					$(pushdown).show();
				break;
				default:
					$('#postdivrich').show();
				break;
			}
		}
		
		//Init
		checkTemplate();

		//Check for changes
		template_select.change(checkTemplate);

	} );
} )( jQuery );
