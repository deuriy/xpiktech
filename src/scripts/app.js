document.addEventListener('DOMContentLoaded', function () {
  // Offcanvas toggle
  document.addEventListener('click', function (e) {
    const toggleBtn = e.target.closest('[data-offcanvas-toggle]');

    if (!toggleBtn) return;

    const offcanvasId = toggleBtn.dataset.offcanvasId;

    if (!offcanvasId) return;

    const offcanvas = document.getElementById(offcanvasId);

    if (!offcanvas) return;

    const openedOffcanvas = document.querySelector('.offcanvas--opened');

    if (openedOffcanvas && openedOffcanvas != offcanvas) {
      openedOffcanvas.classList.remove('offcanvas--opened');
    }

    offcanvas.classList.toggle('offcanvas--opened');

    e.preventDefault();
  });

  // Offcanvas close
  document.addEventListener('click', function (e) {
    const closeBtn = e.target.closest('[data-offcanvas-close]');

    if (!closeBtn) return;

    const offcanvas = closeBtn.closest('.offcanvas');

    if (!offcanvas) return;

    offcanvas.classList.remove('offcanvas--opened');

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    if (e.target.closest('.offcanvas--opened') || e.target.closest('[data-offcanvas-toggle]')) return;

    console.log('click!');

    const openedOffcanvas = document.querySelector('.offcanvas--opened');

    if (!openedOffcanvas) return;

    openedOffcanvas.classList.remove('offcanvas--opened');
  });
});