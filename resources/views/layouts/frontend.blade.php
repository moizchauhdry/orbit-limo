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
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="main-style-css" href="{{asset('frontend/css/live_preview-style.css')}}" type="text/css"
        media="all">
    <style id="main-style-inline-css" type="text/css">
        .header,
        .footer,
        .footer_container .main {
            width: 1280px;
        }

        .theme_page,
        .theme_page_header {
            width: 1220px;
        }

        div.footer div.widget {
            width: 297px;
        }

        .header_left a {
            margin-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" id="responsive-css" href="{{asset('frontend/css/live_preview-responsive.css')}}"
        type="text/css" media="all">
    <style id="responsive-inline-css" type="text/css">
        @media screen and (min-width:1010px) and (max-width:1298px) {

            .header,
            .footer,
            .footer_container .main {
                width: 990px;
            }

            .theme_page,
            .theme_page_header {
                width: 930px;
            }

            div.footer div.widget {
                width: 225px;
            }
        }
    </style>

    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    {{-- <script type="text/javascript" src="{{asset('frontend/js/jquery-jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery-jquery-migrate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/js-main.js')}}"></script>
    <link rel="https://api.w.org/" href="https://quanticalabs.com/wp_plugins/chauffeur-booking-system/wp-json/"> --}}

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">

    <style>
        .hide {
            display: none;
        }
    </style>

    @livewireStyles
</head>

<body class="home page-template-default page page-id-10008">
    @yield('content')

    {{-- <script type="text/javascript">
        jQuery(document).ready(function($)
         {
         	var bookingForm=$('#chbs_booking_form_EFB988B2FD6587455A08E5A9DFCEFB82').chauffeurBookingForm(
         	{
         		booking_form_id:10007,
         		plugin_version:'6.7',
         		ajax_url:'https://quanticalabs.com/wp_plugins/chauffeur-booking-system/wp-admin/admin-ajax.php',
         		length_unit:1,
         		time_format:'G:i',
         		date_format:'d-m-Y',
         		date_format_js:'dd-mm-yy',
         		message:
         		{
         			google_map_ask_load_confirm:'This element requires Google Maps library. Do you want to use it? If not, library will not be loaded and element will not be displayed.',
         			designate_route_error:'It is not possible to create a route between chosen points.',
         			place_geometry_error:'Google Maps API cannot find details for this place.'
         		},
         		text:
         		{
         			unit_length_short:'km',
         			unit_time_hour_short:'h',
         			unit_time_minute_short:'h',
         		},
         		date_exclude:[],
         		datetime_min:'16-01-2023 15:03:00',
         		datetime_max:'',
         		datetime_min_format:'16-01-2023',
         		datetime_max_format:'',
         		business_hour:{"1":{"start":"06:00","stop":"22:00"},"2":{"start":"06:00","stop":"22:00"},"3":{"start":"06:00","stop":"22:00"},"4":{"start":"06:00","stop":"22:00"},"5":{"start":"06:00","stop":"22:00"},"6":{"start":"06:00","stop":"22:00"},"7":{"start":null,"stop":null}},
         		timepicker_step:30,
         		timepicker_dropdown_list_enable:1,
         		timepicker_hour_range_enable:0,
         		timepicker_field_readonly:0,
         		summary_sidebar_sticky_enable:1,
         		ride_time_multiplier:1.00,
         		extra_time_unit:2,
         		driving_zone:
         		{
         			pickup:
         			{
         				enable:0,
         				country:[-1],
         				area:
         				{
         					radius:50,
         					coordinate:
         					{
         						lat:'',
         						lng:''
         					}
         				}
         			},
         			waypoint:
         			{
         				enable:0,
         				country:[-1],
         				area:
         				{
         					radius:50,
         					coordinate:
         					{
         						lat:'',
         						lng:''
         					}
         				}
         			},
         			dropoff:
         			{
         				enable:0,
         				country:[-1],
         				area:
         				{
         					radius:50,
         					coordinate:
         					{
         						lat:'',
         						lng:''
         					}
         				}
         			}
         		},
         		google_map_option:
         		{
         			route_type:1,
         			route_avoid:[-1],
         			draggable:
         			{
         				enable:1						},
         			draggable_location:
         			{
         				enable:0						},
         			traffic_layer:
         			{
         				enable:0						},
         			scrollwheel:
         			{
         				enable:1						},
         			map_control:
         			{
         				enable:1,
         				id:'ROADMAP',
         				style:'DROPDOWN_MENU',
         				position:'LEFT_TOP'
         			},
         			zoom_control:
         			{
         				enable:1,
         				style:'DEFAULT',
         				position:'RIGHT_BOTTOM',
         				level:6
         			},
         			default_location:
         			{
         				type:2,
         				coordinate:
         				{
         					lat:'40.7127753',
         					lng:'-74.0059728'
         				}
         			},
         			ask_load_enable:0					},
         		base_location:
         		{
         			coordinate:
         			{
         				lat:'',
         				lng:''
         			}
         		},
         		widget:
         		{
         			mode:0,
         			booking_form_url:''
         		},
         		rtl_mode:0 ,
         		scroll_to_booking_extra_after_select_vehicle_enable:0,
         		current_date:'16-01-2023',
         		current_time:'15:03',
         		icon_field_enable:0,
         		use_my_location_link_enable:0,
         		client_country_code:'US',
         		ride_time_rounding:1,
         		tax_rate_geofence_enable:0,
         		total_time_display_enable:1,
         		recaptcha:
         		{
         			enable:0,
         			site_key:'',
         			api_type:1,
         		},
         		is_autoride_theme:0			   });
            bookingForm.setup();
         });
    </script> --}}

    {{-- <script type="text/javascript" src="{{asset('frontend/js/ui-core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/ui-widget.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/ui-tabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/script-jquery.actual.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/script-CHBS.Helper.class.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/script-jquery.chauffeurBookingForm.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/js-wp-embed.min.js')}}"></script> --}}

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
</body>

</html>
