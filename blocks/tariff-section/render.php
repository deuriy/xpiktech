<?php

/**
 * Tariff Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--tariff';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <?php if ($title): ?>
      <h2 class="section-title section__title">
        <?php echo wp_kses_post($title) ?>
      </h2>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="section-description section__description">
        <?php echo wp_kses_post($description) ?>
      </div>
    <?php endif; ?>

    <?php if( have_rows('tariff') ): ?>
      <div class="tariff-blocks section__tariff-blocks">        
        <?php while( have_rows('tariff') ): the_row();
          // vars
          $block_style = get_sub_field('block_style');
          $class_name = 'tariff-block--' . str_replace('_', '-', $block_style);

          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $button = get_sub_field('button');

          $button_classes = $button['style'] === 'outline' ? 'btn-outline' : 'btn-darkgreen btn-darkgreen--arrow-rect btn-darkgreen--tariff-block';
        ?>

        <div class="tariff-block <?php echo esc_attr($class_name); ?>">
          <div class="tariff-block__title-and-text">
            <?php if ($title): ?>
              <h3 class="tariff-block__title">
                <?php echo esc_html($title) ?>
              </h3>
            <?php endif ?>

            <?php if ($description): ?>
              <div class="tariff-block__text">
                <?php echo wp_kses_post($description) ?>
              </div>
            <?php endif ?>
          </div>

          <div class="tariff-block__list-and-button">
            <?php if( have_rows('list_item') ): ?>
              <ul class="checkmarks-list checkmarks-list--small tariff-block__list">
                <?php while( have_rows('list_item') ): the_row(); 
                  $text = get_sub_field('text');
                  ?>
                  <li class="checkmarks-list__item"><?php echo esc_html($text) ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>

            <?php if ($button['url'] && $button['text']): ?>
              <div class="tariff-block__btn-wrapper">
                <a href="<?php echo esc_url($button['url']) ?>" class="tariff-block__btn <?php echo esc_attr($button_classes); ?>">
                  <?php echo esc_html($button['text']) ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
