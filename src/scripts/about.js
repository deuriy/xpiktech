import { Fancybox } from "@fancyapps/ui/dist/fancybox/";

document.addEventListener('DOMContentLoaded', function () {
  initSteps();
  initTimeline();
  initFancybox();
  initVideoBlock();
});

const initFancybox = () => {
  Fancybox.bind('[data-fancybox]', {
    dragToClose: false
  });
};

const initVideoBlock = () => {
  const videoBlocks = document.querySelectorAll('.video-block');

  if (!videoBlocks.length) return;

  videoBlocks.forEach((block) => {
    const video = block.querySelector('.video-block__video');

    if (!video) return;

    block.addEventListener('click', () => {
      if (block.classList.contains('is-playing')) return;

      block.classList.add('is-playing');
      video.play();
    });

    video.addEventListener('ended', () => {
      block.classList.remove('is-playing');
      video.currentTime = 0;
    });
  });
};

const initSteps = () => {
  const stepsBlock = document.querySelector('.steps-block');
  const stepItems = document.querySelectorAll('.steps-block__item');
  const steps = document.querySelectorAll('.step-block');
  const images = document.querySelectorAll('.section__step-img');

  if (!steps.length || !images.length) return;

  const desktopMedia = window.matchMedia('(min-width: 768px)');
  const clickHandlers = [];
  let isDesktopInitialized = false;
  let isMobileInitialized = false;
  let scrollFrame = null;

  function setActive(index) {
    steps.forEach((step, i) => {
      step.classList.toggle('step-block--active', i === index);
    });

    images.forEach((img, i) => {
      img.classList.toggle('section__step-img--visible', i === index);
    });
  }

  function updateActiveByScroll() {
    if (!stepsBlock || !stepItems.length) return;

    const stepsBlockRect = stepsBlock.getBoundingClientRect();
    const stepsBlockCenter = stepsBlockRect.left + stepsBlockRect.width / 2;
    let activeIndex = 0;
    let minDistance = Infinity;

    stepItems.forEach((item, index) => {
      const itemRect = item.getBoundingClientRect();
      const itemCenter = itemRect.left + itemRect.width / 2;
      const distance = Math.abs(stepsBlockCenter - itemCenter);

      if (distance < minDistance) {
        minDistance = distance;
        activeIndex = index;
      }
    });

    setActive(activeIndex);
  }

  function handleStepsScroll() {
    if (scrollFrame) return;

    scrollFrame = requestAnimationFrame(() => {
      updateActiveByScroll();
      scrollFrame = null;
    });
  }

  function enableDesktopSteps() {
    if (isDesktopInitialized) return;

    steps.forEach((step, index) => {
      const handleStepClick = () => {
        setActive(index);
      };

      clickHandlers[index] = handleStepClick;
      step.addEventListener('click', handleStepClick);
    });

    isDesktopInitialized = true;
  }

  function disableDesktopSteps() {
    if (!isDesktopInitialized) return;

    steps.forEach((step, index) => {
      step.removeEventListener('click', clickHandlers[index]);
    });

    isDesktopInitialized = false;
  }

  function enableMobileSteps() {
    if (isMobileInitialized || !stepsBlock || !stepItems.length) return;

    stepsBlock.addEventListener('scroll', handleStepsScroll, { passive: true });
    window.addEventListener('resize', updateActiveByScroll);
    updateActiveByScroll();

    isMobileInitialized = true;
  }

  function disableMobileSteps() {
    if (!isMobileInitialized || !stepsBlock) return;

    stepsBlock.removeEventListener('scroll', handleStepsScroll);
    window.removeEventListener('resize', updateActiveByScroll);

    if (scrollFrame) {
      cancelAnimationFrame(scrollFrame);
      scrollFrame = null;
    }

    isMobileInitialized = false;
  }

  function updateStepsMode() {
    if (desktopMedia.matches) {
      disableMobileSteps();
      enableDesktopSteps();
      setActive(0);
    } else {
      disableDesktopSteps();
      enableMobileSteps();
    }
  }

  if (desktopMedia.addEventListener) {
    desktopMedia.addEventListener('change', updateStepsMode);
  } else {
    desktopMedia.addListener(updateStepsMode);
  }

  updateStepsMode();
};

