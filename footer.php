<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

?>
			<footer id="site-footer" role="contentinfo" class="page site-footer">

				<!-- <div class="container"> -->

					<?php
					/* Footer Widgets */
					if ( is_active_sidebar( 'sidebar-footer' ) ) {
						?>

						<aside id="sidebar-footer" class="container widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Widgets', 'edxstarter' ); ?>">

							<?php dynamic_sidebar( 'sidebar-footer' ); ?>
						</aside><!-- #sidebar-footer -->

						<?php
					}
					?>

				<!-- </div>.container -->

				<div class="colophon" style="background: black url('<?php esc_url( header_image() ); ?>')">
					<div class="colophon-content">
						<?php
						/* Footer Menu / Social Menu */
						$footer_top_classes = '';

						$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
						$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

						if ( $has_social_menu ) {
							?>

							<?php /* translators: %s: Site name */ ?>
							<p class="follow-us"><?php printf( esc_html__( 'Follow %s', 'twentytwenty' ), esc_html( get_bloginfo( 'name' ) ) ); ?></p>

							<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

								<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

									<?php
									wp_nav_menu(
										array(
											'theme_location'  => 'social',
											'container'       => 'div',
											'container_id'    => 'menu-social',
											'container_class' => 'menu social-menu',
											'menu_id'         => 'menu-social-items',
											'menu_class'      => 'menu-items',
											'depth'           => 1,
											'link_before'     => '<span class="screen-reader-text">',
											'link_after'      => '</span>',
											'fallback_cb'     => '',
										)
									);
									?>

								</ul><!-- .footer-social -->

							</nav><!-- .footer-social-wrapper -->

							<?php
						}

						/* Copyright / Credits / To Top */
						?>

						<p class="footer-credits">
							<span class="footer-copyright">&copy;
								<?php
								echo date_i18n( // phpcs:ignore
									/* translators: Copyright date format, see https://secure.php.net/date */
									esc_html_x( 'Y', 'copyright date format', 'twentytwenty' )
								);
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</span><!-- .footer-copyright -->

							<span class="powered-by-wordpress">
								<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
									<?php esc_html_e( 'Powered by WordPress', 'twentytwenty' ); ?>
								</a>
							</span><!-- .powered-by-wordpress -->

						</p><!-- .footer-credits -->

						<?php if ( $has_footer_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'twentytwenty' ); ?>" role="navigation" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">
								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
							</ul>

						</nav><!-- .site-nav -->

						<?php } ?>

						<a class="to-the-top" href="#site-header">
							<span class="to-the-top-long">
								<?php
								/* translators: %s: HTML character for up arrow */
								printf( esc_html__( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
								?>
							</span><!-- .to-the-top-long -->
							<span class="to-the-top-short">
								<?php
								/* translators: %s: HTML character for up arrow */
								printf( esc_html__( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
								?>
							</span><!-- .to-the-top-short -->
						</a><!-- .to-the-top -->

					</div><!-- .colophon-content -->
				</div><!-- .colophon -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
