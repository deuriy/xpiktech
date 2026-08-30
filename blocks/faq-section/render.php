<?php

/**
 * FAQ Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'accordion-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="accordion-section__container">
      <?php if ($title): ?>
        <div class="accordion-section__title-wrapper">
          <h2 class="section-title section-title--smaller grad-text accordion-section__title">
            <?php echo $title ?>
          </h2>
        </div>
      <?php endif; ?>
      
      <?php if ($items): ?>
        <dl class="accordion-section__items">
          <?php foreach ($items as $key => $item): ?>
            <div class="accordion-panel accordion-section__item<?php echo !$key ? ' accordion-panel--expanded' : '' ?>">
              <dt class="accordion-panel__title-wrapper">
                <div class="grad-text accordion-panel__title">
                  <?php echo $item['question'] ?>
                </div>
              </dt>

              <dd class="accordion-panel__text">
                <?php echo $item['answer'] ?>
              </dd>
            </div>
          <?php endforeach;?>
        </dl>
      <?php endif; ?>
    </div>
  </div>
</section>