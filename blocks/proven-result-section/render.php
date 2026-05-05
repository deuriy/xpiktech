<?php

/**
 * Proven Result Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$results_table = get_field('results_table');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--proven-result-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
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
        
        <?php if ($results_table): ?>
            <div class="results-table-wrapper section__results-table-wrapper">
                <div class="results-table-wrapper__inner">
                    <table class="results-table">
                        <thead class="results-table__head">
                            <tr class="results-table__head-row">
                                <th class="results-table__head-cell results-table__head-cell--logo">
                                    <img src="<?php echo get_template_directory_uri() ?>/images/xpik_logo@2x.webp" alt="Xpiktech logo" class="results-table__logo">
                                </th>
                                <th class="results-table__head-cell results-table__head-cell--before-xpiktech">Before XPikTech</th>
                                <th class="results-table__head-cell results-table__head-cell--with-xpiktech">With XPikTech</th>
                                <th class="results-table__head-cell  results-table__head-cell--improvement">Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results_table as $row): ?>
                            <tr class="results-table__row">
                                <td class="results-table__cell results-table__cell--characteristic"><?php echo $row['characteristic'] ?></td>
                                <td class="results-table__cell results-table__cell--before-xpiktech"><?php echo $row['before_xpiktech'] ?></td>
                                <td class="results-table__cell results-table__cell--with-xpiktech"><?php echo $row['with_xpiktech'] ?></td>
                                <td class="results-table__cell results-table__cell--improvement"><?php echo $row['improvement'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>