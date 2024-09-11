
<?php /* Template Name: Blog Page */ 

get_header(); 
$options = get_option( 'sample_theme_options' ); ?>
	
<style>
	/* === BLOG PAGE CSS === */
	.blog-posts { padding:70px 0; } 
	.blog-post { position: relative; -webkit-box-shadow: 0 0 25px rgba(23,23,23,0.10); -moz-box-shadow: 0 0 25px rgba(23,23,23,0.10); -ms-box-shadow: 0 0 25px rgba(23,23,23,0.10); -o-box-shadow: 0 0 25px rgba(23,23,23,0.10); box-shadow: 0 0 25px rgba(23,23,23,0.10); }
	.blog-thumbnail { position: relative; height: 300px; overflow:hidden; }
	.blog-thumbnail > img { display: block; width: 100%; height: 100%; object-fit: cover; }
	.blog-info { position:relative; }
	.blog-info .category { background-color: #000; position: absolute; top: -13px; left: 25px; display: inline-block; padding: 0 10px; height: 26px; line-height: 26px; color: #fff; font-size: 11px; font-weight: 500; }
	.blog-info { background-color: #fff; padding:35px 25px; }
	.blog-info > small { display: block; color: #83858f; font-size: 16px; font-weight: 500; margin:0 0 10px; }
	.blog-info .blog-title { color: #000; font-size: 23px; font-weight: 700; line-height: 35px; margin:0 0 10px; }
	.blog-info > p { color: #000; font-size: 15px; line-height: 29px; font-weight: 500; margin:0 0 20px; }
	.blog-info .lnk-default2 { margin: 0; }
	.blog-info .lnk-default2 i { right: auto; left: 100%; margin: 0 0 0 8px; }
	/* === BLOG PAGE CSS END === */
</style>
	
	<div class="inner-banner">
		<div class="container">
			<h3><?php the_title(); ?></h3>
			<ul class="breadcumb">
				<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
				<li><span class="sep"><i class="fa fa-angle-right"></i></span></li>
				<li><span><?php the_title(); ?></span></li>
			</ul><!-- /.breadcumb -->
		</div><!-- /.container -->
	</div>
	
	<div class="blog-posts">
		<div class="container">
			<div class="row">
			
				<?php  		
					$args = array('post_type' => 'post' ); 
					$loop = new WP_Query( $args );
					while( $loop->have_posts()): $loop->the_post(); 
					$url=wp_get_attachment_url( get_post_thumbnail_id(get_the_id()),'thumbnail');
				?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-12">
						<div class="blog-post">
							<div class="blog-thumbnail">
								<img src="<?php echo $url ?>" alt="">
							</div>
							<div class="blog-info">
								<span class="category">Interior design</span>
								<small><?php echo get_the_date() ?>	</small>
								<h2 class="blog-title"><a href="<?php the_permalink(); ?>" title=""><?php echo wp_trim_words( get_the_title(), 5, '...' ); ?></a></h2>
								<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?> </p>
								<a href="<?php the_permalink(); ?>" title="" class="lnk-default2">View more <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div><!--blog-post end-->
					</div>

				<?php endwhile; ?>
				
			</div>
		</div>
	</div>
	
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile;
	?>
	

<?php get_footer(); ?>