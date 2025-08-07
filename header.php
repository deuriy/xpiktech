<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpiktech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="wrapper">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'xpiktech'); ?></a>

		<div class="offcanvas" id="main-nav-sidebar">
			<button class="offcanvas__close-btn" type="button" data-offcanvas-close>
				<span class="ico ico--close ico--size-24"></span>
			</button>

			<div class="offcanvas__container">
				<div class="offcanvas__header">
					<?php the_custom_logo(); ?>
				</div>

				<nav id="site-navigation" class="main-navigation main-navigation--mobile">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'      => 'main-navigation__list',
						)
					);
					?>
				</nav><!-- #site-navigation -->

				<div class="offcanvas__footer">
					<div class="buttons-list buttons-list--offcanvas offcanvas__buttons-list">
						<a href="#" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 banner__btn">
							<span class="ico ico--arrow-right2"></span>
						</a>
						<a href="#" class="btn-darkgreen btn-darkgreen--radius-16 banner__btn">Request a Free Demo</a>
					</div>
				</div>
			</div>
		</div>

		<header id="masthead" class="header">
			<div class="container">
				<div class="header__container">
					<?php the_custom_logo(); ?>

					<nav id="site-navigation" class="main-navigation hidden-sm-minus">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'      => 'main-navigation__list',
							)
						);
						?>
					</nav><!-- #site-navigation -->

					<div class="header__buttons hidden-sm-minus">
						<a href="#contact-form-popup" class="btn-darkgreen" data-fancybox>Contact Us</a>
						<a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--padding-10" data-fancybox>
							<span class="ico ico--arrow-left"></span>
						</a>
					</div>

					<button type="button" class="menu-toggle hidden-md-plus" data-offcanvas-toggle data-offcanvas-id="main-nav-sidebar"></button>
				</div>
			</div>
		</header><!-- #masthead -->