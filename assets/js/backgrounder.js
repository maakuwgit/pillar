class Backgrounder {
	constructor(target, size)	{
		this.target = ( !target ? jQuery('[data-background]') : target );
		this.size = ( !size ? 'small' : size );
	};
	
	make(size) {
		if( !size ) size = this.size;
		
		jQuery(this.target).each(function(args){
			var is_plax = jQuery(this).attr('data-parallax');
			var feat	 	= jQuery(this).find('div.feature');
			var target  = feat;
			if(feat.length <= 0) target = jQuery(this);
			
			var img 		= jQuery(target).find('img'),
					is_img 	= jQuery(this).hasClass('format-image');

			if(img.length > 0 && is_plax !== 'scroll') {
				var src = jQuery(img).attr('src');
				if(jQuery(img).attr('data-src-xlarge') && size == 'fullsize') src = jQuery(img).attr('data-src-xlarge');
				if(jQuery(img).attr('data-src-large') && size == 'large') src = jQuery(img).attr('data-src-large');
				if(jQuery(img).attr('data-src-medium') && size == 'medium') src = jQuery(img).attr('data-src-medium');
				if(jQuery(this).attr('style')){
					jQuery(feat).delay(500).fadeOut(2000);
					jQuery(this).css('background-image', 'url('+src+')');
				}else{
					jQuery(feat).delay(500).fadeOut(2000);
					jQuery(this).css('background-image','url('+src+')');
				}
			}
		});
	}
	
}