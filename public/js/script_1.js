
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


$(function () {
    $('#fa-search').click((e)=>{
        e.preventDefault();
        $('#nav-search').addClass('nav-search');
        $('#nav-search').slideToggle();

    })
})

/* =========================================
               Toggle side-nav
============================================ */

var sideNavHidden = false;
var locked = false;
var left = document.getElementById("left-side");
var right = document.getElementById("right-side");
var lang = document.getElementById("side-nav-item-lang");
var frmContainer = document.getElementById("frm-container");


function hideSideNav(x){
    if(!sideNavHidden){
        right.style.width = "100%";
        right.style.marginLeft = "0px";
        left.style.width = "0";
		if(frmContainer)
			frmContainer.style.marginLeft = "70px";
		if(lang)
			lang.style.display="none";
		if(x != 0)
			locked = true;
		sideNavHidden = true;
    }else{
        right.style.width = "calc(100% - 250px)";
        right.style.marginLeft = "250px";
        left.style.width = "250px";
		if(frmContainer)
			frmContainer.style.marginLeft = "20px";
		if(lang)
			lang.style.display="flex";
		if(x != 0)
			locked = false;
		sideNavHidden = false;
    }
}

 $(document).ready(function($) {
    let $window = $(window);
    let $div = $('#fix-div');
	
    function checkWidth() {
		let window_size = $window.width();
		if(window_size > 1200){
			if(sideNavHidden && !locked)
					hideSideNav(0);
			if($div)
				$div.addClass('position-fixed');
		}else{
			if($div)
				$div.removeClass('position-fixed');
			if(window_size > 991){
				if(sideNavHidden && !locked)
					hideSideNav(0);
			}else {
				if(!sideNavHidden)
					hideSideNav(0);
			}
		}
    }
    checkWidth();
    $(window).resize(checkWidth);
});

/* =========================================
               Responsive Tabs
============================================ */
    $(function () {

        $("#services-tabs").responsiveTabs({
            animation: 'slide'
        });

    });


/* =========================================
                center
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
              Stats
============================================ */
$(function () {

    $(".counter").counterUp({
        delay: 10,
        time: 1000
    });

});

$(function () {
    $("#stats-items").owlCarousel({
        items: 4,
        autoplay: true,
        smartSpeed: 1100,
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
            },
            1200:{
                items:4
            },
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
            switch (s) {
                case 'fb_link':{
                    $('#form-alert-header').text('add your facebook link');break;
                }
                case 'twitter_link':{
                    $('#form-alert-header').text('add your twitter link');break;
                }
                case 'gmail_link':{
                    $('#form-alert-header').text('add your gmail link');break;
                }
                default:{
                    $('#form-alert-header').text('Add Your '+s); break;
                }
            }


        }else if (s.includes('+close')){
            s=s.substr(0, s.indexOf('+'));
            $('#close_hidden').val(s);
            $('#form-alert-header').text('Enter Your '+s);
        } else{

            switch (s) {
                case 'fb_link':{
                    $('#form-alert-header').text('Change Your facebook link');break;
                }
                case 'twitter_link':{
                    $('#form-alert-header').text('Change Your twitter link');break;
                }
                case 'gmail_link':{
                    $('#form-alert-header').text('Change Your gmail link');break;
                }
                default:{
                    $('#form-alert-header').text('Change Your '+s); break;
                }
            }

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
                case 'fb_link':{
                    $('#form-alert-header').text('Ajoutez votre lien facebook');break;
                }
                case 'twitter_link':{
                    $('#form-alert-header').text('Ajoutez votre lien twitter');break;
                }
                case 'gmail_link':{
                    $('#form-alert-header').text('Ajoutez votre lien gmail');break;
                }
            }
        } else{
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
                case 'fb_link':{
                    $('#form-alert-header').text('Changez votre lien facebook');break;
                }
                case 'twitter_link':{
                    $('#form-alert-header').text('Changez votre lien twitter');break;
                }
                case 'gmail_link':{
                    $('#form-alert-header').text('Changez votre lien gmail');break;
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

function fill_field1(s,lang){
    if (lang=='en'){
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
    }else {
        if (s.includes('+')){
            s=s.substr(0, s.indexOf('+'));
            switch (s) {
                case 'address':{
                    $('#form-alert-header').text('Ajoutez  adresse');break;
                }
                case 'phone':{
                    $('#form-alert-header').text('Ajoutez  téléphone');break;
                }
            }
        }else {
            if(s.includes('_')){
                switch (s.substr(0, s.indexOf('_'))) {
                    case 'center': {
                        $('#form-alert-header').text('Changez le centre');
                        break;
                    }
                    case 'role': {
                        $('#form-alert-header').text('Changez le role');
                        break;
                    }
                }
            }else {
                switch (s) {
                    case 'name':{
                        $('#form-alert-header').text('Changez le nom');break;
                    }
                    case 'email':{
                        $('#form-alert-header').text("Changez l'adresse eléctronique");break;
                    }
                    case 'password':{
                        $('#form-alert-header').text('Changez le mot de passe');break;
                    }
                    case 'address':{
                        $('#form-alert-header').text("Changez l'adresse");break;
                    }
                    case 'phone':{
                        $('#form-alert-header').text('Changez le téléphone');break;
                    }
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

$('.modal-body form .hide-form').css('display','none');

function form_submit(s) {
    document.getElementById(s).submit(function () {
    });
}






