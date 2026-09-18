<?php

/**
 * Cooperation options section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$cooperation_options = get_field('cooperation_options');
$conditions_block = get_field('conditions_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'cooperation-options-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="cooperation-options-section__container">
      <div class="cooperation-options-section__header">
        <?php if ($title): ?>
          <div class="cooperation-options-section__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller cooperation-options-section__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="cooperation-options-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($cooperation_options): ?>
        <div class="cooperation-options-section__items">
          <?php foreach ($cooperation_options as $key => $cooperation_option): ?>
            <div class="cooperation-options-block">
              <div class="cooperation-options-block__wrapper">
                <div class="cooperation-options-block__header">
                  <?php if ($cooperation_option['label']): ?>
                    <div class="cooperation-options-block__label">
                      <?php echo $cooperation_option['label'] ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($cooperation_option['title']): ?>
                    <h3 class="cooperation-options-block__title grad-text">
                      <?php echo $cooperation_option['title'] ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($cooperation_option['description']): ?>
                    <div class="cooperation-options-block__description">
                      <?php echo $cooperation_option['description'] ?>
                    </div>
                  <?php endif; ?>
                </div>

                <?php if ($cooperation_option['characteristics']): ?>
                  <ul class="cooperation-options-block__characteristics-list">
                    <?php foreach ($cooperation_option['characteristics'] as $characteristic): ?>
                      <li class="cooperation-options-block__characteristics-item">
                        <?php echo $characteristic['characteristic_name'] ?>
                      </li>
                    <?php endforeach;?>
                  </ul>
                <?php endif; ?>
              </div>

              <div class="buttons-list cooperation-options-block__buttons-list">
                <a href="#contact-form-popup" class="<?php echo !$key ? ' btn-darkgreen' : ' btn-mintgreen' ?> btn-white--padding-10" data-fancybox>
                  <span class="ico ico--arrow-right2"></span>
                </a>
                <a href="<?php echo $cooperation_option['button']['url'] ?>" class="<?php echo !$key ? ' btn-darkgreen' : ' btn-mintgreen' ?>" data-fancybox>
                  <?php echo $cooperation_option['button']['text'] ?>
                </a>
              </div>
            </div>

            <?php if (!$key): ?>
              <?php $compare_block = get_field('compare_block') ?>
              <div class="cooperation-compare-block">
                <?php if ($compare_block['label'] || $compare_block['title']): ?>
                  <div class="cooperation-compare-block__header">
                    <?php if ($compare_block['label']): ?>
                      <div class="cooperation-compare-block__label">
                        <?php echo $compare_block['label'] ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($compare_block['title']): ?>
                      <h3 class="cooperation-compare-block__title">
                        <?php echo $compare_block['title'] ?>
                      </h3>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <?php if ($compare_block['characteristics']): ?>
                  <ul class="cooperation-compare-block__characteristics-list">
                    <?php foreach ($compare_block['characteristics'] as $characteristic): ?>
                      <li class="cooperation-compare-block__characteristics-item">
                        <?php echo $characteristic['characteristic_name'] ?>
                      </li>
                    <?php endforeach;?>
                  </ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
      
      <?php if ($conditions_block): ?>
        <div class="cooperation-conditions-block cooperation-options-section__conditions-block">
          <div class="cooperation-conditions-block__text-wrapper">
            <?php if ($conditions_block['title']): ?>
              <h3 class="cooperation-conditions-block__title">
                <?php echo $conditions_block['title'] ?>
              </h3>
            <?php endif; ?>

            <?php if ($conditions_block['description']): ?>
              <div class="cooperation-conditions-block__description">
                <?php echo $conditions_block['description'] ?>
              </div>
            <?php endif; ?>
          </div>

          <?php if ($conditions_block['conditions']): ?>
            <dl class="cooperation-conditions-block__list">
              <?php foreach ($conditions_block['conditions'] as $characteristic): ?>
                <div class="cooperation-conditions-block__item">
                  <dt class="cooperation-conditions-block__item-value">
                    <?php echo $characteristic['value'] ?>
                  </dt>

                  <dd class="cooperation-conditions-block__item-name">
                    <?php echo $characteristic['name'] ?>
                  </dd>
                </div>
              <?php endforeach;?>
            </dl>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>