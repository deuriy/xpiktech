<?php

/**
 * Stats tile section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style');
$stats_tiles = get_field('stats_tiles');
$image_block = get_field('image_block');
$title = get_field('title');
$text = get_field('text');
$list_items = get_field('list_items');
$additional_stats_tile_class = $block_style === 'three_tiles_right' ? ' stats-tile--small-padding-y' : '';

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'stats-tile-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?><?php echo ' stats-tile-section--' . str_replace('_', '-', $block_style) ?>">
  <div class="container">
    <div class="stats-tile-section__container">
      <?php if ($stats_tiles || $image_block['image'] || $image_block['text']): ?>
        <div class="stats-tile-section__tiles-wrapper">
          <?php if ($stats_tiles): ?>
            <dl class="stats-tile-section__tiles">
              <?php foreach ($stats_tiles as $key => $stats_tile): ?>
                <div class="stats-tile stats-tile--<?php echo str_replace('_', '-', $stats_tile['block_style']) ?>-style<?php echo $additional_stats_tile_class; ?>">
                  <?php if ($stats_tile['number']): ?>
                    <dt class="stats-tile__number<?php echo $stats_tile['block_style'] !== 'darkgreen_bg' ? ' grad-text' : '' ?>">
                      <?php echo $stats_tile['number'] ?>
                    </dt>
                  <?php endif; ?>

                  <?php if ($stats_tile['text']): ?>
                    <dd class="stats-tile__text">
                      <?php echo $stats_tile['text'] ?>
                    </dd>
                  <?php endif; ?>
                </div>
              <?php endforeach;?>
            </dl>
          <?php endif; ?>

          <?php if ($image_block['image'] || $image_block['text']): ?>
            <div class="stats-tile-section__image-block">
              <?php if ($image_block['image']): ?>
                <?php echo wp_get_attachment_image($image_block['image'], 'full', false, ['class' => 'stats-tile-section__image']) ?>
              <?php endif; ?>

              <?php if ($image_block['text']): ?>
                <div class="stats-tile-section__image-caption">
                  <?php echo $image_block['text'] ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($title || $list_items): ?>
        <div class="stats-tile-section__text-wrapper">
           <?php if ($title): ?>
            <h2 class="section-title section-title--left section-title--smaller grad-text stats-tile-section__title">
              <?php echo $title ?>
            </h2>
          <?php endif; ?>

          <?php if ($text): ?>
            <div class="stats-tile-section__text">
              <?php echo $text ?>
            </div>
          <?php endif; ?>

          <?php if ($list_items): ?>
            <ul class="stats-tile-section__list">
              <?php foreach ($list_items as $key => $item): ?>
                <li class="stats-tile-section__item">
                  <?php echo $item['title'] ?>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>