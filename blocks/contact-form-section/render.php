<?php

/**
 * Contact form section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$contact_items = get_field('contact_items');
$cf7_shortcode = get_field('cf7_shortcode');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'contact-form-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="contact-form-section__container">
      <div class="contact-form-section__text-wrapper">
        <?php if ($title): ?>
          <div class="contact-form-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller grad-text contact-form-section__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="contact-form-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
        
        <?php if ($contact_items): ?>
          <address class="contact-form-section__items">
            <?php foreach ($contact_items as $key => $contact_item): ?>
              <?php if ($contact_item['icon']): ?>
                <a href="<?php echo $contact_item['link'] ?>" rel="me noopener" target="_blank" class="contact-item contact-form-section__item">
                  <?php echo wp_get_attachment_image($contact_item['icon'], 'full', false, ['class' => 'contact-item__icon']) ?>
                  <span class="contact-item__title">
                    <?php echo $contact_item['title'] ?>
                  </span>
                </a>
              <?php endif; ?>
            <?php endforeach;?>
          </address>
        <?php endif; ?>
      </div>

      <?php if ($cf7_shortcode): ?>
        <div class="contact-form-section__form-wrapper">
          <?php echo do_shortcode($cf7_shortcode) ?>

          <div class="successful-message contact-form-section__successful-message hidden">
            <div class="successful-message__wrapper">
              <img src="<?php echo get_stylesheet_directory_uri() ?>/images/paper_airplane@2x.webp" alt="Message sent successfully" class="successful-message__icon">
              <h3 class="successful-message__title grad-text">Message sent successfully</h3>
              <div class="successful-message__text">
                <p>Thanks! We’ve received your request and will get back to you within one business day.</p>
              </div>
            </div>

            <div class="buttons-list successful-message__buttons-list">
              <button class="btn-dark btn-dark--radius-16 btn-dark--padding-10 successful-message__show-form-btn">
                <span class="ico ico--arrow-right2"></span>
              </button>
              <button class="btn-dark btn-dark--radius-16 successful-message__show-form-btn">Send Another Message</button>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>