
<?php get_header(); ?>

<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout', 'no entry' ); ?>">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php echo the_title(); ?></h1>
				<?php the_post_thumbnail(); ?>
				<h5>Location</h5>
				<p><?php echo the_field('location') ?></p>
				<h5>Price</h5>
				<p><strong>P<?php echo the_field('price') ?></strong></p>				
				
				<?php echo the_content(); ?>

				<div class="for-slider">
					<?php echo the_field('images'); ?>
				</div>

				<h5>Photos</h5>
				<div class="slider-container">

				</div>




			<?php endwhile; // end of the loop. ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<script id="controls" type="text/html">
    <span u="arrowleft" class="jssora09l" style="top: 123px; left: 8px;">
    </span>
    <span u="arrowright" class="jssora09r" style="top: 123px; right: 8px;">
    </span>	
</script>
<script id="thumbs" type="text/html">
    <div u="thumbnavigator" class="jssort07" style="left: 0px; bottom: 0px;">
	    <div u="slides" style="cursor: default;">
	        <div u="prototype" class="p">
	            <div u="thumbnailtemplate" class="i"></div>
	            <div class="o"></div>
	        </div>
	    </div>
	</div>
</script>