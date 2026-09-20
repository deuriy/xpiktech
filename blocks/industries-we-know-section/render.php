<?php

/**
 * Industries we know section template.
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

$class_name = 'industries-we-know-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="industries-we-know-section__container">
      <?php if ($title): ?>
        <div class="industries-we-know-section__title-wrapper">
          <h2 class="section-title section-title--smaller grad-text industries-we-know-section__title">
            <?php echo $title ?>
          </h2>
        </div>
      <?php endif; ?>
      
      <?php if ($description): ?>
        <div class="industries-we-know-section__description">
          <?php echo $description ?>
        </div>
      <?php endif; ?>
      
      <?php if ($items): ?>
        <ul class="industries-we-know-section__items">
          <?php foreach ($items as $key => $item): ?>
            <li class="how-we-work-block how-we-work-block--v2 industries-we-know-section__item">
              <?php if ($item['icon']): ?>
                <div class="how-we-work-block__icon-wrapper">
                  <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'how-we-work-block__icon']) ?>
                </div>
              <?php endif; ?>

              <div class="how-we-work-block__text-wrapper">
                <?php if ($item['title']): ?>
                  <h3 class="how-we-work-block__title grad-text">
                    <?php echo $item['title'] ?>
                  </h3>
                <?php endif; ?>

                <?php if ($item['text']): ?>
                  <div class="how-we-work-block__text">
                    <?php echo $item['text'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>