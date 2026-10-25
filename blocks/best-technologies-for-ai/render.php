<?php

/**
 * Best technologies for AI section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$technology_blocks = get_field('technology_blocks');
$additional_technologies_block = get_field('additional_technologies_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'best-technologies-for-ai';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="best-technologies-for-ai__container">
      <div class="best-technologies-for-ai__header">
        <?php if ($title): ?>
          <div class="best-technologies-for-ai__title-wrapper">
            <h2 class="section-title section-title--smaller best-technologies-for-ai__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="best-technologies-for-ai__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($technology_blocks): ?>
        <div class="best-technologies-for-ai__items">
          <?php foreach ($technology_blocks as $key => $technology_block): ?>
            <div class="technology-for-ai-block">
              <div class="technology-for-ai-block__header">
                <?php if ($technology_block['icon']) : ?>
                  <div class="technology-for-ai-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($technology_block['icon'], 'full', false, array('class' => 'technology-for-ai-block__icon')); ?>
                  </div>
                <?php endif; ?>

                <?php if ($technology_block['title']): ?>
                  <h3 class="technology-for-ai-block__title">
                    <?php echo $technology_block['title'] ?>
                  </h3>
                <?php endif; ?>
              </div>

              <div class="technology-for-ai-block__body">
                <?php if ($technology_block['website_types']): ?>
                  <div class="technology-for-ai-block__website-types-wrapper">
                    <p class="technology-for-ai-block__website-types-label">
                      Best for
                    </p>

                    <ul class="technology-for-ai-block__website-types">
                      <?php foreach ($technology_block['website_types'] as $website_type): ?>
                        <li class="website-type technology-for-ai-block__website-type">
                          <span class="website-type__icon-wrapper">
                            <?php if ($website_type['icon']) : ?>
                              <?php echo wp_get_attachment_image($website_type['icon'], 'full', false, array('class' => 'website-type__icon')); ?>
                            <?php endif; ?>
                          </span>

                          <?php if ($website_type['name']): ?>
                            <span class="website-type__name">
                              <?php echo $website_type['name'] ?>
                            </span>
                          <?php endif; ?>
                        </li>
                      <?php endforeach;?>
                    </ul>
                  </div>
                <?php endif; ?>

                <?php if ($technology_block['reason']): ?>
                  <div class="technology-for-ai-block__reason-wrapper">
                    <p class="technology-for-ai-block__reason-label">
                      Why it works well with AI
                    </p>

                    <div class="technology-for-ai-block__reason">
                      <?php echo $technology_block['reason'] ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>

      <?php //print_r($additional_technologies_block) ?>

      <?php if ($additional_technologies_block['title'] || $additional_technologies_block['technologies'] || $additional_technologies_block['text'] || $additional_technologies_block['button_text']): ?>
        <div class="technologies-block best-technologies-for-ai__technologies-block">
          <?php if ($additional_technologies_block['technologies'] || $additional_technologies_block['title']): ?>
            <div class="technologies-block__technologies-wrapper">
              <?php if ($additional_technologies_block['title']): ?>
                <p class="technologies-block__title">
                  <?php echo $additional_technologies_block['title'] ?>
                </p>
              <?php endif ?>

              <ul class="technologies-block__technologies">
                <?php foreach ($additional_technologies_block['technologies'] as $key => $technology): ?>
                  <li class="technologies-block__technology">
                    <?php echo $technology['name'] ?>
                  </li>
                <?php endforeach;?>
              </ul>
            </div>
          <?php endif ?>

          <?php if ($additional_technologies_block['text']): ?>
            <div class="technologies-block__text">
              <?php echo $additional_technologies_block['text'] ?>
            </div>
          <?php endif ?>
          
          <?php if ($additional_technologies_block['button_text']): ?>
            <div class="buttons-list technologies-block__buttons-list hidden-xs">
              <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 technologies-block__btn" data-fancybox>
                <span class="ico ico--arrow-right2"></span>
              </a>
              <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 technologies-block__btn" data-fancybox>
                <?php echo $additional_technologies_block['button_text'] ?>
              </a>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>