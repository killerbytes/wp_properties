<?php
/*
	Template Name: Category Template
*/
?>

			<?php
				$cat = get_category( get_query_var( 'cat' ) );

				$args = array(
					'child_of' => $cat->cat_ID,
				);
				$categories = get_categories( $args );

			?>

			<ul>
			<?php foreach ($categories as $category) { ?>

				<li><a href="<?php echo $category->slug; ?>"> <?php echo $category->name; ?></a></li>					

			<?php	} ?>
			</ul>


