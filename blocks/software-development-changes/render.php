<?php

/**
 * Software development changes section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$criteria_blocks = get_field('criteria_blocks');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'software-development-changes';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="software-development-changes__container">
      <div class="software-development-changes__header">
        <?php if ($title): ?>
          <div class="software-development-changes__title-wrapper">
            <h2 class="section-title section-title--smaller software-development-changes__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="software-development-changes__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($criteria_blocks): ?>
        <div class="software-development-changes__items">
          <?php foreach ($criteria_blocks as $key => $criteria_block): ?>
            <div class="software-criteria-block software-criteria-block--<?php echo str_replace(' ', '-', strtolower($criteria_block['title'])) ?>">
              <div class="software-criteria-block__header">
                <?php if ($criteria_block['icon']) : ?>
                  <div class="software-criteria-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($criteria_block['icon'], 'full', false, array('class' => 'software-criteria-block__icon')); ?>
                  </div>
                <?php endif; ?>
                
                <div class="software-criteria-block__number">
                  <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </div>

                <?php if ($criteria_block['title']): ?>
                  <h3 class="software-criteria-block__title">
                    <?php echo $criteria_block['title'] ?>
                  </h3>
                <?php endif; ?>
              </div>

              <?php if ($criteria_block['description']): ?>
                <div class="software-criteria-block__description-wrapper">
                  <span class="software-criteria-block__description-label">
                    STAYS THE SAME
                  </span>

                  <div class="software-criteria-block__description">
                    <?php echo $criteria_block['description'] ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($criteria_block['changes_description']): ?>
                <div class="software-criteria-block__changes-description-wrapper">
                  <span class="software-criteria-block__changes-description-label">
                    CHANGES
                  </span>

                  <div class="software-criteria-block__changes-description">
                    <?php echo $criteria_block['changes_description'] ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>