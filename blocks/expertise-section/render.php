<?php

/**
 * Expertise section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$text = get_field('text');
$list_block = get_field('list_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'expertise-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="expertise-section__container">
      <?php if ($title || $text): ?>
        <div class="expertise-section__text-wrapper">
          <?php if ($title): ?>
            <h2 class="section-title section-title--smaller grad-text expertise-section__title">
              <?php echo $title ?>
            </h2>
          <?php endif; ?>

          <?php if ($text): ?>
            <div class="expertise-section__text">
              <?php echo $text ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <?php if ($list_block['title'] || $list_block['list_items']): ?>
        <div class="expertise-list-block">
          <div class="expertise-list-block__inner">
            <?php if ($list_block['title']): ?>
              <h3 class="expertise-list-block__title">
                <?php echo $list_block['title'] ?>
              </h3>
            <?php endif; ?>
            
            <?php if ($list_block['list_items']): ?>
              <ul class="expertise-list-block__list">
                <?php foreach ($list_block['list_items'] as $key => $item): ?>
                  <li class="expertise-list-block__item">
                    <?php echo $item['title'] ?>
                  </li>
                <?php endforeach;?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>