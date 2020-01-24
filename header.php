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

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'edxstarter' ); ?></a>

		<header id="site-header" class="header-footer-group" role="banner">

			<div class="site-branding">

				<div class="site-logo">
					<img src="" alt="Site Logo" />
				</div>

				<div class="site-identity">
					<h1 class="site-title">Site Title</h1>
					<p class="site-description">Site Description</p>
				</div>

			</div><!-- .site-branding -->

			<div class="main-navigation">
				Main Navigation
			</div>

		</header><!-- #site-header -->

		<?php
