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
                        <div class="swiper hero-slider">
                            <div class="swiper-wrapper hero-slider__slides">
                                <?php foreach ($hero_slides as $hero_slide): ?>
                                    <div class="swiper-slide hero-slider__slide">
                                        <div class="hero-block">
                                            <?php if ($hero_slide['title']): ?>
                                                <h3 class="hero-block__title">
                                                    <?php echo esc_html($hero_slide['title']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($hero_slide['text']): ?>
                                                <div class="hero-block__text">
                                                    <?php echo wp_kses_post($hero_slide['text']) ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($hero_slide['image']) : ?>
                                                <figure class="hero-block__img-wrapper">
                                                    <?php echo wp_get_attachment_image($hero_slide['image'], 'full', '', array('class' => 'hero-block__img')); ?>
                                                </figure>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="buttons-list hero-slider-block__buttons">
                        <a href="#" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 hero-slider-block__btn">
                            <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#" class="btn-darkgreen btn-darkgreen--radius-16 hero-slider-block__btn">Request a Free Demo</a>
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
                                                <?php echo wp_get_attachment_image($company_slide['logo'], 'full', '', array('class' => 'company-block__logo-img')); ?>
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
                                <?php echo wp_get_attachment_image($service_block['image'], 'full', '', array('class' => 'service-block__img')); ?>
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
                            <?php foreach ($service_block_slides as $service_block_slide): ?>
                                <div class="swiper-slide service-block-slider__slide">
                                    <div class="service-block service-block--extended service-block-slider__block">
                                        <div class="service-block__front">
                                            <?php if ($service_block_slide['title']): ?>
                                                <h3 class="service-block__title">
                                                    <?php echo esc_html($service_block_slide['title']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($service_block_slide['image']) : ?>
                                                <?php echo wp_get_attachment_image($service_block_slide['image'], 'full', '', array('class' => 'service-block__img')); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="service-block__back">
                                            <?php if ($service_block_slide['title']): ?>
                                                <h3 class="service-block__title service-block__title--grad-style">
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