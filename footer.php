<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpiktech
 */

$footer_logo_id = get_field('footer_logo', 'option');
$site_description = get_field('site_description', 'option');
$social_buttons = get_field('social_buttons', 'option');
$contact_list = get_field('contact_list', 'option');
$copyright = get_field('copyright', 'option');

?>

<footer id="colophon" class="footer">
	<div class="container">
		<div class="footer__container">
			<?php if ($footer_logo_id) : ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="footer__logo">
					<?php echo wp_get_attachment_image($footer_logo_id, 'full', '', array('class' => 'footer__logo-img')); ?>
				</a>
			<?php endif; ?>

			<?php if ($site_description) : ?>
				<div class="footer__site-description">
					<?php echo wp_kses_post($site_description) ?>
				</div>
			<?php endif; ?>

			<?php if ($social_buttons) : ?>
				<ul class="social-buttons footer__social-buttons">
					<?php foreach ($social_buttons as $social_btn): ?>
						<li class="social-buttons__item">
							<?php if ($social_btn['social_networks'] == 'email') : ?>
								<a href="mailto:<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--padding-10">
									<span class="ico ico--email"></span>
								</a>
							<?php elseif ($social_btn['social_networks'] == 'phone') : ?>
								<a href="tel:<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--padding-10">
									<span class="ico ico--phone"></span>
								</a>
							<?php else: ?>
								<a href="tel:<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--padding-10">
									<span class="ico ico--<?php echo $social_btn['social_networks'] ?>"></span>
								</a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ($contact_list): ?>
				<ul class="footer__contacts-list">
					<?php foreach ($contact_list as $contact_item): ?>
						<li class="footer__contact-item">
							<?php echo esc_html($contact_item['value']) ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ($copyright): ?>
				<div class="footer__copyright">
					<?php echo esc_html($copyright) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>