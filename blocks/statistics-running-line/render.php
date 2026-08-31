<?php

/**
 * What we build section template.
 *
 * @param array $block The block settings and attributes.
 */

$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'statistics-running-line-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="statistics-running-line-section__container">      
      <?php if ($items): ?>
        <ul class="statistics-running-line-section__items">
          <?php foreach ($items as $key => $item): ?>
            <li class="statistics-running-line-section__item">
              <?php if ($item['name']): ?>
                <span class="statistics-running-line-section__item-name">
                  <?php echo $item['name'] ?>
                </span>
              <?php endif; ?>

              <?php if ($item['value']): ?>
                <span class="statistics-running-line-section__item-value">
                  <?php echo $item['value'] ?>
                </span>
              <?php endif; ?>
            </li>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>