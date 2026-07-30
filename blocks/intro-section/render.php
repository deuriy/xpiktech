<?php

/**
 * Intro Section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$video_block = get_field('video_block');
$video_files = $video_block['video_files'];

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section section--white';
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
            
            <?php if ($video_block['preview'] && $video_files): ?>
                <div class="video-block">
                    <?php echo wp_get_attachment_image($video_block['preview'], 'full', '', array('class' => 'video-block__preview-img')); ?>
                    <button type="button" class="play-btn video-block__play-btn"></button>

                    <?php if ($video_files): ?>
                        <video class="video-block__video" controls playsinline>
                            <?php foreach ($video_files as $video_file): ?>
                                <source src="<?php echo $video_file['video_file']['url'] ?>" type="<?php echo $video_file['video_file']['mime_type'] ?>">
                            <?php endforeach; ?>
                        </video>
                    <?php endif ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>