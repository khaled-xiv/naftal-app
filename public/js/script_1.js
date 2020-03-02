/* =========================================
              Mobile Menu
============================================ */
$(function () {

    // Show mobile nav
    $("#mobile-nav-open-btn").click(function () {
        $("#mobile-nav").css("height", "100%");
    });

    // Hide mobile nav
    $("#mobile-nav-close-btn, #mobile-nav a").click(function () {
        $("#mobile-nav").css("height", "0%");
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

function fill_field(s){
        if (s.includes('+')){
            s=s.substr(0, s.indexOf('+'));
            $('#form-alert-header').text('Add '+s);
        }else if (s.includes('+close')){
            s=s.substr(0, s.indexOf('+'));
            $('#close_hidden').val(s);
            $('#form-alert-header').text('Enter Your'+s);
        }
        else{
            $('#form-alert-header').text('Change Your '+s);
        }

        console.log(s);
        $('#field_hidden').val(s);
        console.log('sala'+s);
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
        $('#form-alert-header').text('Change  '+s);
    }

    console.log(s);
    $('#field_hidden').val(s);
    $('.modal-body form .hide-form').css('display','none');
    $('.modal-body form  #'+s).parents(':eq(1)').show();
    if(s=='password'){
        $('.modal-body form  #password-confirm').parents(':eq(1)').show();
    }
}

$('.modal-body form .hide-form').css('display','none');

function form_submit(s) {
    console.log(s)
    document.getElementById(s).submit(function () {
    });
}

$('button[name="remove_levels"]').on('click', function(e) {
    var $form = $(this).closest('form');
    e.preventDefault();
    $('#confirmModal').modal({
        backdrop: 'static',
        keyboard: false
    })
        .on('click', '#delete', function(e) {
            $form.trigger('submit');
        });
});

/*----------------------------------------
            date picker
-------------------------------------------*/






