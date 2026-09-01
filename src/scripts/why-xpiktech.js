document.addEventListener('DOMContentLoaded', function () {
  document.addEventListener('click', function (event) {
    const title = event.target.closest('.accordion-panel__title-wrapper');
    if (!title) return;

    const item = title.closest('.accordion-panel');
    const text = item.querySelector('.accordion-panel__text');
    const isExpanded = item.classList.contains('accordion-panel--expanded');

    const list = item.closest('.accordion-section__items');
    list.querySelectorAll('.accordion-panel--expanded').forEach((expandedItem) => {
      if (expandedItem === item) return;

      expandedItem.classList.remove('accordion-panel--expanded');
      expandedItem.querySelector('.accordion-panel__text').style.maxHeight = null;
    });

    if (isExpanded) {
      item.classList.remove('accordion-panel--expanded');
      text.style.maxHeight = null;
    } else {
      item.classList.add('accordion-panel--expanded');
      text.style.maxHeight = text.scrollHeight + 'px';
    }
  });

  document.querySelectorAll('.accordion-panel--expanded').forEach((item) => {
    item.querySelector('.accordion-panel__text').style.maxHeight =
      item.querySelector('.accordion-panel__text').scrollHeight + 'px';
  });
});