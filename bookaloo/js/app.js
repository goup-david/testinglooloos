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
            minDate         : new Date(),
            showOtherMonths : true,
            dateFormat      : "dd-mm-yy"
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


    function validateStep1() {

        var formValid     = true,
            form          = $("form.book"),
            fPostcode     = form.find("[name='form-postcode']"),
            fEvent        = form.find("[name='form-event']:checked"),
            fType1        = form.find("[name='form-type-1']"),
            fType2        = form.find("[name='form-type-2']"),
            fType3        = form.find("[name='form-type-3']"),
            fType4        = form.find("[name='form-type-4']"),
            fPeopleNumber = form.find("[name='form-people-number']"),
            fDate         = $(".datepicker").datepicker(),
            fDeliveryTime = form.find("[name='form-delivery-time']:checked"),
            fHowLong      = form.find("[name='form-how-long']");

        // Validation - Postcode
        if ((fPostcode.val() == "") || (fPostcode.val() == null)) { formValid = false; fPostcode.addClass("error") }
        else                                                      { fPostcode.removeClass("error") }

        // Validation - Loo type
        if ((!fType1.is(':checked')) && (!fType2.is(':checked')) && (!fType3.is(':checked')) && (!fType4.is(':checked')) ) {
            formValid = false;
            fType1.parent().addClass("error");
            fType2.parent().addClass("error");
            fType3.parent().addClass("error");
            fType4.parent().addClass("error");
        }
        else {
            fType1.parent().removeClass("error");
            fType2.parent().removeClass("error");
            fType3.parent().removeClass("error");
            fType4.parent().removeClass("error");
        }

        // Validation - People Number
        if ((fPeopleNumber.val() == "") || (fPeopleNumber.val() == null)) { formValid = false;fPeopleNumber.addClass("error") }
        else                                                              { fPeopleNumber.removeClass("error")                }

        // Validation - Delivery Time
        if ((fDeliveryTime.val() == "") || (fDeliveryTime.val() == null)) { formValid = false; fDeliveryTime.parent().addClass("error") }
        else                                                              { fDeliveryTime.parent().removeClass("error")                 }

        if (!fDeliveryTime.is(':checked')) {
            formValid = false;
            form.find("[name='form-delivery-time']").parent().addClass("error");
        }
        else {
            form.find("[name='form-delivery-time']").parent().removeClass("error");
        }

        // Validation - How Long
        if ((fHowLong.val() == "") || (fHowLong.val() == null)) { formValid = false; fHowLong.addClass("error") }
        else                                                    { fHowLong.removeClass("error")                 }

        /*
        console.log("form is valid: " + formValid);
        console.log("fPostcode: " + fPostcode.val());
        console.log("fEvent: " + fEvent.val());
        console.log("fType1: " + fType1.is(':checked'));
        console.log("fType2: " + fType2.is(':checked'));
        console.log("fType3: " + fType3.is(':checked'));
        console.log("fType4: " + fType4.is(':checked'));
        console.log("fPeopleNumber: " + fPeopleNumber.val());
        console.log("fDate: " + fDate.val());
        console.log("fDeliveryTime: " + fDeliveryTime.val());
        console.log("fHowLong: " + fHowLong.val());*/

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
                fType1        = form.find("[name='form-type-1']"),
                fType2        = form.find("[name='form-type-2']"),
                fType3        = form.find("[name='form-type-3']"),
                fType4        = form.find("[name='form-type-4']"),
                fPeopleNumber = form.find("[name='form-people-number']"),
                fDate         = $(".datepicker").datepicker(),
                fDeliveryTime = form.find("[name='form-delivery-time']:checked"),
                fHowLong      = form.find("[name='form-how-long']"),
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
                    looLuxury: fType1.is(':checked'),
                    looPlastic: fType2.is(':checked'),
                    looDisabled: fType3.is(':checked'),
                    looEco: fType4.is(':checked'),
                    fPeopleNumber: fPeopleNumber.val(),
                    fDate: fDate.val(),
                    fDeliveryTime: fDeliveryTime.val(),
                    fHowLong: fHowLong.val(),
                    fWaterAccess: fWaterAccess.val(),
                    fDrainage: fDrainage.val(),
                    fPower: fPower.val(),
                    fTerrain: fTerrain.val(),
                    fEmail: fEmail.val(),
                    fName: fName.val(),
                    fCompany: fCompany.val(),
                    fPhone: fPhone.val(),
                    fTerms: fTerms.is(':checked')
                },
                success: function(data) {

                    console.log(data); // show response from the php script.
                    if (data === 'Success') window.location = "//bookaloo.co/thank-you/";
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
        setTimeout(function() { window.location = "//bookaloo.co/thank-you/" }, 500);
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

        } else if (currentStep == 2) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").addClass("active");
            $(".steps-nav li.step-3").removeClass("active");

        } else if (currentStep == 3) {
            $(".steps-nav li.step-1").addClass("active");
            $(".steps-nav li.step-2").addClass("active");
            $(".steps-nav li.step-3").addClass("active");
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
