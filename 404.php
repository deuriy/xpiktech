<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package xpiktech
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container error-404__container">
					
				<div class="error-404__img-wrapper">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/404@2x.webp" alt="404" class="error-404__img">
				</div>

				<div class="error-404__text-wrapper">
					
					<div class="error-404__subtitle">
						<?php esc_html_e( 'ERROR 404', 'xpiktech' ); ?>
					</div>

					<h1 class="error-404__title">
						<?php esc_html_e( 'Something’s missing from this build.', 'xpiktech' ); ?>
					</h1>

					<p class="error-404__description">
						<?php esc_html_e( 'The page you’re looking for isn’t here. It may have moved, or it was never part of the spec. Head back and we’ll get you where you need to go.', 'xpiktech' ); ?>
					</p>

					<p class="error-404__comment">
						<?php esc_html_e( '// Missing pieces? Building them is what we do.', 'xpiktech' ); ?>
					</p>

					<div class="buttons-list error-404__buttons-list">
						<a href="<?php echo home_url() ?>" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 error-404__btn">
							<span class="ico ico--arrow-right2"></span>
						</a>
						<a href="<?php echo home_url() ?>" class="btn-darkgreen btn-darkgreen--radius-16 error-404__btn">
							<?php esc_html_e( 'Go to Homepage', 'xpiktech' ); ?>
						</a>
					</div>
				
					<div class="buttons-list error-404__buttons-list error-404__buttons-list--other-pages">
						<a href="<?php echo home_url('services') ?>" class="btn-outline btn-outline--error-404 error-404__btn">
							<?php esc_html_e( 'Our Services', 'xpiktech' ); ?>
						</a>
						<a href="<?php echo home_url('solutions') ?>" class="btn-outline btn-outline--error-404 error-404__btn">
							<?php esc_html_e( 'Our Solutions', 'xpiktech' ); ?>
						</a>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
