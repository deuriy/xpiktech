<?php

/**
 * Models section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$models = get_field('models');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'models-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="models-section__container">
      <div class="models-section__text-wrapper">
        <?php if ($title): ?>
          <div class="models-section__title-wrapper">
            <h2 class="section-title section-title--smaller grad-text models-section__title">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="models-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($models): ?>
        <ul class="models-section__items">
          <?php foreach ($models as $key => $model): ?>
            <li class="model-block models-section__item">
              <div class="model-block__header">
                <?php if ($model['icon']): ?>
                  <div class="model-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($model['icon'], 'full', false, ['class' => 'model-block__icon']) ?>
                  </div>
                <?php endif; ?>

                <?php if ($model['title']): ?>
                  <h3 class="model-block__title grad-text">
                    <?php echo $model['title'] ?>
                  </h3>
                <?php endif; ?>
              </div>

              <?php if ($model['text']): ?>
                <div class="model-block__text">
                  <?php echo $model['text'] ?>
                </div>
              <?php endif; ?>

              <?php if ($model['characteristics']): ?>
                <ul class="model-block__characteristics-list">
                  <?php foreach ($model['characteristics'] as $characteristic): ?>
                    <li class="model-block__characteristics-item">
                      <?php echo $characteristic['name'] ?>
                    </li>
                  <?php endforeach;?>
                </ul>
              <?php endif; ?>
            </li>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
      
      <?php if (wp_is_mobile()): ?>
        <div class="buttons-list models-section__buttons-list">
          <button class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 models-section__more-btn">
            <span class="ico ico--arrow-right2"></span>
          </button>
          <button class="btn-darkgreen btn-darkgreen--radius-16 models-section__more-btn">View More</button>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>