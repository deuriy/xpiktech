<?php

/**
 * Hero Section template.
 *
 * @param array $block The block settings and attributes.
 */

$hero_slides = get_field('hero_slide');
$text_block = get_field('text_block');
$companies_slider = get_field('companies_slider');
$service_blocks = get_field('service_blocks');
$service_block_slides = get_field('service_block_slides');

$anchor = '';
if (! empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$class_name = 'hero-section';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="hero-section__container">
            <?php if ($hero_slides): ?>
                <div class="hero-slider-block hero-section__slider-block">
                    <div class="hero-slider-block__slider-wrapper">
                        <div class="swiper hero-slider hero-slider-block__slider">
                            <div class="swiper-wrapper hero-slider__slides">
                                <?php foreach ($hero_slides as $hero_slide_key => $hero_slide): ?>
                                    <div class="swiper-slide hero-slider__slide">
                                        <div class="hero-block">
                                            <?php if ($hero_slide['title'] || $hero_slide['text']): ?>
                                                <div class="hero-block__text-wrapper">
                                                    <?php if ($hero_slide['title']): ?>
                                                        <h3 class="hero-block__title">
                                                            <?php echo esc_html($hero_slide['title']) ?>
                                                        </h3>
                                                    <?php endif; ?>

                                                    <?php if ($hero_slide['text']): ?>
                                                        <div class="hero-block__text">
                                                            <?php echo wp_kses_post($hero_slide['text']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($hero_slide['image']) : ?>
                                                <div class="hero-block__img-wrapper">
                                                    <?php echo wp_get_attachment_image($hero_slide['image'], 'full', '', array('class' => 'hero-block__img')); ?>
                                                    <?php echo wp_get_attachment_image($hero_slide['hover_image'], 'full', '', array('class' => 'hero-block__hover-img')); ?>

                                                    <?php if (false): ?>
                                                        <img src="<?php echo wp_get_attachment_image_url($hero_slide['image'], 'full') ?>" alt="" class="hero-block__img">
                                                        <img src="<?php echo wp_get_attachment_image_url($hero_slide['hover_image'], 'full') ?>" alt="" class="hero-block__hover-img">
                                                    <?php endif ?>
                                                </div>
                                            <?php endif; ?>

                                            <!-- <svg width="785" height="424" viewBox="0 0 785 424" fill="none" xmlns="http://www.w3.org/2000/svg" class="hero-block__svg">
                                                <g class="hero-block__glow" filter="url(#filter0_fn_1439_2118_<?php //echo $hero_slide_key ?>)">
                                                    <path d="M-27.2928 324.474C-11.7161 313.099 0.0771267 304.697 5.94843 300.496C20.3736 299.635 16.9571 291.208 20.7659 289.93C27.9152 286.981 35.558 284.451 43.5425 284.058C47.3512 284.501 52.0162 285.925 51.9319 289.158C51.5017 305.658 51.4365 325.87 58.2714 352.034C63.3455 371.457 63.3905 394.537 77.7074 405.129C81.1112 407.647 85.3083 408.894 89.5259 408.469C97.9406 407.621 133.259 358.089 168.396 346.454L168.55 346.403C172.356 345.142 177.423 343.463 178.911 346.087C182.265 351.996 180.296 370.63 193.691 376.025C209.369 382.339 234.116 394.644 245.571 383.137C256.542 372.115 268.821 359.629 282.684 324.866C291.112 303.735 298.201 283.68 302.057 267.533C306.296 249.78 310.326 229.592 322.758 222.435C336.715 214.4 349.895 202.161 363.68 197.558C378.877 192.484 395.803 185.887 413.03 187.89C416.838 188.333 420.179 190.004 420.989 192.56C421.799 195.116 419.872 198.34 418.433 201.847C412.536 216.222 406.168 233.513 410.879 254.17C415.118 272.759 421.26 291.117 423.532 313.238C426.05 337.748 429.562 359.911 425.607 376.911C420.989 396.765 395.535 455.341 362.301 459.527C345.826 461.602 322.633 449.661 297.325 450.226C277.496 450.669 259.693 451.09 244.204 457.844C227.691 465.044 173.702 549.882 124.792 552.734C110.468 553.569 95.7005 555.624 87.6785 547.584C64.9652 524.82 63.1465 504.298 51.0461 493.211C40.4676 483.518 29.1524 473.665 13.9076 469.612C-3.46591 464.993 -29.4669 477.531 -43.9197 465.765C-57.3959 454.794 -68.6947 444.072 -69.1385 431.081C-69.9736 406.635 -67.7432 388.392 -64.8868 381.428C-58.9902 367.054 -58.179 347.03 -27.2928 324.474Z" fill="#D7FF00" fill-opacity="0.32" />
                                                    <path d="M-27.2928 324.474C-11.7161 313.099 0.0771267 304.697 5.94843 300.496C20.3736 299.635 16.9571 291.208 20.7659 289.93C27.9152 286.981 35.558 284.451 43.5425 284.058C47.3512 284.501 52.0162 285.925 51.9319 289.158C51.5017 305.658 51.4365 325.87 58.2714 352.034C63.3455 371.457 63.3905 394.537 77.7074 405.129C81.1112 407.647 85.3083 408.894 89.5259 408.469C97.9406 407.621 133.259 358.089 168.396 346.454L168.55 346.403C172.356 345.142 177.423 343.463 178.911 346.087C182.265 351.996 180.296 370.63 193.691 376.025C209.369 382.339 234.116 394.644 245.571 383.137C256.542 372.115 268.821 359.629 282.684 324.866C291.112 303.735 298.201 283.68 302.057 267.533C306.296 249.78 310.326 229.592 322.758 222.435C336.715 214.4 349.895 202.161 363.68 197.558C378.877 192.484 395.803 185.887 413.03 187.89C416.838 188.333 420.179 190.004 420.989 192.56C421.799 195.116 419.872 198.34 418.433 201.847C412.536 216.222 406.168 233.513 410.879 254.17C415.118 272.759 421.26 291.117 423.532 313.238C426.05 337.748 429.562 359.911 425.607 376.911C420.989 396.765 395.535 455.341 362.301 459.527C345.826 461.602 322.633 449.661 297.325 450.226C277.496 450.669 259.693 451.09 244.204 457.844C227.691 465.044 173.702 549.882 124.792 552.734C110.468 553.569 95.7005 555.624 87.6785 547.584C64.9652 524.82 63.1465 504.298 51.0461 493.211C40.4676 483.518 29.1524 473.665 13.9076 469.612C-3.46591 464.993 -29.4669 477.531 -43.9197 465.765C-57.3959 454.794 -68.6947 444.072 -69.1385 431.081C-69.9736 406.635 -67.7432 388.392 -64.8868 381.428C-58.9902 367.054 -58.179 347.03 -27.2928 324.474Z" fill="#F0FCAB" />
                                                </g>
                                                <g class="hero-block__glow" filter="url(#filter1_fn_1439_2118_<?php echo $hero_slide_key ?>)">
                                                    <path d="M809.774 356.398C825.806 352.159 846.7 335.859 855.264 326.041C877.278 300.803 906.196 297.528 921.126 289.738C940.6 279.577 970.107 276.691 997.984 247.449C1034.19 209.476 1049.99 184.604 1057.75 168.225C1072.25 137.603 1099.68 94.1702 1092.28 77.9662C1078.68 48.1668 1066.13 2.02193 1050.05 -14.0133C1028.11 -35.9042 1002.97 -37.9568 904.803 -103.487C879.685 -120.253 872.029 -129.454 862.792 -131.199C845.039 -134.552 828.036 -131.915 801.182 -124.404C780.101 -118.507 762.13 -112.2 740.406 -103.285C707.57 -89.8089 681.353 -99.5012 640.417 -57.2509C609.681 -25.5282 577.842 20.3495 595.547 38.5121C625.878 69.6274 647.411 82.9362 673.645 82.6734C717.845 82.2305 736.664 74.1655 751.554 78.0548C754.945 78.9405 759.109 129.287 796.232 92.1635C800.433 101.426 847.434 130.273 844.315 140.247C840.102 153.723 767.879 252.343 758.899 268.279C727.34 324.285 640.601 276.629 637.276 350.304C636.555 366.285 635.669 465.223 673.122 453.48C689.585 462.299 723.593 362.471 757.233 373.164C775.784 379.061 792.459 360.976 809.774 356.398Z" fill="#F0FCAB" fill-opacity="0.72" />
                                                </g>
                                                <g class="hero-block__glow" filter="url(#filter2_fn_1439_2118_<?php echo $hero_slide_key ?>)">
                                                    <path d="M-85.7762 -236.29C-66.5986 -238.353 -52.1843 -239.733 -44.9991 -240.436C-32.0763 -233.968 -30.8214 -242.975 -26.8839 -242.177C-19.2183 -241.156 -11.334 -239.526 -4.22314 -235.874C-1.1461 -233.586 2.18175 -230.02 0.492568 -227.263C-8.13022 -213.188 -18.2928 -195.716 -25.4553 -169.641C-30.7727 -150.282 -42.2738 -130.272 -35.1706 -113.941C-33.4818 -110.059 -30.4708 -106.88 -26.6058 -105.139C-18.8945 -101.666 36.4582 -126.904 72.7058 -119.411L72.8645 -119.378C76.7904 -118.567 82.0182 -117.487 81.9957 -114.471C81.945 -107.677 70.9226 -92.5234 79.8258 -81.1538C90.2462 -67.8466 105.526 -44.8167 121.2 -49.0551C136.211 -53.1145 153.089 -57.7887 182.476 -80.962C200.34 -95.0488 216.507 -108.872 227.92 -120.928C240.467 -134.183 254.051 -149.651 268.397 -149.633C284.501 -149.613 302.035 -153.623 316.275 -150.716C331.973 -147.512 349.929 -144.762 363.846 -134.414C366.923 -132.126 368.981 -129.009 368.404 -126.391C367.828 -123.772 364.547 -121.944 361.547 -119.625C349.253 -110.125 335.092 -98.3348 328.843 -78.0894C323.22 -59.872 319.36 -40.9025 310.268 -20.6087C300.194 1.87674 292.154 22.8262 280.229 35.5715C266.302 50.456 214.97 88.4573 184.096 75.4658C168.79 69.0255 154.675 47.0877 132.475 34.9231C115.081 25.3925 99.453 16.8558 82.6624 14.96C64.7617 12.9388 -24.4136 59.4162 -68.197 37.4307C-81.0194 30.992 -94.8356 25.3878 -97.7629 14.414C-106.051 -16.6568 -97.3655 -35.3385 -102.301 -50.9904C-106.616 -64.6738 -111.488 -78.865 -122.664 -89.9971C-135.401 -102.684 -164.187 -104.826 -170.821 -122.242C-177.006 -138.481 -181.43 -153.416 -175.319 -164.888C-163.819 -186.478 -152.766 -201.161 -146.811 -205.763C-134.517 -215.264 -123.803 -232.199 -85.7762 -236.29Z" fill="#F0FCAB" fill-opacity="0.8" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_fn_1439_2118_<?php echo $hero_slide_key ?>" x="-269.312" y="-12.4766" width="896.703" height="766.07" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_1439_2118" />
                                                        <feTurbulence type="fractalNoise" baseFrequency="6.0504202842712402 6.0504202842712402" stitchTiles="stitch" numOctaves="3" result="noise" seed="266" />
                                                        <feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA type="discrete" tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
                                                        </feComponentTransfer>
                                                        <feComposite operator="in" in2="effect1_foregroundBlur_1439_2118" in="coloredNoise1" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
                                                        <feMerge result="effect2_noise_1439_2118">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_2118" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                    <filter id="filter1_fn_1439_2118_<?php echo $hero_slide_key ?>" x="430.461" y="-292.633" width="823.062" height="907.078" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur stdDeviation="80" result="effect1_foregroundBlur_1439_2118" />
                                                        <feTurbulence type="fractalNoise" baseFrequency="6.0504202842712402 6.0504202842712402" stitchTiles="stitch" numOctaves="3" result="noise" seed="266" />
                                                        <feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA type="discrete" tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
                                                        </feComponentTransfer>
                                                        <feComposite operator="in" in2="effect1_foregroundBlur_1439_2118" in="coloredNoise1" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
                                                        <feMerge result="effect2_noise_1439_2118">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_2118" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                    <filter id="filter2_fn_1439_2118_<?php echo $hero_slide_key ?>" x="-358.242" y="-422.227" width="906.742" height="680.352" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur stdDeviation="90" result="effect1_foregroundBlur_1439_2118" />
                                                        <feTurbulence type="fractalNoise" baseFrequency="6.0504202842712402 6.0504202842712402" stitchTiles="stitch" numOctaves="3" result="noise" seed="266" />
                                                        <feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA type="discrete" tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
                                                        </feComponentTransfer>
                                                        <feComposite operator="in" in2="effect1_foregroundBlur_1439_2118" in="coloredNoise1" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
                                                        <feMerge result="effect2_noise_1439_2118">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_2118" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                </defs>
                                            </svg> -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- <div class="swiper-thumbs-pagination hero-slider-block__swiper-thumbs-pagination"></div> -->
                    </div>

                    <div class="buttons-list hero-slider-block__buttons">
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 hero-slider-block__btn" data-fancybox>
                            <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 hero-slider-block__btn" data-fancybox>Request a Free Demo</a>
                    </div>

                    <div class="hero-slider-block__thumbs-slider-wrapper">
                        <div class="swiper hero-thumbs-slider">
                            <div class="swiper-wrapper hero-thumbs-slider__slides">
                                <?php foreach ($hero_slides as $hero_slide_key => $hero_slide): ?>
                                    <div class="swiper-slide hero-thumbs-slider__slide">
                                        <div class="hero-thumbs-slider__img-wrapper">
                                            <?php if ($hero_slide['thumb_image']) : ?>
                                                <?php echo wp_get_attachment_image($hero_slide['thumb_image'], 'full', '', array('class' => 'hero-thumbs-slider__img')); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($text_block['title'] || $text_block['text']): ?>
                <div class="text-block hero-section__text-block">
                    <?php if ($text_block['title']) : ?>
                        <div class="text-block__header">
                            <h3 class="grad-text text-block__title">
                                <?php echo esc_html($text_block['title']); ?>
                            </h3>
                            <a href="#" class="green-link text-block__more-link">more</a>
                        </div>
                    <?php endif; ?>

                    <?php if (($text_block['text'])) : ?>
                        <div class="text-block__text">
                            <?php echo wp_kses_post($text_block['text']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($companies_slider['slides']): ?>
                <div class="company-review-slider-block hero-section__company-review-slider-block">
                    <?php if ($companies_slider['title']) : ?>
                        <div class="company-review-slider-block__header">
                            <h3 class="grad-text company-review-slider-block__title">
                                <?php echo esc_html($companies_slider['title']); ?>
                            </h3>
                            <a href="#" class="green-link company-review-slider-block__more-link">more</a>
                        </div>
                    <?php endif; ?>

                    <div class="swiper company-review-slider">
                        <div class="swiper-wrapper company-review-slider__slides">
                            <?php foreach ($companies_slider['slides'] as $company_slide): ?>
                                <div class="swiper-slide company-review-slider__slide">
                                    <div class="company-review-block">
                                        <div class="company-block">
                                            <?php if ($company_slide['logo']) : ?>
                                                <?php echo wp_get_attachment_image($company_slide['logo'], 'full', '', array('class' => 'company-block__logo-img')); ?>
                                            <?php endif; ?>

                                            <?php if ($company_slide['name']): ?>
                                                <h3 class="company-block__name">
                                                    <?php echo esc_html($company_slide['name']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($company_slide['rating_mark'] || $company_slide['reviews_number']): ?>
                                                <div class="rating-block company-block__rating-block">
                                                    <div class="rating-block">
                                                        <?php if ($company_slide['rating_mark']): ?>
                                                            <div class="rating">
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <span class="rating__star ico ico--star ico--size-16<?php echo $i <= $company_slide['rating_mark'] ? ' ico--yellow' : ' ico--grey' ?>"></span>
                                                                <?php endfor; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if ($company_slide['reviews_number']): ?>
                                                            <div class="rating-block__reviews-number">
                                                                (<?php echo esc_html($company_slide['reviews_number']) ?>)
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($company_slide['review_text']): ?>
                                            <div class="company-review-block__review-text">
                                                <?php echo wp_kses_post($company_slide['review_text']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered-lightgrey company-review-slider-block__next-btn hidden-xs">
                        <span class="ico ico--arrow-right"></span>
                    </button>

                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-6 btn-darkgreen--bordered-lightgrey company-review-slider-block__next-btn hidden-sm-plus">
                        <span class="ico ico--arrow-bottom"></span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($service_blocks): ?>
                <div class="service-blocks hero-section__service-blocks">
                    <?php foreach ($service_blocks as $service_block): ?>
                        <div class="service-block service-blocks__item">
                            <?php if ($service_block['image']) : ?>
                                <?php echo wp_get_attachment_image($service_block['image'], 'full', '', array('class' => 'service-block__img')); ?>
                            <?php endif; ?>

                            <?php if ($service_block['title']): ?>
                                <h3 class="service-block__title">
                                    <?php echo esc_html($service_block['title']) ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($service_block_slides): ?>
                <div class="service-block-slider-wrapper hero-section__service-block-slider-wrapper">
                    <div class="swiper service-block-slider">
                        <div class="swiper-wrapper service-block-slider__slides">
                            <?php foreach ($service_block_slides as $service_block_key => $service_block_slide): ?>
                                <div class="swiper-slide service-block-slider__slide">
                                    <div class="service-block service-block--extended service-block-slider__block">
                                        <div class="service-block__front">
                                            <svg width="121" height="119" viewBox="0 0 121 119" fill="none" xmlns="http://www.w3.org/2000/svg" class="service-block__front-svg">
                                                <rect x="-35.2704" y="33.6036" width="127" height="127" rx="31.5" transform="rotate(-15 -35.2704 33.6036)" stroke="white" stroke-opacity="0.24" class="rotate-cw" />
                                                <rect x="8.91605" y="20.2921" width="95" height="95" rx="23.5" transform="rotate(15 8.91605 20.2921)" stroke="white" stroke-opacity="0.24" class="rotate-ccw" />
                                                <rect x="3.3125" y="55.8438" width="64" height="64" rx="20" transform="rotate(-15 3.3125 55.8438)" fill="white" fill-opacity="0.12" />
                                                <rect x="3.92487" y="56.1973" width="63" height="63" rx="19.5" transform="rotate(-15 3.92487 56.1973)" stroke="white" stroke-opacity="0.24" />
                                                <g clip-path="url(#clip0_1439_1908_<?php echo $service_block_key ?>)" filter="url(#filter0_d_1439_1908_<?php echo $service_block_key ?>)">
                                                    <path d="M46.9184 86.9344H38.0618C37.4165 86.9344 36.7976 86.678 36.3413 86.2217C35.885 85.7654 35.6287 85.1465 35.6287 84.5012C35.6287 83.8559 35.885 83.2371 36.3413 82.7808C36.7976 82.3245 37.4165 82.0681 38.0618 82.0681H40.3368L32.2345 73.8563C31.808 73.4404 31.5488 72.8825 31.5062 72.2883C31.4636 71.6941 31.6405 71.1049 32.0033 70.6324C32.2209 70.37 32.4944 70.1595 32.8038 70.0163C33.1133 69.8732 33.4508 69.801 33.7917 69.8052C34.0966 69.7989 34.3995 69.8551 34.6819 69.9701C34.9644 70.0852 35.2203 70.2567 35.434 70.4743L40.3733 75.4135L45.3369 71.6908C45.785 71.3545 46.3396 71.1914 46.8985 71.2317C47.4574 71.2719 47.9829 71.5127 48.3783 71.9098C50.6764 74.2128 52.4052 77.0205 53.427 80.1094L53.5 80.3406" stroke="white" stroke-width="1.5" stroke-miterlimit="10" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_d_1439_1908_<?php echo $service_block_key ?>" x="28.5" y="64.3672" width="28" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                        <feOffset />
                                                        <feGaussianBlur stdDeviation="1" />
                                                        <feComposite in2="hardAlpha" operator="out" />
                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0" />
                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1439_1908" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1439_1908" result="shape" />
                                                    </filter>
                                                    <clipPath id="clip0_1439_1908_<?php echo $service_block_key ?>">
                                                        <rect width="24" height="24" fill="white" transform="translate(30.5 66.3672)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?php if ($service_block_slide['title']): ?>
                                                <h3 class="service-block__title">
                                                    <?php echo esc_html($service_block_slide['title']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($service_block_slide['image']) : ?>
                                                <?php echo wp_get_attachment_image($service_block_slide['image'], 'full', '', array('class' => 'service-block__img')); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="service-block__back">
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="268" height="200" fill="none" class="service-block__back-svg">
                                                <mask id="a_<?php echo $service_block_key ?>" width="268" height="200" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                                                    <rect width="267.5" height="200" fill="#fff" rx="24" />
                                                </mask>
                                                <g mask="url(#a_<?php echo $service_block_key ?>)">
                                                    <g filter="url(#b_<?php echo $service_block_key ?>)" class="service-block__glow">
                                                        <path fill="#F0FCAB" fill-opacity=".8" d="M36.454 70.02c10.642 1.659 18.617 2.998 22.594 3.657 6.037 5.357 8.015.68 10.024 1.68 3.987 1.658 8.004 3.677 11.312 6.675 1.33 1.679 2.61 4.083 1.3 5.326-6.686 6.346-14.693 14.302-22.326 27.332-5.666 9.674-14.762 18.805-13.29 28.641.349 2.338 1.514 4.488 3.347 5.986 3.657 2.988 37.163-2.625 55.633 6.655l.081.041c2 1.005 4.664 2.343 4.216 3.967-1.009 3.657-9.145 10.238-5.986 17.658 3.697 8.684 8.611 23.315 17.678 23.294 8.684-.02 18.464-.101 37.665-8.354 11.672-5.017 22.391-10.136 30.29-14.99 8.684-5.336 18.247-11.716 25.982-9.634 8.685 2.339 18.722 2.71 25.983 6.336 8.005 3.998 17.293 8.076 23.304 15.67 1.33 1.679 1.989 3.657 1.3 4.986-.69 1.33-2.724 1.842-4.677 2.659-8.005 3.347-17.348 7.66-23.644 17.678-5.667 9.014-10.491 18.688-18.328 28.321-8.684 10.673-16.049 20.811-24.324 25.963-9.664 6.016-42.845 19.095-57.622 7.625-7.325-5.687-11.768-19.56-21.985-29.331-8.005-7.655-15.2-14.518-23.984-17.968-9.364-3.677-64.184 8.504-84.623-9.683-5.986-5.327-12.629-10.347-12.622-16.689.02-17.958 7.406-26.78 7.005-35.936-.35-8.005-.926-16.364-5.346-23.984-5.037-8.684-20.255-14.001-21.316-24.354-.99-9.654-1.217-18.349 3.738-23.654C-12.843 85.609-4.76 79.287-.881 77.665 7.123 74.317 15.35 66.73 36.454 70.02Z" />
                                                    </g>
                                                    <g filter="url(#c_<?php echo $service_block_key ?>)" class="service-block__glow">
                                                        <path fill="#F0FCAB" fill-opacity=".8" d="M199.054 82.053c-8.388-6.758-14.624-11.905-17.739-14.465-2.549-7.657-6.601-4.596-7.841-6.465-2.624-3.43-5.094-7.188-6.459-11.438-.312-2.118-.218-4.84 1.538-5.262 8.963-2.153 19.875-5.04 33-12.508 9.744-5.544 22.187-8.904 25.831-18.158.866-2.2.932-4.644.093-6.858-1.673-4.416-33.496-16.308-44.851-33.58l-.05-.076c-1.23-1.87-2.868-4.361-1.668-5.543 2.703-2.663 13.039-4.294 14.013-12.3 1.14-9.37 4.201-24.497-3.662-29.012-7.531-4.325-16.041-9.144-36.796-11.598-12.617-1.491-24.46-2.417-33.727-2.163-10.189.28-21.66 1.023-27.318-4.648-6.352-6.367-14.859-11.708-19.334-18.478-4.934-7.465-10.938-15.641-12.348-25.223-.311-2.118.107-4.162 1.369-4.968 1.261-.806 3.279-.233 5.379.036 8.606 1.103 18.854 2.04 29.316-3.487 9.414-4.974 18.428-10.94 30.032-15.363 12.858-4.901 24.305-9.999 34.047-10.323 11.377-.378 46.653 4.886 53.714 22.208 3.501 8.587.412 22.823 4.375 36.393 3.104 10.632 5.905 20.174 11.786 27.553 6.271 7.867 59.837 24.727 68.445 50.698 2.52 7.606 5.763 15.274 2.586 20.764-8.996 15.542-19.803 19.489-24.035 27.618-3.699 7.108-7.379 14.636-7.362 23.445.02 10.039 10.541 22.252 6.283 31.748-3.97 8.855-8.12 16.5-15.064 18.617-13.066 3.984-23.229 5.417-27.398 4.883-8.606-1.103-19.524 1.353-36.155-12.047Z" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <filter id="b_<?php echo $service_block_key ?>" width="493.352" height="413.578" x="-126.996" y="-31.309" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur result="effect1_foregroundBlur_1439_1387" stdDeviation="50.26" />
                                                        <feTurbulence baseFrequency="10.834455490112305 10.834455490112305" numOctaves="3" result="noise" seed="266" stitchTiles="stitch" type="fractalNoise" />
                                                        <feColorMatrix in="noise" result="alphaNoise" type="luminanceToAlpha" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0" type="discrete" />
                                                        </feComponentTransfer>
                                                        <feComposite in="coloredNoise1" in2="effect1_foregroundBlur_1439_1387" operator="in" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite in="color1Flood" in2="noise1Clipped" operator="in" result="color1" />
                                                        <feMerge result="effect2_noise_1439_1387">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_1387" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                    <filter id="c_<?php echo $service_block_key ?>" width="443.5" height="465.094" x="-38.879" y="-270.363" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur result="effect1_foregroundBlur_1439_1387" stdDeviation="50.26" />
                                                        <feTurbulence baseFrequency="10.834455490112305 10.834455490112305" numOctaves="3" result="noise" seed="266" stitchTiles="stitch" type="fractalNoise" />
                                                        <feColorMatrix in="noise" result="alphaNoise" type="luminanceToAlpha" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0" type="discrete" />
                                                        </feComponentTransfer>
                                                        <feComposite in="coloredNoise1" in2="effect1_foregroundBlur_1439_1387" operator="in" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite in="color1Flood" in2="noise1Clipped" operator="in" result="color1" />
                                                        <feMerge result="effect2_noise_1439_1387">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_1387" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                </defs>
                                            </svg> -->

                                            <?php if ($service_block_slide['title']): ?>
                                                <h3 class="service-block__title service-block__title--grad-style">
                                                    <?php echo esc_html($service_block_slide['title']) ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($service_block_slide['list']): ?>
                                                <ul class="list service-block__list">
                                                    <?php foreach ($service_block_slide['list'] as $item): ?>
                                                        <li class="list__item">
                                                            <?php echo esc_html($item['item']) ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="button" class="btn-darkgreen btn-darkgreen--padding-10 btn-darkgreen--bordered-lightgrey service-block-slider-wrapper__next-btn hidden-xs">
                        <span class="ico ico--arrow-right"></span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>