<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="<?php echo is_singular() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="site-header-top">
				<div class="site-header-top-left">
					<!-- Social Nav / Login? -->
					Social Menu
				</div>

				<div class="site-header-top-center">
					<div class="site-branding">
						Site Title / Logo
					</div>
				</div>

				<div class="site-header-top-right">
					<!-- Search -->
					Search
				</div>
			</div>

			<nav class="site-navigation">
				<!-- Main Nav -->
				Main Nav
			</nav>

		</header>
	<?php
