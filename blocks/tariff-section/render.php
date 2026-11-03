<?php

/**
 * Tariff Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$block_type = get_field('block_type') ?? 'default';
$description = get_field('description');
$note = get_field('note');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--tariff section--tariff-' . str_replace('_', '-', $block_type);
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <?php if ($title): ?>
      <div class="section__title-wrapper">
        <h2 class="section-title section__title<?php echo $block_type === 'smart_ai_catalog' ? ' section-title--smaller grad-text' : '' ?>">
          <?php echo wp_kses_post($title) ?>
        </h2>
      </div>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="section-description section__description">
        <?php echo wp_kses_post($description) ?>
      </div>
    <?php endif; ?>

    <?php if( have_rows('tariff') ): ?>
      <div class="tariff-blocks section__tariff-blocks tariff-blocks--<?php echo str_replace('_', '-', $block_type) ?>">        
        <?php while( have_rows('tariff') ): the_row();
          // vars
          if ($block_type === 'default') {
            $block_style = get_sub_field('block_style');
            $class_name = 'tariff-block--' . str_replace('_', '-', $block_style);
          } else if ($block_type === 'smart_ai_catalog') {
            $block_style = get_sub_field('smart_ai_catalog_block_style');
            $class_name = 'tariff-block--smart-catalog tariff-block--smart-catalog-' . str_replace('_', '-', $block_style);
          }

          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $button = get_sub_field('button');
          $price = get_sub_field('price');

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
          
          <?php if ($block_type === 'smart_ai_catalog'): ?>
            <?php if ($price['value'] || $price['suffix']): ?>
              <p class="tariff-block__price">
                <?php if ($price['value']): ?>
                  <span class="tariff-block__price-value grad-text">
                    <?php echo esc_html($price['value']) ?>
                  </span>
                <?php endif ?>

                <?php if ($price['suffix']): ?>
                  <span class="tariff-block__price-suffix">
                    <?php echo esc_html($price['suffix']) ?>
                  </span>
                <?php endif ?>
              </p>
            <?php endif ?>
          <?php endif ?>

          <div class="tariff-block__list-and-button">
            <?php if( have_rows('list_item') ): ?>
              <ul class="tariff-block__list <?php echo $block_type === 'smart_ai_catalog' ? 'check-list check-list--white-bg-item check-list--tariff-block' : 'checkmarks-list checkmarks-list--small ' ?>">

                <?php while( have_rows('list_item') ): the_row(); 
                  $text = get_sub_field('text');
                ?>

                  <li class="<?php echo $block_type === 'smart_ai_catalog' ? 'check-list__item' : 'checkmarks-list__item' ?>">
                    <?php echo esc_html($text) ?>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
            
            <?php if ($block_type === 'smart_ai_catalog'): ?>
              <?php if ($button['text']): ?>
                <div class="buttons-list tariff-block__buttons-list">
                  <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 tariff-block__btn" data-fancybox>
                    <span class="ico ico--arrow-right2"></span>
                  </a>
                  <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 tariff-block__btn" data-fancybox>
                    <?php echo $button['text'] ?>
                  </a>
                </div>
              <?php endif; ?>
            <?php else: ?>
              <?php if ($button['url'] && $button['text']): ?>
                <div class="tariff-block__btn-wrapper">
                  <a href="<?php echo esc_url($button['url']) ?>" class="tariff-block__btn <?php echo esc_attr($button_classes); ?>" data-fancybox>
                    <?php echo esc_html($button['text']) ?>
                  </a>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php if ($note): ?>
      <div class="section__note">
        <?php echo wp_kses_post($note) ?>
      </div>
    <?php endif; ?>
  </div>
</section>
