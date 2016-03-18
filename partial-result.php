<?php
/*
	Template Name: Partial Result Template
*/
?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<div class="media">
		<div class="media-left pull-left">
			<a href="<?php echo the_permalink(); ?>">
				<?php echo the_post_thumbnail('thumbnail'); ?>
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
			<span>Location: </span>	<?php echo the_field('location'); ?> </br>
			<span>Price: </span> <strong><?php echo the_field('price'); ?> </strong>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>
