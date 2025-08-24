<?php

/**
 * Testimonials Section template.
 *
 * @param array $block The block settings and attributes.
 */

$testimonials = get_field('testimonials');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($testimonials): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="testimonial-section__container">
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper testimonial-slider__slides">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="swiper-slide testimonial-slider__slide">
                                <div class="testimonial-block">
                                    <div class="person-card testimonial-block__person-card">
                                        <?php if ($testimonial['author']['photo']): ?>
                                            <?php echo wp_get_attachment_image($testimonial['author']['photo'], 'full', '', array('class' => 'person-card__photo-img')); ?>
                                        <?php endif; ?>

                                        <div class="person-card__info">
                                            <?php if ($testimonial['author']['full_name']): ?>
                                                <div class="person-card__fullname">
                                                    <?php echo esc_html($testimonial['author']['full_name']) ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($testimonial['author']['post']): ?>
                                                <div class="person-card__post">
                                                    <?php echo esc_html($testimonial['author']['post']) ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($testimonial['author']['company_logo']): ?>
                                                <?php echo wp_get_attachment_image($testimonial['author']['company_logo'], 'full', '', array('class' => 'person-card__company-logo')); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="testimonial-block__wrapper">
                                        <?php if ($testimonial['rating']): ?>
                                            <div class="rating testimonial-block__rating">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <span class="rating__star ico ico--star ico--testimonial-rating<?php echo $i <= $testimonial['rating'] ? ' ico--yellow' : ' ico--grey' ?>"></span>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($testimonial['text']): ?>
                                            <div class="testimonial-block__text">
                                                <?php echo wp_kses_post($testimonial['text']) ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="company-block company-block--testimonial testimonial-block__company">
                                            <?php if ($testimonial['company']['logo']) : ?>
                                                <?php echo wp_get_attachment_image($testimonial['company']['logo'], 'full', '', array('class' => 'company-block__logo-img')); ?>
                                            <?php endif; ?>

                                            <?php if ($testimonial['company']['name']): ?>
                                                <h3 class="company-block__name">
                                                    <?php echo esc_html($testimonial['company']['name']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($testimonial['company']['username']): ?>
                                                <div class="company-block__username">
                                                    <?php echo esc_html($testimonial['company']['username']) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-pagination testimonial-section__pagination hidden-sm-plus"></div>
                <div class="buttons-list buttons-list--arrows testimonial-section__buttons-list">
                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered testimonial-section__prev-btn hidden-xs">
                        <span class="ico ico--arrow-left2"></span>
                    </button>
                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered testimonial-section__next-btn hidden-xs">
                        <span class="ico ico--arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>