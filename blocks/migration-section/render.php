<?php

/**
 * Migration section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$button_text = get_field('button_text');
$ai_compatibility_blocks = get_field('ai_compatibility_blocks');

$anchor = '';
$anchor_title = '';
$anchor_title_value = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
  $anchor_title_value = esc_attr($block['anchor']) . '-title';
  $anchor_title = 'id=' . $anchor_title_value;
}

$class_name = 'migration-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>" aria-labelledby="<?php echo $anchor_title_value ?>">
  <div class="container">
    <div class="migration-section__container">
      <div class="migration-section__text-block">
        <div class="migration-section__text-wrapper">
          <?php if ($title): ?>
            <div class="migration-section__title-wrapper">
              <h2 class="section-title section-title--smaller migration-section__title grad-text">
                <?php echo $title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($description): ?>
            <div class="migration-section__description">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="buttons-list migration-section__buttons-list">
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 migration-section__btn" data-fancybox>
            <span class="ico ico--arrow-right2"></span>
          </a>
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 migration-section__btn" data-fancybox>Start With the API</a>
        </div>
      </div>

      <?php if ($ai_compatibility_blocks): ?>
        <div class="migration-section__blocks">
          <?php foreach ($ai_compatibility_blocks as $block): ?>
            <div class="ai-compatibility-block migration-section__block ai-compatibility-block--<?php echo $block['block_style'] ?>-style">
              <?php if ($block['title']): ?>
                <div class="ai-compatibility-block__header">
                  <h3 class="ai-compatibility-block__title">
                    <?php echo $block['title'] ?>
                  </h3>

                  <div class="ai-compatibility-block__example-label">example</div>
                </div>
              <?php endif; ?>

              <?php if ($block['code_example']): ?>
                <div class="ai-compatibility-block__code-example">
                  <?php echo $block['code_example'] ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>