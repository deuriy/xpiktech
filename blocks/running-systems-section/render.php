<?php

/**
 * Running systems section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$systems_slides = get_field('systems_slides');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'running-systems-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="running-systems-section__container">
      <div class="running-systems-section__header">
        <div class="running-systems-section__text-wrapper">
          <?php if ($title): ?>
            <div class="running-systems-section__title-wrapper">
              <h2 class="section-title section-title--left section-title--smaller running-systems-section__title">
                <?php echo $title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($description): ?>
            <div class="running-systems-section__description">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="running-systems-section__buttons">
          <button type="button" class="swiper-btn swiper-btn--prev running-systems-section__prev-btn hidden-xs"></button>
          <button type="button" class="swiper-btn swiper-btn--next running-systems-section__next-btn hidden-xs"></button>
        </div>
      </div>
      
      <?php if ($systems_slides): ?>
        <div class="swiper running-systems-slider">
          <div class="swiper-wrapper running-systems-slider__slides">
            <?php foreach ($systems_slides as $systems_slide): ?>
              <div class="swiper-slide running-systems-slider__slide">
                <div class="running-systems-block">
                  <div class="running-systems-block__text-wrapper">
                    <?php if ($systems_slide['title']): ?>
                      <h3 class="running-systems-block__title grad-text">
                        <?php echo $systems_slide['title'] ?>
                      </h3>
                    <?php endif; ?>

                    <?php if ($systems_slide['description']): ?>
                      <div class="running-systems-block__description">
                        <?php echo $systems_slide['description'] ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($systems_slide['technologies']): ?>
                      <ul class="running-systems-block__technologies-list">
                        <?php foreach ($systems_slide['technologies'] as $technology): ?>
                          <li class="running-systems-block__technologies-item">
                            <?php echo $technology['technology_name'] ?>
                          </li>
                        <?php endforeach;?>
                      </ul>
                    <?php endif; ?>
                  </div>

                  <?php if ($systems_slide['image']): ?>
                    <div class="running-systems-block__img-wrapper">
                      <?php echo wp_get_attachment_image($systems_slide['image'], 'full', false, ['class' => 'running-systems-block__img']) ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach;?>
          </div>

          <div class="swiper-pagination swiper-pagination--thin-lines-style running-systems-slider__pagination"></div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>