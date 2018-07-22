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
	var vw,vh,panner,controller,mastheight,
			backgrounder = new Backgrounder(),
			breakpoint = new Breakpoints(),
			scenes = [];
	
	function setHash(){		
		var hash = window.location.hash,
				anchor = $('a[href="'+hash+'"]');

		if(hash){
			if(anchor.length > 0){
				$(anchor).trigger('click');
			}
		}
	}
		
	function jumpTo(event){
		event.preventDefault();
		$(this).activate(true);
		var anchor = '#'+$(this).data('anchor'),
				speed = $(window).height()/$(anchor).height(),
				topY = $(anchor).offset().top - $('#masthead').outerHeight();
				
		speed = ( speed ? speed.toFixed(2) : 0.5 );
		
		TweenMax.to(window, speed, {scrollTo:{
          y: topY, 
          autoKill: true
      }, ease:Power3.easeOut
    });
					
    // If supported by the browser we can also update the URL
    if (window.history && window.history.pushState) {
      history.pushState("", document.title, anchor);
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
		var new_top = $('#masthead').outerHeight();
		
		$('#masthead + main').css('padding-top', new_top);

		if( size == 'small' || size == 'medium' ){
			$('#header-nav').css('margin-top', new_top - 1);
			$('#header-nav .menu-item-has-children a').off('click.toggleSubmenu').on('click.toggleSubmenu', toggleSubmenu);
			$('[data-menu-toggle]').off('click.toggleMenu').on('click.toggleMenu', toggleMenu);
		}else{
			$('#header-nav').removeAttr('style');
			$('#header-nav .menu-item-has-children a').off('click.toggleSubmenu');
			$('[data-menu-toggle]').off('click.toggleMenu');
		}
		//Dev Note: Create a data attr for the size and only call 'backgrounder' once per size.
		backgrounder.make(size);
	}
	
	function setupParallax(event){
		var main = $('#top');
		if(main.length > 0){ main.get(0);
			var mainParallax = new Parallax(main);
		}
	}

	function init(event){
		var size = getSize();
		mastheight = $('#masthead').outerHeight();
		if(typeof Parallax !== 'undefined') setupParallax(event);
		$(window).on('resize.refactor', refactor);
		
		refactor(event);
		initScrollMagic(getSize());
		
		$('[data-pushdown-id]').removeClass('active');
		$('a[data-pushdown], button[data-pushdown]').on('click.togglePushdown', togglePushdown);
		
		$('button[data-href]').on('click.gotoHref', function(){
				window.location = $(this).attr('data-href');
		});
		
		$('.more-link').removeAttr('href').on('click', function(event){
			event.preventDefault();
			var more = $(this).parent().parent().find('[data-more]');
			if( more.length ){
				$(more).show();
				var sibs = $(this).parent().siblings().not('[data-more]');
				if( sibs ) $(sibs).hide();
				$(this).parent().hide();
			}
		});
	}
	
	function toggleMenu(event){
		if(!$('#header-nav').hasClass('active')){
			$('#header-nav').addClass('active').css('padding-bottom', mastheight - 1);
			$('body').addClass('nav-open');
		}else{
			$('#header-nav').removeClass('active').css('padding-bottom', 0);
			$('body').removeClass('nav-open');
		}
	}
	
	function toggleSubmenu(event){
		$(this).toggleClass('active');
	}
	
	function togglePushdown(event){
		var target = $(this).attr('data-pushdown');
		if( target ) {
			target = '[data-pushdown-id="'+target+'"]';
			$(target).toggleClass('open').toggleClass('active');
			if( $(target).hasClass('open') ){
				$('body').animate({scrollTop:$(target).offset().top - $('#masthead').outerHeight()}, 300);
			}
		}
	}
	
	function setupScrollMagic(event){
		if(typeof ScrollMagic !== 'undefined') {
			
			//Sets the active state for anchors		
			$('main > *').each(function(){
				var offset = -1 * $(window).height();
				if( $(this).attr('id') ){
					var ascene = new ScrollMagic.Scene({
					  triggerElement: '#'+$(this).attr('id'), // starting scene, when the section
					  reverse: false,
					  offset:offset
					}).setClassToggle('#'+$(this).attr('id'), 'active');
					
					scenes.push(ascene);
				}else{
					$(this).addClass('active');
				}
			});
			
			$('#header-menu > .menu-item').each(function(i){
				var delay = i+'00ms';
				$(this).addClass('stagger'+i).css({'-moz-transition-delay':delay,
																				   '-webkit-transition-delay':delay,
																				   '-o-transition-delay':delay,
																				   'transition-delay':delay}).addClass('active');
			});
			if ( getSize() !== 'small' && getSize() !== 'medium'){
				if (panner) {
					for(var p = 0; p < panner.length; p++){
						controller.removeScene(panner[p]);
					}
					$('[data-pan]').removeAttr('style');
				}
			}else{
				$('[data-pan]').each(function(){
					if(!panner){
						$(this).css('margin-left', '0');
						var pad = $(this).parents('.active').innerWidth() - $(this).parents('.active').width();
						var panto = $(window).outerWidth() - $(this).outerWidth() - pad;
						
						var panLeft = new TimelineMax()
													.add(TweenMax.to($(this), 0.025, {marginLeft: panto}));
						
						var panee = $(this).attr('id');
						var panscene = new ScrollMagic.Scene({
											  triggerElement: '#'+panee,
											  duration: $(this).height(),
											  tweenChanges: true,
											  reverse: true,
											  offset: $('#'+panee).height()/4 * -1
											})
											.setTween(panLeft);
						
						panner = controller.addScene(panscene);
						$(this).attr('data-scene', panner);
					}
				});
			}
			
			/* Come back to tthis and ditch the jittering
			if( $('footer#colophon') ){
				var fscene = new ScrollMagic.Scene({
					triggerElement: '#page', // starting scene, when the section
				  duration: '100%', // do the thing for the element for its total height
				  tweenChanges: false,
				  reverse: true
					}).addIndicators()
					.setClassToggle('#masthead', 'fixed');
					
					scenes.push(fscene);
			}*/
		}
	}

	function initScrollMagic(size){
		if(typeof ScrollMagic !== 'undefined') {
			controller = new ScrollMagic.Controller();
		
			setupScrollMagic();
		
			$(window).off('resize.setSM').on('resize.setSM', setupScrollMagic);
		
		}

		//Dev Note: tie this to the loading of the section feature images maybe?
		setTimeout(function(){	
			for (s = 0; s < scenes.length; s++){
				controller.addScene(scenes[s]);
			}
		}, 300);
		
	}
	
	$(document).ready(function(){
		init(false);
	});
		
} )( jQuery );