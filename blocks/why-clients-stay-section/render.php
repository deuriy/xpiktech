<?php

/**
 * Why clients stay section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'why-clients-stay-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="why-clients-stay-section__container">      
      <?php if ($title || $description || $items): ?>
        <ul class="why-clients-stay-section__items">
          <li class="why-clients-stay-section__text-wrapper">
            <?php if ($title): ?>
              <div class="why-clients-stay-section__title-wrapper">
                <h2 class="section-title section-title--smaller grad-text why-clients-stay-section__title">
                  <?php echo $title ?>
                </h2>
              </div>
            <?php endif; ?>

            <?php if ($description): ?>
              <div class="why-clients-stay-section__description">
                <?php echo $description ?>
              </div>
            <?php endif; ?>
          </li>

          <?php foreach ($items as $key => $item): ?>
            <li class="why-clients-stay-block why-clients-stay-section__item why-clients-stay-block--<?php echo $item['block_style'] ?>-style">
              <div class="why-clients-stay-block__header">
                <?php if ($item['icon']): ?>
                  <div class="why-clients-stay-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'why-clients-stay-block__icon']) ?>
                  </div>
                <?php endif; ?>

                <?php if ($item['title']): ?>
                  <h3 class="why-clients-stay-block__title<?php echo $item['block_style'] === 'default' ? ' grad-text' : '' ?>">
                    <?php echo $item['title'] ?>
                  </h3>
                <?php endif; ?>
              </div>

              <?php if ($item['text']): ?>
                <div class="why-clients-stay-block__text">
                  <?php echo $item['text'] ?>
                </div>
              <?php endif; ?>
            </li>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>