<?php

/**
 * Software development methods section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$development_methods = get_field('development_methods');
$characteristics = get_field('characteristics');
$our_offer_block = get_field('our_offer_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'software-development-methods';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="software-development-methods__container">
      <div class="software-development-methods__header">
        <?php if ($title): ?>
          <div class="software-development-methods__title-wrapper">
            <h2 class="section-title section-title--left section-title--smaller software-development-methods__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="software-development-methods__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($characteristics): ?>
        <div class="software-development-methods__characteristics">
          <ul class="software-development-methods__characteristics-list">
            <?php foreach ($characteristics as $characteristic): ?>
              <li class="software-development-methods__characteristics-item">
                <?php echo $characteristic['name'] ?>
              </li>
            <?php endforeach;?>
          </ul>
        </div>
      <?php endif; ?>
      
      <?php if ($development_methods): ?>
        <div class="software-development-methods__items">
          <?php foreach ($development_methods as $key => $development_method): ?>
            <div class="software-development-method software-development-method--<?php echo str_replace('_', '-', $development_method['block_style']) ?>-style">
              <div class="software-development-method__header">
                <div class="software-development-method__label">
                  WAY <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </div>

                <?php if ($development_method['term']): ?>
                  <div class="software-development-method__term">
                    <?php echo $development_method['term'] ?>
                  </div>
                <?php endif; ?>
              </div>

              <?php if ($development_method['title']): ?>
                <h3 class="software-development-method__title">
                  <?php echo $development_method['title'] ?>
                </h3>
              <?php endif; ?>

              <?php if ($development_method['description']): ?>
                <div class="software-development-method__description">
                  <?php echo $development_method['description'] ?>
                </div>
              <?php endif; ?>

              <div class="software-development-method__timeline">
                <div class="software-development-method__timeline-header">
                  <div class="software-development-method__timeline-title">The timeline</div>

                  <?php if ($development_method['timeline']['label']): ?>
                    <div class="software-development-method__timeline-label">
                      <?php echo $development_method['timeline']['label'] ?>
                    </div>
                  <?php endif; ?>
                </div>
                
                <div class="software-development-method__timeline-rectangles-wrapper">
                  <div class="software-development-method__timeline-rectangles">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                      <div class="software-development-method__timeline-rectangle software-development-method__timeline-rectangle--<?php echo $development_method['timeline']['rectangles_style'] ?>-style"></div>
                    <?php endfor; ?>
                  </div>

                  <?php if ($development_method['timeline']['additional_label']): ?>
                    <div class="software-development-method__timeline-additional-label">
                      <?php echo $development_method['timeline']['additional_label'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="software-development-method__characteristics">
                <ul class="software-development-method__characteristics-list">
                  <?php if ($development_method['the_engineers']): ?>
                    <li class="software-development-method__characteristics-item">
                      <span class="software-development-method__characteristics-item-label">
                        The engineers
                      </span>

                      <span class="software-development-method__characteristics-item-value">
                        <?php echo $development_method['the_engineers'] ?>
                      </span>
                    </li>
                  <?php endif; ?>

                  <?php if ($development_method['the_quality_bar']): ?>
                    <li class="software-development-method__characteristics-item">
                      <span class="software-development-method__characteristics-item-label">
                        The quality bar
                      </span>

                      <span class="software-development-method__characteristics-item-value">
                        <?php echo $development_method['the_quality_bar'] ?>
                      </span>
                    </li>
                  <?php endif; ?>

                  <?php if ($development_method['billing']): ?>
                    <li class="software-development-method__characteristics-item">
                      <span class="software-development-method__characteristics-item-label">
                        Billing
                      </span>

                      <span class="software-development-method__characteristics-item-value">
                        <?php echo $development_method['billing'] ?>
                      </span>
                    </li>
                  <?php endif; ?>

                  <?php if ($development_method['ownership']): ?>
                    <li class="software-development-method__characteristics-item">
                      <span class="software-development-method__characteristics-item-label">
                        Ownership
                      </span>

                      <span class="software-development-method__characteristics-item-value software-development-method__characteristics-item-value--ownership">
                        <?php echo $development_method['ownership'] ?>
                      </span>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          <?php endforeach;?>
        </div>

        <div class="software-development-methods__toggle-btn-wrapper">
          <button type="button" class="software-development-methods__toggle-btn">Show full comparison</button>
        </div>
      <?php endif; ?>
      
      <?php if ($our_offer_block): ?>
        <div class="our-offer-block software-development-methods__our-offer-block">          
          <div class="our-offer-block__questions-and-note">
            <?php if ($our_offer_block['questions']): ?>
              <ul class="our-offer-block__questions">
                <?php foreach ($our_offer_block['questions'] as $question): ?>
                  <li class="our-offer-block__question">
                    <?php echo $question['text'] ?>
                  </li>
                <?php endforeach;?>
              </ul>
            <?php endif; ?>

            <?php if ($our_offer_block['note']): ?>
              <p class="our-offer-block__note">
                <?php echo $our_offer_block['note'] ?>
              </p>
            <?php endif; ?>
          </div>
          
          <div class="our-offer-block__title-and-description">
            <?php if ($our_offer_block['title']): ?>
              <h3 class="our-offer-block__title">
                <?php echo $our_offer_block['title'] ?>
              </h3>
            <?php endif; ?>

            <?php if ($our_offer_block['description']): ?>
              <div class="our-offer-block__description">
                <?php echo $our_offer_block['description'] ?>
              </div>
            <?php endif; ?>

            <div class="buttons-list our-offer-block__buttons-list">
              <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--radius-16 btn-mintgreen--dark-bg-hover btn-white--padding-10" data-fancybox>
                <span class="ico ico--arrow-right2"></span>
              </a>
              <a href="#contact-form-popup" class="btn-mintgreen btn-mintgreen--radius-16 btn-mintgreen--dark-bg-hover" data-fancybox>
                <?php echo $our_offer_block['button_text'] ?>
              </a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>