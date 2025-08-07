<?php

/**
 * Banner Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$text = get_field('text');
$image_id = get_field('image');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'banner-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($title || $text || $image_id): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="banner-section__container">
                <div class="banner banner-section__banner">
                    <div class="banner__wrapper">
                        <?php if ($title): ?>
                            <h3 class="banner__title">
                                <?php echo esc_html($title) ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($text): ?>
                            <div class="banner__text">
                                <?php echo wp_kses_post($text) ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($image_id) : ?>
                            <?php echo wp_get_attachment_image($image_id, 'full', '', array('class' => 'banner__img')); ?>
                        <?php endif; ?>
                    </div>

                    <div class="buttons-list banner__buttons-list">
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 banner__btn" data-fancybox>
                            <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 banner__btn" data-fancybox>Talk to an Expert</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>