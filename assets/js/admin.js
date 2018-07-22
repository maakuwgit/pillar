/* global screenReaderText */
/**
 * Theme functions file.
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * Contains handlers for navigation, primary content and widget area.
 */

( function( $ ) {
	var vw,vh,
			backgrounder = new Backgrounder(),
			breakpoint = new Breakpoints(),
			scenes = [], 
			controller;
	
	function setHash(){		
		var hash = window.location.hash,
				anchor = $('a[href="'+hash+'"]');

		if(hash){
			if(anchor.length > 0){
				$(anchor).trigger('click');
			}
		}
	}
	
	function setSize(){
		vw = $(window).width();
		vh = $(window).height();
	}
	
	function getSize(){
		var size = 'small';
		if(vw >= breakpoint.xlarge){
			size = 'fullsize';
		}else if(vw >= breakpoint.large && vw < breakpoint.xlarge) {
			size = 'large';	
		}else if(vw > breakpoint.small && vw < breakpoint.large) {
			size = 'medium';
		}
		return size;
	}
	
	function refactor(event){
		setSize();
		var size = getSize();
		//Dev Note: Create a data attr for the size and only call 'backgrounder' once per size.
		backgrounder.make(size);
	}
	
	function init(event){
		$('input[data-iris]').wpColorPicker();
		$('#postbox-container-1').find('.postbox').addClass('closed');
		$('#submitdiv').removeClass('closed');
		$('#side-sortables').find('button.handlediv').unbind().on('click', function(){
			$('#side-sortables .postbox').not($(this).parent()).addClass('closed');
			var paused = setTimeout(function(){
				$(this).parent().removeClass('closed');
			}, 300);
		});
		
		function swapIt(event){
			$(this).parents('.themediv').find('.toggler').addClass('active');
			$(this).parents('.themediv').find('[data-swapfield],[data-swapimg],[data-swapcopy]').removeClass('active');
			$(this).siblings('[data-swapfield]').addClass('active');
		}
		
		function closeIt(event){
			$(this).siblings().find('[data-swapfield]').removeClass('active');
			$(this).siblings().find('[data-swapimg],[data-swapcopy]').addClass('active');
			$(this).removeClass('active');
		}
		
		$('.toggler').on('click.closeIt', closeIt);
		$('fieldset.themediv [data-swapcopy]').on('click.swapIt', swapIt);
		
		//Rearrange the elements
		var wsywig = $('#postdivrich').detach();
		$('#postbox-container-2').append(wsywig);
		
		$('#side-sortables').prepend('<button data-toggler="side-sortables"><em class="fa fa-gears"></em></button>');
		var btn = $('[data-toggler="side-sortables"]');
		
		$(btn).on('click', function(event){
			event.preventDefault();
			$('#postbox-container-1').toggleClass('active');
			$('#post-body').toggleClass('collapsed');
		});
	}
	
	$(document).ready(function(){
		init(false);
	});
		
} )( jQuery );