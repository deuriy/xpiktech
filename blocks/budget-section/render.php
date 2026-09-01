<?php

/**
 * Budget section template.
 *
 * @param array $block The block settings and attributes.
 */

$budget_blocks = get_field('budget_blocks');

$anchor = '';
$anchor_title = '';
$anchor_title_value = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
  $anchor_title_value = esc_attr($block['anchor']) . '-title';
  $anchor_title = 'id=' . $anchor_title_value;
}

$class_name = 'budget-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>" aria-labelledby="<?php echo $anchor_title_value ?>">
  <div class="container">
    <div class="budget-section__container">
      <?php if ($budget_blocks): ?>
        <div class="budget-section__blocks">
          <?php foreach ($budget_blocks as $budget_block): ?>
            <div class="budget-block budget-section__block budget-block--<?php echo $budget_block['block_style'] ?>-style">
              <?php if ($budget_block['icon']): ?>
                <div class="budget-block__icon-wrapper">
                  <?php echo wp_get_attachment_image($budget_block['icon'], 'full', false, ['class' => 'budget-block__icon']) ?>
                </div>
              <?php endif; ?>

              <?php if ($budget_block['title']): ?>
                <h2 class="grad-text section-title section-title--left section-title--smaller budget-block__title">
                  <?php echo $budget_block['title'] ?>
                </h2>
              <?php endif; ?>

              <?php if ($budget_block['list_items']): ?>
                <ul class="budget-block__list">
                  <?php foreach ($budget_block['list_items'] as $key => $item): ?>
                    <li class="budget-block__item">
                      <?php echo $item['title'] ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>