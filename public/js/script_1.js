
/* =========================================
              Mobile Menu
============================================ */
$(function () {

    // Show mobile nav
    $("#mobile-nav-open-btn").click(function () {
        $("#mobile-nav").css("height", "100%");
    });

    // Hide mobile nav
    $("#mobile-nav-close-btn").click(function () {
        $("#mobile-nav").css("height", "0%");
    });

});

/* =========================================
                Team
============================================ */
$(function () {
    $("#center-items").owlCarousel({
        items: 3,
        autoplay: true,
        smartSpeed: 700,
        loop: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});



/* =========================================
              Show Icon on hover
============================================ */

$(".credential .credential-detail").hover(function () {

    $(this).children().css("visibility", "visible");
    $(this).css("backgroundColor", "rgba(211, 211, 211, 0.55)");
    $(this).css("textDecoration", "none");

});

$(".credential .credential-detail").mouseleave(function () {
    $(".credential .edit").css("visibility", "hidden");
    $(".credential .credential-detail").css("backgroundColor", "transparent");
    $(".credential .credential-detail").css("textDecoration", "none");
});

function fill_field(s,lang){
    if (lang=='en'){
        if (s.includes('+')){
            s=s.substr(0, s.indexOf('+'));
            $('#form-alert-header').text('Add Your '+s);
        }else if (s.includes('+close')){
            s=s.substr(0, s.indexOf('+'));
            $('#close_hidden').val(s);
            $('#form-alert-header').text('Enter Your '+s);
        } else{
            $('#form-alert-header').text('Change Your '+s);
        }
    }else {
        if (s.includes('+')){
            s=s.substr(0, s.indexOf('+'));
            switch (s) {
                case 'address':{
                    $('#form-alert-header').text('Ajoutez votre adresse');break;
                }
                case 'phone':{
                    $('#form-alert-header').text('Ajoutez votre téléphone');break;
                }
            }
        }else if (s.includes('+close')){
            s=s.substr(0, s.indexOf('+'));
            $('#close_hidden').val(s);
            $('#form-alert-header').text('Entez votre nom');
        }
        else{
            switch (s) {
                case 'name':{
                    $('#form-alert-header').text('Changez votre nom');break;
                }
                case 'email':{
                    $('#form-alert-header').text('Changez votre adresse eléctronique');break;
                }
                case 'password':{
                    $('#form-alert-header').text('Changez votre mot de passe');break;
                }
                case 'address':{
                    $('#form-alert-header').text('Changez votre adresse');break;
                }
                case 'phone':{
                    $('#form-alert-header').text('Changez votre téléphone');break;
                }
            }
        }
    }

    $('#field_hidden').val(s);
    $('.modal-body form .hide-form').css('display','none');
    $('.modal-body form  #'+s).parents(':eq(1)').show();
    if(s=='password'){
        $('.modal-body form  #password-confirm').parents(':eq(1)').show();
    }
}

function fill_field1(s){
    if (s.includes('+')){
        s=s.substr(0, s.indexOf('+'));
        $('#form-alert-header').text('Add '+s);
    }else{
        if(s.includes('_')){
            $('#form-alert-header').text('Change  '+s.substr(0, s.indexOf('_')));
        }else {
            $('#form-alert-header').text('Change  '+s);
        }
    }

    $('#field_hidden').val(s);
    $('.modal-body form .hide-form').css('display','none');
    $('.modal-body form  #'+s).parents(':eq(1)').show();
    if(s=='password'){
        $('.modal-body form  #password-confirm').parents(':eq(1)').show();
    }
}

$('.modal-body form .hide-form').css('display','none');

function form_submit(s) {
    document.getElementById(s).submit(function () {
    });
}






