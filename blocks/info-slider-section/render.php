<?php

/**
 * Info Slider Section template.
 *
 * @param array $block The block settings and attributes.
 */

$info_slides = get_field('info_slides');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'info-slider-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($info_slides): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container container--no-padding-xs">
            <div class="info-slider-section__container">
                <div class="swiper info-slider hidden-xs">
                    <div class="swiper-wrapper info-slider__slides">
                        <?php foreach ($info_slides as $info_slide): ?>
                            <div class="swiper-slide info-slider__slide">
                                <div class="info-block info-slider__block">
                                    <div class="info-block__text-wrapper">
                                        <?php if ($info_slide['title']): ?>
                                            <h3 class="grad-text info-block__title">
                                                <?php echo esc_html($info_slide['title']) ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($info_slide['text']): ?>
                                            <div class="info-block__text">
                                                <?php echo wp_kses_post($info_slide['text']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($info_slide['image']) : ?>
                                        <div class="info-block__img-wrapper">
                                            <?php echo wp_get_attachment_image($info_slide['image'], 'full', '', array('class' => 'info-block__img')); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper info-images-slider hidden-sm-plus">
                    <div class="swiper-wrapper info-slider__slides">
                        <?php foreach ($info_slides as $info_slide): ?>
                            <div class="swiper-slide info-slider__slide">
                                <div class="info-block info-slider__block">
                                    <?php if ($info_slide['image']) : ?>
                                        <div class="info-block__img-wrapper">
                                            <?php echo wp_get_attachment_image($info_slide['image'], 'full', '', array('class' => 'info-block__img')); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper info-text-slider hidden-sm-plus">
                    <div class="swiper-wrapper info-slider__slides">
                        <?php foreach ($info_slides as $info_slide): ?>
                            <div class="swiper-slide info-slider__slide">
                                <div class="info-block info-slider__block">
                                    <div class="info-block__text-wrapper">
                                        <?php if ($info_slide['title']): ?>
                                            <h3 class="grad-text info-block__title">
                                                <?php echo esc_html($info_slide['title']) ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($info_slide['text']): ?>
                                            <div class="info-block__text">
                                                <?php echo wp_kses_post($info_slide['text']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-pagination info-slider-section__pagination hidden-sm-plus"></div>
                <div class="buttons-list buttons-list--arrows info-slider__buttons-list hidden-xs">
                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered-lightgrey info-slider__prev-btn">
                        <span class="ico ico--arrow-left2"></span>
                    </button>
                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10  btn-darkgreen--bordered-lightgrey info-slider__next-btn">
                        <span class="ico ico--arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>