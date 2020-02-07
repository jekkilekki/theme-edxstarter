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

				<div class="container">

					<?php
					/* Footer Widgets */
					if ( is_active_sidebar( 'sidebar' ) ) {
						?>

						<aside id="sidebar-footer" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer Widgets', 'edxstarter' ); ?>">
							<?php dynamic_sidebar( 'sidebar-footer' ); ?>
						</aside><!-- #sidebar-footer -->

						<?php
					}
					?>

				</div><!-- .container -->

				<div class="colophon">

					<?php
					/* Footer Menu / Social Menu */
					$footer_top_classes = '';

					$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
					$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

					if ( $has_footer_menu || $has_social_menu ) {
						?>
						<div class="container footer-top<?php echo $footer_top_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
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
							<?php if ( $has_social_menu ) { ?>

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

							<?php } ?>
						</div><!-- .footer-top -->

						<?php
					}

					/* Copyright / Credits / To Top */
					?>

					<div class="container">

						<div class="footer-credits">

							<p class="footer-copyright">&copy;
								<?php
								echo date_i18n( // phpcs:ignore
									/* translators: Copyright date format, see https://secure.php.net/date */
									esc_html_x( 'Y', 'copyright date format', 'twentytwenty' )
								);
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</p><!-- .footer-copyright -->

							<p class="powered-by-wordpress">
								<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
									<?php esc_html_e( 'Powered by WordPress', 'twentytwenty' ); ?>
								</a>
							</p><!-- .powered-by-wordpress -->

						</div><!-- .footer-credits -->

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

					</div><!-- .container -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
