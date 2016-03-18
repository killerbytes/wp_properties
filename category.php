<?php get_header(); ?>

<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout', 'no entry' ); ?>">
		<main id="main" class="site-main" role="main">
			<?php
				$categories = get_category( get_query_var( 'cat' ) );

				$args = array(
					'post_type' => 'property',
					'cat' => $categories->cat_ID
				);
				// $args = array(
				// 	'post_type' => 'property',
				// 	'category__and' => array( 3, 11 )
				// );
				$query = new WP_Query( $args );

			?>
			<?php include(locate_template('partial-result.php')); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
