<?php

/**
 * What we build section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style');
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

$block_style = str_replace('_', '-', $block_style);
$class_name .= ' what-we-build-section--' . esc_attr($block_style) . '-style';
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="what-we-build-section__container">
      <div class="what-we-build-section__text-wrapper">
        <?php if ($title): ?>
          <h2 class="section-title section-title--smaller what-we-build-section__title<?php echo $block_style !== 'solutions-page' ? ' grad-text' : ' section-title--left' ?>">
            <?php echo $title ?>
          </h2>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="what-we-build-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($items): ?>
        <?php if (wp_is_mobile() && $block_style !== 'services-page' && $block_style !== 'solutions-page'): ?>
          <div class="swiper what-we-build-swiper">
            <ul class="swiper-wrapper what-we-build-swiper__slides">
              <?php foreach ($items as $key => $item): ?>
                <?php if ($item['block_type'] === 'default_block'): ?>
                  <li class="swiper-slide what-we-build-swiper__slide">
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
                  <article class="what-we-build-block<?php echo ' what-we-build-block--' . $block_style; ?>">
                    <?php if (false): ?>
                      <?php if ($item['block_url'] && $block_style !== 'services-page' && $block_style !== 'solutions-page'): ?>
                        <a href="<?php echo $item['block_url'] ?>" class="what-we-build-block__link">
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($item['icon']): ?>
                      <div class="what-we-build-block__icon-wrapper">
                        <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'what-we-build-block__icon']) ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($item['label']['text']): ?>
                      <div class="block-label block-label--<?php echo str_replace('_', '-', $item['label']['style']) ?>-style what-we-build-block__label">
                        <?php echo $item['label']['text'] ?>
                      </div>
                    <?php endif; ?>
                    
                    <div class="what-we-build-block__text-wrapper">
                      <?php if ($item['title']): ?>
                        <h3 class="what-we-build-block__title<?php echo $block_style === 'services-page' || $block_style === 'solutions-page' ? ' grad-text' : '' ?>">
                          <?php if ($item['block_url']): ?>
                            <a href="<?php echo $item['block_url'] ?>" class="what-we-build-block__title-link">
                          <?php endif; ?>

                          <?php echo $item['title'] ?>
                          
                          <?php if ($item['block_url']): ?>
                            </a>
                          <?php endif; ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($item['text']): ?>
                        <div class="what-we-build-block__text">
                          <?php echo $item['text'] ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($block_style === 'services-page' || $block_style === 'solutions-page'): ?>
                        <?php if (false): ?>
                        <a href="<?php echo $item['block_url'] ?>" class="arrow-link what-we-build-block__arrow-link"><?php echo $block_style === 'services-page' ? 'Explore Service' : 'Explore Solution' ?></a>
                        <?php endif ?>

                        <div class="arrow-link what-we-build-block__arrow-link">
                          <?php echo $block_style === 'services-page' ? 'Explore Service' : 'Explore Solution' ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    
                    <?php if (false): ?>
                      <?php if ($item['block_url'] && $block_style !== 'services-page' && $block_style !== 'solutions-page'): ?>
                        </a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </article>
                </li>
              <?php elseif ($item['block_type'] === 'button'): ?>
                <li class="what-we-build-section__item">
                  <a href="<?php echo $item['button']['url'] ?>" class="btn-block">
                    <?php echo $item['button']['text'] ?>
                  </a>
                </li>
              <?php elseif ($item['block_type'] === 'block_with_button'): ?>
                <li class="what-we-build-section__item what-we-build-section__item--cutout-block">
                  <div class="cutout-block">
                    <div class="cutout-block__text-wrapper">
                      <?php if ($item['title']): ?>
                        <h3 class="cutout-block__title">
                          <?php echo $item['title'] ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($item['text']): ?>
                        <div class="cutout-block__text">
                          <?php echo $item['text'] ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    
                    <?php if ($item['button']['text'] || $item['button']['url']): ?>
                      <div class="buttons-list cutout-block__buttons-list">
                        <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--radius-16 btn-mintgreen--padding-10 btn-mintgreen--dark-bg-hover cutout-block__btn" data-fancybox>
                          <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--radius-16 btn-mintgreen--dark-bg-hover cutout-block__btn" data-fancybox>
                          <?php echo $item['button']['text'] ?>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                </li>
              <?php endif ?>
            <?php endforeach;?>

            <?php if (wp_is_mobile() && $block_style === 'services-page'): ?>
              <li class="what-we-build-section__item what-we-build-section__item--view-more-btn">
                <div class="buttons-list what-we-build-section__buttons-list">
                  <button class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 what-we-build-section__more-btn">
                    <span class="ico ico--arrow-right2"></span>
                  </button>
                  <button class="btn-darkgreen btn-darkgreen--radius-16 what-we-build-section__more-btn">View More</button>
                </div>
              </li>
            <?php endif ?>
          </ul>
        <?php endif; ?>
        
      <?php endif; ?>
    </div>
  </div>
</section>