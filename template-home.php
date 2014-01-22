<?php 
/*
Template Name: Home
*/
 ?>

<?php 

	/**
	 * Create Home Page Widget Area
	 */
	add_action( 'genesis_after_loop', 'wpc_home_page_widgets' );
	function wpc_home_page_widgets() {
	    genesis_widget_area( 'home-page-widget', array( 'before' => '<div class="container_12">', 'after' => '</div>' ) );
	}
 ?>

 

 <?php genesis(); ?>