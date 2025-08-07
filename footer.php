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

$contact_form_title = get_field('contact_form_title', 'option');
$contact_form_description = get_field('contact_form_description', 'option');
$contact_form_image_id = get_field('contact_form_image', 'option');
$contact_form_buttons = get_field('contact_form_buttons', 'option');

?>

<div id="contact-form-popup" class="contact-form-popup" style="display: none;" data-selectable>
	<div class="contact-form-popup__form-wrapper">
		<?php if ($contact_form_title): ?>
			<h3 class="contact-form-popup__title">
				<?php echo esc_html($contact_form_title) ?>
			</h3>
		<?php endif; ?>

		<?php if ($contact_form_description) : ?>
			<div class="contact-form-popup__description">
				<?php echo wp_kses_post($contact_form_description) ?>
			</div>
		<?php endif; ?>

		<?php echo do_shortcode('[contact-form-7 id="e348cfc" title="24/7 Contact Us" html_class="contact-form"]') ?>
	</div>

	<div class="contact-form-popup__img-wrapper">
		<?php if ($contact_form_image_id) : ?>
			<?php echo wp_get_attachment_image($contact_form_image_id, 'full', '', array('class' => 'contact-form-popup__img')); ?>
		<?php endif; ?>
	</div>

	<?php if ($contact_form_buttons) : ?>
		<div class="contact-buttons contact-form-popup__contact-buttons">
			<ul class="contact-buttons__list">
				<?php foreach ($contact_form_buttons as $contact_form_btn): ?>
					<?php
					$contact_link = '';
					$contact_value = '';

					switch ($contact_form_btn['network']) {
						case 'email':
							$contact_link = 'mailto:' . $contact_form_btn['value'];
							$contact_value = $contact_form_btn['value'];
							break;

						case 'linkedin':
							$contact_link = 'https://www.linkedin.com/in/' . $contact_form_btn['value'];
							$contact_value = '@' . $contact_form_btn['value'];
							break;

						case 'telegram':
							$contact_link = 'https://t.me/' . $contact_form_btn['value'];
							$contact_value = '@' . $contact_form_btn['value'];
							break;
					}
					?>

					<li class="contact-buttons__item">
						<a href="<?php echo $contact_link ?>" class="contact-btn contact-btn--<?php echo $contact_form_btn['network'] ?>" target="_blank">
							<?php if ($contact_form_btn['title']): ?>
								<h4 class="contact-btn__title">
									<?php echo $contact_form_btn['title'] ?>
								</h4>
							<?php endif; ?>

							<?php if ($contact_value): ?>
								<div class="contact-btn__value">
									<?php echo $contact_value ?>
								</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>

<footer id="colophon" class="footer">
	<div class="container">
		<div class="footer__container">
			<div class="footer__top">
				<?php if ($footer_logo_id) : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="footer__logo">
						<?php echo wp_get_attachment_image($footer_logo_id, 'full', '', array('class' => 'footer__logo-img')); ?>
					</a>
				<?php endif; ?>
			</div>

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
								<a href="mailto:<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--social">
									<span class="ico ico--email"></span>
								</a>
							<?php elseif ($social_btn['social_networks'] == 'phone') : ?>
								<a href="tel:<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--social">
									<span class="ico ico--phone"></span>
								</a>
							<?php else: ?>
								<a href="<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--social">
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