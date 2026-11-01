<?php

/**
 * How AI Catalog work section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$blocks = get_field('blocks');
$note = get_field('note');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'how-ai-catalog-work-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="how-ai-catalog-work-section__container">
      <div class="how-ai-catalog-work-section__text-wrapper">
        <?php if ($title): ?>
          <h2 class="section-title section-title--left section-title--smaller how-ai-catalog-work-section__title">
            <?php echo $title ?>
          </h2>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="how-ai-catalog-work-section__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($blocks): ?>
        <div class="how-ai-catalog-work-section__blocks">
          <?php foreach ($blocks as $key => $block): ?>
            <?php if ($key === 0 || $key === 2): ?>
              <div class="how-ai-catalog-work-section__block-column">
            <?php endif; ?>

            <div class="how-ai-catalog-work-block how-ai-catalog-work-section__block">
              <?php if ($block['title']): ?>
                <h3 class="how-ai-catalog-work-block__title">
                  <?php echo $block['title'] ?>
                </h3>
              <?php endif; ?>

              <?php if ($block['info_block_type'] === 'rectangles'): ?>
                <div class="how-ai-catalog-work-block__rectangles">
                  <?php for ($i=0; $i<4; $i++): ?>
                    <div class="how-ai-catalog-work-block__rectangle">
                      <?php if ($i === 0): ?>
                        #1
                      <?php endif ?>
                    </div>
                  <?php endfor ?>
                </div>
              <?php endif; ?>
              
              <?php if ($block['info_block_type'] === 'tags'): ?>
                <?php if ($block['tags']): ?>
                  <ul class="how-ai-catalog-work-block__tags">
                    <?php foreach ($block['tags'] as $tag): ?>
                      <li class="how-ai-catalog-work-block__tag">
                        <?php if ($tag['name']): ?>
                          <?php echo $tag['name'] ?>
                        <?php endif; ?>
                      </li>
                    <?php endforeach;?>
                  </ul>
                <?php endif; ?>
              <?php endif; ?>
              
              <?php if ($block['info_block_type'] === 'image'): ?>
                <?php if ($block['image']): ?>
                  <?php echo wp_get_attachment_image($block['image'], 'full', '', array('class' => 'how-ai-catalog-work-block__image')); ?>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($block['info_block_type'] === 'search_results'): ?>
                <div class="how-ai-catalog-work-block__search-results">
                  <div class="how-ai-catalog-work-block__search-text">
                    <?php echo $block['search_results']['search_text'] ?>
                  </div>
                  
                  <ul class="how-ai-catalog-work-block__search-results-list">
                    <?php foreach ($block['search_results']['results'] as $result): ?>
                      <li class="how-ai-catalog-work-block__search-results-item">
                        <?php if ($result['result_name']): ?>
                          <?php echo $result['result_name'] ?>
                        <?php endif; ?>
                      </li>
                    <?php endforeach;?>
                  </ul>
                </div>
              <?php endif; ?>

              <?php if ($block['description']): ?>
                <div class="how-ai-catalog-work-block__description">
                  <?php echo $block['description'] ?>
                </div>
              <?php endif; ?>
            </div>

            <?php if ($key === 1 || $key === 3): ?>
              </div>
            <?php endif; ?>
          <?php endforeach;?>
        </div>
      <?php endif; ?>

      <?php if ($note): ?>
        <div class="how-ai-catalog-work-section__note">
          <?php echo $note ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>