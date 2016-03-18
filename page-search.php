<?php
/*
	Template Name: Search Template
*/
?>

<?php get_header(); ?>
	<div id="content" class="site-content container">
		<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
			<main id="main" class="site-main" role="main">
			<?php  

				$q = array();

				if( $_GET['location'] != 0 ){
					$q[] = $_GET['location'];
				}
				if( $_GET['developer'] != 0 ){
					$q[] = $_GET['developer'];
				}
				if( $_GET['price'] != 0 ){
					$q[] = $_GET['price'];
				}

				$args = array(
					'category__and' => $q,
					'post_type' => 'property'
				);

				$query = new WP_Query( $args );


			?>
			<?php if ( $query->have_posts() ) : ?>

				<?php include(locate_template('partial-result.php')); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
