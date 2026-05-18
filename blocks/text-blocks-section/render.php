<?php

/**
 * Text Blocks Section template.
 *
 * @param array $block The block settings and attributes.
 */

// $text_blocks = get_field('text_block');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
// $class_name = 'section section--text';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if( have_rows('text_block') ): ?>
    <?php while( have_rows('text_block') ): the_row(); 
        // vars
        $index = get_row_index();
        $class_name = $index % 2 !== 0 ? 'section section--white section--text' : 'section section--text section--text-reverse';

        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $image_id = get_sub_field('image');
        ?>
        
        <section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
            <div class="container">
                <div class="section__container">
                    <div class="section__text-wrapper">
                        <?php if ($title): ?>
                            <h2 class="section-title section-title--left section__title">
                                <?php echo esc_html($title) ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($description): ?>
                            <div class="section-description section-description--left section__description">
                                <?php echo wp_kses_post($description) ?>
                            </div>
                        <?php endif; ?>

                        <?php if( have_rows('list') ): ?>
                            <ul class="checkmarks-list section__list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    ?>
                                    <li class="checkmarks-list__item"><?php echo esc_html($title) ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="section__img-wrapper">
                        <?php if ($image_id): ?>
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')) ?>" alt="<?php echo esc_attr($title) ?>" class="section__img">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
