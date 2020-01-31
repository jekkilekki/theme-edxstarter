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

	<div class="container">

	<?php
	if ( have_posts() ) :
		?>

		<section class="site-articles-list">

		<h3 class="page-title">Page Title</h3>

		<?php
		while ( have_posts() ) :

			the_post();

			?>
		<article class="entry post-<?php echo esc_attr( get_the_ID() ); ?>">

			<?php if ( has_post_thumbnail() ) { ?>

				<a class="post-featured-image-link" href="<?php echo esc_url( get_the_permalink() ); ?>">
					<div class="post-featured-image" style="background: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>');"></div>
				</a>

			<?php } ?>

			<header class="post-header entry-header">

			<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}
			?>

			</header>

			<div class="entry-content <?php echo is_category() || is_archive() || is_home() ? 'entry-content-archive' : ''; ?>">

				<?php

				if ( is_category() || is_archive() || is_home() ) {
					the_excerpt();
				} else {
					the_content();
				}

				?>

			</div><!-- .entry-content .container -->

			<footer class="entry-footer footer-meta entry-meta">
				<?php edxstarter_entry_footer(); ?>
			</footer>

		</article>	

			<?php

		endwhile;
		?>

	</section><!-- .site-articles-list -->

		<?php
	endif;
	?>

	<?php get_sidebar(); ?>

</div><!-- .container -->

</main>

<?php


get_footer();
