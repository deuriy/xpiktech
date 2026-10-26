<?php

/**
 * Our strengths in AI section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$description = get_field('description');
$advantage_blocks = get_field('advantage_blocks');
$question_for_engineer = get_field('question_for_engineer_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'our-strengths-in-ai';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="our-strengths-in-ai__container">
      <div class="our-strengths-in-ai__text-wrapper">
        <?php if ($title): ?>
          <div class="our-strengths-in-ai__title-wrapper">
            <h2 class="section-title section-title--smaller section-title--left our-strengths-in-ai__title grad-text">
              <?php echo $title ?>
            </h2>
          </div>
        <?php endif; ?>

        <?php if ($description): ?>
          <div class="our-strengths-in-ai__description">
            <?php echo $description ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($advantage_blocks): ?>
        <div class="our-strengths-in-ai__advantage-blocks">
          <?php foreach ($advantage_blocks as $advantage_block): ?>
            <div class="our-strengths-in-ai-block our-strengths-in-ai__advantage-block">
              <div class="our-strengths-in-ai-block__header">
                <?php if ($advantage_block['icon']) : ?>
                  <div class="our-strengths-in-ai-block__icon-wrapper">
                    <?php echo wp_get_attachment_image($advantage_block['icon'], 'full', false, array('class' => 'our-strengths-in-ai-block__icon')); ?>
                  </div>
                <?php endif; ?>

                <?php if ($advantage_block['info_block_type'] === 'tag'): ?>
                  <?php if ($advantage_block['tag']): ?>
                    <p class="our-strengths-in-ai-block__tag">
                      <?php echo $advantage_block['tag'] ?>
                    </p>
                  <?php endif ?>
                <?php elseif ($advantage_block['info_block_type'] === 'image'): ?>
                  <?php if ($advantage_block['image']) : ?>
                    <?php echo wp_get_attachment_image($advantage_block['image'], 'full', false, array('class' => 'our-strengths-in-ai-block__img')); ?>
                  <?php endif; ?>
                <?php elseif ($advantage_block['info_block_type'] === 'label'): ?>
                  <?php if ($advantage_block['label']): ?>
                    <p class="our-strengths-in-ai-block__label">
                      <?php echo $advantage_block['label'] ?>
                    </p>
                  <?php endif ?>
                <?php elseif ($advantage_block['info_block_type'] === 'tags_list'): ?>
                  <?php if ($advantage_block['tags']): ?>
                    <ul class="our-strengths-in-ai-block__tags">
                      <?php foreach ($advantage_block['tags'] as $tag): ?>
                        <li class="our-strengths-in-ai-block__tag our-strengths-in-ai-block__tag--small">
                          <?php echo $tag['name'] ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif ?>
                <?php endif ?>
              </div>

              <?php if ($advantage_block['title']): ?>
                <h3 class="our-strengths-in-ai-block__title">
                  <?php echo $advantage_block['title'] ?>
                </h3>
              <?php endif; ?>

              <?php if ($advantage_block['description']): ?>
                <div class="our-strengths-in-ai-block__description">
                  <?php echo $advantage_block['description'] ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ($question_for_engineer['title'] || $question_for_engineer['text'] || $question_for_engineer['image']): ?>
        <div class="question-for-engineer our-strengths-in-ai__question-for-engineer">
          <?php if ($question_for_engineer['image']) : ?>
            <?php echo wp_get_attachment_image($question_for_engineer['image'], 'full', false, array('class' => 'question-for-engineer__img')); ?>
          <?php endif; ?>

          <?php if ($question_for_engineer['title']): ?>
            <p class="question-for-engineer__title">
              <?php echo $question_for_engineer['title'] ?>
            </p>
          <?php endif ?>

          <?php if ($question_for_engineer['text']): ?>
            <div class="question-for-engineer__text">
              <?php echo $question_for_engineer['text'] ?>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>