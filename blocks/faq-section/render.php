<?php

/**
 * FAQ Section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style') ?? 'default';
$title = get_field('title');
$description = get_field('description');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'accordion-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$block_style = str_replace('_', '-', $block_style);
$class_name .= ' accordion-section--' . esc_attr($block_style) . '-style';
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="accordion-section__container">
      <div class="accordion-section__text-wrapper">
        <?php if ($title): ?>
          <div class="accordion-section__title-wrapper">
            <h2 class="section-title section-title--smaller grad-text accordion-section__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="accordion-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($items): ?>
        <dl class="accordion-section__items">
          <?php foreach ($items as $key => $item): ?>
            <div class="accordion-panel accordion-section__item<?php echo !$key ? ' accordion-panel--expanded' : '' ?><?php echo $block_style === 'green-gradient' ? ' accordion-panel--green-grad-style' : '' ?>">
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