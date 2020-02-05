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

<main id="site-content" class="page">

	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {

			the_post();
			?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<div class="container entry-content">

					<?php

					if ( is_singular() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					}

					if ( is_singular() ) {
						the_content();
					} else {
						the_excerpt();
					}

					?>

				</div><!-- .entry-content -->

			</article><!-- .post-ID -->

			<?php
		} // endwhile
	} // endif
	?>

	<div class="pagination">

		<?php
		the_posts_pagination(
			array(
				'prev_text'          => '<i class="fas fa-caret-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'edxstarter' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'edxstarter' ) . '</span><i class="fas fa-caret-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'edxstarter' ) . ' </span>',
			)
		);
		?>

	</div>

</main>

<?php
get_sidebar();

get_footer();
