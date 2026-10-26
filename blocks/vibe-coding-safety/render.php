<?php

/**
 * Vibe coding safety section template.
 *
 * @param array $block The block settings and attributes.
 */

$title = get_field('title');
$problem = get_field('problem');
$solution = get_field('solution');
$note = get_field('note');
$properties_block = get_field('properties_block');

$anchor = '';
if (! empty($block['anchor'])) {
  $anchor = 'id=' . esc_attr($block['anchor']) . ' ';
}

$class_name = 'vibe-coding-safety-section';
if (! empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
  <div class="container">
    <div class="vibe-coding-safety-section__container">
      <?php if ($title || $problem || $solution || $note): ?>
        <div class="vibe-coding-safety-section__text-wrapper">
          <?php if ($title): ?>
            <div class="vibe-coding-safety-section__title-wrapper">
              <h2 class="section-title section-title--smaller section-title--left vibe-coding-safety-section__title grad-text">
                <?php echo $title ?>
              </h2>
            </div>
          <?php endif; ?>

          <?php if ($problem): ?>
            <div class="vibe-coding-safety-section__problem">
              <?php echo $problem ?>
            </div>
          <?php endif; ?>

          <?php if ($solution): ?>
            <div class="vibe-coding-safety-section__solution">
              <?php echo $solution ?>
            </div>
          <?php endif; ?>

          <?php if ($note): ?>
            <div class="vibe-coding-safety-section__note">
              <?php echo $note ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <?php if ($properties_block['title'] || $properties_block['properties']): ?>
        <div class="software-properties-block vibe-coding-safety-section__software-properties-block">
          <?php if ($properties_block['title']): ?>
            <h3 class="software-properties-block__title">
              <?php echo $properties_block['title'] ?>
            </h3>
          <?php endif; ?>
          
          <ul class="software-properties-block__properties">
            <?php foreach ($properties_block['properties'] as $key => $property): ?>
              <li class="software-properties-block__property">
                <span class="software-properties-block__property-number">
                  <?php echo str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </span>

                <p class="software-properties-block__property-text-wrapper">
                  <?php if ($property['title']): ?>
                    <strong class="software-properties-block__property-title">
                      <?php echo $property['title'] ?>
                    </strong>
                  <?php endif; ?>

                  <?php if ($property['description']): ?>
                    <span class="software-properties-block__property-description">
                      <?php echo $property['description'] ?>
                    </span>
                  <?php endif; ?>
                </p>
              </li>
            <?php endforeach;?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>