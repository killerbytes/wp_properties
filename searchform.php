<?php 
	
	$location = array(
		'name' => 'location',
		'child_of'                 => 16,
		'hierarchical'             => 1,
	    'show_option_all' => 'Select...',
	    'selected' => isset($_GET['location']) ? $_GET['location'] : '',
	    'class'	=>	'form-control'
	); 			

	$developer = array(
		'name' => 'developer',
		'child_of'                 => 14,
		'hierarchical'             => 1,
	    'show_option_all' => 'Select...',
	    'selected' => isset($_GET['developer']) ? $_GET['developer'] : '',
	    'class'	=>	'form-control'
	); 			

	$price = array(
		'name' => 'price',
		'child_of'                 => 13,
		'hierarchical'             => 1,
	    'show_option_all' => 'Select...',
	    'selected' => isset($_GET['price']) ? $_GET['price'] : '',
	    'class'	=>	'form-control'
	); 			


?>
 
<form method="get" class="form-search" action="/search">
	<div class="form-group">
		<label>Location</label>
    	<?php wp_dropdown_categories( $location ); ?> 
	</div>
	<div class="form-group">
		<label>Developer</label>
    	<?php wp_dropdown_categories( $developer ); ?> 
	</div>
	<div class="form-group">
		<label>Price</label>
    	<?php wp_dropdown_categories( $price ); ?> 
	</div>
	<div class="form-group">
  		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search">Search</button>
	</div>

</form>