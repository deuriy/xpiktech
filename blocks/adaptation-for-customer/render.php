<?php

/**
 * Adaptation for the customer section template.
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

$class_name = 'adaptation-for-customer-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="adaptation-for-customer-section__container">
      <div class="adaptation-for-customer-section__text-wrapper">
        <?php if ($title): ?>
          <div class="adaptation-for-customer-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller adaptation-for-customer-section__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="adaptation-for-customer-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($catalogs): ?>
        <div class="adaptation-for-customer-section__blocks">
          <?php foreach ($catalogs as $catalog): ?>
            <div class="adaptation-for-customer-block adaptation-for-customer-block--<?php echo str_replace('_', '-', $catalog['block_style']) ?>-style">
              <?php if ($catalog['title']): ?>
                <h3 class="adaptation-for-customer-block__title">
                  <?php echo $catalog['title'] ?>
                </h3>
              <?php endif; ?>

              <?php if ($catalog['description']): ?>
                <div class="adaptation-for-customer-block__description">
                  <?php echo $catalog['description'] ?>
                </div>
              <?php endif; ?>
              
              <?php if ($catalog['products']): ?>
                <ul class="adaptation-for-customer-block__products">
                  <?php foreach ($catalog['products'] as $product): ?>
                    <li class="adaptation-for-customer-block__product">
                      <?php if ($product['icon']): ?>
                        <div class="adaptation-for-customer-block__product-icon-wrapper">
                          <?php echo wp_get_attachment_image($product['icon'], 'full', false, array('class' => 'adaptation-for-customer-block__product-icon')); ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($product['name']): ?>
                        <p class="adaptation-for-customer-block__product-name">
                          <?php echo $product['name'] ?>
                        </p>
                      <?php endif; ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>

              <?php if ($catalog['visitors_percentage']['value'] || $catalog['visitors_percentage']['text']): ?>
                <div class="adaptation-for-customer-block__visitors-percentage">
                  <?php if ($catalog['visitors_percentage']['value']): ?>
                    <p class="adaptation-for-customer-block__visitors-percentage-value">
                      <?php echo $catalog['visitors_percentage']['value'] ?>%
                    </p>
                  <?php endif; ?>

                  <?php if ($catalog['visitors_percentage']['text']): ?>
                    <p class="adaptation-for-customer-block__visitors-percentage-text">
                      <?php echo $catalog['visitors_percentage']['text'] ?>
                    </p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>