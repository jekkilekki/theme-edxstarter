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
		<article class="post-<?php echo esc_attr( get_the_ID() ); ?>">

			<header class="post-header">

				<a class="post-title-link" href="' . esc_url( get_the_permalink() ) . '">
					<?php the_title( '<h1 class="post-title"><span>', '</span></h1>' ); ?>
				</a>

			</header>

			<div class="entry-content container">

			<?php if ( has_post_thumbnail() ) { ?>

				<a class="post-featured-image" href="' . esc_url( get_the_permalink() ) . '">
					<?php the_post_thumbnail(); ?>
				</a>

				<?php
			}

			if ( is_category() || is_archive() ) {
				the_excerpt();
			} else {
				the_content();
			}

			?>

			</div><!-- .entry-content .container -->

		</article>	

			<?php

		endwhile;

	endif;
	?>

</main>

<?php
get_footer();
