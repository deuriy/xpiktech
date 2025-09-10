<?php

/**
 * Contact Section template.
 *
 * @param array $block The block settings and attributes.
 */

$contact_blocks = get_field('contact_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'contacts-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if ($contact_blocks): ?>
    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
        <div class="container">
            <div class="contact-blocks">
                <?php foreach ($contact_blocks as $contact_block): ?>
                    <div class="contact-block contact-blocks__item">
                        <?php if ($contact_block['icon']) : ?>
                            <div class="contact-block__icon-wrapper">
                                <?php if (is_svg_by_attachment_id($contact_block['icon'])): ?>
                                    <?php echo get_svg_inline_by_id($contact_block['icon']) ?>
                                <?php else: ?>
                                    <?php echo wp_get_attachment_image($contact_block['icon'], 'full', '', array('class' => 'contact-block__icon')); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($contact_block['title']): ?>
                            <h3 class="contact-block__title">
                                <?php echo esc_html($contact_block['title']) ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($contact_block['opening_hours']): ?>
                            <div class="contact-block__opening-hours">
                                <?php echo wp_kses_post($contact_block['opening_hours']) ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $btn_class = '';
                        $contact_type = $contact_block['contact_type'];

                        switch ($contact_type) {
                            case "linkedin":
                                $btn_class = 'btn-blue';
                                break;
                            case "telegram":
                                $btn_class = 'btn-lightblue';
                                break;
                            case "email":
                                $btn_class = 'btn-green';
                                break;
                        }
                        ?>

                        <?php if ($contact_block['button']['url'] || $contact_block['button']['text'] || $contact_block['username']): ?>
                            <div class="contact-block__btn-wrapper<?php echo $contact_type === 'telegram' ? ' contact-block__btn-wrapper--two-col' : '' ?>">
                                <?php if ($contact_block['button']['url'] || $contact_block['button']['text']): ?>
                                    <?php if ($contact_block['contact_type'] === 'telegram'): ?>
                                        <a href="<?php echo esc_url('https://t.me/' . $contact_block['username']) ?>" class="<?php echo $btn_class ?>" target="_blank">
                                            <?php echo esc_html($contact_block['button']['text']) ?>
                                        </a>
                                    <?php elseif ($contact_block['contact_type'] === 'email'): ?>
                                        <a href="<?php echo esc_url('mailto:' . $contact_block['email']) ?>" class="<?php echo $btn_class ?>" target="_blank">
                                            <?php echo esc_html($contact_block['button']['text']) ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo esc_url($contact_block['button']['url']) ?>" class="<?php echo $btn_class ?>" target="_blank">
                                            <?php echo esc_html($contact_block['button']['text']) ?>
                                        </a>
                                    <?php endif ?>
                                    
                                <?php endif; ?>

                                <?php if ($contact_block['username']): ?>
                                    <div class="contact-block__username">
                                        @<?php echo wp_kses_post($contact_block['username']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>