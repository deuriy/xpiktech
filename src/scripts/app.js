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

    const openedOffcanvas = document.querySelector('.offcanvas--opened');

    if (!openedOffcanvas) return;

    openedOffcanvas.classList.remove('offcanvas--opened');
  });

  document.addEventListener('wpcf7submit', function (e) {
    let messageTemplate;
    const contactFormWrapperInner = e.target.closest('.contact-form-popup').querySelector('.contact-form-popup__form-wrapper-inner');
    const contactFormMessageWrapper = e.target.closest('.contact-form-popup').querySelector('.contact-form-popup__form-message-wrapper');

    // console.log(e.detail);
    
    if (e.detail.status === 'mail_sent') {
      messageTemplate = document.getElementById('success-form-message');
      messageTemplate.content.querySelector('.form-message__your-name').textContent = e.detail.inputs.find(input => input.name === 'first-name').value;
      messageTemplate.content.querySelector('.form-message__your-email').textContent = e.detail.inputs.find(input => input.name === 'your-email').value;
    } else if (e.detail.status === 'validation_failed' || e.detail.status === 'mail_failed') {
      messageTemplate = document.getElementById('error-form-message');
    }

    if (messageTemplate && contactFormWrapperInner) {
      contactFormMessageWrapper.replaceChildren(messageTemplate.content.cloneNode(true));
      contactFormWrapperInner.style.display = 'none';
    }
  });

  document.addEventListener('click', function (e) {
    const contactRepeatBtn = e.target.closest('.form-message__contact-repeat-btn');

    if (!contactRepeatBtn) return;

    const contactFormPopup = e.target.closest('.contact-form-popup');
    const contactFormWrapperInner = contactFormPopup.querySelector('.contact-form-popup__form-wrapper-inner');
    const contactFormMessageWrapper = contactFormPopup.querySelector('.contact-form-popup__form-message-wrapper');

    contactFormMessageWrapper.replaceChildren();
    contactFormWrapperInner.style.display = '';
  });
});