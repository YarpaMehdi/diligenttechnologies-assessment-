<?php 
/*==== SERVICES POST CODE START======*/
function service_posttype() {
	register_post_type( 'service',
		array( 
			'labels' => array( 'name' => __( 'Our Services' ), 'singular_name' => __( 'service' ) ), 'show_in_rest' => true,
			'public' => true, 'has_archive' => true, 'rewrite' => array('slug' => 'service'), 'taxonomies' => array( 'category' ),
		)
	);
}
add_action( 'init', 'service_posttype' );
function service_post_type() {
	$args = array(
        'supports' => array( 'title', 'thumbnail', 'excerpt' ),  'has_archive' => "service", 'taxonomies' => array( 'category' ),
    );
    register_post_type( 'service', $args );
}
add_action( 'init', 'service_post_type', 0 );


/*==== SERVICES POST CODE SHORTCODE STARTS======*/
function service_section(){ 
	
	$string .='<div class="blog-items row">';
		$args = array('post_type' => 'service', 'posts_per_page' => '8');
		$loop = new WP_Query( $args );
		while( $loop->have_posts()) {
		$loop->the_post();			
		$url=wp_get_attachment_url( get_post_thumbnail_id(get_the_id()),'thumbnail');
		$the_title = get_the_title();
		$the_permalink = get_the_permalink();
		$content = get_the_content();
		$the_content = substr($content, 0, 115);
		$the_excerpt = get_the_excerpt();
		$string .= '
            <div class="col-md-4 single-item">
                <div class="item">
                    <div class="thumb"><a href="#"><img src="' . $url .'" alt="entry image"/></a></div>
                    <div class="info">
						<h4><a href="' . $the_permalink .'">' . $the_title .'</a></h4>
						<p>' . $the_excerpt .'</p>
						<a class="btn btn-theme border btn-sm" href="' . $the_permalink .'">Read More</a>
                    </div>
                </div>
            </div>';
		
	} $string .= '</div>';
 
return $string; } add_shortcode('service_shortcode','service_section'); 
/*==== NEW POST CODE END ======*/
?>