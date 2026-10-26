(function () {
    'use strict';

    const data = window.xpiktechRankMathContent;

    if (!data || typeof data.html !== 'string') {
        return;
    }

    // Разбираем HTML без вставки в страницу редактора.
    const parsed = new DOMParser().parseFromString(
        data.html,
        'text/html'
    );

    parsed.querySelectorAll('script, style, template').forEach(
        (element) => element.remove()
    );

    const renderedContent = parsed.body.innerHTML;

    wp.hooks.addFilter(
        'rank_math_content',
        'xpiktech/rendered-acf-content',
        function () {
            // Заменяем источник целиком, а не добавляем повторно.
            return renderedContent;
        },
        999
    );

    wp.domReady(function () {
        if (
            window.rankMathEditor &&
            typeof window.rankMathEditor.refresh === 'function'
        ) {
            window.rankMathEditor.refresh('content');
        }
    });
})();