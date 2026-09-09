<?php

/**
 * What we build section template.
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

$class_name = 'what-we-build-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="what-we-build-section__container">
      <?php if ($title): ?>
        <h2 class="section-title section-title--smaller grad-text what-we-build-section__title">
          <?php echo $title ?>
        </h2>
      <?php endif; ?>

      <?php if ($description): ?>
        <div class="what-we-build-section__description">
          <?php echo $description ?>
        </div>
      <?php endif; ?>
      
      <?php if ($items): ?>
        <?php if (wp_is_mobile()): ?>
          <div class="swiper what-we-build-swiper">
            <ul class="swiper-wrapper what-we-build-swiper__slides">
              <?php foreach ($items as $key => $item): ?>
                <?php if ($item['block_type'] === 'default_block'): ?>
                  <li class="swiper-slide what-we-build-swiper__slidewhat-we-build-section__item">
                    <article class="what-we-build-block">
                      <?php if ($item['block_url']): ?>
                        <a href="<?php echo $item['block_url'] ?>" class="what-we-build-block__link">
                      <?php endif; ?>

                      <?php if ($item['icon']): ?>
                        <div class="what-we-build-block__icon-wrapper">
                          <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'what-we-build-block__icon']) ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($item['title']): ?>
                        <h3 class="what-we-build-block__title">
                          <?php echo $item['title'] ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($item['text']): ?>
                        <div class="what-we-build-block__text">
                          <?php echo $item['text'] ?>
                        </div>
                      <?php endif; ?>
                    <?php if ($item['block_url']): ?>
                      </a>
                    <?php endif; ?>
                    </article>
                  </li>
                <?php else: ?>
                  <li class="swiper-slide what-we-build-swiper__slide what-we-build-section__item">
                    <a href="<?php echo $item['button']['url'] ?>" class="btn-block">
                      <?php echo $item['button']['text'] ?>
                    </a>
                  </li>
                <?php endif ?>
              <?php endforeach;?>
            </ul>

            <div class="swiper-pagination swiper-pagination--circle-style what-we-build-swiper__pagination"></div>
          </div>
        <?php else: ?>
          <ul class="what-we-build-section__items">
            <?php foreach ($items as $key => $item): ?>
              <?php if ($item['block_type'] === 'default_block'): ?>
                <li class="what-we-build-section__item">
                  <article class="what-we-build-block">
                    <?php if ($item['block_url']): ?>
                      <a href="<?php echo $item['block_url'] ?>" class="what-we-build-block__link">
                    <?php endif; ?>

                    <?php if ($item['icon']): ?>
                      <div class="what-we-build-block__icon-wrapper">
                        <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'what-we-build-block__icon']) ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($item['title']): ?>
                      <h3 class="what-we-build-block__title">
                        <?php echo $item['title'] ?>
                      </h3>
                    <?php endif; ?>

                    <?php if ($item['text']): ?>
                      <div class="what-we-build-block__text">
                        <?php echo $item['text'] ?>
                      </div>
                    <?php endif; ?>
                    
                    <?php if ($item['block_url']): ?>
                      </a>
                    <?php endif; ?>
                  </article>
                </li>
              <?php else: ?>
                <li class="what-we-build-section__item">
                  <a href="<?php echo $item['button']['url'] ?>" class="btn-block">
                    <?php echo $item['button']['text'] ?>
                  </a>
                </li>
              <?php endif ?>
            <?php endforeach;?>
          </ul>
        <?php endif; ?>
        
      <?php endif; ?>
    </div>
  </div>
</section>