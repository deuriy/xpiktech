<?php

/**
 * How pilot works section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$blocks = get_field('blocks');
$button_text = get_field('button_text');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'how-pilot-works-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="how-pilot-works-section__container">
      <?php if ($title): ?>
        <div class="how-pilot-works-section__title-wrapper">
          <h2 class="section-title section-title--smaller how-pilot-works-section__title grad-text">
            <?php echo $title ?>
          </h2>
        </div>
      <?php endif; ?>
      
      <?php if ($blocks): ?>
        <div class="how-pilot-works-section__items">
          <?php foreach ($blocks as $key => $block): ?>
            <div class="how-pilot-works-block how-pilot-works-section__item">
              <?php if ($block['image']) : ?>
                <div class="how-pilot-works-block__img-wrapper">
                  <?php echo wp_get_attachment_image($block['image'], 'full', false, array('class' => 'how-pilot-works-block__img')); ?>
                </div>
              <?php endif; ?>

              <div class="how-pilot-works-block__body">
                <div class="how-pilot-works-block__title-wrapper">
                  <div class="how-pilot-works-block__number">
                    <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                  </div>

                  <?php if ($block['title']): ?>
                    <h3 class="how-pilot-works-block__title grad-text">
                      <?php echo $block['title'] ?>
                    </h3>
                  <?php endif; ?>
                </div>

                <?php if ($block['description']): ?>
                  <div class="how-pilot-works-block__description">
                    <?php echo $block['description'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>

      <?php if ($button_text): ?>
        <div class="buttons-list how-pilot-works-section__buttons-list">
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 how-pilot-works-section__btn" data-fancybox>
            <span class="ico ico--arrow-right2"></span>
          </a>
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 how-pilot-works-section__btn" data-fancybox>
            <?php echo $button_text ?>
          </a>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>