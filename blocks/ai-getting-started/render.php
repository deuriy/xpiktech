<?php

/**
 * AI getting started section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$label = get_field('label');
$button_text = get_field('button_text');
$steps = get_field('steps');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'ai-getting-started-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="ai-getting-started-section__container">
      <?php if ($title || $label || $button_text): ?>
        <div class="ai-getting-started-section__text-wrapper">
          <?php if ($label): ?>
            <p class="ai-getting-started-section__label">
              <?php echo $label ?>
            </p>
          <?php endif; ?>

          <?php if ($title): ?>
            <div class="ai-getting-started-section__title-wrapper">
              <h2 class="section-title section-title--smaller section-title--left ai-getting-started-section__title grad-text">
                <?php echo $title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($button_text): ?>
            <div class="buttons-list ai-getting-started-section__buttons-list">
              <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 ai-getting-started-section__btn" data-fancybox>
                <span class="ico ico--arrow-right2"></span>
              </a>
              <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 ai-getting-started-section__btn" data-fancybox>
                <?php echo $button_text ?>
              </a>
            </div>
          <?php endif ?>
        </div>
      <?php endif; ?>
      
      <?php if ($steps): ?>
        <ul class="ai-getting-started-section__steps">
          <?php foreach ($steps as $key => $step): ?>
            <li class="ai-getting-started-section__step">
              <?php if ($step['icon']) : ?>
                <div class="ai-getting-started-section__step-icon-wrapper ai-getting-started-section__step-icon-wrapper--<?php echo $step['icon_block_style'] ?>-bg-style">
                  <?php echo wp_get_attachment_image($step['icon'], 'full', false, array('class' => 'ai-getting-started-section__step-icon')); ?>
                </div>
              <?php endif; ?>

              <p class="ai-getting-started-section__step-number">
                <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
              </p>

              <?php if ($step['title']): ?>
                <p class="ai-getting-started-section__step-title">
                  <?php echo $step['title'] ?>
                </p>
              <?php endif; ?>
            </li>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>