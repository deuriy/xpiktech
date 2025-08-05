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

		<header id="masthead" class="header">
			<div class="container">
				<div class="header__container">
					<?php the_custom_logo(); ?>
					<?php if (false): ?>
						<div class="site-branding">
							<?php
							the_custom_logo();
							if (is_front_page() && is_home()) :
							?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							else :
							?>
								<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$xpiktech_description = get_bloginfo('description', 'display');
							if ($xpiktech_description || is_customize_preview()) :
							?>
								<p class="site-description"><?php echo $xpiktech_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																						?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					<?php endif; ?>

					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle hidden-sm-plus" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'xpiktech'); ?></button>
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

					<div class="header__buttons">
						<a href="#" class="btn-darkgreen">Contact Us</a>
						<a href="#" class="btn-darkgreen btn-darkgreen--padding-10">
							<span class="ico ico--arrow-left"></span>
						</a>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->