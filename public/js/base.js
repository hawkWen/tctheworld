
///////////////////////////////////////////////////////////////////////////
// Loader
$(document).ready(function () {
    setTimeout(() => {
        $("#loader").fadeToggle(250);
    }, 800); // hide delay when page load
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Go Back
$(".goBack").click(function () {
    window.history.go(-1);
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Input
$(".clear-input").click(function () {
    $(this).parent(".input-wrapper").find(".form-control").focus();
    $(this).parent(".input-wrapper").find(".form-control").val("");
    $(this).parent(".input-wrapper").removeClass("not-empty");
});
// active
$(".form-group .form-control").focus(function () {
    $(this).parent(".input-wrapper").addClass("active");
}).blur(function () {
    $(this).parent(".input-wrapper").removeClass("active");
})
// empty check
$(".form-group .form-control").keyup(function () {
    var inputCheck = $(this).val().length;
    if (inputCheck > 0) {
        $(this).parent(".input-wrapper").addClass("not-empty");
    }
    else {
        $(this).parent(".input-wrapper").removeClass("not-empty");
    }
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Searchbox Toggle
$(".toggle-searchbox").click(function () {
    $("#search").fadeToggle(200);
    $("#search .form-control").focus();
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Owl Carousel
$('.carousel-full').owlCarousel({
    loop:true,
    margin:8,
    nav:false,
    items: 1,
    dots: false,
});
$('.carousel-single').owlCarousel({
    stagePadding: 30,
    loop:true,
    margin:16,
    nav:false,
    items: 1,
    dots: false,
});
$('.carousel-multiple').owlCarousel({
    stagePadding: 32,
    loop:true,
    margin:16,
    nav:false,
    items: 2,
    dots: false,
});
$('.carousel-small').owlCarousel({
    stagePadding: 32,
    loop:true,
    margin:8,
    nav:false,
    items: 4,
    dots: false,
});
$('.carousel-slider').owlCarousel({
    loop:true,
    margin:8,
    nav:false,
    items: 1,
    dots: true,
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
$('.custom-file-upload input[type="file"]').each(function () {
    // Refs
    var $fileUpload = $(this),
        $filelabel = $fileUpload.next('label'),
        $filelabelText = $filelabel.find('span'),
        filelabelDefault = $filelabelText.text();
    $fileUpload.on('change', function (event) {
        var name = $fileUpload.val().split('\\').pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if (name) {
            $filelabel
                .addClass('file-uploaded')
                .css('background-image', 'url(' + tmppath + ')');
            $filelabelText.text(name);
        } else {
            $filelabel.removeClass('file-uploaded');
            $filelabelText.text(filelabelDefault);
        }
    });
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
// Notification
// trigger notification
function notification(target, time) {
    var a = "#" + target;
    $(".notification-box").removeClass("show");
    setTimeout(() => {
        $(a).addClass("show");
    }, 300);
    if (time) {
        time = time + 300;
        setTimeout(() => {
            $(".notification-box").removeClass("show");
        }, time);
    }
};
// close button notification
$(".notification-box .close-button").click(function (event) {
    event.preventDefault();
    $(".notification-box.show").removeClass("show");
});
// tap to close notification
$(".notification-box.tap-to-close .notification-dialog").click(function () {
    $(".notification-box.show").removeClass("show");
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
// Toast
// trigger toast
function toastbox(target, time) {
    var a = "#" + target;
    $(".toast-box").removeClass("show");
    setTimeout(() => {
        $(a).addClass("show");
    }, 100);
    if (time) {
        time = time + 100;
        setTimeout(() => {
            $(".toast-box").removeClass("show");
        }, time);
    }
};
// close button toast
$(".toast-box .close-button").click(function (event) {
    event.preventDefault();
    $(".toast-box.show").removeClass("show");
});
// tap to close toast
$(".toast-box.tap-to-close").click(function () {
    $(this).removeClass("show");
});
/////////////////////////////////////////////////////// ////////////////////

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password-field');

if(togglePassword!=null){
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('ion-md-eye-off');
});

}
/*

FormValidation.formValidation(
 document.getElementById('kt_form_1'),
 {
  fields: {
   email: {
    validators: {
     notEmpty: {
      message: 'Email is required'
     },
     emailAddress: {
      message: 'The value is not a valid email address'
     }
    }
   },

   url: {
    validators: {
     notEmpty: {
      message: 'Website URL is required'
     },
     uri: {
      message: 'The website address is not valid'
     }
    }
   },

   digits: {
    validators: {
     notEmpty: {
      message: 'Digits is required'
     },
     digits: {
      message: 'The velue is not a valid digits'
     }
    }
   },

   creditcard: {
    validators: {
     notEmpty: {
      message: 'Credit card number is required'
     },
     creditCard: {
      message: 'The credit card number is not valid'
     }
    }
   },

   phone: {
    validators: {
     notEmpty: {
      message: 'US phone number is required'
     },
     phone: {
      country: 'US',
      message: 'The value is not a valid US phone number'
     }
    }
   },

   option: {
    validators: {
     notEmpty: {
      message: 'Please select an option'
     }
    }
   },

   options: {
    validators: {
     choice: {
      min:2,
      max:5,
      message: 'Please select at least 2 and maximum 5 options'
     }
    }
   },

   memo: {
    validators: {
     notEmpty: {
      message: 'Please enter memo text'
     },
     stringLength: {
      min:50,
      max:100,
      message: 'Please enter a menu within text length range 50 and 100'
     }
    }
   },

   checkbox: {
    validators: {
     choice: {
      min:1,
      message: 'Please kindly check this'
     }
    }
   },

   checkboxes: {
    validators: {
     choice: {
      min:2,
      max:5,
      message: 'Please check at least 1 and maximum 2 options'
     }
    }
   },

   radios: {
    validators: {
     choice: {
      min:1,
      message: 'Please kindly check this'
     }
    }
   },
  },

  plugins: {
   trigger: new FormValidation.plugins.Trigger(),
   // Bootstrap Framework Integration
   bootstrap: new FormValidation.plugins.Bootstrap(),
   // Validate fields when clicking the Submit button
   submitButton: new FormValidation.plugins.SubmitButton(),
            // Submit the form when all fields are valid
   defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
  }
 }
);*/