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
            <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav pb-2 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Our Fleet</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">For Corporate</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contact us</a></li>
                </ul>
            </div>
        </nav>
        <!-- Header Content -->
        <div class="header__content d-flex justify-content-evenly flex-column flex-lg-row pt-5">

            <!-- Header Content Data -->
            <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white pt-5 pt-md-0">
                <h2 class="display-3 fw-medium">ORBIT LIMO</h2>
                <p class="h4">THE BEST, NOT THE CHEAPEST</p>
                <hr>
            </div>

            <!-- Header Content Form -->
            <div class="register col-12 col-lg-6 col-xl-4 h-100">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item h-100">
                        <a class="nav-link h-100 text-white fw-semibold active" href="#on-way" id="on-way-tab"
                            data-bs-toggle="tab" data-toggle="tab" role="tab" aria-controls="on-way"
                            aria-selected="true">On Way</a>
                    </li>
                    <li class="nav-item h-100">
                        <a class="nav-link h-100 text-white fw-semibold" href="#by-hour" id="by-hour-tab"
                            data-bs-toggle="tab" data-toggle="tab" role="tab" aria-controls="by-hour"
                            aria-selected="true">By the hour</a>
                    </li>
                </ul>

                <form class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active text-white py-2 px-3 w-100" id="on-way" role="tabpanel"
                        aria-label="on-way-tab" aria-labelledby="on-way-tab">
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupFrom">From</label>
                            <input type="text" class="form-control" id="formGroupFrom"
                                placeholder="Address, airport, hotel, ..." />
                        </div>

                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupTo">To</label>
                            <input type="text" class="form-control" id="formGroupTo"
                                placeholder="Address, airport, hotel, ...">
                        </div>
                        <div class="form-group">
                            <label class="text-white h6" for="datepicker">Date</label>
                            <input id="datepicker" class="form-control" />
                        </div>
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupTime">Time</label>
                            <input type="time" value="09:00" class="form-control" id="formGroupTime"
                                placeholder="9:00 AM">
                        </div>
                        <div class="mt-3">
                            <a class="w-100 btn btn-success py-2">Search</a>
                        </div>
                    </div>

                    <div class="tab-pane fade show text-white py-2 px-3 w-100" id="by-hour" role="tabpanel"
                        aria-label="by-hour-tab" aria-labelledby="by-hour-tab">
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupFrom">From</label>
                            <input type="text" class="form-control" id="formGroupFrom"
                                placeholder="Address, airport, hotel, ..." />
                        </div>

                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupDuration">Duration</label>
                            <input type="text" class="form-control" id="formGroupDuration" placeholder="2 hours">
                        </div>
                        <div class="form-group my-2">
                            <label class="text-white h6" for="datepicker">Date</label>
                            <input id="datepicker2" class="form-control" />
                        </div>
                        <div class="form-group my-2">
                            <label class="text-white h6" for="formGroupTime">Time</label>
                            <input type="text" class="form-control" id="formGroupTime" placeholder="9:00 AM">
                        </div>

                        <div class="mt-3">
                            <a class="w-100 btn btn-success shadow py-2">Search</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</header>