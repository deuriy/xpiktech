<?php

/**
 * How we work section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'how-we-work-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="how-we-work-section__container">
      <?php if ($title): ?>
        <div class="how-we-work-section__title-wrapper">
          <h2 class="section-title section-title--smaller grad-text how-we-work-section__title">
            <?php echo $title ?>
          </h2>
        </div>
      <?php endif; ?>
      
      <?php if ($items): ?>
        <ol class="how-we-work-section__items">
          <?php foreach ($items as $key => $item): ?>
            <li class="how-we-work-block how-we-work-section__item">
              <?php if ($item['icon']): ?>
                <div class="how-we-work-block__icon-wrapper">
                  <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'how-we-work-block__icon']) ?>
                </div>
              <?php endif; ?>

              <div class="how-we-work-block__text-wrapper">
                <div class="how-we-work-block__number"><?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?></div>

                <?php if ($item['title']): ?>
                  <h3 class="how-we-work-block__title">
                    <?php echo $item['title'] ?>
                  </h3>
                <?php endif; ?>

                <?php if ($item['text']): ?>
                  <p class="how-we-work-block__text">
                    <?php echo $item['text'] ?>
                  </p>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach;?>
        </ol>
      <?php endif; ?>
    </div>
  </div>
</section>