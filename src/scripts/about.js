const initSteps = () => {
  const steps = document.querySelectorAll('.step-block');
  const images = document.querySelectorAll('.section__step-img');

  if (!steps.length || !images.length) return;

  function setActive(index) {
    steps.forEach((step, i) => {
      step.classList.toggle('step-block--active', i === index);
    });

    images.forEach((img, i) => {
      img.classList.toggle('section__step-img--visible', i === index);
    });
  }

  // 👉 начальное состояние (первый активный)
  setActive(0);

  // 👉 клики
  steps.forEach((step, index) => {
    step.addEventListener('click', () => {
      setActive(index);
    });
  });
};

const initTimeline = () => {
  const inner = document.querySelector('.timeline__inner');
  const progress = document.querySelector('.timeline__progress');
  const items = document.querySelectorAll('.timeline__item');

  if (!inner || !progress || !items.length) return;

  function updateProgress() {
    const rect = inner.getBoundingClientRect();
    const viewportCenter = window.innerHeight / 2;

    const progressHeight = viewportCenter - rect.top;

    const clampedHeight = Math.min(
      Math.max(progressHeight, 0),
      rect.height
    );

    progress.style.height = `${clampedHeight}px`;
  }

  function updateActiveItems() {
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

  function updateTimeline() {
    updateProgress();
    updateActiveItems();
  }

  window.addEventListener('scroll', updateTimeline, { passive: true });
  window.addEventListener('resize', updateTimeline);

  updateTimeline();
};

document.addEventListener('DOMContentLoaded', function () {
  initSteps();
  initTimeline();
});