<?php

/**
 * Cooperation options section template.
 *
 * @param array $block The block settings and attributes.
 */

$block_style = get_field('block_style') ?? 'default';
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

$block_style = str_replace('_', '-', $block_style);
$class_name .= ' cooperation-options-section--' . esc_attr($block_style) . '-style';
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
        <?php if (!wp_is_mobile()): ?>
          <div class="cooperation-options-section__items">
            <?php foreach ($cooperation_options as $key => $cooperation_option): ?>
              <div class="cooperation-options-block cooperation-options-block--<?php echo esc_attr($block_style) . '-style' ?>">
                <div class="cooperation-options-block__wrapper">
                  <div class="cooperation-options-block__header">
                    <?php if ($cooperation_option['label']): ?>
                      <div class="cooperation-options-block__label">
                        <?php echo $cooperation_option['label'] ?>
                      </div>
                    <?php endif; ?>

                    <div class="cooperation-options-block__main-info">
                      <?php if ($cooperation_option['title']): ?>
                        <h3 class="cooperation-options-block__title<?php echo $block_style !== 'ways-to-run' ? ' grad-text' : '' ?>">
                          <?php echo $cooperation_option['title'] ?>
                        </h3>
                      <?php endif; ?>

                      <?php if ($block_style === 'ways-to-run' && $cooperation_option['price_from']): ?>
                        <div class="cooperation-options-block__price-from">
                          <span class="cooperation-options-block__price-from-prefix">From</span>

                          <span class="cooperation-options-block__price-from-value grad-text">
                            <?php echo $cooperation_option['price_from'] ?>
                          </span>

                          <?php if ($cooperation_option['price_from_suffix']): ?>
                            <span class="cooperation-options-block__price-from-suffix">
                              <?php echo $cooperation_option['price_from_suffix'] ?>
                            </span>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($cooperation_option['description']): ?>
                        <div class="cooperation-options-block__description">
                          <?php echo $cooperation_option['description'] ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($block_style === 'model-comparison' && $cooperation_option['icon']): ?>
                        <?php echo wp_get_attachment_image($cooperation_option['icon'], 'full', false, ['class' => 'cooperation-options-block__icon']) ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  
                  <?php if (($block_style === 'ways-to-run' && $cooperation_option['icon']) || $cooperation_option['characteristics']): ?>
                    <div class="cooperation-options-block__characteristics-wrapper">
                      <?php if ($block_style === 'ways-to-run' && $cooperation_option['icon']): ?>
                        <div class="cooperation-options-block__icon-wrapper">
                          <?php echo wp_get_attachment_image($cooperation_option['icon'], 'full', false, ['class' => 'cooperation-options-block__icon']) ?>
                        </div>
                      <?php endif; ?>

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
                  <?php endif; ?>
                </div>
                
                <?php if ($block_style === 'default' || $block_style === 'ways-to-run'): ?>
                  <div class="buttons-list cooperation-options-block__buttons-list">
                    <a href="#contact-form-popup" class="<?php echo !$key || $block_style === 'ways-to-run' ? ' btn-darkgreen' : ' btn-mintgreen' ?> btn-white--padding-10" data-fancybox>
                      <span class="ico ico--arrow-right2"></span>
                    </a>
                    <a href="<?php echo $cooperation_option['button']['url'] ?>" class="<?php echo !$key || $block_style === 'ways-to-run' ? ' btn-darkgreen' : ' btn-mintgreen' ?>" data-fancybox>
                      <?php echo $cooperation_option['button']['text'] ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>

              <?php if (!$key): ?>
                <?php if ($block_style === 'default'): ?>
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
                <?php elseif ($block_style === 'model-comparison'): ?>
                  <?php $recommend_block = get_field('recommend_block') ?>
                  <div class="cooperation-options-section__recommend-block">
                    <?php if ($recommend_block['icon']): ?>
                      <div class="cooperation-options-section__recommend-block-icon-wrapper">
                        <?php echo wp_get_attachment_image($recommend_block['icon'], 'full', false, ['class' => 'cooperation-options-section__recommend-block-icon']) ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($recommend_block['title']): ?>
                      <div class="cooperation-options-section__recommend-block-title grad-text">
                        <?php echo $recommend_block['title'] ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach;?>
          </div>
        <?php else: ?>
          <?php $compare_block = get_field('compare_block') ?>

          <div class="cooperation-compare-tabs cooperation-options-section__compare-tabs" data-tabs-container>
            <div class="cooperation-compare-tabs__header">
              <div class="cooperation-compare-tabs__label">
                <?php echo $compare_block['label'] ?>
              </div>

              <h3 class="cooperation-compare-tabs__title">
                <?php echo $compare_block['title'] ?>
              </h3>

              <div class="cooperation-compare-tabs__list">
                <?php foreach ($cooperation_options as $key => $cooperation_option): ?>
                  <button class="cooperation-compare-tabs__btn<?php echo !$key ? ' active' : '' ?>" data-tab-id="tab-<?php echo $key ?>">
                    <?php echo $cooperation_option['label'] ?>
                  </button>
                <?php endforeach;?>
              </div>
            </div>

            <div class="cooperation-compare-tabs__panels">
              <?php foreach ($cooperation_options as $key => $cooperation_option): ?>
                <div class="cooperation-compare-tabs__panel<?php echo !$key ? ' show' : '' ?>" data-panel-id="tab-<?php echo $key ?>">
                  <div class="cooperation-options-block">
                    <div class="cooperation-options-block__wrapper">
                      <div class="cooperation-options-block__header">
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
                          <?php for ($i = 0; $i < count($cooperation_option['characteristics']); $i++): ?>
                            <li class="cooperation-options-block__characteristics-item">
                              <span class="cooperation-options-block__characteristics-name">
                                <?php echo $compare_block['characteristics'][$i]['characteristic_name'] ?>
                              </span>
                              
                              <span class="cooperation-options-block__characteristics-value">
                                <?php echo $cooperation_option['characteristics'][$i]['characteristic_name'] ?>
                              </span>
                            </li>
                          <?php endfor;?>
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
                </div>
              <?php endforeach;?>
            </div>
          </div>
        <?php endif; ?>
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