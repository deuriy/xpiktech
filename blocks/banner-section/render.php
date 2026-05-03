<?php

/**
 * Banner Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$text = get_field('text');
$image_id = get_field('image');
$hover_image_id = get_field('hover_image');
$button = get_field('button');
$show_mail_clients_icon = get_field('show_mail_clients_icon');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$block_style = get_field('block_style') ?? 'style_1';
$block_style = str_replace('_', '-', $block_style);
// $class_name = 'banner-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($title || $text || $image_id): ?>
    <section <?php echo esc_attr($anchor); ?>class="banner-section banner-section--<?php echo esc_attr($block_style); ?>">
        <div class="container">
            <div class="banner-section__container">
                <div class="banner banner-section__banner banner--<?php echo esc_attr($block_style); ?>">
                    <div class="banner__wrapper">
                        <div class="banner__text-wrapper">
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
                            
                            <?php if ($block_style === 'style-2'): ?>
                                <?php if ($button['url'] && $button['text']): ?>
                                    <a href="<?php echo esc_url($button['url']) ?>" class="btn-darkgreen btn-darkgreen--arrow-rect btn-darkgreen--arrow-rect-banner banner__btn">
                                        <?php echo esc_html($button['text']) ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="banner__imgs">
                            <?php if ($image_id) : ?>
                                <?php echo wp_get_attachment_image($image_id, 'full', '', array('class' => 'banner__img')); ?>
                            <?php endif; ?>
                            
                            <?php if ($block_style === 'style-1'): ?>
                                <?php if ($hover_image_id) : ?>
                                    <?php echo wp_get_attachment_image($hover_image_id, 'full', '', array('class' => 'banner__hover-img')); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if ($block_style === 'style-2'): ?>
                                <?php if ($show_mail_clients_icon): ?>
                                    <img src="<?php echo get_template_directory_uri() . '/images/mail_clients_banner@2x.webp' ?>" alt="<?php esc_attr_e('Mail clients icons', 'xpiktech') ?>" class="banner__mail-clients-img">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($block_style === 'style-1'): ?>
                        <div class="buttons-list banner__buttons-list">
                            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 banner__btn" data-fancybox>
                                <span class="ico ico--arrow-right2"></span>
                            </a>
                            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 banner__btn" data-fancybox>Talk to an Expert</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>