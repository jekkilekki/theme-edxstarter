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

<main id="site-content" class="page <?php echo is_singular() ? 'is-singular' : 'is-archive'; ?>">

	<div class="site-content-container">

	<?php
	if ( have_posts() ) {
		?>

		<div class="post-content">

		<?php if ( ! is_singular() ) { ?>
			<h3 class="page-title"><?php esc_html_e( 'Page Title', 'edxstarter' ); ?></h3>
		<?php } ?>

		<?php
		while ( have_posts() ) {

			the_post();
			?>

			<article <?php post_class( 'entry' ); ?> id="post-<?php the_ID(); ?>">

				<?php if ( has_post_thumbnail() ) { ?>

					<a class="post-featured-image-link" href="<?php echo esc_url( get_the_permalink() ); ?>">
						<div class="post-featured-image" style="background: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>"></div>
					</a>

				<?php } ?>

				<header class="entry-header">

					<?php
					if ( is_single() ) {
						?>

						<div class="entry-meta">
							<?php edxstarter_single_top_meta(); ?>
						</div>

						<?php
						the_title( '<h1 class="entry-title">', '</h1>' );

						if ( has_excerpt() ) {
							?>
							<div class="entry-intro">
								<?php the_excerpt(); ?>
							</div>
							<?php
						}
						?>

						<hr class="post-divider" />

						<?php
					} elseif ( is_singular() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					}
					?>

				</header>

				<div class="entry-content">

				<?php

				if ( is_singular() ) {
					the_content();
				} else {
					the_excerpt();
				}

				?>
				</div>

				<footer class="entry-footer footer-meta entry-meta">

					<?php if ( is_single() ) { ?>
						<hr class="post-divider" />'
					<?php } ?>
					<?php edxstarter_entry_footer(); ?>

				</footer>

			</article>

			<?php

		} // endwhile
		?>

		<?php
		the_posts_pagination(
			array(
				'prev_text'          => '<i class="fas fa-caret-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'edxstarter' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'edxstarter' ) . '</span><i class="fas fa-caret-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'edxstarter' ) . ' </span>',
			)
		);
		?>

		</div><!-- .post-content -->

		<?php
	} // endif

	?>

	<?php get_sidebar(); ?>

	</div><!-- .site-content-container -->

</main>

<?php
get_footer();
