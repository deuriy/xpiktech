<?php

/**
 * AI software development section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$development_blocks = get_field('development_blocks');
$note = get_field('note');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'ai-software-development';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="ai-software-development__container">
      <div class="ai-software-development__text-wrapper">
        <?php if ($title): ?>
          <div class="ai-software-development__title-wrapper">
            <h2 class="section-title section-title--smaller ai-software-development__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($development_blocks): ?>
        <div class="ai-software-development__development-blocks">
          <?php foreach ($development_blocks as $key => $development_block): ?>
            <div class="ai-software-development-block ai-software-development__development-block">
              <div class="ai-software-development-block__header">
                <p class="ai-software-development-block__number">
                  <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </p>
                
                <?php if ($development_block['icon']) : ?>
                  <div class="ai-software-development-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($development_block['icon'], 'full', false, array('class' => 'ai-software-development-block__icon')); ?>
                  </div>
                <?php endif; ?>
              </div>

              <?php if ($development_block['title']): ?>
                <h3 class="ai-software-development-block__title">
                  <?php echo $development_block['title'] ?>
                </h3>
              <?php endif; ?>

              <?php if ($development_block['description']): ?>
                <div class="ai-software-development-block__description">
                  <?php echo $development_block['description'] ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($note['title'] || $note['image'] || $note['label'] || $note['development_types']): ?>
        <div class="ai-software-development-note ai-software-development__ai-software-development-note">
          <?php if ($note['image']) : ?>
            <div class="ai-software-development-note__img-wrapper">
              <?php echo wp_get_attachment_image($note['image'], 'full', false, array('class' => 'ai-software-development-note__img')); ?>
            </div>
          <?php endif; ?>

          <?php if ($note['title']): ?>
            <p class="ai-software-development-note__title">
              <?php echo $note['title'] ?>
            </p>
          <?php endif ?>
          
          <?php if ($note['label'] || $note['development_types']): ?>
            <div class="ai-software-development-note__development-types-wrapper">
              <?php if ($note['label']): ?>
                <p class="ai-software-development-note__label">
                  <?php echo $note['label'] ?>
                </p>
              <?php endif ?>
              
              <?php if ($note['development_types']): ?>
                <ul class="ai-software-development-note__development-types">
                  <?php foreach ($note['development_types'] as $development_type): ?>
                    <li class="ai-software-development-note__development-type">
                      <?php echo $development_type['name'] ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif ?>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>