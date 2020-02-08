<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since EdxStarter 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside id="sidebar" class="sidebar widget-area" role="complementary">

		<?php if ( is_singular() ) { ?>

			<div class="entry-meta sidebar-meta">

				<?php edxstarter_sidebar_meta(); ?>

			</div>

		<?php } ?>

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
