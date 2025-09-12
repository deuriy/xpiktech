<?php

/**
 * Hero Section template.
 *
 * @param array $block The block settings and attributes.
 */

$hero_slides = get_field('hero_slide');
$text_block = get_field('text_block');
$companies_slider = get_field('companies_slider');
$service_blocks = get_field('service_blocks');
$service_block_slides = get_field('service_block_slides');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$class_name = 'hero-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="hero-section__container">
      <?php if ($hero_slides): ?>
        <div class="hero-slider-block hero-section__slider-block">
          <div class="hero-slider-block__slider-wrapper">
            <div class="swiper hero-slider hero-slider-block__slider">
              <div class="swiper-wrapper hero-slider__slides">
                <?php foreach ($hero_slides as $hero_slide_key => $hero_slide): ?>
                  <div class="swiper-slide hero-slider__slide">
                    <div class="hero-block">
                      <?php if ($hero_slide['title'] || $hero_slide['text']): ?>
                        <div class="hero-block__text-wrapper">
                          <?php if ($hero_slide['title']): ?>
                            <?php
                            $title_tag = !$hero_slide_key ? 'h1' : 'h2';
                            ?>
                            <<?php echo $title_tag; ?> class="hero-block__title">
                              <?php echo esc_html($hero_slide['title']) ?>
                            </<?php echo $title_tag; ?>>
                          <?php endif; ?>

                          <?php if ($hero_slide['text']): ?>
                            <div class="hero-block__text">
                              <?php echo wp_kses_post($hero_slide['text']) ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($hero_slide['image']) : ?>
                        <div class="hero-block__img-wrapper">
                          <?php echo wp_get_attachment_image($hero_slide['image'], 'full', false, array('class' => 'hero-block__img')); ?>
                          <?php echo wp_get_attachment_image($hero_slide['hover_image'], 'full', false, array('class' => 'hero-block__hover-img')); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- <div class="swiper-thumbs-pagination hero-slider-block__swiper-thumbs-pagination"></div> -->
          </div>

          <div class="buttons-list hero-slider-block__buttons">
            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 hero-slider-block__btn" data-fancybox>
              <span class="ico ico--arrow-right2"></span>
            </a>
            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 hero-slider-block__btn" data-fancybox>Request a Free Demo</a>
          </div>

          <div class="hero-slider-block__thumbs-slider-wrapper">
            <div class="swiper hero-thumbs-slider">
              <div class="swiper-wrapper hero-thumbs-slider__slides">
                <?php foreach ($hero_slides as $hero_slide_key => $hero_slide): ?>
                  <div class="swiper-slide hero-thumbs-slider__slide">
                    <div class="hero-thumbs-slider__img-wrapper">
                      <?php if ($hero_slide['thumb_image']) : ?>
                        <?php echo wp_get_attachment_image($hero_slide['thumb_image'], 'full', false, array('class' => 'hero-thumbs-slider__img')); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($text_block['title'] || $text_block['text']): ?>
        <div class="text-block hero-section__text-block">
          <?php if ($text_block['title']) : ?>
            <div class="text-block__header">
              <h3 class="grad-text text-block__title">
                <?php echo esc_html($text_block['title']); ?>
              </h3>
              <a href="#" class="green-link text-block__more-link">more</a>
            </div>
          <?php endif; ?>

          <?php if (($text_block['text'])) : ?>
            <div class="text-block__text">
              <?php echo wp_kses_post($text_block['text']); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($companies_slider['slides']): ?>
        <div class="company-review-slider-block hero-section__company-review-slider-block">
          <?php if ($companies_slider['title']) : ?>
            <div class="company-review-slider-block__header">
              <h3 class="grad-text company-review-slider-block__title">
                <?php echo esc_html($companies_slider['title']); ?>
              </h3>
              <a href="#" class="green-link company-review-slider-block__more-link">more</a>
            </div>
          <?php endif; ?>

          <div class="swiper company-review-slider">
            <div class="swiper-wrapper company-review-slider__slides">
              <?php foreach ($companies_slider['slides'] as $company_slide): ?>
                <div class="swiper-slide company-review-slider__slide">
                  <div class="company-review-block">
                    <div class="company-block">
                      <?php if ($company_slide['logo']) : ?>
                        <?php echo wp_get_attachment_image($company_slide['logo'], 'full', false, array('class' => 'company-block__logo-img')); ?>
                      <?php endif; ?>

                      <?php if ($company_slide['name']): ?>
                        <h3 class="company-block__name">
                          <?php echo esc_html($company_slide['name']) ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($company_slide['rating_mark'] || $company_slide['reviews_number']): ?>
                        <div class="rating-block company-block__rating-block">
                          <div class="rating-block">
                            <?php if ($company_slide['rating_mark']): ?>
                              <div class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                  <span class="rating__star ico ico--star ico--size-16<?php echo $i <= $company_slide['rating_mark'] ? ' ico--yellow' : ' ico--grey' ?>"></span>
                                <?php endfor; ?>
                              </div>
                            <?php endif; ?>

                            <?php if ($company_slide['reviews_number']): ?>
                              <div class="rating-block__reviews-number">
                                (<?php echo esc_html($company_slide['reviews_number']) ?>)
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>

                    <?php if ($company_slide['review_text']): ?>
                      <div class="company-review-block__review-text">
                        <?php echo wp_kses_post($company_slide['review_text']) ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered-lightgrey company-review-slider-block__next-btn hidden-xs">
            <span class="ico ico--arrow-right"></span>
          </button>

          <button type="button" class="btn-darkgreen btn-darkgreen--padding-6 btn-darkgreen--bordered-lightgrey company-review-slider-block__next-btn hidden-sm-plus">
            <span class="ico ico--arrow-bottom"></span>
          </button>
        </div>
      <?php endif; ?>

      <?php if ($service_blocks): ?>
        <div class="service-blocks hero-section__service-blocks">
          <?php foreach ($service_blocks as $service_block): ?>
            <div class="service-block service-blocks__item">
              <?php if ($service_block['image']) : ?>
                <?php echo wp_get_attachment_image($service_block['image'], 'full', false, array('class' => 'service-block__img')); ?>
              <?php endif; ?>

              <?php if ($service_block['title']): ?>
                <h3 class="service-block__title">
                  <?php echo esc_html($service_block['title']) ?>
                </h3>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($service_block_slides): ?>
        <div class="service-block-slider-wrapper hero-section__service-block-slider-wrapper">
          <div class="swiper service-block-slider">
            <div class="swiper-wrapper service-block-slider__slides">
              <?php foreach ($service_block_slides as $service_block_key => $service_block_slide): ?>
                <div class="swiper-slide service-block-slider__slide">
                  <div class="service-block service-block--extended service-block-slider__block">
                    <div class="service-block__front">
                      <svg width="121" height="119" viewBox="0 0 121 119" fill="none" xmlns="http://www.w3.org/2000/svg" class="service-block__front-svg">
                        <rect x="-35.2704" y="33.6036" width="127" height="127" rx="31.5" transform="rotate(-15 -35.2704 33.6036)" stroke="white" stroke-opacity="0.24" class="rotate-cw" />
                        <rect x="8.91605" y="20.2921" width="95" height="95" rx="23.5" transform="rotate(15 8.91605 20.2921)" stroke="white" stroke-opacity="0.24" class="rotate-ccw" />
                        <rect x="3.3125" y="55.8438" width="64" height="64" rx="20" transform="rotate(-15 3.3125 55.8438)" fill="white" fill-opacity="0.12" />
                        <rect x="3.92487" y="56.1973" width="63" height="63" rx="19.5" transform="rotate(-15 3.92487 56.1973)" stroke="white" stroke-opacity="0.24" />
                        <g clip-path="url(#clip0_1439_1908_<?php echo $service_block_key ?>)" filter="url(#filter0_d_1439_1908_<?php echo $service_block_key ?>)">
                          <path d="M46.9184 86.9344H38.0618C37.4165 86.9344 36.7976 86.678 36.3413 86.2217C35.885 85.7654 35.6287 85.1465 35.6287 84.5012C35.6287 83.8559 35.885 83.2371 36.3413 82.7808C36.7976 82.3245 37.4165 82.0681 38.0618 82.0681H40.3368L32.2345 73.8563C31.808 73.4404 31.5488 72.8825 31.5062 72.2883C31.4636 71.6941 31.6405 71.1049 32.0033 70.6324C32.2209 70.37 32.4944 70.1595 32.8038 70.0163C33.1133 69.8732 33.4508 69.801 33.7917 69.8052C34.0966 69.7989 34.3995 69.8551 34.6819 69.9701C34.9644 70.0852 35.2203 70.2567 35.434 70.4743L40.3733 75.4135L45.3369 71.6908C45.785 71.3545 46.3396 71.1914 46.8985 71.2317C47.4574 71.2719 47.9829 71.5127 48.3783 71.9098C50.6764 74.2128 52.4052 77.0205 53.427 80.1094L53.5 80.3406" stroke="white" stroke-width="1.5" stroke-miterlimit="10" />
                        </g>
                        <defs>
                          <filter id="filter0_d_1439_1908_<?php echo $service_block_key ?>" x="28.5" y="64.3672" width="28" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset />
                            <feGaussianBlur stdDeviation="1" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1439_1908" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1439_1908" result="shape" />
                          </filter>
                          <clipPath id="clip0_1439_1908_<?php echo $service_block_key ?>">
                            <rect width="24" height="24" fill="white" transform="translate(30.5 66.3672)" />
                          </clipPath>
                        </defs>
                      </svg>
                      <?php if ($service_block_slide['title']): ?>
                        <h3 class="service-block__title">
                          <?php echo esc_html($service_block_slide['title']) ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($service_block_slide['image']) : ?>
                        <?php echo wp_get_attachment_image($service_block_slide['image'], 'full', false, array('class' => 'service-block__img')); ?>
                      <?php endif; ?>
                    </div>
                    <div class="service-block__back">
                      <?php if ($service_block_slide['title']): ?>
                        <h3 class="service-block__title">
                          <?php echo esc_html($service_block_slide['title']) ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($service_block_slide['list']): ?>
                        <ul class="list service-block__list">
                          <?php foreach ($service_block_slide['list'] as $item): ?>
                            <li class="list__item">
                              <?php echo esc_html($item['item']) ?>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered-lightgrey service-block-slider-wrapper__next-btn hidden-xs">
            <span class="ico ico--arrow-right"></span>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>