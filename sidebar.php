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

			<?php
		}

		if ( has_nav_menu( 'sidebar' ) ) {
			?>
			<div class="widget">
				<h2 class="widget-title"><?php esc_html_e( 'Site Menu', 'edxstarter' ); ?></h2>
				<div class="widget-content">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'sidebar',
							'depth'          => 1,
						)
					);
					?>
				</div>
			</div>
			<?php
		}

		dynamic_sidebar( 'sidebar-1' );
		?>

	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
