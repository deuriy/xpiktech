<?php

/**
 * AI Solutions section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$blocks = get_field('block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'ai-solutions-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// $block_style = str_replace('_', '-', $block_style);
// $class_name .= ' ai-solutions-section--' . esc_attr($block_style) . '-style';
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="ai-solutions-section__container">
      <?php if ($title || $description): ?>
        <div class="ai-solutions-section__text-wrapper">
          <?php if ($title): ?>
            <div class="ai-solutions-section__title-wrapper">
              <h2 class="section-title section-title--smaller ai-solutions-section__title">
                <?php echo $title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($description): ?>
            <div class="ai-solutions-section__description">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($blocks): ?>
        <div class="ai-solutions-section__blocks">
          <?php foreach ($blocks as $key => $block): ?>
            <div class="ai-solutions-section__block ai-solutions-section__block--<?php echo str_replace('_', '-', $block['type']) ?>-style">
              <?php if ($block['type'] !== 'note'): ?>
                <div class="ai-solutions-section__block-step hidden-sm-plus">
                  <div class="ai-solutions-section__block-step-number">
                    <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                  </div>

                  <div class="ai-solutions-section__block-step-label">STEP</div>
                </div>
              <?php endif; ?>

              <?php if ($block['image']): ?>
                <div class="ai-solutions-section__block-img-wrapper">
                  <?php echo wp_get_attachment_image($block['image'], 'full', false, ['class' => 'ai-solutions-section__block-img']) ?>
                </div>
              <?php endif; ?>

              <?php if ($block['type'] === 'solutions'): ?>
                <div class="ai-solutions-section__block-title-wrapper">
              <?php endif; ?>

              <?php if ($block['title']): ?>
                <p class="ai-solutions-section__block-title">
                  <?php echo $block['title'] ?>
                </p>
              <?php endif; ?>

              <?php if ($block['list']): ?>
                <ul class="ai-solutions-section__solutions-list">
                  <?php foreach ($block['list'] as $item): ?>
                    <li class="ai-solutions-section__solutions-item">
                      <?php if ($item['icon']): ?>
                        <div class="ai-solutions-section__solution-icon-wrapper">
                          <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'ai-solutions-section__solution-icon']) ?>
                        </div>
                      <?php endif; ?>
                      
                      <?php if ($item['name']): ?>
                        <div class="ai-solutions-section__solution-name">
                          <?php echo $item['name'] ?>
                        </div>
                      <?php endif; ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>

              <?php if ($block['type'] === 'solutions'): ?>
                </div>
              <?php endif; ?>

              <?php if ($block['text']): ?>
                <div class="ai-solutions-section__block-text">
                  <?php echo $block['text'] ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>