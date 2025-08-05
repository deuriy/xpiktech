<?php

/**
 * Activity Section template.
 *
 * @param array $block The block settings and attributes.
 */

$activity_blocks = get_field('activity_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'activity-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($activity_blocks): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="activity-section__container">
                <div class="activity-blocks">
                    <?php foreach ($activity_blocks as $activity_block): ?>
                        <?php if ($activity_block['block_style'] === 'dark_green'): ?>
                            <div class="darkgreen-text-block">
                                <?php if ($activity_block['title']): ?>
                                    <h3 class="darkgreen-text-block__title">
                                        <?php echo esc_html($activity_block['title']) ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($activity_block['label']): ?>
                                    <div class="darkgreen-text-block__label">
                                        <?php echo esc_html($activity_block['label']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="activity-block activity-blocks__item">
                                <?php if ($activity_block['icon']) : ?>
                                    <?php echo wp_get_attachment_image($activity_block['icon'], 'full', '', array('class' => 'activity-block__icon')); ?>
                                <?php endif; ?>

                                <?php if ($activity_block['title']): ?>
                                    <h3 class="activity-block__title">
                                        <?php echo esc_html($activity_block['title']) ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($activity_block['list']): ?>
                                    <ul class="list list--style2 activity-block__text">
                                        <?php foreach ($activity_block['list'] as $item): ?>
                                            <li class="list__item">
                                                <?php echo esc_html($item['item']) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>