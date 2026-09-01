<?php

/**
 * Quality section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$text = get_field('text');
$list_items = get_field('list_items');
$responsibility_block = get_field('responsibility_block');

$anchor = '';
$anchor_title = '';
$anchor_title_value = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
  $anchor_title_value = esc_attr($block['anchor']) . '-title';
  $anchor_title = 'id=' . $anchor_title_value;
}

$class_name = 'quality-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>" aria-labelledby="<?php echo $anchor_title_value ?>">
  <div class="container">
    <div class="quality-section__container">
      <?php if ($title || $text || $list_items): ?>
        <div class="quality-section__text-wrapper">
          <?php if ($title): ?>
            <h2 class="section-title section-title--left section-title--smaller quality-section__title" <?php echo esc_attr($anchor_title); ?>>
              <?php echo $title ?>
            </h2>
          <?php endif; ?>

          <?php if ($text): ?>
            <div class="quality-section__text">
              <?php echo $text ?>
            </div>
          <?php endif; ?>

          <?php if ($list_items): ?>
            <ul class="quality-section__list">
              <?php foreach ($list_items as $key => $item): ?>
                <li class="quality-section__item">
                  <?php echo $item['title'] ?>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <div class="responsibility-block">
        <?php if ($responsibility_block['icon'] || $responsibility_block['title']): ?>
          <div class="responsibility-block__header">
            <?php if ($responsibility_block['icon']): ?>
              <div class="responsibility-block__icon-wrapper">
                <?php echo wp_get_attachment_image($responsibility_block['icon'], 'full', false, ['class' => 'responsibility-block__icon']) ?>
              </div>
            <?php endif; ?>

            <?php if ($responsibility_block['title']): ?>
              <h3 class="grad-text responsibility-block__title">
                <?php echo $responsibility_block['title'] ?>
              </h3>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($responsibility_block['text']): ?>
          <div class="responsibility-block__text">
            <?php echo $responsibility_block['text'] ?>
          </div>
        <?php endif; ?>

        <?php if ($responsibility_block['list_items']): ?>
          <ul class="responsibility-block__list">
            <?php foreach ($responsibility_block['list_items'] as $item): ?>
              <li class="responsibility-block__item">
                <?php echo $item['title'] ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if ($responsibility_block['note']): ?>
          <div class="responsibility-note responsibility-block__note">
            <?php echo $responsibility_block['note'] ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>