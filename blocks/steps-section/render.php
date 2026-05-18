<?php

/**
 * Steps Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$steps = get_field('steps');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--steps';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($steps): ?>
    <section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="section__container">
                <?php if ($title): ?>
                    <h2 class="section-title section__title">
                        <?php echo wp_kses_post($title) ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="section-description section__description">
                        <?php echo wp_kses_post($description) ?>
                    </div>
                <?php endif; ?>

                <div class="section__steps-wrapper">
                    <div class="steps-block">
                        <?php foreach ($steps as $key => $step): ?>
                            <div class="steps-block__item">
                                <button type="button" class="step-block">
                                    <div class="step-block__number">
                                        <?php echo $key + 1 ?>
                                    </div>

                                    <?php if ($step['title']): ?>
                                        <h3 class="step-block__title">
                                            <?php echo esc_html($step['title']) ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ($step['text']): ?>
                                        <div class="step-block__text">
                                            <?php echo wp_kses_post($step['text']) ?>
                                        </div>
                                    <?php endif; ?>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="section__step-imgs">
                        <?php foreach ($steps as $key => $step): ?>
                            <?php if ($step['image']): ?>
                                <?php echo wp_get_attachment_image($step['image'], 'full', '', array('class' => 'section__step-img')); ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>