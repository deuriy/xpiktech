<?php

/**
 * Geographic coverage section template.
 *
 * @param array $block The block settings and attributes.
 */

$text = get_field('text');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'geographic-coverage-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="geographic-coverage-section__container">      
      <?php if ($text): ?>
        <div class="grad-text geographic-coverage-section__text">
          <?php echo $text ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>