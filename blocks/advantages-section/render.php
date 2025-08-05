<?php

/**
 * Advantages Section template.
 *
 * @param array $block The block settings and attributes.
 */

$advantages_blocks = get_field('advantages_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'advantages-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($advantages_blocks): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="advantages-section__container">
                <div class="advantage-blocks">
                    <?php foreach ($advantages_blocks as $advantage_block): ?>
                        <?php if ($advantage_block['block_style'] === 'dark_green'): ?>
                            <div class="darkgreen-text-block darkgreen-text-block--no-label">
                                <?php if ($advantage_block['title']): ?>
                                    <h3 class="darkgreen-text-block__title">
                                        <?php echo esc_html($advantage_block['title']) ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="advantage-block advantage-blocks__item">
                                <?php if ($advantage_block['icon']) : ?>
                                    <div class="advantage-block__icon-wrapper">
                                        <?php if (is_svg_by_attachment_id($advantage_block['icon'])): ?>
                                            <?php echo get_svg_inline_by_id($advantage_block['icon']) ?>
                                        <?php else: ?>
                                            <?php echo wp_get_attachment_image($advantage_block['icon'], 'full', '', array('class' => 'advantage-block__icon')); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($advantage_block['title']): ?>
                                    <h3 class="advantage-block__title">
                                        <?php echo esc_html($advantage_block['title']) ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($advantage_block['text']): ?>
                                    <div class="advantage-block__text">
                                        <?php echo wp_kses_post($advantage_block['text']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>