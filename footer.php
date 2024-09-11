<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$options = get_option( 'sample_theme_options' );
?>





<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>





<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/xJquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>

</body>
</html>
