<?php

/**
 * Team statistics section template.
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

$class_name = 'team-statistics-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="team-statistics-section__container">
      <div class="team-statistics-section__text-wrapper">
        <?php if ($title): ?>
          <div class="team-statistics-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller grad-text team-statistics-section__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="team-statistics-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($items): ?>
        <ul class="team-statistics-section__items">
          <?php foreach ($items as $key => $item): ?>
            <li class="team-statistics-block team-statistics-section__item">
              <?php if ($item['title']): ?>
                <div class="team-statistics-block__title">
                  <?php echo $item['title'] ?>
                </div>
              <?php endif; ?>

              <?php if ($item['number']): ?>
                <div class="team-statistics-block__number grad-text">
                  <?php echo $item['number'] ?>
                </div>
              <?php endif; ?>

              <?php if ($item['text']): ?>
                <div class="team-statistics-block__text">
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