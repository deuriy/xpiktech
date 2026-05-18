<?php

/**
 * Timeline Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--white section--timeline';
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

    <?php if( have_rows('card') ): ?>
      <div class="timeline section__timeline">
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
                <div class="timeline__point"><?php echo $index ?></div>

                <div class="timeline-card">
                  <div class="timeline-card__img-wrapper">
                    <?php if ($image_id): ?>
                      <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'timeline-card__img']) ?>
                    <?php endif; ?>
                  </div>

                  <div class="timeline-card__content">
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
</section>
