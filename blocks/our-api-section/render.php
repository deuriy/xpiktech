<?php

/**
 * Our API Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'our-api-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="our-api-section__container">
      <div class="our-api-section__text-wrapper">
        <?php if ($title): ?>
          <h2 class="section-title section-title--smaller our-api-section__title">
            <?php echo $title ?>
          </h2>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="our-api-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($items): ?>
        <div class="our-api-section__items">
          <?php foreach ($items as $item): ?>
            <div class="our-api-section__item">
              <?php if ($item['icon']) : ?>
                <?php echo wp_get_attachment_image($item['icon'], 'full', false, array('class' => 'our-api-section__item-icon')); ?>
              <?php endif; ?>

              <?php if ($item['title']): ?>
                <h3 class="our-api-section__item-title">
                  <?php echo esc_html($item['title']) ?>
                </h3>
              <?php endif; ?>

              <?php if ($item['text']): ?>
                <div class="our-api-section__item-text">
                  <?php echo wp_kses_post($item['text']) ?>
                </div>
              <?php endif; ?>

              <?php if ($item['note']): ?>
                <div class="our-api-section__item-note">
                  <?php echo wp_kses_post($item['note']) ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>