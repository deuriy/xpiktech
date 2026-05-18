<?php

/**
 * Automation Solution Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$show_mail_client_icons = get_field('show_mail_client_icons');
$button = get_field('button');
$problem_block = get_field('problem_block');
$results_block = get_field('results_block');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--white section--automation-solution';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="section__container">
            <?php if ($title): ?>
                <h2 class="section-title section__title">
                    <?php echo esc_html($title) ?>
                </h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <div class="section-description section__description">
                    <?php echo wp_kses_post($description) ?>
                </div>
            <?php endif; ?>

            <?php if ($show_mail_client_icons): ?>
                <div class="section__mail-clients">
                    <img src="<?php echo get_template_directory_uri() . '/images/mail_clients@2x.webp' ?>" alt="<?php esc_attr_e('Mail clients icons', 'xpiktech') ?>" class="section__mail-clients-img">
                </div>
            <?php endif; ?>

            <?php if ($button['url'] && $button['text']): ?>
                <div class="section__demo-btn-wrapper">
                    <a href="<?php echo esc_url($button['url']) ?>" class="btn-darkgreen btn-darkgreen--arrow-rect section__demo-btn" data-fancybox>
                        <?php echo esc_html($button['text']) ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="section__solution-blocks">
                <div class="problems-block section__problems-block">
                    <?php if ($problem_block['title']): ?>
                        <div class="problems-block__title-wrapper">
                            <h3 class="problems-block__title">
                                <?php echo esc_html($problem_block['title']) ?>
                            </h3>
                        </div>
                    <?php endif; ?>

                    <?php if ($problem_block['problems']): ?>
                        <ul class="problems-block__list">
                            <?php foreach ($problem_block['problems'] as $problem): ?>
                                <li class="problem-item problems-block__item">
                                    <?php echo wp_kses_post($problem['title']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="results-block section__results-block">
                    <?php if ($results_block['title']): ?>
                        <div class="results-block__title-wrapper">
                            <h3 class="results-block__title">
                                <?php echo esc_html($results_block['title']) ?>
                            </h3>
                        </div>
                    <?php endif; ?>

                    <?php if ($results_block['results']): ?>
                        <ul class="results-block__list">
                            <?php foreach ($results_block['results'] as $result): ?>
                                <li class="result-item results-block__item">
                                    <?php echo wp_kses_post($result['title']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>