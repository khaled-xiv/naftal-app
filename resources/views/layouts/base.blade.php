<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65">

<!-- Header-->
@include('includes.header')
<!-- Header Ends-->
@if(Auth()->user()->is_technician())
<style>
	#right-side {
		width: 100%;
		margin-left: 0;
	}
</style>
@endif

<div class="big-container">
    @if(!Auth()->user()->is_technician())
	<div id="left-side">
		@include('includes.side-nav')
	</div>
    @endif
	<div id="right-side">
		<div>
			@yield('content')
		</div>
	</div>
</div>
</body>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

<!--    owl-carousel-->
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>

<!-- Waypoints -->
<script src="{{asset('js/waypoints/jquery.waypoints.min.js')}}"></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!-- Counter -->
<script src="{{asset('js/counter/jquery.counterup.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script_1.js') }}" defer></script>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script type="text/javascript">

    var pusher = new Pusher('ca6a1e4c88c7b53d41e7', {
        cluster: 'eu',
        encrypted: true,
        authEndpoint: 'http://127.0.0.1:8000/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-Token':'{{csrf_token()}}',
                Accept: 'application/json',
            },
        },
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('private-notifications.'+{{Auth::user()->id}});

    // Bind a function to a Event (the full Laravel class)
    channel.bind('notify', function(data) {
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var notification=(data.notification);
        var newNotificationHtml = `
          <li class="notification-box bg-gray">
             <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                    <img src="/img/users/`+notification.user_photo+`" class="w-50 rounded-circle" alt="50x50">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">`+notification.sender+`</strong>
                <div>
                `+notification.content+`
                    <span> <a href="`+notification.link+`"> see more</a></span>
                </div>
                <small class="text-warning">`+notification.created_at+`</small>
                </div>
               </div>
               </li>
        `;
        $(newNotificationHtml).insertAfter ($('ul.dropdown-menu-1 li.head'));
        $('ul.dropdown-menu-1 li.no-notifications').remove();
        $('#bell').addClass('bell-animations');
        setTimeout(function () {
            $('#bell').removeClass('bell-animations');
        },2000)
        var count=$('span.num').text();
        $('span.num').html(+count+1);
        $('span.num').show();
        let src1 = '{{asset('audio/ring.mp3')}}';
        var snd='<audio autoplay=true> <source src='+src1+'></audio>'
        $('body').append(snd);
    });

    function markAsRead() {
        $.ajax({
            type: 'post',
            url: '/{{app()->getLocale()}}/mark-as-read',
            data: {_token: '{{csrf_token()}}'},
            success: function (data) {
                $('span.num').css('display','none');
                $('.notification-box').removeClass('bg-gray');
            }
        })
        $('span.num').html(+0);
    }

</script>

</html>
