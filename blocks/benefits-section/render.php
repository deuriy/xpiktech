<?php

/**
 * Benefits section template.
 *
 * @param array $block The block settings and attributes.
 */

$benefits = get_field('benefits');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'benefits-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="benefits-section__container">      
      <?php if ($benefits): ?>
        <?php foreach ($benefits as $key => $benefit): ?>
          <div class="benefits-block">
            <?php if ($benefit['icon']) : ?>
              <div class="benefits-block__icon-wrapper">
                <?php echo wp_get_attachment_image($benefit['icon'], 'full', false, array('class' => 'benefits-block__icon')); ?>
              </div>
            <?php endif; ?>

            <?php if ($benefit['title']): ?>
              <h3 class="benefits-block__title">
                <?php echo $benefit['title'] ?>
              </h3>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>