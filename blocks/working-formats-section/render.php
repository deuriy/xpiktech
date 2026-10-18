<?php

/**
 * Working formats section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$advantages_list = get_field('advantages_list');
$working_formats = get_field('working_formats');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'working-formats-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="working-formats-section__container">
      <div class="working-formats-section__text-wrapper">
        <?php if ($title): ?>
          <div class="working-formats-section__title-wrapper">
            <h2 class="section-title section-title--smaller section-title--left working-formats-section__title grad-text">
              <?php echo wp_kses_post($title) ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="working-formats-section__description">
            <?php echo wp_kses_post($description) ?>
          </div>
        <?php endif; ?>

        <?php if ($advantages_list): ?>
          <ul class="working-formats-section__advantages-list check-list">
            <?php foreach ($advantages_list as $key => $advantage): ?>
              <?php if ($advantage['name']): ?>
                <li class="working-formats-section__advantage check-list__item">
                  <?php echo esc_html($advantage['name']) ?>
                </li>
              <?php endif; ?>
            <?php endforeach;?>
          </ul>
        <?php endif; ?>
      </div>

      <?php if ($working_formats): ?>
        <div class="working-formats working-formats-section__formats">
          <?php foreach ($working_formats as $key => $working_format): ?>
            <div class="working-formats__item">
              <?php if ($working_format['subtitle']): ?>
                <p class="working-formats__item-subtitle">
                  <?php echo esc_html($working_format['subtitle']) ?>
                </p>
              <?php endif; ?>

              <?php if ($working_format['title']): ?>
                <h3 class="working-formats__item-title">
                  <?php echo esc_html($working_format['title']) ?>
                </h3>
              <?php endif; ?>

              <?php if ($working_format['description']): ?>
                <div class="working-formats__item-description">
                  <?php echo wp_kses_post($working_format['description']) ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>