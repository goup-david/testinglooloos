// Vars & Init ************
var showNavbar    = false,
    currentStep   = 1,
    stepReady     = true,
    tabReady      = true,
    currentTab    = 1,
    disableScroll = false;

window.onload = function(){

    setTimeout(function(){ $("body").addClass("loaded") }, 200);

    setTimeout(function(){
        detectResize();
        detectScroll();
    }, 1000);
}

$(function(){

    // Triggers ***************

    $(document).on("click", "a[href='#']", function(e) {
        e.preventDefault();
    })

    $(document).on("click", "a.transition-link", function(e){
        e.preventDefault();

        if ($(this).attr('href') != "#") {

            $("body").addClass("before-load");

            var href = $(this).attr('href');
            setTimeout(function() { window.location = href }, 500);
        }
    });

    $(document).on("click", "#navbar .navbar-toggler", function(e) {
        e.preventDefault();

        if ($("body").hasClass("open-nav")) {

            $("body").addClass("open-nav-close");

            setTimeout(function() {
                $("body").removeClass("open-nav");
                $("body").removeClass("open-nav-close");

            }, 300);

        } else {

            $("body").addClass("open-nav");
        }
    });


    $(document).on("click", ".steps-nav li.active button, form.book .back", function(e) {
        e.preventDefault();
        goToStep($(this).attr("data"));
    });

    $(document).on("click", "form.book .step-1 .next", function(e) {
        e.preventDefault();

        if (validateStep1() == true) goToStep($(this).attr("data"));
    });

    $(document).on("click", "form.book .step-2 .next", function(e) {
        e.preventDefault();

        if (validateStep2() == true) goToStep($(this).attr("data"));
    });



    $(document).on("click", ".go-to", function(e) {
        e.preventDefault();

        disableScroll = true;

        var data = $(this).attr("data");

        if (viewport()['width'] <= 768) {

            $(".item-tab#" + data + " .btn-toggle").trigger("click");

            setTimeout(function() {
                scrollToElement($("#" + data), 1200);
                setTimeout(function(){ disableScroll = false }, 1200);
            }, 400);
        }
        else {
            scrollToElement($("#" + data), 1200);
            setTimeout(function(){ disableScroll = false }, 1200);
        }
    });

    $(document).on("click", ".item-tab:not(.active) .btn-toggle", function(e) {
        e.preventDefault();

        if (viewport()['width'] <= 768) {

            if (tabReady == true) {

                tabReady   = false;
                currentTab = $(this).parent();

                $(".item-tab.active .content").slideUp(400, function(){
                    $(".item-tab.active").removeClass("active");
                });

                currentTab.find(".content").slideDown(400, function() {
                    currentTab.addClass("active");
                    tabReady = true;
                });
            }
        }
    });


    // Swiper ***************

    if ($(".swiper.testimonials").length > 0) {

        var swiper = new Swiper ('.swiper.testimonials .swiper-container', {
            direction: 'horizontal',
            autoHeight: true,
            loop: true,
            loopAdditionalSlides: 0,
            speed: 800,
            autoplay: 0,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            shortSwipes: true,
            grabCursor: true,
            paginationClickable: true,
            navigation: {
                nextEl: '.swiper.testimonials .swiper-button-next',
                prevEl: '.swiper.testimonials .swiper-button-prev',
            },
        });
    }

    if ($(".swiper.mobile-items").length > 0) {

        var swiper2 = new Swiper ('.swiper.mobile-items .swiper-container', {
            direction: 'horizontal',
            autoHeight: true,
            loop: true,
            loopedSlides: 3,
            speed: 800,
            autoplay: 0,
            effect: 'slide',
            fadeEffect: { crossFade: false },
            shortSwipes: true,
            grabCursor: true,
            paginationClickable: true,
            slidesPerView: 'auto',
            centeredSlides: true,
        });
    }

    if ($(".swiper.news").length > 0) {

        var swiper = new Swiper ('.swiper.news .swiper-container', {
            direction: 'horizontal',
            autoHeight: true,
            loop: true,
            //loopAdditionalSlides: 0,
            speed: 600,
            autoplay: 0,
            effect: 'slide',
            fadeEffect: { crossFade: false },
            shortSwipes: true,
            grabCursor: true,
            paginationClickable: true,
            navigation: {
                nextEl: '.swiper-navigation.news .swiper-button-next',
                prevEl: '.swiper-navigation.news .swiper-button-prev',
            },
            spaceBetween: 30,
            slidesPerView: 3,
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                }
            }
        });
    }

    // Datepicker **********

    if ($(".datepicker").length > 0) {

        $( ".datepicker" ).datepicker({
            //minDate         : new Date(),
            minDate         : "2w",
            // maxDate         : "0",
            showOtherMonths : true,
            dateFormat      : "d-MM-yy"
        });
    }


    // Forms ***************

    $(document).on("submit", "form.book-cta", function(e) {
        e.preventDefault();

        var formValid = true,
            form      = $(this),
            url       = form.attr("action"),
            fPostcode = form.find("[name='form-postcode']");

        if (fPostcode.val() == "") fPostcode.addClass("error");
        else                       fPostcode.removeClass("error");

        if (fPostcode.val() == "") {
            formValid = false;
        }

        if (formValid == true) {
            $("body").addClass("before-load");
            setTimeout(function() { window.location = url + "?postcode=" + fPostcode.val() }, 500);
        }
    });


    // WHAT FALLS AWAY ON FORM, DEPENDING ON SELECTION
    // IF CONSTRUCTION IS SELECTED:
    $('input[type=radio][name=form-event]').change(function() {
      if (this.value == 'Construction') {
        $('input[type=radio][value=Luxury]').parent().hide();
        $('input[type=radio][value=Plastic]').prop('checked', true);;
        $('.duration-weeks').show();
        $('.duration-days').hide();
        $('.optinal-features').show();
        $('.not-construction').hide();
        $('.not-construction-people').hide();
        $('.construction-people').show();
      } else {
        $('input[type=radio][value=Luxury]').parent().show();
        $('.duration-weeks').hide();
        $('.duration-days').show();
        $('.optinal-features').hide();
        $('.not-construction').show();
        $('.not-construction-people').show();
        $('.construction-people').hide();
      }
    });

    // IF PLASTIC OR LUX IS SELECTED:
    $('select[name=form-men-number] option.option-men-lux').hide();
    $('select[name=form-women-number] option.option-women-lux').hide();
    $('input[type=radio][name=form-toilet-type]').change(function() {
      if (this.value == 'Plastic') {
        $('select[name=form-men-number] option.option-men-plastic').show();
        $('select[name=form-women-number] option.option-women-plastic').show();
        $('select[name=form-men-number] option.option-men-lux').hide();
        $('select[name=form-women-number] option.option-women-lux').hide();
        $('select[name=form-men-number] option[value=0]').prop("selected", true);
      } else {
        $('select[name=form-men-number] option.option-men-plastic').hide();
        $('select[name=form-women-number] option.option-women-plastic').hide();
        $('select[name=form-men-number] option.option-men-lux').show();
        $('select[name=form-women-number] option.option-women-lux').show();
        $('select[name=form-men-number] option[value=0]').prop("selected", true);
      }
    });



    function validateStep1() {

      var formValid     = true,
          form          = $("form.book"),
          fPostcode     = form.find("[name='form-postcode']"),
          fEvent        = form.find("[name='form-event']:checked"),
          fToilet       = form.find("[name='form-toilet-type']:checked"),
          fOptional     = form.find("[name='form-optional-features']:checked"),
          fMenNumber    = form.find("[name='form-men-number']"),
          fWomenNumber  = form.find("[name='form-women-number']"),
          fPeopleNumber = form.find("[name='form-people-number']"),
          fDate         = $(".datepicker").datepicker(),
          fHowLongDays  = form.find("[name='form-how-long-days']");
          fHowLongWeeks  = form.find("[name='form-how-long-weeks']");


        // Validation - Postcode
        if ((fPostcode.val() == "") || (fPostcode.val() == null)) {
          formValid = false; fPostcode.addClass("error")
        } else {
          fPostcode.removeClass("error")
        }


        // Validation - How Long (Construction and the rest)
          if ($('input[name=form-event]:checked').val() == 'Construction') {
            if ((fHowLongWeeks.val() == "") || (fHowLongWeeks.val() == null)) {
              formValid = false;
              fHowLongWeeks.addClass("error")
            } else {
              fHowLongWeeks.removeClass("error")
            }
            // Validation - People Number
            if ((fPeopleNumber.val() == "") || (fPeopleNumber.val() == null)) {
              formValid = false;
              fPeopleNumber.addClass("error")
            } else {
              fPeopleNumber.removeClass("error")
            }


          } else {
            if ((fHowLongDays.val() == "") || (fHowLongDays.val() == null)) {
              formValid = false;
              fHowLongDays.addClass("error")
            } else {
              fHowLongDays.removeClass("error")
            }

            // Validation - Men Number
            if ((fMenNumber.val() == "") || (fMenNumber.val() == null)) {
              formValid = false;
              fMenNumber.addClass("error")
            } else {
              fMenNumber.removeClass("error")
            }

            // Validation - Women Number
            if ((fWomenNumber.val() == "") || (fWomenNumber.val() == null)) {
              formValid = false;
              fWomenNumber.addClass("error")
            } else {
              fWomenNumber.removeClass("error")
            }
          }


          // var total = $("form.book").find("[name='form-men-number']").val() + ($("form.book").find("[name='form-women-number']").val());
          // console.log(total);


        // Validation - Delivery Time
        // if ((fDeliveryTime.val() == "") || (fDeliveryTime.val() == null)) { formValid = false; fDeliveryTime.parent().addClass("error") }
        // else                                                              { fDeliveryTime.parent().removeClass("error")                 }
        //
        // if (!fDeliveryTime.is(':checked')) {
        //     formValid = false;
        //     form.find("[name='form-delivery-time']").parent().addClass("error");
        // }
        // else {
        //     form.find("[name='form-delivery-time']").parent().removeClass("error");
        // }

        // console.log("form is valid: " + formValid);
        // console.log("fPostcode: " + fPostcode.val());
        // console.log("fEvent: " + fEvent.val());
        // console.log("fToilet: " + fToilet.val());
        // console.log("fMenNumber: " + fMenNumber.val());
        // console.log("fWomenNumber: " + fWomenNumber.val());
        // console.log("fDate: " + fDate.val());
        // console.log("fHowLong: " + fHowLongDays.val());
        // console.log("fHowLong: " + fHowLongWeeks.val());

        return formValid;
    }



    function validateStep2() {

        var formValid      = true,
            form           = $("form.book"),
            fWaterAccess   = form.find("[name='form-water-access']:checked"),
            fDrainage      = form.find("[name='form-drainage']:checked"),
            fPower         = form.find("[name='form-power']:checked"),
            fTerrain       = form.find("[name='form-terrain']:checked");

        // Validation - Water Access
        if (!fWaterAccess.is(':checked')) {
            formValid = false;
            form.find("[name='form-water-access']").parent().addClass("error");
        }
        else {
            form.find("[name='form-water-access']").parent().removeClass("error");
        }

        // Validation - Water Access
        if (!fDrainage.is(':checked')) {
            formValid = false;
            form.find("[name='form-drainage']").parent().addClass("error");
        }
        else {
            form.find("[name='form-drainage']").parent().removeClass("error");
        }

        // Validation - Power
        if (!fPower.is(':checked')) {
            formValid = false;
            form.find("[name='form-power']").parent().addClass("error");
        }
        else {
            form.find("[name='form-power']").parent().removeClass("error");
        }

        // Validation - Terrain
        if (!fPower.is(':checked')) {
            formValid = false;
            form.find("[name='form-terrain']").parent().addClass("error");
        }
        else {
            form.find("[name='form-terrain']").parent().removeClass("error");
        }

        /*
        console.log("form is valid: " + formValid);
        console.log("fWaterAccess: " + fWaterAccess.val());
        console.log("fDrainage: " + fDrainage.val());
        console.log("fPower: " + fPower.val());
        console.log("fTerrain: " + fTerrain.val());
        */

        return formValid;
    }


    function validateStep3() {

        var formValid      = true,
            form           = $("form.book"),
            fEmail         = form.find("[name='form-email']"),
            fName          = form.find("[name='form-name']"),
            fCompany       = form.find("[name='form-company']"),
            fPhone         = form.find("[name='form-phone']"),
            fTerms         = form.find("[name='form-terms']");

        // Validation - Email
        if ((fEmail.val() == "") || (fEmail.val() == null)) { formValid = false; fEmail.addClass("error") }
        else { fEmail.removeClass("error")                 }

        if (!validateEmail(fEmail.val())) { formValid = false; fEmail.addClass("error") }
        else { fEmail.removeClass("error")                 }

        // Validation - Name
        if ((fName.val() == "") || (fName.val() == null)) { formValid = false; fName.addClass("error") }
        else { fName.removeClass("error")                 }

        // Validation - Phone
        if ((fPhone.val() == "") || (fPhone.val() == null)) { formValid = false; fPhone.addClass("error") }
        else { fPhone.removeClass("error")                 }

        // Validation - Terms checkbox
        if (!fTerms.is(':checked')) { formValid = false; fTerms.parent().addClass("error") }
        else { fTerms.parent().removeClass("error")                 }

        /*
        console.log("form is valid: " + formValid);
        console.log("fEmail: " + fEmail.val());
        console.log("fName: " + fName.val());
        console.log("fCompany: " + fCompany.val());
        console.log("fPhone: " + fPhone.val());
        console.log("fTerms: " + fTerms.is(':checked'));
        */

        return formValid;
    }



    $(document).on("click", "form.book .step-3 .next", function(e) {
        e.preventDefault();
        if (validateStep3() == true) {
          // SEND AJAX INFO TO API.PHP FILE
          var form          = $("form.book"),
              fToilet       = form.find("[name='form-toilet-type']:checked"),
              fMenNumber    = form.find("[name='form-men-number']"),
              fWomenNumber  = form.find("[name='form-women-number']"),
              fDate         = $(".datepicker").datepicker(),
              fHowLongDays  = form.find("[name='form-how-long-days']");


          var url = "https://looloos.co/book-now/api.php";
          $.ajax({
                  type: "POST",
                  url: url,
                  data: {
                      fToilet: fToilet.val(),
                      fMenNumber: fMenNumber.val(),
                      fWomenNumber: fWomenNumber.val(),
                      fHowLongDays: fHowLongDays.val(),
                  },
                  success: function(data) {
                    /****** UPDATE PRICE FOR STEP 4 STARTS *******/
                    // if toilet is plastic
                    if (fToilet.val() == 'Plastic') {
                      var totalPriceSplit = data.totalPriceWithVAT.toString().split(".");
                      var totalPriceWhole = totalPriceSplit[0]; //total amount full
                      var totalPriceCents = totalPriceSplit[1]; // total deposit
                      var totalPriceDeposit = data.totalPriceDeposit.toFixed(2);
                      var disabledCost = data.disabledCost.toFixed(2);
                      if (totalPriceCents === undefined) {
                        var totalPriceCents = '00';
                      } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                        var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                      }
                      $('.amount-total').html(totalPriceWhole); //total amount full
                      $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                      $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                      $('.deposit-btn span:first-child').each(function() {
                        $(this).html(totalPriceDeposit); // total deposit button
                      })
                      $('.deposit-amount-input').val(totalPriceDeposit);
                      $('.disabled-unit-box p span').html(disabledCost);

                      // if disabled input is checked
                      $('input[name=disabled-unit]').change(function() {
                        if ($(this).is(':checked')) {
                          var totalPriceSplit = data.totalPriceWithDisabledWithVAT.toString().split(".");
                          var totalPriceWhole = totalPriceSplit[0]; //total amount full
                          var totalPriceCents = totalPriceSplit[1]; // total amount cents
                          var totalPriceDeposit = data.totalPriceWithDisabledDeposit.toFixed(2); // total deposit
                          if (totalPriceCents === undefined) {
                            var totalPriceCents = '00';
                          } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                            var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                          }
                          // Add values
                          $('.amount-total').html(totalPriceWhole); //total amount full
                          $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                          $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                          $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                          $('.deposit-amount-input').val(totalPriceDeposit);
                        } else {
                          var totalPriceSplit = data.totalPriceWithVAT.toString().split(".");
                          var totalPriceWhole = totalPriceSplit[0]; //total amount full
                          var totalPriceCents = totalPriceSplit[1]; // total deposit
                          var totalPriceDeposit = data.totalPriceDeposit.toFixed(2); // total deposit
                          if (totalPriceCents === undefined) {
                            var totalPriceCents = '00';
                          } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                            var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                          }
                          // Add values
                          $('.amount-total').html(totalPriceWhole); //total amount full
                          $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                          $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                          $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                          $('.deposit-amount-input').val(totalPriceDeposit);
                        }
                      });


                      // if toilet is luxury
                    } else if (fToilet.val() == 'Luxury') {
                        // default value = super luxury
                        var totalPriceSplit = data.totalPriceWithVAT.toString().split(".");
                        var totalPriceWhole = totalPriceSplit[0]; //total amount full
                        var totalPriceCents = totalPriceSplit[1]; // total deposit
                        var totalPriceUberSplit = data.totalPriceUberLuxWithVAT.toString().split(".");
                        var totalPriceUberWhole = totalPriceUberSplit[0]; //total amount full
                        var totalPriceUberCents = totalPriceUberSplit[1]; // total deposit
                        var totalPriceUberDeposit = data.totalPriceUberLuxDeposit.toFixed(2); // total deposit
                        var disabledCost = data.disabledCost.toFixed(2);
                        if (totalPriceCents === undefined) {
                          var totalPriceCents = '00';
                        } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                          var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                        }
                        if (totalPriceUberCents === undefined) {
                          var totalPriceUberCents = '00';
                        } else if (totalPriceUberSplit[1] > 0 && totalPriceUberSplit[1] < 10) {
                          var totalPriceUberCents = totalPriceUberSplit[1] + '0'; // total deposit
                        }

                        $('.luxury-list-box-lux .total-price span').html('£' + totalPriceWhole + '.' + totalPriceCents);
                        $('.luxury-list-box-uber-lux .total-price span').html('£' + totalPriceUberWhole + '.' + totalPriceUberCents);

                        // insert default values
                        $('.amount-total').html(totalPriceUberWhole); //total amount full
                        $('.amount-total-cents').html('.' + totalPriceUberCents); //total amount cents
                        $('.deposit-amount span').html(totalPriceUberDeposit); // total deposit
                        $('.deposit-btn span:first-child').html(totalPriceUberDeposit); // total deposit button
                        $('.deposit-amount-input').val(totalPriceUberDeposit);
                        $('.disabled-unit-box p span').html(disabledCost);
                        // if disabled input is checked
                        if ($('input[name=form-lux-upgrade').val() == 'Super Luxury') {
                          $('input[name=disabled-unit]').change(function() {
                            if ($(this).is(':checked')) {
                                var totalPriceSplit = data.totalPriceWithDisabledUberLuxWithVAT.toString().split(".");
                                var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                var totalPriceCents = totalPriceSplit[1]; // total deposit
                                var totalPriceDeposit = data.totalPriceWithDisabledUberLuxDeposit.toFixed(2); // total deposit
                                if (totalPriceCents === undefined) {
                                  var totalPriceCents = '00';
                                } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                  var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                }
                                // default values
                                $('.amount-total').html(totalPriceWhole); //total amount full
                                $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                $('.deposit-amount-input').val(totalPriceDeposit);
                            } else {
                                var totalPriceSplit = data.totalPriceUberLuxWithVAT.toString().split(".");
                                var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                var totalPriceCents = totalPriceSplit[1]; // total deposit
                                var totalPriceDeposit = data.totalPriceUberLuxDeposit.toFixed(2); // total deposit
                                if (totalPriceCents === undefined) {
                                  var totalPriceCents = '00';
                                } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                  var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                }
                                // adding values
                                $('.amount-total').html(totalPriceWhole); //total amount full
                                $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                $('.deposit-amount-input').val(totalPriceDeposit);
                            }
                          });
                      }

                      // if uber lux is checked or unchecked
                      $('input[name=form-lux-upgrade').change(function() {
                          $('input[name=disabled-unit]').prop('checked', false);
                          if (this.value == 'Super Luxury') {
                            var totalPriceSplit = data.totalPriceUberLuxWithVAT.toString().split(".");
                            var totalPriceWhole = totalPriceSplit[0]; //total amount full
                            var totalPriceCents = totalPriceSplit[1]; // total deposit
                            var totalPriceDeposit = data.totalPriceUberLuxDeposit.toFixed(2); // total deposit
                            if (totalPriceCents === undefined) {
                              var totalPriceCents = '00';
                            } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                              var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                            }
                            // adding values
                            $('.amount-total').html(totalPriceWhole); //total amount full
                            $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                            $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                            $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                            $('.deposit-amount-input').val(totalPriceDeposit);

                            // if disabled input is checked
                            $('input[name=disabled-unit]').change(function() {
                              if ($(this).is(':checked')) {
                                var totalPriceSplit = data.totalPriceWithDisabledUberLuxWithVAT.toString().split(".");
                                var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                var totalPriceCents = totalPriceSplit[1]; // total deposit
                                var totalPriceDeposit = data.totalPriceWithDisabledUberLuxDeposit.toFixed(2); // total deposit
                                // var totalPriceDepositCents = totalPriceUberDeposit.split(".")
                                if (totalPriceCents === undefined) {
                                  var totalPriceCents = '00';
                                } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                  var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                }
                                // if (totalPriceDepositCents === undefined) {
                                //   var totalPriceDeposit = data.totalPriceWithDisabledUberLuxDeposit + '.00';
                                // } else if (totalPriceDepositCents < 10) {
                                //   var totalPriceDeposit = data.totalPriceWithDisabledUberLuxDeposit + '0'; // total deposit
                                // }
                                // adding values
                                $('.amount-total').html(totalPriceWhole); //total amount full
                                $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                $('.deposit-amount-input').val(totalPriceDeposit);
                              } else {
                                  var totalPriceSplit = data.totalPriceUberLuxWithVAT.toString().split(".");
                                  var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                  var totalPriceCents = totalPriceSplit[1]; // total deposit
                                  var totalPriceDeposit = data.totalPriceUberLuxDeposit.toFixed(2); // total deposit
                                  if (totalPriceCents === undefined) {
                                    var totalPriceCents = '00';
                                  } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                    var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                  }
                                  // adding values
                                  $('.amount-total').html(totalPriceWhole); //total amount full
                                  $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                  $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                  $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                  $('.deposit-amount-input').val(totalPriceDeposit);
                              }
                          });

                        } else if (this.value == 'Luxury') {
                            var totalPriceSplit = data.totalPriceWithVAT.toString().split(".");
                            var totalPriceWhole = totalPriceSplit[0]; //total amount full
                            var totalPriceCents = totalPriceSplit[1]; // total deposit
                            var totalPriceDeposit = data.totalPriceDeposit.toFixed(2); // total deposit
                            if (totalPriceCents === undefined) {
                              var totalPriceCents = '00';
                            } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                              var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                            }
                            // adding values
                            $('.amount-total').html(totalPriceWhole); //total amount full
                            $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                            $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                            $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                            $('.deposit-amount-input').val(totalPriceDeposit);

                            $('input[name=disabled-unit]').change(function() {
                              if ($(this).is(':checked')) {
                                  var totalPriceSplit = data.totalPriceWithDisabledWithVAT.toString().split(".");
                                  var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                  var totalPriceCents = totalPriceSplit[1]; // total deposit
                                  var totalPriceDeposit = data.totalPriceWithDisabledDeposit.toFixed(2); // total deposit
                                  if (totalPriceCents === undefined) {
                                    var totalPriceCents = '00';
                                  } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                    var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                  }
                                  // default values
                                  $('.amount-total').html(totalPriceWhole); //total amount full
                                  $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                  $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                  $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                  $('.deposit-amount-input').val(totalPriceDeposit);
                              } else {
                                  var totalPriceSplit = data.totalPriceWithVAT.toString().split(".");
                                  var totalPriceWhole = totalPriceSplit[0]; //total amount full
                                  var totalPriceCents = totalPriceSplit[1]; // total deposit
                                  var totalPriceDeposit = data.totalPriceDeposit.toFixed(2); // total deposit
                                  if (totalPriceCents === undefined) {
                                    var totalPriceCents = '00';
                                  } else if (totalPriceSplit[1] > 0 && totalPriceSplit[1] < 10) {
                                    var totalPriceCents = totalPriceSplit[1] + '0'; // total deposit
                                  }
                                  // adding values
                                  $('.amount-total').html(totalPriceWhole); //total amount full
                                  $('.amount-total-cents').html('.' + totalPriceCents); //total amount cents
                                  $('.deposit-amount span').html(totalPriceDeposit); // total deposit
                                  $('.deposit-btn span:first-child').html(totalPriceDeposit); // total deposit button
                                  $('.deposit-amount-input').val(totalPriceDeposit);
                              }
                            });
                        }
                      });

                    }
                },
                error: function(request, status, error){
                      $('.email-not-sent-error').show();
                    }
              });


          // ADD MIN HEIGHT CLASS TO CONTAINER
          $('.container').addClass('loading-icon-container');
          // HIDE FORM AND ANIMATE TO TOP
          $("form.book .step.active").slideUp(800, function(){
              $(this).removeClass("active");
              $('.box-form').addClass('no-padding');
              $("html, body").animate({ scrollTop: 0 }, "slow");
          });
          // HIDE SIDEBAR AND LOAD ICON
          $('.sidebar').slideUp(800, function() {
            $('.loading-icon').show(200, function() {
              var cnt=document.getElementById("count");
              var water=document.getElementById("water");
              var percent=cnt.innerText;
              var interval;

              interval = setInterval(function(){
                percent++;
                cnt.innerHTML = percent;
                water.style.transform='translate(0'+','+(100-percent)+'%)';
                if(percent==100){
                  clearInterval(interval);
                  // ONCE ICON HAS FINISHED LOADING, FADE OUT, RESET ICON, SHOW FORM BOX, SHOW STEP 4, SHOW SIDEBAR, REMOVE MIN HEIGHT CLASS FROM CONTAINER
                  $('.loading-icon').delay(1000).fadeOut(400, function() {

                    // VALIDATION - CONSTRUCTION THANK YOU
                    if ($('input[name=form-event]:checked').val() == 'Construction') {
                      $(location).attr('href','https://looloos.co/thank-you-construction-hire');
                    // OR LONGER THAN 7 DAYS
                  } else if ($("form.book").find("[name='form-how-long-days']").val() == 'Longer') {
                      $(location).attr('href','https://looloos.co/thank-you-commercial-longer-hire');
                    // OR MORE THAN 1000 PEOPLE
                  } else if ($("form.book").find("[name='form-men-number']").val() == '> 500' && $("form.book").find("[name='form-women-number']").val() == '> 500') {
                      $(location).attr('href','https://looloos.co/thank-you-commercial-larger-hire');
                    } else {
                      water.style.transform='translate(0,0)';
                      percent = 0;
                      cnt.innerHTML = percent;
                      $('.container').removeClass('loading-icon-container');
                      $('.box-form').removeClass('no-padding');
                      goToStep4(4);
                      $('.sidebar').slideDown(400);
                    }
                  });
                }
              },40);
            });
          });


          /****** HIDE OR SHOW INFORMATION (LUX/PLASTIC) FOR STEP 4 STARTS *******/
          if ($("[name='form-toilet-type']:checked").val() == "Plastic") {
            $('.plastic-disabled-box').show();
            $('.lux-disabled-box').hide();
            $('.plastic-quote-heading').show();
            $('.lux-quote-heading').hide();
            $('.luxury-list-box-div').hide();
          } else if ($("[name='form-toilet-type']:checked").val() == "Luxury") {
            $('.plastic-disabled-box').hide();
            $('.lux-disabled-box').show();
            $('.plastic-quote-heading').hide();
            $('.lux-quote-heading').show();
            $('.luxury-list-box-div').show();
          }
          /****** HIDE OR SHOW INFORMATION (LUX/PLASTIC) FOR STEP 4 ENDS *******/


          /****** UPDATE INFORMATION FOR STEP 4 STARTS *******/
          //postcode
          var postcode = $('input[name=form-postcode]').val();
          $('.4-postcode').html(postcode);

          //event-type
          var typeEvent = $('[name=form-event]:checked').val();
          $('.4-event-type').html(typeEvent);

          // loo-type
          var typeLoo = $("[name='form-toilet-type']:checked").val();
          $('.4-loo-type').html(typeLoo);

          // No of Men
          var noMen = $("[name='form-men-number']").find(":selected").text();
          $('.4-no-men').html(noMen);

          // No of Women
          var noWomen = $("[name='form-women-number']").find(":selected").text();
          $('.4-no-women').html(noWomen);

          // Disabled units
          $('input[name=disabled-unit]').change(function() {
            if (this.checked) {
              $('.4-disabled').html('Yes');
              $('.disabled-arrow').addClass('active');
            } else {
              $('.4-disabled').html('No');
              $('.disabled-arrow').removeClass('active');
            }
          });

          // event date
          var eventDate = $(".datepicker").val();
          var eventDate = eventDate.replace(/\-/g, " ");
          $('.4-date').html(eventDate);

          //event duration
          var eventDuration = $("[name='form-how-long-days']").val();
          $('.4-duration').html(eventDuration);

          // water access
          var waterAccess = $("[name='form-water-access']:checked").val();
          $('.4-water-access').html(waterAccess);

          // mains drainage
          var mainsDrainage = $("[name='form-drainage']:checked").val();
          $('.4-mains-drainage').html(mainsDrainage);

          // mains power
          var mainsPower = $("[name='form-power']:checked").val();
          $('.4-mains-power').html(mainsPower);

          // terrain
          var terrain = $("[name='form-terrain']:checked").val();
          $('.4-terrain').html(terrain);

          // email address
          var email = $('input[name=form-email]').val();
          $('.4-email').html(email);
          /****** UPDATE INFORMATION FOR STEP 4 ENDS *******/
        }
    });


    $(document).on("submit", "form.book", function(e) {
        e.preventDefault();
        $('.email-not-sent-error').hide();
        //if (validateStep1() == true) console.log("step 1 is ok!");
        //if (validateStep2() == true) console.log("step 2 is ok!");
        //if (validateStep3() == true) console.log("step 3 is ok!");

        if ( (validateStep1() == true) && (validateStep2() == true) && (validateStep3() == true) ) {

            var form = $(this),
                url  = form.attr('action'),
                // Step 1
                fPostcode     = form.find("[name='form-postcode']"),
                fEvent        = form.find("[name='form-event']:checked"),
                fToilet       = form.find("[name='form-toilet-type']:checked"),
                fOptional     = form.find("[name='form-optional-features']:checked"),
                fMenNumber    = form.find("[name='form-men-number']"),
                fWomenNumber  = form.find("[name='form-women-number']"),
                fPeopleNumber = form.find("[name='form-people-number']"),
                fDate         = $(".datepicker").datepicker(),
                fHowLongDays  = form.find("[name='form-how-long-days']");
                fHowLongWeeks  = form.find("[name='form-how-long-weeks']");
                // Step 2
                fWaterAccess   = form.find("[name='form-water-access']:checked"),
                fDrainage      = form.find("[name='form-drainage']:checked"),
                fPower         = form.find("[name='form-power']:checked"),
                fTerrain       = form.find("[name='form-terrain']:checked"),
                // Step 3
                fEmail         = form.find("[name='form-email']"),
                fName          = form.find("[name='form-name']"),
                fCompany       = form.find("[name='form-company']"),
                fPhone         = form.find("[name='form-phone']"),
                fTerms         = form.find("[name='form-terms']");

            /*
            console.log("fPostcode: " + fPostcode.val());
            console.log("fEvent: " + fEvent.val());
            console.log("fType1: " + fType1.is(':checked'));
            console.log("fType2: " + fType2.is(':checked'));
            console.log("fType3: " + fType3.is(':checked'));
            console.log("fType4: " + fType4.is(':checked'));
            console.log("fPeopleNumber: " + fPeopleNumber.val());
            console.log("fDate: " + fDate.val());
            console.log("fDeliveryTime: " + fDeliveryTime.val());
            console.log("fHowLong: " + fHowLong.val());
            console.log("fWaterAccess: " + fWaterAccess.val());
            console.log("fDrainage: " + fDrainage.val());
            console.log("fPower: " + fPower.val());
            console.log("fTerrain: " + fTerrain.val());
            console.log("fEmail: " + fEmail.val());
            console.log("fName: " + fName.val());
            console.log("fCompany: " + fCompany.val());
            console.log("fPhone: " + fPhone.val());
            console.log("fTerms: " + fTerms.is(':checked'));
            */

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    fPostcode: fPostcode.val(),
                    fEvent: fEvent.val(),
                    fToilet: fToilet.val(),
                    fOptional: fOptional.val(),
                    fMenNumber: fMenNumber.val(),
                    fWomenNumber: fWomenNumber.val(),
                    fPeopleNumber: fPeopleNumber.val(),
                    fDate: fDate.val(),
                    fHowLongDays: fHowLongDays.val(),
                    fHowLongWeeks: fHowLongWeeks.val(),
                    fWaterAccess: fWaterAccess.val(),
                    fDrainage: fDrainage.val(),
                    fPower: fPower.val(),
                    fTerrain: fTerrain.val(),
                    fEmail: fEmail.val(),
                    fName: fName.val(),
                    fCompany: fCompany.val(),
                    fPhone: fPhone.val(),
                    fTerms: fTerms.is(':checked'),
                    depositAmount: $('.deposit-amount-input').val()
                },
                success: function(data) {

                    console.log(data); // show response from the php script.
                    if (data.status === 'success') {
                      // window.location = "//looloos.co/thank-you/";
                       window.location = data.redirectPaymentUrl;
                    }
                      else $('.email-not-sent-error').show();
                    // $("body").addClass("before-load");
                    // setTimeout(function() { window.location = "thank-you.php" }, 500);
                }
            });
        }
    });

    $(document).on("submit", "form.join", function(e) {
        e.preventDefault();

        $("body").addClass("before-load");
        setTimeout(function() { window.location = "//looloos.co/thank-you/" }, 500);
    });

    // Resize ***************

    $(window).on('resize', function(){
        detectResize();
        detectScroll();
    });


    // Scroll ***************

    $(window).on('scroll', function() {
        if (disableScroll == false) { detectScroll() }
    });

});


