<?php

/**
 * Industries we know section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$industries = get_field('industries');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'industries-we-know-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="industries-we-know-section__container">
      <?php if ($title): ?>
        <div class="industries-we-know-section__title-wrapper">
          <h2 class="section-title section-title--smaller grad-text industries-we-know-section__title">
            <?php echo $title ?>
          </h2>
        </div>
      <?php endif; ?>

      <?php if ($description): ?>
        <div class="industries-we-know-section__description">
          <?php echo $description ?>
        </div>
      <?php endif; ?>
      
      <?php if ($industries): ?>
        <div class="industries-we-know-section__tabs" data-tabs-container>
          <div class="industries-we-know-section__tab-list">
            <?php foreach ($industries as $key => $industry): ?>
              <button class="tab-button industries-we-know-section__tab-btn<?php echo !$key ? ' active' : '' ?>" data-tab-id="tab-<?php echo $key ?>">
                <span class="grad-text"><?php echo $industry['title'] ?></span>
              </button>

              <?php if (wp_is_mobile()): ?>
                <div class="industries-we-know-section__tab-panel<?php echo !$key ? ' show' : '' ?>" data-panel-id="tab-<?php echo $key ?>">
                  <div class="industries-we-know-block-wrapper">
                    <div class="industries-we-know-block industries-we-know-block-wrapper__block">
                      <div class="industries-we-know-block__text-wrapper">
                        <?php if ($industry['icon']): ?>
                          <div class="industries-we-know-block__icon-wrapper">
                            <?php echo wp_get_attachment_image($industry['icon'], 'full', false, ['class' => 'industries-we-know-block__icon']) ?>
                          </div>
                        <?php endif; ?>

                        <?php if ($industry['title']): ?>
                          <h3 class="industries-we-know-block__title">
                            <?php echo $industry['title'] ?>
                          </h3>
                        <?php endif; ?>

                        <?php if ($industry['text']): ?>
                          <div class="industries-we-know-block__text">
                            <?php echo $industry['text'] ?>
                          </div>
                        <?php endif; ?>
                      </div>

                      <div class="what-we-deliver-block industries-we-know-block__what-we-deliver">
                        <div class="what-we-deliver-block__title">What we deliver</div>

                        <?php if ($industry['what_we_deliver']): ?>
                          <ul class="checkmarks-list checkmarks-list--what-we-deliver-block what-we-deliver-block__list">
                            <?php foreach ($industry['what_we_deliver'] as $item): ?>
                              <li class="checkmarks-list__item">
                                <?php echo $item['item'] ?>
                              </li>
                            <?php endforeach;?>
                          </ul>
                        <?php endif; ?>
                      </div>

                      <?php if ($industry['results']['title'] || $industry['results']['value']): ?>
                        <div class="industries-we-know-block__results">
                          <div class="industries-we-know-block__results-value">
                            <?php echo $industry['results']['value'] ?>
                          </div>

                          <div class="industries-we-know-block__results-title">
                            <?php echo $industry['results']['title'] ?>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div class="buttons-list industries-we-know-block-wrapper__buttons-list">
                      <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 industries-we-know-block-wrapper__btn" data-fancybox>
                        <span class="ico ico--arrow-right2"></span>
                      </a>
                      <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 industries-we-know-block-wrapper__btn" data-fancybox>Talk to us</a>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            <?php endforeach;?>
          </div>
          
          <?php if (!wp_is_mobile()): ?>
            <div class="industries-we-know-section__tab-panels hidden-xs">
              <?php foreach ($industries as $key => $industry): ?>
                <div class="industries-we-know-section__tab-panel<?php echo !$key ? ' show' : '' ?>" data-panel-id="tab-<?php echo $key ?>">
                  <div class="industries-we-know-block-wrapper">
                    <div class="industries-we-know-block industries-we-know-block-wrapper__block">
                      <div class="industries-we-know-block__text-wrapper">
                        <?php if ($industry['icon']): ?>
                          <div class="industries-we-know-block__icon-wrapper">
                            <?php echo wp_get_attachment_image($industry['icon'], 'full', false, ['class' => 'industries-we-know-block__icon']) ?>
                          </div>
                        <?php endif; ?>

                        <?php if ($industry['title']): ?>
                          <h3 class="industries-we-know-block__title">
                            <?php echo $industry['title'] ?>
                          </h3>
                        <?php endif; ?>

                        <?php if ($industry['text']): ?>
                          <div class="industries-we-know-block__text">
                            <?php echo $industry['text'] ?>
                          </div>
                        <?php endif; ?>
                      </div>

                      <div class="what-we-deliver-block industries-we-know-block__what-we-deliver">
                        <div class="what-we-deliver-block__title">What we deliver</div>

                        <?php if ($industry['what_we_deliver']): ?>
                          <ul class="checkmarks-list checkmarks-list--what-we-deliver-block what-we-deliver-block__list">
                            <?php foreach ($industry['what_we_deliver'] as $item): ?>
                              <li class="checkmarks-list__item">
                                <?php echo $item['item'] ?>
                              </li>
                            <?php endforeach;?>
                          </ul>
                        <?php endif; ?>
                      </div>

                      <?php if ($industry['results']['title'] || $industry['results']['value']): ?>
                        <div class="industries-we-know-block__results">
                          <div class="industries-we-know-block__results-value">
                            <?php echo $industry['results']['value'] ?>
                          </div>

                          <div class="industries-we-know-block__results-title">
                            <?php echo $industry['results']['title'] ?>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div class="buttons-list industries-we-know-block-wrapper__buttons-list">
                      <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 industries-we-know-block-wrapper__btn" data-fancybox>
                        <span class="ico ico--arrow-right2"></span>
                      </a>
                      <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 industries-we-know-block-wrapper__btn" data-fancybox>Talk to us</a>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>