<?php

/**
 * More sales section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
$sales_block = get_field('sales_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'more-sales-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="more-sales-section__container">
      <div class="more-sales-section__text-wrapper">
        <?php if ($title): ?>
          <div class="more-sales-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller more-sales-section__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="more-sales-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <div class="more-sales-section__sales-block-wrapper">
        <?php if ($image): ?>
          <?php echo wp_get_attachment_image($image, 'full', false, array('class' => 'more-sales-section__img')); ?>
        <?php endif; ?>
        
        <div class="more-sales-block more-sales-section__sales-block">
          <?php if ($sales_block['title']): ?>
            <p class="more-sales-block__title">
              <?php echo $sales_block['title'] ?>
            </p>
          <?php endif; ?>

          <?php if ($sales_block['icon']): ?>
            <?php echo wp_get_attachment_image($sales_block['icon'], 'full', false, array('class' => 'more-sales-block__icon')); ?>
          <?php endif; ?>

          <?php if ($sales_block['sum']): ?>
            <p class="more-sales-block__sum">
              $<?php echo $sales_block['sum'] ?>
            </p>
          <?php endif; ?>

          <?php if ($sales_block['label']): ?>
            <p class="more-sales-block__label">
              <?php echo $sales_block['label'] ?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>