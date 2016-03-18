<?php
/*
	Template Name: Blog Template
*/
?>
<?php get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout', 'no entry' ); ?>">
		<main id="main" class="site-main" role="main">
			<?php 
				$args = array(
					'post_type' => 'post'
				);
				$query = new WP_Query( $args );
			?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<h1><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h1>
				<?php echo the_excerpt(); ?>
				<div class="clearfix"><a href="<?php echo the_permalink(); ?>" class="btn btn-default pull-right">Read More</a></div>
				<hr>


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
