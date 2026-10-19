<?php

/**
 * Deployment section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style');
$section_title = get_field('section_title');
$section_description = get_field('section_description');
$title = get_field('title');
$description = get_field('description');
$steps = get_field('steps');
$image = get_field('image');
$items = get_field('items');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'deployment-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$block_style = str_replace('_', '-', $block_style);
$class_name .= ' deployment-section--' . esc_attr($block_style) . '-style';
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="deployment-section__container">
      <?php if ($block_style === 'solutions-page' && ($section_title || $section_description)): ?>
        <div class="deployment-section__header">
          <?php if ($section_title): ?>
            <div class="deployment-section__title-wrapper">
              <h2 class="grad-text section-title section-title--smaller section-title--left deployment-section__section-title">
                <?php echo $section_title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($section_description): ?>
            <div class="deployment-section__section-description">
              <?php echo $section_description ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="deployment-section__text-wrapper">
        <?php if ($title): ?>
          <div class="deployment-section__title-wrapper">
            <?php $title_tag = $block_style === 'solutions-page' ? 'h3' : 'h2' ?>
            <<?php echo $title_tag ?> class="deployment-section__title<?php echo $block_style !== 'solutions-page' ? ' section-title section-title--smaller section-title--left' : '' ?> ">
              <?php echo $title ?>
            </<?php echo $title_tag ?>>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="deployment-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>

        <?php if ($block_style === 'default' && $steps): ?>
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
        
        <?php if ($block_style === 'services-page'): ?>
          <div class="buttons-list deployment-section__buttons-list hidden-xs">
            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 btn-darkgreen--dark-bg-hover deployment-section__btn" data-fancybox>
              <span class="ico ico--arrow-right2"></span>
            </a>
            <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 deployment-section__btn" data-fancybox>Start With an Estimate</a>
          </div>
        <?php endif; ?>

        <?php if ($block_style === 'solutions-page' && $items): ?>
          <ul class="check-list check-list--white-bg-item deployment-section__list">
            <?php foreach ($items as $key => $item): ?>
              <li class="check-list__item">
                <span class="grad-text check-list__item-inner">
                  <?php echo $item['name'] ?>
                </span>
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

      <?php if ($block_style === 'services-page'): ?>
        <div class="buttons-list deployment-section__buttons-list hidden-sm-plus">
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 btn-darkgreen--dark-bg-hover deployment-section__btn" data-fancybox>
            <span class="ico ico--arrow-right2"></span>
          </a>
          <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 deployment-section__btn" data-fancybox>Start With an Estimate</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>