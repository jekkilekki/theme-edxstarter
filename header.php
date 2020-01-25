<?php
/**
 * Header file for the EdxStarter Theme theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edxstarter' ); ?></a>

		<header id="site-header" class="header-footer-group" role="banner">

			<div class="site-header-top">

				<div class="site-header-top-left social-menu-container menu-container">

				<?php
				if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'theme_location' => 'social',
							'depth'          => 1,
						)
					);
				} else {
					echo '<a class="site-admin-link">';
					if ( is_user_logged_in() ) {
						echo 'Admin';
					} else {
						echo 'Login';
					}
					echo '</a>';
				}
				?>

				</div><!-- .site-header-top-left -->

				<div class="site-header-top-center site-branding-container">

					<div class="site-branding">

						<a class="site-logo" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
							?>
						</a>

						<div class="site-identity">
							<h1 class="site-title">
								<a href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
									<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
								</a>
							</h1>
							<p class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></p>
						</div>

					</div><!-- .site-branding -->

				</div><!-- .site-header-top-center -->

				<div class="site-header-top-right search-container">

					<?php get_search_form(); ?>

				</div><!-- .site-header-top-right -->

			</div><!-- .site-header-top -->

			<div class="site-header-bottom main-navigation-wrapper">

				<nav class="header-menu-wrapper" aria-label="<?php esc_attr_e( 'Header Menu', 'edxstarter' ); ?>" role="navigation">

					<ul class="header-menu reset-list-style">

					<?php
					if ( has_nav_menu( 'header' ) ) {
						wp_nav_menu(
							array(
								'container'      => '',
								'items_wrap'     => '%3$s',
								'theme_location' => 'header',
								'fallback_cb'    => 'custom_primary_menu_fallback',
							)
						);
					} else {
						wp_list_pages(
							array(
								'match_menu_classes'  => true,
								'show_sub_menu_icons' => true,
								'title_li'            => false,
								'depth'               => 1,
							)
						);
					}
					?>

					</ul>

				</nav>

			</div><!-- .main-navigation-wrapper -->

		</header><!-- #site-header -->

		<?php
