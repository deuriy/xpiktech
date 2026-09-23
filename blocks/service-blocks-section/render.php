<?php

/**
 * Service Blocks Section template.
 *
 * @param array $block The block settings and attributes.
 */

$service_blocks = get_field('service_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'service-blocks-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="service-blocks-section__container">
      <?php if ($service_blocks): ?>
        <div class="service-blocks service-blocks-section__service-blocks service-blocks--style-3">
          <?php foreach ($service_blocks as $service_block): ?>
            <div class="service-block service-blocks__item service-block--style-3">
              <?php if ($service_block['image']) : ?>
                <?php echo wp_get_attachment_image($service_block['image'], 'full', false, array('class' => 'service-block__img')); ?>
              <?php endif; ?>

              <?php if ($service_block['title']): ?>
                <h3 class="service-block__title grad-text">
                  <?php echo wp_kses_post($service_block['title']) ?>
                </h3>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>