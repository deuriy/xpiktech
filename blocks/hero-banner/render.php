<?php

/**
 * Hero Banner template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$text = strip_tags(get_field('text'), ['br']);
$image_id = get_field('image');
$image_mob_id = get_field('image_mob');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'hero-banner-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container hero-banner-section__container">
    <div class="hero-banner hero-banner-section__banner">
      <?php if ($title || $text): ?>
        <div class="hero-banner__text-wrapper">
          <nav class="breadcrumbs hero-banner__breadcrumbs hidden-xs" aria-label="breadcrumb">
            <ul class="breadcrumbs__list">
              <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">Home</a>
              </li>
              <li class="breadcrumbs__item">
                <span class="breadcrumbs__text">
                  <?php the_title() ?>
                </span>
              </li>
            </ul>
          </nav>

          <?php if ($title): ?>
            <h1 class="hero-banner__title">
              <?php echo $title ?>
            </h1>
          <?php endif; ?>

          <?php if ($text): ?>
            <p class="hero-banner__text">
              <?php echo $text ?>
            </p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <?php if (wp_is_mobile()): ?>
        <?php if ($image_mob_id): ?>
          <div class="hero-banner__img-wrapper">
            <?php echo wp_get_attachment_image($image_mob_id, 'full', false, ['class' => 'hero-banner__img']) ?>
          </div>
        <?php endif; ?>
      <?php else: ?>
        <?php if ($image_id): ?>
          <div class="hero-banner__img-wrapper">
            <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'hero-banner__img']) ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <div class="buttons-list hero-banner-section__buttons">
      <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--dark-bg-hover btn-mintgreen--radius-16 btn-mintgreen--padding-10 hero-banner-section__btn" data-fancybox>
        <span class="ico ico--arrow-right2"></span>
      </a>
      <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--dark-bg-hover hero-banner-section__btn" data-fancybox>Book a Free Consultation</a>
    </div>
  </div>
</section>