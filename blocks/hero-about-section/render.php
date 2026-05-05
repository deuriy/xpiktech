<?php

/**
 * Hero About Section template.
 *
 * @param array $block The block settings and attributes.
 */

$hero_about_title = get_field('hero_about_title');
$hero_about_text = get_field('hero_about_text');
$hero_about_button = get_field('hero_about_button');
$hero_about_image_id = get_field('hero_about_image');

$geography_block_text = get_field('geography_block_text');
$geography_block_number = get_field('geography_block_number');
$geography_block_button = get_field('geography_block_button');

$achievement_blocks = get_field('achievement_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$class_name = 'hero-about-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="hero-about-section__container">
      <div class="hero-about-block">
        <?php if ($hero_about_title || $hero_about_text): ?>
          <div class="hero-about-block__text-wrapper">
            <?php if ($hero_about_title): ?>
              <h1 class="hero-about-block__title">
                <?php echo esc_html($hero_about_title) ?>
              </h1>
            <?php endif; ?>

            <?php if ($hero_about_text): ?>
              <div class="hero-about-block__text">
                <?php echo wp_kses_post($hero_about_text) ?>
              </div>
            <?php endif; ?>

            <?php if ($hero_about_button['url'] && $hero_about_button['text']): ?>
              <a href="<?php echo esc_url($hero_about_button['url']) ?>" class="btn-white btn-white--arrow-rect hero-about-block__btn">
                <?php echo esc_html($hero_about_button['text']) ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($hero_about_image_id) : ?>
          <div class="hero-about-block__img-wrapper">
            <?php echo wp_get_attachment_image($hero_about_image_id, 'full', false, array('class' => 'hero-about-block__img')); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="geography-block">
        <div class="geography-block__text-wrapper">
          <?php if ($geography_block_text): ?>
            <div class="geography-block__text">
              <?php echo wp_kses_post($geography_block_text) ?>
            </div>
          <?php endif; ?>

          <?php if ($geography_block_number): ?>
            <div class="geography-block__number-wrapper">
              <div class="geography-block__number">
                <?php echo wp_kses_post($geography_block_number) ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($geography_block_button['url'] && $geography_block_button['text']): ?>
            <a href="<?php echo esc_url($geography_block_button['url']) ?>" class="btn-darkgreen geography-block__btn">
              <?php echo esc_html($geography_block_button['text']) ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if ($achievement_blocks): ?>
      <div class="achievement-blocks-wrapper hero-about-section__achievement-blocks-wrapper">
        <div class="achievement-blocks">
          <?php foreach ($achievement_blocks as $achievement_block): ?>
            <div class="achievement-block achievement-blocks__item">
              <?php if ($achievement_block['image']) : ?>
                <div class="achievement-block__icon-wrapper">
                  <?php echo wp_get_attachment_image($achievement_block['image'], 'full', false, array('class' => 'achievement-block__icon')); ?>
                </div>
              <?php endif; ?>

              <?php if ($achievement_block['title']): ?>
                <div class="achievement-block__title">
                  <?php echo esc_html($achievement_block['title']) ?>
                </div>
              <?php endif; ?>

              <?php if ($achievement_block['text']): ?>
                <div class="achievement-block__text">
                  <?php echo esc_html($achievement_block['text']) ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>