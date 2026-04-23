document.addEventListener('DOMContentLoaded', function () {
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
});