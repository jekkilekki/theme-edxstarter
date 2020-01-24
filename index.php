<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0
 */

get_header();
?>

<main class="site-content" id="page">

	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();

	?>
	<article class="entry-content post-<?php echo esc_attr( get_the_ID() ); ?>">
		<?php

			the_title( '<h1 class="post-title"><span>', '</span></h1>' );
			if ( has_post_thumbnail() ) {
				echo '<div class="post-featured-image">';
				the_post_thumbnail();
				echo '</div>';
			}
			the_content();
		?>
	</article>	

	<?php

		endwhile;

	endif;
	?>

</main>

<?php
get_footer();
