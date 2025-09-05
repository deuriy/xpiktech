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

  document.addEventListener('click', function (e) {
    const voiceControlOpenBtn = e.target.closest('[data-voice-control-open]');

    if (!voiceControlOpenBtn) return;

    const voiceControlOpen = voiceControlOpenBtn.dataset.voiceControlOpen;
    const voiceControl = document.getElementById(voiceControlOpen);

    if (!voiceControl) return;

    voiceControl.classList.remove('invisible');

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    const voiceControlCloseBtn = e.target.closest('[data-voice-control-close]');

    if (!voiceControlCloseBtn) return;

    const voiceControl = voiceControlCloseBtn.closest('.voice-control');

    if (!voiceControl) return;

    voiceControl.classList.add('invisible');

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    const voiceControlMicroBtn = e.target.closest('.voice-control__micro-btn');

    if (!voiceControlMicroBtn) return;

    const voiceControl = voiceControlMicroBtn.closest('.voice-control');

    if (!voiceControl) return;

    const voiceControlText = voiceControl.querySelector('.voice-control__text');
    const recognizedMessages = voiceControl.querySelector('.voice-control__recognized-messages');

    if (voiceControlMicroBtn.classList.contains('btn-white-transparent--active')) {
      voiceControlMicroBtn.classList.replace('btn-white-transparent--active', 'btn-white-transparent--selected');
      voiceControlText.classList.remove('invisible');
      recognizedMessages.classList.add('invisible');
    } else if (voiceControlMicroBtn.classList.contains('btn-white-transparent--selected')) {
      voiceControlMicroBtn.classList.replace('btn-white-transparent--selected', 'btn-white-transparent--active');
      voiceControlText.classList.add('invisible');
      recognizedMessages.classList.remove('invisible');
    }
  });

  document.addEventListener('click', function (e) {
    const voiceControlActionsLink = e.target.closest('.voice-control__actions-link');

    if (!voiceControlActionsLink) return;

    const voiceControlActionsList = voiceControlActionsLink.closest('.voice-control__actions-list');

    if (!voiceControlActionsList) return;

    const actionDescriptionsList = voiceControlActionsList.nextElementSibling;
    console.log(actionDescriptionsList);

    if (!actionDescriptionsList.classList.contains('voice-control__action-descriptions-list')) return;

    voiceControlActionsList.classList.add('invisible');
    actionDescriptionsList.classList.remove('invisible');
    actionDescriptionsList.querySelector(`.voice-control__action-description[data-index="0"]`).classList.remove('invisible');

    e.preventDefault();
  });
});