const initTimeline = () => {
  const timeline = document.querySelector('.timeline');
  const inner = document.querySelector('.timeline__inner');
  const progress = document.querySelector('.timeline__progress');
  const items = document.querySelectorAll('.timeline__item');

  if (!timeline || !inner || !progress || !items.length) return;

  const mobileMedia = window.matchMedia('(max-width: 1023px)');

  function isMobile() {
    return mobileMedia.matches;
  }

  function updateDesktopProgress() {
    const rect = inner.getBoundingClientRect();
    const viewportCenter = window.innerHeight / 2;

    const progressHeight = viewportCenter - rect.top;

    const clampedHeight = Math.min(
      Math.max(progressHeight, 0),
      rect.height
    );

    progress.style.width = '';
    progress.style.height = `${clampedHeight}px`;
  }

  function updateMobileProgress() {
    const points = Array.from(inner.querySelectorAll('.timeline__point'));

    if (!points.length) return;

    const timelineRect = timeline.getBoundingClientRect();
    const innerRect = inner.getBoundingClientRect();

    const activationPoint = timelineRect.left + timeline.clientWidth * 0.42;

    const lineEndOffset = 24;
    const scrollEndTolerance = 4;

    const maxScrollLeft = timeline.scrollWidth - timeline.clientWidth;

    const isScrolledToEnd = timeline.scrollLeft >= maxScrollLeft - scrollEndTolerance;

    const pointCenters = points.map((point) => {
      const pointRect = point.getBoundingClientRect();

      return {
        point,
        item: point.closest('.timeline__item'),
        centerViewport: pointRect.left + pointRect.width / 2,
        centerInner: pointRect.left - innerRect.left + pointRect.width / 2,
      };
    });

    const firstPointCenter = pointCenters[0].centerInner;
    const lastPoint = pointCenters[pointCenters.length - 1];

    const lineEnd = inner.scrollWidth - lineEndOffset;

    const isLastPointReached = lastPoint.centerViewport <= activationPoint;

    const nextPoint = pointCenters.find((item) => {
      return item.centerViewport >= activationPoint;
    });

    let targetCenter;

    if (isScrolledToEnd || isLastPointReached) {
      // ✅ Если докрутили до конца — линия заполняется до конца,
      // даже если последняя цифра ещё не пересекла activationPoint
      targetCenter = lineEnd;
    } else if (nextPoint) {
      targetCenter = nextPoint.centerInner;
    } else {
      targetCenter = lineEnd;
    }

    const progressWidth = targetCenter - firstPointCenter;

    progress.style.height = '';
    progress.style.left = `${firstPointCenter}px`;
    progress.style.width = `${Math.max(progressWidth, 0)}px`;
  }

  function updateDesktopActiveItems() {
    const viewportCenter = window.innerHeight / 2;

    items.forEach((item) => {
      const point = item.querySelector('.timeline__point');

      if (!point) return;

      const pointRect = point.getBoundingClientRect();
      const pointCenter = pointRect.top + pointRect.height / 2;

      if (pointCenter <= viewportCenter) {
        item.classList.add('is-active');
      } else {
        item.classList.remove('is-active');
      }
    });
  }

  function updateMobileActiveItems() {
    const points = Array.from(inner.querySelectorAll('.timeline__point'));

    if (!points.length) return;

    const timelineRect = timeline.getBoundingClientRect();
    const innerRect = inner.getBoundingClientRect();

    const activationPoint = timelineRect.left + timeline.clientWidth * 0.42;

    const scrollEndTolerance = 4;
    const maxScrollLeft = timeline.scrollWidth - timeline.clientWidth;

    const isScrolledToEnd = timeline.scrollLeft >= maxScrollLeft - scrollEndTolerance;

    const pointCenters = points.map((point) => {
      const pointRect = point.getBoundingClientRect();

      return {
        point,
        item: point.closest('.timeline__item'),
        centerViewport: pointRect.left + pointRect.width / 2,
        centerInner: pointRect.left - innerRect.left + pointRect.width / 2,
      };
    });

    const lastPoint = pointCenters[pointCenters.length - 1];

    const isLastPointReached = lastPoint.centerViewport <= activationPoint;

    const nextPoint = pointCenters.find((item) => {
      return item.centerViewport >= activationPoint;
    });

    const activeLimit = isScrolledToEnd || isLastPointReached
      ? Infinity
      : nextPoint
        ? nextPoint.centerInner
        : Infinity;

    pointCenters.forEach((item) => {
      if (!item.item) return;

      if (item.centerInner <= activeLimit + 1) {
        item.item.classList.add('is-active');
      } else {
        item.item.classList.remove('is-active');
      }
    });
  }

  function updateTimeline() {
    if (isMobile()) {
      updateMobileProgress();
      updateMobileActiveItems();
    } else {
      updateDesktopProgress();
      updateDesktopActiveItems();
    }
  }

  window.addEventListener('scroll', updateTimeline, { passive: true });
  window.addEventListener('resize', updateTimeline);
  timeline.addEventListener('scroll', updateTimeline, { passive: true });

  updateTimeline();
};
