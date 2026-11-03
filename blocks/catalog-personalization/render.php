<?php

/**
 * Catalog personalization section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$catalogs = get_field('catalogs');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'catalog-personalization-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="catalog-personalization-section__container">
      <div class="catalog-personalization-section__text-wrapper">
        <?php if ($title): ?>
          <div class="catalog-personalization-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller catalog-personalization-section__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="catalog-personalization-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($catalogs): ?>
        <div class="catalog-personalization-section__blocks">
          <?php foreach ($catalogs as $catalog): ?>
            <div class="catalog-personalization-block catalog-personalization-block--<?php echo str_replace('_', '-', $catalog['block_style']) ?>-style">
              <div class="catalog-personalization-block__header">                
                <?php if ($catalog['icon']): ?>
                  <div class="catalog-personalization-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($catalog['icon'], 'full', false, array('class' => 'catalog-personalization-block__icon')); ?>
                  </div>
                <?php endif; ?>

                <?php if ($catalog['title']): ?>
                  <h3 class="catalog-personalization-block__title">
                    <?php echo $catalog['title'] ?>
                  </h3>
                <?php endif; ?>

                <?php if ($catalog['label']): ?>
                  <div class="catalog-personalization-block__label">
                    <?php echo $catalog['label'] ?>
                  </div>
                <?php endif; ?>
              </div>

              <?php if ($catalog['description']): ?>
                <div class="catalog-personalization-block__description">
                  <?php echo $catalog['description'] ?>
                </div>
              <?php endif; ?>
              
              <?php if ($catalog['rectangles']): ?>
                <ul class="catalog-personalization-block__rectangles<?php echo count($catalog['rectangles']) === 4 ? ' catalog-personalization-block__rectangles--four-columns' : '' ?>">
                  <?php foreach ($catalog['rectangles'] as $rectangle): ?>
                    <li class="catalog-personalization-block__rectangle catalog-personalization-block__rectangle--<?php echo str_replace("_", "-", $rectangle['rectangle_style']) ?>-style">
                      <?php if ($rectangle['title']): ?>
                        <p class="grad-text catalog-personalization-block__rectangle-title">
                          <?php echo $rectangle['title'] ?>
                        </p>
                      <?php endif; ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>
              
              <?php if ($catalog['items']): ?>
                <ul class="check-list check-list--catalog-personalization-block<?php echo $catalog['block_style'] === 'white_bg' ? ' check-list--cancel-icon' : ' check-list--lightgreen-bg' ?> catalog-personalization-block__check-list">
                  <?php foreach ($catalog['items'] as $item): ?>
                    <li class="check-list__item">
                      <?php if ($item['name']): ?>
                        <?php echo $item['name'] ?>
                      <?php endif; ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>