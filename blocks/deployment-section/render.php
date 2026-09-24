<?php

/**
 * Deployment section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$steps = get_field('steps');
$image = get_field('image');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'deployment-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="deployment-section__container">
      <div class="deployment-section__text-wrapper">
        <?php if ($title): ?>
          <div class="deployment-section__title-wrapper">
            <h2 class="section-title section-title--smaller section-title--left deployment-section__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="deployment-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>

        <?php if ($steps): ?>
          <ul class="deployment-section__steps">
            <?php foreach ($steps as $key => $step): ?>
              <li class="deployment-section__step">
                <div class="deployment-section__step-number">
                  <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </div>

                <?php if ($step['title']): ?>
                  <h3 class="deployment-section__step-title">
                    <?php echo $step['title'] ?>
                  </h3>
                <?php endif; ?>

                <?php if ($step['text']): ?>
                  <div class="deployment-section__step-text">
                    <?php echo $step['text'] ?>
                  </div>
                <?php endif; ?>
              </li>
            <?php endforeach;?>
          </ul>
        <?php endif; ?>
      </div>

      <?php if ($image): ?>
        <div class="deployment-section__img-wrapper">
          <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'deployment-section__img']) ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>