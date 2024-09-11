<?php /* Template Name: Home Page */ 

get_header(); 
$options = get_option( 'sample_theme_options' ); ?>
	
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
	?>
	
	


<?php get_footer(); ?>