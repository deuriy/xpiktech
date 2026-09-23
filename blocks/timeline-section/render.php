<?php

/**
 * Timeline Section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style') ?? 'default';
$title = get_field('title');
$description = get_field('description');
$enable_mobile_timeline = get_field('enable_mobile_timeline') ?? false;

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--white section--timeline';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$block_style = str_replace('_', '-', $block_style);
$class_name .= ' section--timeline-' . esc_attr($block_style);
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="section__container">
      <?php if ($title): ?>
        <div class="section__title-wrapper">
          <h2 class="section-title section__title<?php echo $block_style === 'style2' ? ' section-title--smaller grad-text' : '' ?>">
            <?php echo wp_kses_post($title) ?>
          </h2>
        </div>
      <?php endif; ?>

      <?php if ($description): ?>
        <div class="section-description section__description">
          <?php echo wp_kses_post($description) ?>
        </div>
      <?php endif; ?>

      <?php if( have_rows('card') ): ?>
        <div class="timeline section__timeline timeline--<?php echo $block_style ?>"<?php echo !$enable_mobile_timeline ? ' data-desktop-only' : '' ?>>
          <div class="timeline__inner">

            <div class="timeline__progress"></div>
            
              <?php while( have_rows('card') ): the_row();
                // vars
                $index = get_row_index();
                $class_name = $index % 2 !== 0 ? ' timeline__item--left' : ' timeline__item--right';

                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $image_id = get_sub_field('image');
              ?>

                <div class="timeline__item<?php echo esc_attr($class_name); ?>">
                  <div class="timeline__point">
                    <?php echo $block_style === 'default' ? $index : '' ?>
                  </div>

                  <div class="timeline-card timeline-card--<?php echo $block_style ?>">
                    <?php if ($image_id): ?>
                      <div class="timeline-card__img-wrapper">
                        <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'timeline-card__img']) ?>
                      </div>
                    <?php endif; ?>

                    <div class="timeline-card__content">
                      <?php if ($block_style === 'style2'): ?>
                        <h3 class="timeline-card__number">
                          <?php echo str_pad($index, 2, "0", STR_PAD_LEFT) ?>
                        </h3>
                      <?php endif ?>

                      <?php if ($title): ?>
                        <h3 class="timeline-card__title">
                          <?php echo esc_html($title) ?>
                        </h3>
                      <?php endif ?>

                      <?php if ($description): ?>
                        <div class="timeline-card__text">
                          <?php echo wp_kses_post($description) ?>
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
