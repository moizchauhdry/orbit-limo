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
                        <h3>Intercity Rides</h3>
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
                        <h3>Chauffeur Hailing</h3>
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
                        <h3>Airport Transfers</h3>
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
        <div
            class="section__fleet--heading d-flex justify-content-md-between align-items-center flex-column flex-md-row">
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
            <a href="#" class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/toronto.jpeg')}}" alt="img"
                        class="w-100 rounded-top object-fit-cover" style="height: 110px;">
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Toronto</p>
                    </div>
                </div>
            </a>
            <!-- Section Services Box 2 -->
            <a href="#" class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/mississagua.jpeg')}}" alt="img"
                        class="w-100 rounded-top object-fit-cover" style="height: 110px;">
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Mississauga</p>
                    </div>
                </div>
            </a>
            <!-- Section Services Box 3 -->
            <a href="#" class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/okvillie.jpeg')}}" alt="img"
                        class="w-100 rounded-top object-fit-cover" style="height: 110px;">
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0">Oakville</p>
                    </div>
                </div>
            </a>
            <!-- Section Services Box 4 -->
            <a href="#" class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <img src="{{asset('website/images/niagra.jpeg')}}" alt="img"
                        class="w-100 rounded-top object-fit-cover" style="height: 110px;">
                    <div class="p-3 bg-white shadow-sm rounded-bottom">
                        <p class="fw-medium m-0"> Niagara</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="section__services--heading text-center pt-5">
            <h1>City-to-City Routes</h1>
        </div>
        <!-- Boxes Row -->
        <div class="row g-3 px-2 py-5">
            <!-- Box 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span class="fw-medium">Niagara</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $466 CAD</div>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Toronto</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Montreal</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $1707 CAD</div>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Hamilton</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Brampton</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $285 CAD</div>
                </div>
            </div>
            <!-- Box 4 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">London</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Mississauga</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $591 CAD</div>
                </div>
            </div>

            <!-- Box 5 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Ottawa</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span class="fw-medium">Toronto</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $1431 CAD</div>
                </div>
            </div>
            <!-- Box 6 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Kitchener</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Markham</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $433 CAD</div>
                </div>
            </div>
            <!-- Box 7 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Kingston</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Mississauga</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $934 CAD</div>
                </div>
            </div>
            <!-- Box 8 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div
                    class="thumbnail p-3 bg-white shadow-sm rounded d-flex flex-column justify-content-center align-items-center align-items-md-start">
                    <div><span class="fw-medium">Barrie</span><i
                            class="fa-solid fa-arrow-right mx-3 text-secondary"></i><span
                            class="fw-medium">Milton</span></div>
                            <div class="cityPricing" style="
    text-align: right !important;
    width: 100%;
    margin-top: 15px;
    color: grey;
">From $536 CAD</div>
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
                        <a href='#' class="centerButton btn btn-success w-100 py-2">
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
                        <h3>Safety First</h3>
                        <p class="h5 fw-light">Travel with assurance, as we prioritize your safety above all else.
                            Impeccable health and sanitation protocols
                            complement our exceptional service, ensuring the highest standards in the industry</p>
                    </div>
                </div>
            </div>
            <!-- Section Testimonials Box 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail text-center">
                    <img src="{{asset('website/images/travel.jpeg')}}" alt="img" class="h-25 w-50">
                    <div class="caption">
                        <h3>Private Travel Solutions</h3>
                        <p class="h5 fw-light">Explore a convenient hub for all your travel needs: extended journeys,
                            single or round trips, hourly rentals, airport
                            transfers, and additional services available.</p>
                    </div>
                </div>
            </div>
            <!-- Section Testimonials Box 3 -->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail text-center">
                    <img src="{{asset('website/images/sustainable.jpeg')}}" alt="img" class="h-50 w-50">
                    <div class="caption">
                        <h3>Sustainable Travel</h3>
                        <p class="h5 fw-light">Net zero emissions being our top priority, orbit limo aims to replace at
                            least 50% of our fleet with
                            all-electric vehicles, by 2028.</p>
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