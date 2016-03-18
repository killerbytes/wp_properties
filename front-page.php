<?php
/*

	Template Name: Front Page Template

*/

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-12 <?php echo of_get_option( 'site_layout', 'no entry' ); ?>">
		<main id="main" class="site-main" role="main">

			<?php 
				$posts = get_posts(array(
					'post_type'			=> 'property',
					'meta_key'		=> 'featured',
					'meta_value'	=> true,
				));

				$args = array(
					'post_type'			=> 'property',
					'meta_key'		=> 'featured',
					'meta_value'	=> true
				);

				$query = new WP_Query( $args );


				// foreach ($posts as $post) {
				// 	print_r($post);
				// 	// echo $post->post_thumbnail;
				// }

			?>

			<div class="jssor-slider">
			    <!-- Slides Container -->
			    <div u="slides">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div>
							<?php echo the_post_thumbnail('large', array( 'u' => 'image' )); ?>
							<div class="slider-content">
								<div class="slider-content-bg"></div>
								<div class="slider-text">
                            		<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                            		<small class="pull-right"><?php echo the_field('location'); ?></small></br>
                            		<small>P<?php echo the_field('price'); ?></small>
                				</div>
							</div>

						</div>
					<?php endwhile; // end of the loop. ?>
			    </div>
		        <div u="navigator" class="jssorb01" style="bottom: 16px; right: 10px;">
		            <!-- bullet navigator item prototype -->
		            <div u="prototype"></div>
		        </div>
		        <!-- Arrow Left -->
		        <span u="arrowleft" class="jssora09l" style="top: 123px; left: 8px;">
		        </span>
		        <!-- Arrow Right -->
		        <span u="arrowright" class="jssora09r" style="top: 123px; right: 8px;">
		        </span>


			</div>
			    <hr>


			<div class="row">
				<div class="col-md-4">
					<div class="widget">
						<h2>Recent Properties</h2>
						<?php 
							$args = array(
								'post_type' => 'property',
								'order' => 'ASC',
								'orderby' => 'date'
							);
							$query = new WP_Query( $args );
						?>
						<ul>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<li>
								<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></br>
								<?php echo the_field('location'); ?>
								<strong class="pull-right">P<?php echo the_field('price'); ?></strong>
							</li>


						<?php endwhile; // end of the loop. ?>
						</ul>
					</div>

				</div>
				<div class="col-md-4">
					<h2>Search Properties</h2>
					<div style="padding:10px;">
						<?php get_search_form(); ?>					
					</div>
				</div>
				<div class="col-md-4">
					 <?php the_widget( 'WP_Widget_Recent_Posts' ); ?> 

				</div>
			</div>




		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
