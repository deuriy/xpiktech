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
		<div class="contact-form-popup__form-wrapper-inner">
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

		<div class="contact-form-popup__form-message-wrapper"></div>
	</div>

	<div class="contact-form-popup__img-wrapper">
		<?php if ($contact_form_image_id) : ?>
			<?php echo wp_get_attachment_image($contact_form_image_id, 'full', '', array('class' => 'contact-form-popup__img')); ?>
		<?php endif; ?>
		
		<div class="contact-form-popup__action-btns">
			<button type="button" class="btn-blurred btn-blurred--contact-action contact-form-popup__voice-control-btn" data-voice-control-open="voice-control">
				<span class="ico ico--microphone ico--size-24 btn-blurred__ico"></span>
				<span class="btn-blurred__title">Voice control</span>
				<span class="btn-blurred__text">Activate</span>
			</button>
			<button type="button" class="btn-blurred btn-blurred--contact-action contact-form-popup__actions-list-btn" data-voice-control-open="actions-list">
				<span class="ico ico--list ico--size-24 btn-blurred__ico"></span>
				<span class="btn-blurred__title">Actions list</span>
				<span class="btn-blurred__text">See below</span>
			</button>
		</div>

		<div class="voice-control invisible contact-form-popup__voice-control" id="voice-control">
			<div class="voice-control__header">
				<h3 class="voice-control__title">Voice Control</h3>
				<button type="button" class="voice-control__header-close-btn" data-voice-control-close>
					<span class="ico ico--close ico--size-24"></span>
				</button>
			</div>
			<div class="voice-control__body">
				<div class="voice-control__text">Tap the mic to dictate your details or a command..</div>
				<div class="voice-control__recognized-messages invisible">
					<div class="voice-control__recognized-message voice-control__recognized-message--your">What can you do?</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--chatbot">Say: your name, email, message, or command (for example: <span class="lightgreen">go to Telegram</span>).</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">My First Name Sar..</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">What can you do?</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--chatbot">Say: your name, email, message, or command (for example: <span class="lightgreen">go to Telegram</span>).</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">My First Name Sar..</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">What can you do?</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--chatbot">Say: your name, email, message, or command (for example: <span class="lightgreen">go to Telegram</span>).</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">My First Name Sar..</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">What can you do?</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--chatbot">Say: your name, email, message, or command (for example: <span class="lightgreen">go to Telegram</span>).</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">My First Name Sar..</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">What can you do?</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--chatbot">Say: your name, email, message, or command (for example: <span class="lightgreen">go to Telegram</span>).</div>
					<div class="voice-control__recognized-message voice-control__recognized-message--your">My First Name Sar..</div>
				</div>
			</div>
			<div class="voice-control__btns">
				<button type="button" class="btn-white-transparent voice-control__actions-list-btn">
					<span class="ico ico--list ico--size-24"></span>
				</button>
				<button type="button" class="btn-white-transparent btn-white-transparent--selected voice-control__micro-btn">
					<span class="ico ico--microphone ico--size-24"></span>
				</button>
				<button type="button" class="btn-white-transparent voice-control__close-btn" data-voice-control-close>
					<span class="ico ico--close2 ico--size-24"></span>
				</button>
			</div>
		</div>

		<div class="voice-control invisible contact-form-popup__voice-control contact-form-popup__voice-control--actions-list" id="actions-list">
			<div class="voice-control__header">
				<h3 class="voice-control__title">Actions list</h3>
				<button type="button" class="voice-control__header-close-btn" data-voice-control-close>
					<span class="ico ico--close ico--size-24"></span>
				</button>
			</div>
			<div class="voice-control__body">
				<ul class="voice-control__actions-list">
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="0">What voice commands are available</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="1">How to fill in your details by just dictating them</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="2">How to send a request without using your hands</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="3">How to correct mistakes in your voice input</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="4">What voice commands are available</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="5">How to fill in your details by just dictating them</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="6">How to send a request without using your hands</a></li>
					<li class="voice-control__actions-item"><a href="#" class="voice-control__actions-link" data-index="7">How to correct mistakes in your voice input</a></li>
				</ul>
				
				<div class="voice-control__action-descriptions-list invisible">
					<div class="voice-control__action-description invisible" data-index="0">
						<p><span class="lightgreen">What voice commands are available</span></p>
						<ul class="square-list">
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
						</ul>
					</div>
					<div class="voice-control__action-description invisible" data-index="1">
						<p><span class="lightgreen">How to fill in your details by just dictating them</span></p>
						<ul class="square-list">
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
						</ul>
					</div>
					<div class="voice-control__action-description invisible" data-index="2">
						<p><span class="lightgreen">How to send a request without using your hands</span></p>
						<ul class="square-list">
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
							<li class="square-list__item"><span class="lightgreen">“Help”</span> – to see available commands;</li>
							<li class="square-list__item"><span class="lightgreen">“Back” / “Next”</span> – to navigate between steps;</li>
							<li class="square-list__item"><span class="lightgreen">“Start new request”</span> – to begin filling in a form.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="voice-control__btns">
				<button type="button" class="btn-white-transparent voice-control__micro-btn">
					<span class="ico ico--microphone ico--size-24"></span>
				</button>
				<button type="button" class="btn-white-transparent btn-white-transparent--selected voice-control__actions-list-btn">
					<span class="ico ico--list ico--size-24"></span>
				</button>
				<button type="button" class="btn-white-transparent voice-control__close-btn" data-voice-control-close>
					<span class="ico ico--close2 ico--size-24"></span>
				</button>
			</div>
		</div>
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
								<a href="<?php echo esc_html($social_btn['value']) ?>" class="btn-white btn-white--social" target="_blank">
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

<template id="success-form-message">
	<div class="form-message form-message--success contact-form-popup__form-success-message">
		<div class="form-message__img-wrapper">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/form_success_icon_2x.webp" alt="Request Received" class="form-message__img">
		</div>
		<h3 class="form-message__title">
			Request Received
		</h3>
		<div class="form-message__text">
			<p>Thank you, <span class="form-message__your-name"></span>. Our specialist will contact you at <span class="form-message__your-email"></span> within 24 hours.</p>
		</div>
		<div class="form-message__actions">
			<button type="button" class="btn-lightgrey" data-fancybox-close>Close</button>
			<button class="form-message__contact-repeat-btn btn-mintgreen" type="button">Repeat</button>
		</div>
	</div>
</template>
	
<template id="error-form-message">
	<div class="form-message form-message--error contact-form-popup__form-error-message">
		<div class="form-message__img-wrapper">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/form_error_icon_2x.webp" alt="Error Occurred" class="form-message__img">
		</div>
		<h3 class="form-message__title">
			Error Occurred
		</h3>
		<div class="form-message__text">
			<p>Text: Unfortunately, your request could not be sent. Please try again or contact us directly.</p>
		</div>
		<div class="form-message__actions">
			<button type="button" class="btn-lightgrey" data-fancybox-close>Close</button>
			<button class="form-message__contact-repeat-btn btn-mintgreen" type="button">Repeat</button>
		</div>
	</div>
</template>

<?php wp_footer(); ?>

</body>

</html>