// Functions ***************

function goToStep(id) {

    if ((stepReady == true) && (currentStep != id)) {

        stepReady   = false;
        currentStep = id;

        if (currentStep == 1) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").removeClass("active");
            $(".steps-nav li.step-3").removeClass("active");
            $(".steps-nav li.step-4").removeClass("active");

        } else if (currentStep == 2) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").addClass("active");
            $(".steps-nav li.step-3").removeClass("active");
            $(".steps-nav li.step-4").removeClass("active");

        } else if (currentStep == 3) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").addClass("active");
            $(".steps-nav li.step-3").addClass("active");
            $(".steps-nav li.step-4").removeClass("active");

        }

        scrollToElement($("body"), 1200);

        setTimeout(function() {
            $("form.book .step.active").slideUp(800, function(){
                $(this).removeClass("active");
            });
            $("form.book .step-"+currentStep).slideDown(800, function() {
                $("form.book .step-"+currentStep).addClass("active");
                stepReady = true;
            });
        }, 400);

    }
}

function goToStep4(id) {

    if ((stepReady == true) && (currentStep != id)) {

        stepReady   = false;
        currentStep = id;

        if (currentStep == 4) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").addClass("active");
            $(".steps-nav li.step-3").addClass("active");
            $(".steps-nav li.step-4").addClass("active");
        }

        scrollToElement($("body"), 1200);

        setTimeout(function() {
            $("form.book .step-"+currentStep).slideDown(800, function() {
                $("form.book .step-"+currentStep).addClass("active");
                stepReady = true;
            });
        }, 400);

    }
}



