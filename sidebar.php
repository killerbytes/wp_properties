<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package dazzling
 */
?>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<h2>Search Properties</h2>
			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
