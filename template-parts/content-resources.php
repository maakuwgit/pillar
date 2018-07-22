<?php
/**
 * Displays Resources
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.4
 * @version 2.9
 * @dev this will be made into a custom taxonomy (publication type) and a custom post-type. This will iterate in a for loop
 */

?>
<div class="generic">
	<article class="wrap content" id="publications">
		<div class="cell small-12">
			<h2 class="text-center">Publications</h2>
			<figure class="table resource">
				<?php
					if ( is_user_logged_in() ) {
						$attr = ' href="/wp-content/uploads/Pone-journal7.2017Amplificationof-overlaping-DNA-applicaons-in-singl-tube-multiplexPCrfor-NGS-targeted-.0181062.pdf" target="_blank"';
					}else{
						$attr = ' href="/register/"';
					}
				?>
				<a<?php echo $attr;?> class="cell thumbnail align-top small-12 medium-2">
					<img alt="" src="<?php echo get_theme_file_uri( 'assets/images/fpo-publication-amplification.png' ); ?>">
				</a>
				<figcaption class="cell align-top small-12 medium-10">
					<h5>Amplification of overlapping DNA amplicons in a single-tube multiplex PCR for targeted next-generation sequencing of BRCA1 and BRCA2</h5>
					<p>Schenk D, Song G, Ke Y, Wang Z (2017) Amplification of overlapping DNA amplicons in a singletube multiplex PCR for targeted next-generation sequencing of <em>BRCA1</em> and <em>BRCA2</em>. PLOS ONE 12(7): e0181062. https://doi.org/10.1371/journal.pone.0181062</p>
					<?php if ( is_user_logged_in() ) : ?>
					<a href="/wp-content/uploads/Pone-journal7.2017Amplificationof-overlaping-DNA-applicaons-in-singl-tube-multiplexPCrfor-NGS-targeted-.0181062.pdf" target="_blank">Download&nbsp;<em class="fa fa-chevron-circle-right"></em></a>
					<?php endif; ?>
				</figcaption>
			</figure>
			<figure class="table resource">
				<?php
					if ( is_user_logged_in() ) {
						$attr = ' href="/wp-content/uploads/Peterson_AMP-2016_Pillar_DArtmoutharticle.pdf" target="_blank"';
					}else{
						$attr = ' href="/register/"';
					}
				?>
				<a<?php echo $attr;?> class="cell thumbnail align-top small-12 medium-2">
					<img alt="" src="<?php echo get_theme_file_uri( 'assets/images/fpo-conference_poster-peterson.png' ); ?>">
				</a>
				<figcaption class="cell align-top small-12 medium-10">
					<h5>AMP 2016 Conference Poster Evaluation of the Pillar NGS SLIMamp Lung and Colon Hot Spots Panel</h5>
					<p><em>J. Peterson, F. Blumental de Abreu, Z. Wang, W. Wells, G. Tsongalis, Dartmouth-Hitchcock Medical Center, Lebanon, NH; Pillar Biosciences, Natick, MA</em></p>
					<?php if ( is_user_logged_in() ) : ?>
					<a href="/wp-content/uploads/Peterson_AMP-2016_Pillar_DArtmoutharticle.pdf" target="_blank">Download&nbsp;<em class="fa fa-chevron-circle-right"></em></a>
					<?php endif; ?>
				</figcaption>
			</figure>
		</div>
	</article>
</div>