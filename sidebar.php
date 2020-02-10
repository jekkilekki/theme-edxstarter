<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since EdxStarter 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) : ?>
	<aside id="sidebar" class="sidebar widget-area" role="complementary">
		<?php
		if ( is_single() ) {
			edxstarter_entry_sidebar();
		}
		?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
