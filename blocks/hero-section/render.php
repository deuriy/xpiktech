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
                        <div class="swiper hero-slider">
                            <div class="swiper-wrapper hero-slider__slides">
                                <?php foreach ($hero_slides as $hero_slide): ?>
                                    <div class="swiper-slide hero-slider__slide">
                                        <div class="hero-block">
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

                                            <?php if ($hero_slide['image']) : ?>
                                                <figure class="hero-block__img-wrapper">
                                                    <?php echo wp_get_attachment_image($hero_slide['image'], 'full', '', array('class' => 'hero-block__img')); ?>
                                                    <?php echo wp_get_attachment_image($hero_slide['hover_image'], 'full', '', array('class' => 'hero-block__hover-img')); ?>
                                                </figure>
                                            <?php endif; ?>

                                            <svg width="785" height="424" viewBox="0 0 785 424" fill="none" xmlns="http://www.w3.org/2000/svg" class="hero-block__svg">
                                                <g class="hero-block__glow" filter="url(#filter0_fn_1439_2118)">
                                                    <path d="M-27.2928 324.474C-11.7161 313.099 0.0771267 304.697 5.94843 300.496C20.3736 299.635 16.9571 291.208 20.7659 289.93C27.9152 286.981 35.558 284.451 43.5425 284.058C47.3512 284.501 52.0162 285.925 51.9319 289.158C51.5017 305.658 51.4365 325.87 58.2714 352.034C63.3455 371.457 63.3905 394.537 77.7074 405.129C81.1112 407.647 85.3083 408.894 89.5259 408.469C97.9406 407.621 133.259 358.089 168.396 346.454L168.55 346.403C172.356 345.142 177.423 343.463 178.911 346.087C182.265 351.996 180.296 370.63 193.691 376.025C209.369 382.339 234.116 394.644 245.571 383.137C256.542 372.115 268.821 359.629 282.684 324.866C291.112 303.735 298.201 283.68 302.057 267.533C306.296 249.78 310.326 229.592 322.758 222.435C336.715 214.4 349.895 202.161 363.68 197.558C378.877 192.484 395.803 185.887 413.03 187.89C416.838 188.333 420.179 190.004 420.989 192.56C421.799 195.116 419.872 198.34 418.433 201.847C412.536 216.222 406.168 233.513 410.879 254.17C415.118 272.759 421.26 291.117 423.532 313.238C426.05 337.748 429.562 359.911 425.607 376.911C420.989 396.765 395.535 455.341 362.301 459.527C345.826 461.602 322.633 449.661 297.325 450.226C277.496 450.669 259.693 451.09 244.204 457.844C227.691 465.044 173.702 549.882 124.792 552.734C110.468 553.569 95.7005 555.624 87.6785 547.584C64.9652 524.82 63.1465 504.298 51.0461 493.211C40.4676 483.518 29.1524 473.665 13.9076 469.612C-3.46591 464.993 -29.4669 477.531 -43.9197 465.765C-57.3959 454.794 -68.6947 444.072 -69.1385 431.081C-69.9736 406.635 -67.7432 388.392 -64.8868 381.428C-58.9902 367.054 -58.179 347.03 -27.2928 324.474Z" fill="#D7FF00" fill-opacity="0.32" />
                                                    <path d="M-27.2928 324.474C-11.7161 313.099 0.0771267 304.697 5.94843 300.496C20.3736 299.635 16.9571 291.208 20.7659 289.93C27.9152 286.981 35.558 284.451 43.5425 284.058C47.3512 284.501 52.0162 285.925 51.9319 289.158C51.5017 305.658 51.4365 325.87 58.2714 352.034C63.3455 371.457 63.3905 394.537 77.7074 405.129C81.1112 407.647 85.3083 408.894 89.5259 408.469C97.9406 407.621 133.259 358.089 168.396 346.454L168.55 346.403C172.356 345.142 177.423 343.463 178.911 346.087C182.265 351.996 180.296 370.63 193.691 376.025C209.369 382.339 234.116 394.644 245.571 383.137C256.542 372.115 268.821 359.629 282.684 324.866C291.112 303.735 298.201 283.68 302.057 267.533C306.296 249.78 310.326 229.592 322.758 222.435C336.715 214.4 349.895 202.161 363.68 197.558C378.877 192.484 395.803 185.887 413.03 187.89C416.838 188.333 420.179 190.004 420.989 192.56C421.799 195.116 419.872 198.34 418.433 201.847C412.536 216.222 406.168 233.513 410.879 254.17C415.118 272.759 421.26 291.117 423.532 313.238C426.05 337.748 429.562 359.911 425.607 376.911C420.989 396.765 395.535 455.341 362.301 459.527C345.826 461.602 322.633 449.661 297.325 450.226C277.496 450.669 259.693 451.09 244.204 457.844C227.691 465.044 173.702 549.882 124.792 552.734C110.468 553.569 95.7005 555.624 87.6785 547.584C64.9652 524.82 63.1465 504.298 51.0461 493.211C40.4676 483.518 29.1524 473.665 13.9076 469.612C-3.46591 464.993 -29.4669 477.531 -43.9197 465.765C-57.3959 454.794 -68.6947 444.072 -69.1385 431.081C-69.9736 406.635 -67.7432 388.392 -64.8868 381.428C-58.9902 367.054 -58.179 347.03 -27.2928 324.474Z" fill="#F0FCAB" />
                                                </g>
                                                <g class="hero-block__glow" filter="url(#filter1_fn_1439_2118)">
                                                    <path d="M809.774 356.398C825.806 352.159 846.7 335.859 855.264 326.041C877.278 300.803 906.196 297.528 921.126 289.738C940.6 279.577 970.107 276.691 997.984 247.449C1034.19 209.476 1049.99 184.604 1057.75 168.225C1072.25 137.603 1099.68 94.1702 1092.28 77.9662C1078.68 48.1668 1066.13 2.02193 1050.05 -14.0133C1028.11 -35.9042 1002.97 -37.9568 904.803 -103.487C879.685 -120.253 872.029 -129.454 862.792 -131.199C845.039 -134.552 828.036 -131.915 801.182 -124.404C780.101 -118.507 762.13 -112.2 740.406 -103.285C707.57 -89.8089 681.353 -99.5012 640.417 -57.2509C609.681 -25.5282 577.842 20.3495 595.547 38.5121C625.878 69.6274 647.411 82.9362 673.645 82.6734C717.845 82.2305 736.664 74.1655 751.554 78.0548C754.945 78.9405 759.109 129.287 796.232 92.1635C800.433 101.426 847.434 130.273 844.315 140.247C840.102 153.723 767.879 252.343 758.899 268.279C727.34 324.285 640.601 276.629 637.276 350.304C636.555 366.285 635.669 465.223 673.122 453.48C689.585 462.299 723.593 362.471 757.233 373.164C775.784 379.061 792.459 360.976 809.774 356.398Z" fill="#F0FCAB" fill-opacity="0.72" />
                                                </g>
                                                <g class="hero-block__glow" filter="url(#filter2_fn_1439_2118)">
                                                    <path d="M-85.7762 -236.29C-66.5986 -238.353 -52.1843 -239.733 -44.9991 -240.436C-32.0763 -233.968 -30.8214 -242.975 -26.8839 -242.177C-19.2183 -241.156 -11.334 -239.526 -4.22314 -235.874C-1.1461 -233.586 2.18175 -230.02 0.492568 -227.263C-8.13022 -213.188 -18.2928 -195.716 -25.4553 -169.641C-30.7727 -150.282 -42.2738 -130.272 -35.1706 -113.941C-33.4818 -110.059 -30.4708 -106.88 -26.6058 -105.139C-18.8945 -101.666 36.4582 -126.904 72.7058 -119.411L72.8645 -119.378C76.7904 -118.567 82.0182 -117.487 81.9957 -114.471C81.945 -107.677 70.9226 -92.5234 79.8258 -81.1538C90.2462 -67.8466 105.526 -44.8167 121.2 -49.0551C136.211 -53.1145 153.089 -57.7887 182.476 -80.962C200.34 -95.0488 216.507 -108.872 227.92 -120.928C240.467 -134.183 254.051 -149.651 268.397 -149.633C284.501 -149.613 302.035 -153.623 316.275 -150.716C331.973 -147.512 349.929 -144.762 363.846 -134.414C366.923 -132.126 368.981 -129.009 368.404 -126.391C367.828 -123.772 364.547 -121.944 361.547 -119.625C349.253 -110.125 335.092 -98.3348 328.843 -78.0894C323.22 -59.872 319.36 -40.9025 310.268 -20.6087C300.194 1.87674 292.154 22.8262 280.229 35.5715C266.302 50.456 214.97 88.4573 184.096 75.4658C168.79 69.0255 154.675 47.0877 132.475 34.9231C115.081 25.3925 99.453 16.8558 82.6624 14.96C64.7617 12.9388 -24.4136 59.4162 -68.197 37.4307C-81.0194 30.992 -94.8356 25.3878 -97.7629 14.414C-106.051 -16.6568 -97.3655 -35.3385 -102.301 -50.9904C-106.616 -64.6738 -111.488 -78.865 -122.664 -89.9971C-135.401 -102.684 -164.187 -104.826 -170.821 -122.242C-177.006 -138.481 -181.43 -153.416 -175.319 -164.888C-163.819 -186.478 -152.766 -201.161 -146.811 -205.763C-134.517 -215.264 -123.803 -232.199 -85.7762 -236.29Z" fill="#F0FCAB" fill-opacity="0.8" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_fn_1439_2118" x="-269.312" y="-12.4766" width="896.703" height="766.07" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                                    <filter id="filter1_fn_1439_2118" x="430.461" y="-292.633" width="823.062" height="907.078" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                                    <filter id="filter2_fn_1439_2118" x="-358.242" y="-422.227" width="906.742" height="680.352" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                            </svg>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="buttons-list hero-slider-block__buttons">
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 btn-darkgreen--padding-10 hero-slider-block__btn" data-fancybox>
                            <span class="ico ico--arrow-right2"></span>
                        </a>
                        <a href="#contact-form-popup" class="btn-darkgreen btn-darkgreen--radius-16 hero-slider-block__btn" data-fancybox>Request a Free Demo</a>
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
                                                <g clip-path="url(#clip0_1439_1908)" filter="url(#filter0_d_1439_1908)">
                                                    <path d="M46.9184 86.9344H38.0618C37.4165 86.9344 36.7976 86.678 36.3413 86.2217C35.885 85.7654 35.6287 85.1465 35.6287 84.5012C35.6287 83.8559 35.885 83.2371 36.3413 82.7808C36.7976 82.3245 37.4165 82.0681 38.0618 82.0681H40.3368L32.2345 73.8563C31.808 73.4404 31.5488 72.8825 31.5062 72.2883C31.4636 71.6941 31.6405 71.1049 32.0033 70.6324C32.2209 70.37 32.4944 70.1595 32.8038 70.0163C33.1133 69.8732 33.4508 69.801 33.7917 69.8052C34.0966 69.7989 34.3995 69.8551 34.6819 69.9701C34.9644 70.0852 35.2203 70.2567 35.434 70.4743L40.3733 75.4135L45.3369 71.6908C45.785 71.3545 46.3396 71.1914 46.8985 71.2317C47.4574 71.2719 47.9829 71.5127 48.3783 71.9098C50.6764 74.2128 52.4052 77.0205 53.427 80.1094L53.5 80.3406" stroke="white" stroke-width="1.5" stroke-miterlimit="10" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_d_1439_1908" x="28.5" y="64.3672" width="28" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                        <feOffset />
                                                        <feGaussianBlur stdDeviation="1" />
                                                        <feComposite in2="hardAlpha" operator="out" />
                                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0" />
                                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1439_1908" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1439_1908" result="shape" />
                                                    </filter>
                                                    <clipPath id="clip0_1439_1908">
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
                                            <svg width="268" height="200" viewBox="0 0 268 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="service-block__back-svg">
                                                <mask id="mask0_1439_1595" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="268" height="200">
                                                    <rect width="267.5" height="200" rx="24" fill="white" />
                                                </mask>
                                                <g mask="url(#mask0_1439_1595)">
                                                    <g filter="url(#filter0_fn_1439_1595)" class="glow">
                                                        <path d="M36.4536 70.0199C47.0965 71.6788 55.0711 73.0179 59.0485 73.6775C65.0845 79.0339 67.0631 74.357 69.0718 75.3563C73.0591 77.0152 77.0764 79.0339 80.3842 82.0319C81.7134 83.7108 82.9931 86.1152 81.6834 87.3583C74.9978 93.7041 66.9907 101.66 59.3583 114.69C53.6921 124.364 44.596 133.495 46.0672 143.331C46.4169 145.669 47.5817 147.819 49.4149 149.317C53.0725 152.305 86.5783 146.692 105.048 155.972L105.129 156.013C107.129 157.018 109.793 158.356 109.345 159.98C108.336 163.637 100.2 170.218 103.359 177.638C107.056 186.322 111.97 200.953 121.037 200.932C129.721 200.912 139.501 200.831 158.702 192.578C170.374 187.561 181.093 182.442 188.992 177.588C197.676 172.252 207.239 165.872 214.974 167.954C223.659 170.293 233.696 170.664 240.957 174.29C248.962 178.288 258.25 182.366 264.261 189.96C265.591 191.639 266.25 193.617 265.561 194.946C264.871 196.276 262.837 196.788 260.884 197.605C252.879 200.952 243.536 205.265 237.24 215.283C231.573 224.297 226.749 233.971 218.912 243.604C210.228 254.277 202.863 264.415 194.588 269.567C184.924 275.583 151.743 288.662 136.966 277.192C129.641 271.505 125.198 257.632 114.981 247.861C106.976 240.206 99.7802 233.343 90.9972 229.893C81.6334 226.216 26.8133 238.397 6.37367 220.21C0.387667 214.883 -6.25496 209.863 -6.2479 203.521C-6.22792 185.563 1.15751 176.741 0.75742 167.585C0.407652 159.58 -0.169497 151.221 -4.58901 143.601C-9.62565 134.917 -24.8437 129.6 -25.9048 119.247C-26.8941 109.593 -27.1219 100.898 -22.1673 95.5928C-12.8435 85.6095 -4.75905 79.2865 -0.881487 77.6648C7.12317 74.317 15.3503 66.7306 36.4536 70.0199Z" fill="#F0FCAB" fill-opacity="0.8" />
                                                    </g>
                                                    <g filter="url(#filter1_fn_1439_1595)" class="glow">
                                                        <path d="M199.054 82.0531C190.666 75.295 184.43 70.148 181.315 67.5881C178.766 59.9313 174.714 62.9923 173.474 61.1225C170.85 57.6922 168.38 53.9353 167.015 49.6851C166.703 47.5666 166.797 44.8444 168.553 44.4227C177.516 42.2699 188.428 39.3836 201.553 31.9152C211.297 26.3708 223.74 23.0107 227.384 13.7571C228.25 11.557 228.316 9.11281 227.477 6.89917C225.804 2.4827 193.981 -9.40906 182.626 -26.6811L182.576 -26.7568C181.346 -28.6273 179.708 -31.118 180.908 -32.3001C183.611 -34.963 193.947 -36.5943 194.921 -44.5996C196.061 -53.9691 199.122 -69.0967 191.259 -73.6123C183.728 -77.9371 175.218 -82.7559 154.463 -85.2096C141.846 -86.7011 130.003 -87.6269 120.736 -87.3727C110.547 -87.0933 99.0752 -86.3495 93.4176 -92.0212C87.0661 -98.3884 78.559 -103.729 74.0839 -110.499C69.1503 -117.964 63.1458 -126.14 61.7364 -135.722C61.4248 -137.84 61.8429 -139.884 63.1046 -140.69C64.3663 -141.496 66.3839 -140.923 68.484 -140.654C77.0901 -139.551 87.3375 -138.614 97.7996 -144.141C107.214 -149.115 116.228 -155.081 127.832 -159.504C140.69 -164.405 152.137 -169.503 161.879 -169.827C173.256 -170.205 208.532 -164.941 215.593 -147.619C219.094 -139.032 216.005 -124.796 219.968 -111.226C223.072 -100.594 225.873 -91.0518 231.754 -83.673C238.025 -75.8063 291.591 -58.9457 300.199 -32.9751C302.719 -25.3692 305.962 -17.7005 302.785 -12.2113C293.789 3.33081 282.982 7.27797 278.75 15.4075C275.051 22.5147 271.371 30.0425 271.388 38.8515C271.408 48.8906 281.929 61.1037 277.671 70.6003C273.701 79.4552 269.551 87.0997 262.607 89.2167C249.541 93.2007 239.378 94.6343 235.209 94.1C226.603 92.9969 215.685 95.4534 199.054 82.0531Z" fill="#F0FCAB" fill-opacity="0.8" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <filter id="filter0_fn_1439_1595" x="-126.996" y="-31.3087" width="493.352" height="413.578" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur stdDeviation="50.2598" result="effect1_foregroundBlur_1439_1595" />
                                                        <feTurbulence type="fractalNoise" baseFrequency="10.834455490112305 10.834455490112305" stitchTiles="stitch" numOctaves="3" result="noise" seed="266" />
                                                        <feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA type="discrete" tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
                                                        </feComponentTransfer>
                                                        <feComposite operator="in" in2="effect1_foregroundBlur_1439_1595" in="coloredNoise1" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
                                                        <feMerge result="effect2_noise_1439_1595">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_1595" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                    <filter id="filter1_fn_1439_1595" x="-38.879" y="-270.363" width="443.5" height="465.094" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                                        <feGaussianBlur stdDeviation="50.2598" result="effect1_foregroundBlur_1439_1595" />
                                                        <feTurbulence type="fractalNoise" baseFrequency="10.834455490112305 10.834455490112305" stitchTiles="stitch" numOctaves="3" result="noise" seed="266" />
                                                        <feColorMatrix in="noise" type="luminanceToAlpha" result="alphaNoise" />
                                                        <feComponentTransfer in="alphaNoise" result="coloredNoise1">
                                                            <feFuncA type="discrete" tableValues="0 0 0 0 0 0 0 0 0 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " />
                                                        </feComponentTransfer>
                                                        <feComposite operator="in" in2="effect1_foregroundBlur_1439_1595" in="coloredNoise1" result="noise1Clipped" />
                                                        <feFlood flood-color="rgba(255, 255, 255, 0.06)" result="color1Flood" />
                                                        <feComposite operator="in" in2="noise1Clipped" in="color1Flood" result="color1" />
                                                        <feMerge result="effect2_noise_1439_1595">
                                                            <feMergeNode in="effect1_foregroundBlur_1439_1595" />
                                                            <feMergeNode in="color1" />
                                                        </feMerge>
                                                    </filter>
                                                </defs>
                                            </svg>

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