function detectResize() {

}

function detectScroll() {

    // Trigger Navbar

    scroll = $(window).scrollTop();

    if ((scroll > 30) && (showNavbar == false)) {

        showNavbar = true;
        $("body").addClass("scrolled");

    } else if ((scroll <= 0) && (showNavbar == true)) {

        showNavbar = false;
        $("body").removeClass("scrolled");
    }


    // Trigger in-view

    var window_height = $(window).height();
    var window_top    = $(window).scrollTop();
    var window_bottom = window_top + window_height;
    var timer         = 150;
    //var timer       = 0;
    var i             = 1;

    //var loop = $('.animate:not(.in-view)').visible(true)

    $.each($.find('.animate:not(.in-view)'), function() {

        if ($(this).visible(true)) {

            var element                 = $(this);
            var element_height          = $(element).outerHeight();
            var element_top_position    = $(element).offset().top + 120;
            var element_bottom_position = (element_top_position + element_height);

            if ((element_bottom_position >= window_top) && (element_top_position <= window_bottom)) {
                element.delay(timer*i).queue(function(){
                    $(this).addClass("in-view").dequeue();
                });
            }

            i++;
        }
    });
}

function scrollToElement(obj, speed, fx){

    if (typeof(speed) == 'undefined') {
        speed = 1400;
    }
    if (typeof(fx) == 'undefined') {
        fx = 'easeInOutExpo';
    }

    if (viewport()['width'] <= 768) { compensateNavHeight = 59 }
    else                            { compensateNavHeight = 0  }

    $('html, body').animate({
        scrollTop: obj.offset().top - compensateNavHeight
    }, speed, fx);
}

function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
