<!DOCTYPE html>
<html lang="en-US">

<head>

    <!--meta-->
    <meta charset="UTF-8">
    <meta name="generator" content="WordPress 4.9.22">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Just another Wordpress Plugins Sites site">
    <meta name="format-detection" content="telephone=no">
    <!--style-->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0"
        href="https://quanticalabs.com/wp_plugins/chauffeur-booking-system/feed/">
    <link rel="pingback" href="https://quanticalabs.com/wp_plugins/chauffeur-booking-system/xmlrpc.php">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="stylesheet" id="main-style-css" href="{{asset('frontend/css/live_preview-style.css')}}" type="text/css"
        media="all">
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <link rel="stylesheet" id="google-font-open-sans-css"
        href="//fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C700&amp;ver=4.9.22" type="text/css" media="all">
    <link rel="stylesheet" id="google-font-lato-css"
        href="//fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700&amp;subset=latin-ext&amp;ver=4.9.22"
        type="text/css" media="all">
    <link rel="stylesheet" id="jquery-ui-css" href="{{asset('frontend/css/style-jquery.ui.min.css')}}" type="text/css"
        media="all">
    <link rel="stylesheet" id="jquery-qtip-css" href="{{asset('frontend/css/style-jquery.qtip.min.css')}}"
        type="text/css" media="all">
    <link rel="stylesheet" id="jquery-timepicker-css" href="{{asset('frontend/css/style-jquery.timepicker.min.css')}}"
        type="text/css" media="all">
    <link rel="stylesheet" id="jquery-fancybox-css" href="{{asset('frontend/css/fancybox-jquery.fancybox.css')}}"
        type="text/css" media="all">
    <link rel="stylesheet" id="jquery-intlTelInput-css" href="{{asset('frontend/css/style-intlTelInput.min.css')}}"
        type="text/css" media="all">
    <link rel="stylesheet" id="chbs-public-css" href="{{asset('frontend/css/style-public.css')}}" type="text/css"
        media="all">
    <link rel="stylesheet" id="chbs-public-booking-form--css" href="{{asset('frontend/css/15-style.css')}}"
        type="text/css" media="all">

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-255655150-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-255655150-2');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WT4KJK7');
    </script>
    <!-- End Google Tag Manager -->

    @livewireStyles
</head>

<body class="home page-template-default page page-id-10008">
    @yield('content')

    @stack('js')
    @livewireScripts

    <script>
        window.livewire.on('google_map_hide', () => {
            $("#map").addClass('hide');
                });
        window.livewire.on('google_map_show', () => {
            $("#map").removeClass('hide');
                });
    </script>

    <script>
        window.addEventListener('swal:modal', event => {
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT4KJK7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>