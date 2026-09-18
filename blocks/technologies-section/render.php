<?php

/**
 * Technologies section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$categories = get_field('categories');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'technologies-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="technologies-section__text-wrapper">
    <?php if ($title): ?>
      <h2 class="section-title section-title--left section-title--smaller technologies-section__title">
        <?php echo $title ?>
      </h2>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="technologies-section__description">
        <?php echo $description ?>
      </div>
    <?php endif; ?>
  </div>
  
  <?php if ($categories): ?>
    <div class="technology-categories">
      <?php foreach ($categories as $category_key => $category): ?>
        <div class="technology-categories__category">
          <div class="technology-categories__category-inner">
            <?php if ($category['category_name']): ?>
              <h3 class="technology-categories__category-name">
                <?php echo $category['category_name'] ?>
              </h3>
            <?php endif; ?>

            <?php if ($category['technologies']): ?>
              <ul class="technology-categories__technology-list">
                <?php foreach ($category['technologies'] as $technology_key => $technology): ?>
                  <li class="technology-categories__technology">
                    <?php if ($technology['icon']): ?>
                      <?php echo wp_get_attachment_image($technology['icon'], 'full', false, ['class' => 'technology-categories__technology-icon']) ?>
                    <?php endif; ?>

                    <?php if ($technology['technology_name']): ?>
                      <span class="technology-categories__technology-name">
                        <?php echo $technology['technology_name'] ?>
                      </span>
                    <?php endif; ?>
                  </li>
                <?php endforeach;?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach;?>
    </div>
  <?php endif; ?>
</section>