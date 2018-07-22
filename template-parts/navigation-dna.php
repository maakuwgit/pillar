<?php
/**
 * Displays callout with nav (only on one template right now)
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 2.6.3
 * @version 2.6.3
 */

?>
<aside id="ngs_panel" class="callout dark wrap active">
	<figure class="wrap relative" data-background>
		<div class="feature">
			<img alt="" src="<?php echo get_theme_file_uri( '/assets/images/hero-callout.jpg' );?>">
		</div>
		<figcaption>
			<h2 class="text-center">Learn more about Pillar's specific NGS panels</h2>
			<nav class="table text-center">
				<button class="button" data-href="/brca12-germline-mutation/">BRCA1/2 Germline Mutation&nbsp;<em class="fa fa-chevron-circle-right"></em></button>
				<button class="button" data-href="/pan-cancer-panel/">Pan Cancer Hotspot&nbsp;<em class="fa fa-chevron-circle-right"></em></button>
				<button class="button" data-href="/lung-colon-cancer-hotspot-panel/">Lung &amp; Colon Cancer Hotspot&nbsp;<em class="fa fa-chevron-circle-right"></em></button>
			</nav>
		</figcaption>
	</figure>
</aside>