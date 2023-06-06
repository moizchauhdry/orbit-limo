@extends('layouts.website')

@section('content')
<!-- Services Section  -->
<section class="section__services py-5">
    <div class="container overflow-hidden">
        <!-- Section Services Heading -->
        <div class="section__services--heading text-center pt-2">
            <h1>Services</h1>
        </div>
        <!-- Section Services Box Row -->
        <div class="row justify-content-center gy-4 py-5">
            <!-- Section Services Box 1 -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="thumbnail">
                    <img src="{{asset('website/images/intercity-rides.png')}}" alt="img" class="h-25 w-100 rounded">
                    <div class="caption py-2"> 
                        <h3>Intercity rides</h3>
                        <p class="fw-light h6 pb-2">We can provide you with a stress-free solution for traveling
                            between cities by offering chauffeur services across the globe.</p>
                    </div>
                </div>
            </div>
            <!-- Section Services Box 2 -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="thumbnail">
                    <img src="{{asset('website/images/chaufer.png')}}" alt="img" class="h-25 w-100 rounded">
                    <div class="caption py-2">
                        <h3>Chauffeur hailing</h3>
                        <p class="fw-light h6 pb-2">Enjoy the quality of a traditional chauffeur, with the
                            convenience of riding within minutes of booking.</p>
                    </div>
                </div>
            </div>
            <!-- Section Services Box 3 -->
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="thumbnail">
                    <img src="{{asset('website/images/airport-transfer.png')}}" alt="img" class="h-25 w-100 rounded">
                    <div class="caption py-2">
                        <h3>Airport transfers</h3>
                        <p class="fw-light h6 pb-2">With additional wait time and flight tracking in case of delays,
                            our service is optimized to make every airport transfer a breeze.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fleet Section -->
<section class="section__fleet py-5">
    <div class="container text-white py-5">
        <!-- Fleet Section Heading -->
        <div class="section__fleet--heading d-flex justify-content-md-between align-items-center flex-column flex-md-row">
            <h1 class="display-3 fw-medium">Our Fleet</h1>
            <p class="h6 text-center">We offer you an excellent and secure VIP experience.</p>
        </div>
        <hr />
        <!-- Fleet Section Cards -->
        <div class="d-flex justify-content-center flex-column flex-lg-row gap-5 pt-5">
            <!-- Fleet Section Card 1 -->
            <div class="thumbnail d-flex flex-column align-items-center">
                <img src="{{asset('website/images/SUV-Gallery-4.webp')}}" alt="img" class="h-75 w-75">
                <div class="caption w-100">
                    <h5 class="text-left">EXECUTIVE SUV</h5>
                    <a href="https://app.orbitlimo.ca/our-fleet/" class="btn btn-success w-100 py-2">BOOK NOW</a>
                </div>
            </div>
            <!-- Fleet Section Card 2 -->
            <div class="thumbnail d-flex flex-column align-items-center">
                <img src="{{asset('website/images/Untitled-design-1.png')}}" alt="img" class="h-75 w-75">
                <div class="caption w-100">
                    <h5>EXECUTIVE SEDAN</h5>
                    <a href="https://app.orbitlimo.ca/our-fleet/" class="btn btn-success w-100 py-2">BOOK NOW</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- CityRoutes Section  -->
<section class="section__services py-5" style="background-color: #F0F2F7;">
    <div class="container">
        <!-- Heading -->
        <div class="section__services--heading text-center pt-5">
            <h1>Top Cities</h1>
        </div>
          <!-- Section Cities Box Row -->
          <div class="row justify-content-center g-3 pt-4">
            <!-- Section Services Box 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/toronto.jpeg')}}" alt="img" class="w-100 rounded-top object-fit-cover" style="height: 110px;" >
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Toronto</p>
                    </div>
                </div>
            </div>
            <!-- Section Services Box 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/mississagua.jpeg')}}" alt="img" class="w-100 rounded-top object-fit-cover" style="height: 110px;" >
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Mississauga</p>
                    </div>
                </div>
            </div>
            <!-- Section Services Box 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/okvillie.jpeg')}}" alt="img" class="w-100 rounded-top object-fit-cover" style="height: 110px;" >
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Oakville</p>
                    </div>
                </div>
            </div>
              <!-- Section Services Box 4 -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/niagra.jpeg')}}" alt="img" class="w-100 rounded-top object-fit-cover" style="height: 110px;" >
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0"> Niagara</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__services--heading text-center pt-5">
            <h1>City-to-city routes</h1>
        </div>
        <!-- Boxes Row -->
        <div class="row g-3 px-2 py-5">
            <!-- Box 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span class="fw-medium">San
                            Niagara</span></div>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Montreal</span></div>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Oakville</span></div>
                </div>
            </div>
            <!-- Box 4 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">London</span></div>
                 </div>
            </div>

            <!-- Box 5 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Thunder Bay</span></div>
                </div>
            </div>
            <!-- Box 6 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Windsor</span></div>
                </div>
            </div>
            <!-- Box 7 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Kitchener</span></div>
                </div>
            </div>
            <!-- Box 8 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Ottawa</span></div>
                </div>
            </div>


            <div class="col-12 overflow-hidden">
                <div class="thumbnail p-4 bg-white shadow-sm rounded d-flex flex-column flex-sm-row">
                    <div
                        class="col-12 col-sm-6 col-md-7 col-lg-9 d-flex flex-column align-items-center align-items-md-start">
                        <h5 class="text-dark">Have a different route in mind?</h5>
                        <p class="fw-light">Enter your pick-up and drop-off locations to see the price.</p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 col-lg-3">
                        <a href='#' class="btn custom-gradient text-white py-3 fw-medium w-100">
                            Book a city-to-city
                            ride
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Testimonials Section  -->
<section class="section__testimonials py-5">
    <!-- Testimonials Section Boxes Container  -->
    <div class="container overflow-hidden">
        <!-- Section Testimonials Box Row -->
        <div class="row justify-content-center gx-5 py-5">
            <!-- Section Testimonials Box 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail text-center">
                    <img src="{{asset('website/images/safety-first.jpeg')}}" alt="img" class="h-50 w-50">
                    <div class="caption">
                        <h3>Safety first</h3>
                        <p class="h5 fw-light">Travel confidently knowing your safety is our #1 priority. Rigorous
                            health and cleaning standards round out a best-in-class service.</p>
                    </div>
                </div>
            </div>
            <!-- Section Testimonials Box 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail text-center">
                <img src="{{asset('website/images/travel.jpeg')}}" alt="img" class="h-25 w-50">
                    <div class="caption">
                        <h3>Private travel solutions</h3>
                        <p class="h5 fw-light">Discover your one-stop travel shop: long-distance rides, one way or
                            return, by the hour, airport transfers, and more.</p>
                    </div>
                </div>
            </div>
            <!-- Section Testimonials Box 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail text-center">
                  <img src="{{asset('website/images/sustainable.jpeg')}}" alt="img" class="h-50 w-50">
                    <div class="caption">
                        <h3>Sustainable travel</h3>
                        <p class="h5 fw-light">Breathe easy knowing all ride emissions are offset, as part of our
                            global carbon offset program — the industry’s first.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flight Section -->
<section class="section__flight py-5">
    <!-- Flight Section Container -->
    <div class="d-flex align-items-start align-items-md-center justify-content-center text-black text-center h-100">
        <!-- Flight Section Heading -->
        <h1 class="display-md-4 fw-semibold display-6">Chartered Flights Coming Soon!</h1>
    </div>
</section>
@endsection