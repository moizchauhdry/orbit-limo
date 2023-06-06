<!-- Header Section -->
<header class="header">
    <div class="container px-md-5 h-100">
        <!-- Header Navbar  -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#"><img src="{{asset('website/images/orbit-logo--189x84.png')}}"
                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse justify-content-end navbar-collapse z-3" id="navbarSupportedContent">
                <ul class="navbar-nav pb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-white active" aria-current="page"
                            href="https://orbitlimo.ca/">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="https://app.orbitlimo.ca/about-us/">About
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="https://app.orbitlimo.ca/about-us/">Our
                            Fleet</a></li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="https://app.orbitlimo.ca/for-corporates/">For Corporate</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="https://app.orbitlimo.ca/contact/">Contact
                            us</a></li>
                </ul>
            </div>
        </nav>
        <!-- Header Content -->
        <div  class="header__content position-relative h-100 d-flex justify-content-between align-items-center flex-column flex-lg-row pt-0 pt-xl-5 px-xl-4">

            <!-- Header Content Data -->
            <div class="text-white pt-xl-5 h-100">
                <h2 class="display-4 fw-medium text-center py-3 px-md-2">Welcome to Our Orbit</h2>
                <!-- <p class="h4 text-center">THE BEST, NOT THE CHEAPEST</p> -->
                <!-- <hr> -->
            </div>

            <!-- Header Content Form -->
            <div class="register col-12 col-lg-6 col-xl-4">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link h-100 text-white fw-semibold active" href="#on-way" id="on-way-tab"
                            data-bs-toggle="tab" data-toggle="tab" role="tab" aria-controls="on-way"
                            aria-selected="true" onclick="bookingTab('distance')">On Way</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-100 text-white fw-semibold" href="#by-hour" id="by-hour-tab"
                            data-bs-toggle="tab" data-toggle="tab" role="tab" aria-controls="by-hour"
                            aria-selected="true" onclick="bookingTab('hourly')">By the Hour</a>
                    </li>
                </ul>

                <form class="tab-content h-100">
                    @csrf

                    <div class="alert alert-warning error-messages m-3" style="display:none">
                        <h5>Validation!</h5>
                        <ul></ul>
                    </div>

                    <input type="hidden" name="booking_type" id="booking_type">

                    <div class="tab-pane show active text-white py-2 px-3 w-100">
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupFrom">From</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pickup_location" id="pickup_location"
                                    placeholder="Address, airport, hotel, ..." />
                                <span class="input-group-text bg-transparent text-light"><i
                                        class="fa-solid fa-location-dot"></i></span>
                            </div>
                        </div>

                        <div class="form-group my-2 destination">
                            <label class="text-white h6" for="formGroupTo">To</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="drop_location" id="drop_location"
                                    placeholder="Address, airport, hotel, ...">
                                <span class="input-group-text bg-transparent text-light"><i
                                        class="fa-solid fa-location-dot"></i></span>
                            </div>
                        </div>

                        <div class="form-group my-2 duration">
                            <label class="text-white h6" for="formGroupDuration">Duration</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="duration_in_hours" id="duration_in_hours"
                                    placeholder="2 hours">
                                <span class="input-group-text bg-transparent text-light"><i
                                        class="fa-solid fa-clock"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-white h6" for="datepicker">Date</label>
                            <input id="pickup_date" class="form-control pickup_date" name="pickup_date"
                                placeholder='05-04-2023' />
                        </div>
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupTime">Time</label>
                            <input class="form-control pickup_time" type='text' name="pickup_time" id="pickup_time"
                                data-mdb-toggle="timepicker" placeholder="9:00 AM">
                        </div>
                        <div class="mt-3">
                            <button type="button" class="w-100 btn btn-success py-2 btn-booking-submit">Search</button>
                        </div>
                        <div class='note-msg py-1 text-center w-100'>Error Msg ...........</div>
                    </div>

                </form>

            </div>

            <div class='qr-code-content'>
                <img src="{{asset('website/images/qrcode.png')}}" alt="img" class='h-100'>
                <div>
                    <a href="#"><img src="{{asset('website/images/icon-facebook.png')}}" alt="social-img"></a>
                    <a href="#"><img src="{{asset('website/images/icon-instagram.png')}}" alt="social-img"></a>
                </div>
            </div>
        </div>

    </div>
</header>

<script>
    bookingTab('distance');

    function bookingTab(tab) {
        $(".error-messages").hide();

        var booking_type = $("#booking_type").val(tab);

        if (tab == "hourly") {
            $(".duration").show();
            $(".destination").hide();
        } else {
            $(".destination").show();
            $(".duration").hide();
        }
    }
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-booking-submit").click(function(e){
    
        e.preventDefault();
     
        var booking_type = $("#booking_type").val();
        var pickup_location = $("#pickup_location").val();
        var drop_location = $("#drop_location").val();
        var pickup_time = $("#pickup_time").val();
        var pickup_date = $("#pickup_date").val();
        var duration_in_hours = $("#duration_in_hours").val();
     
        $.ajax({
           type:'POST',
           url:"{{ route('frontend.booking.store') }}",
           data:{
                pickup_location:pickup_location, 
                drop_location:drop_location,
                duration_in_hours:duration_in_hours,
                pickup_time:pickup_time,
                pickup_date:pickup_date,
                booking_type:booking_type,
            },
           success:function(data){
                if($.isEmptyObject(data.error)){
                    window.location.href = '{{route('frontend.booking')}}';
                }else{
                    errorMessages(data.error);
                }
           }
        });
    
    });
  
    function errorMessages (msg) {
        $(".error-messages").find("ul").html('');
        $(".error-messages").css('display','block');
        $.each( msg, function( key, value ) {
            $(".error-messages").find("ul").append('<li>'+value+'</li>');
        });
    }
  
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXl5k0hdaecdpWF7AcfhkXv4TN6MvQn6g&callback=initMap&libraries=places&v=weekly"
    defer></script>

<script>
    function initMap() {
        var pickupInput = document.getElementById('pickup_location');
        var dropInput = document.getElementById('drop_location');
        
        var options = {
            componentRestrictions: { country: 'ca' }
        };
        
        var pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput,options);
        var dropAutocomplete = new google.maps.places.Autocomplete(dropInput,options);
    }
</script>