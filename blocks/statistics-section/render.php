<?php

/**
 * Statistics Section template.
 *
 * @param array $block The block settings and attributes.
 */

$icon_id = get_field('icon');
$title = get_field('title');
$text = get_field('text');
$statistics_blocks = get_field('statistics_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'statistics-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($statistics_blocks): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="statistics-section__container">
                <div class="statistics-section__slider-block hidden-md-plus">
                    <div class="swiper statistics-slider">
                        <div class="swiper-wrapper statistics-slider__slides">
                            <?php foreach ($statistics_blocks as $statistics_block): ?>
                                <div class="swiper-slide statistics-slider__slide">
                                    <div class="statistics-block statistics-slider__item">
                                        <?php if ($statistics_block['icon']) : ?>
                                            <div class="statistics-block__icon-wrapper">
                                                <?php echo wp_get_attachment_image($statistics_block['icon'], 'full', '', array('class' => 'statistics-block__icon')); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($statistics_block['number'] || $statistics_block['suffix']): ?>
                                            <div class="statistics-block__number">
                                                <?php if ($statistics_block['number']): ?>
                                                    <?php echo esc_html($statistics_block['number']) ?>
                                                <?php endif; ?>

                                                <?php if ($statistics_block['suffix']): ?>
                                                    <span class="statistics-block__suffix">
                                                        <?php echo esc_html($statistics_block['suffix']) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($statistics_block['title']): ?>
                                            <div class="statistics-block__title">
                                                <?php echo esc_html($statistics_block['title']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination statistics-slider__pagination"></div>
                    </div>
                </div>

                <div class="success-block statistics-section__success-block">
                    <?php if ($title || $icon_id): ?>
                        <div class="success-block__header">
                            <?php if ($icon_id) : ?>
                                <div class="success-block__icon-wrapper">
                                    <?php echo wp_get_attachment_image($icon_id, 'full', '', array('class' => 'success-block__icon')); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($title): ?>
                                <h3 class="success-block__title">
                                    <?php echo esc_html($title) ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($text): ?>
                        <div class="success-block__text">
                            <?php echo wp_kses_post($text) ?>
                        </div>
                    <?php endif; ?>

                    <div class="buttons-list buttons-list--full-width success-block__buttons-list">
                        <a href="#contact-form-popup" class="btn-white btn-white--padding-10" data-fancybox>
                            <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#contact-form-popup" class="btn-white" data-fancybox>Contact Us</a>
                    </div>
                </div>

                <div class="statistics-blocks hidden-sm-minus">
                    <?php foreach ($statistics_blocks as $statistics_block): ?>
                        <div class="statistics-block statistics-blocks__item">
                            <?php if ($statistics_block['icon']) : ?>
                                <div class="statistics-block__icon-wrapper">
                                    <?php echo wp_get_attachment_image($statistics_block['icon'], 'full', '', array('class' => 'statistics-block__icon')); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($statistics_block['number'] || $statistics_block['suffix']): ?>
                                <div class="statistics-block__number">
                                    <?php if ($statistics_block['number']): ?>
                                        <?php echo esc_html($statistics_block['number']) ?>
                                    <?php endif; ?>

                                    <?php if ($statistics_block['suffix']): ?>
                                        <span class="statistics-block__suffix">
                                            <?php echo esc_html($statistics_block['suffix']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($statistics_block['title']): ?>
                                <div class="statistics-block__title">
                                    <?php echo esc_html($statistics_block['title']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>