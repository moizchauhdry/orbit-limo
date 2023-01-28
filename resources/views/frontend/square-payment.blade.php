<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://portal.pbbarcouncil.com/public/admin/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/square.css')}}" preload>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" preload>
    <script src="https://web.squarecdn.com/v1/square.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="text-center" style="margin-top: 50px">
                <img src="{{asset('frontend/images/public-paypal.png')}}" style="width: 150px;">
                <h3>Please pay ${{$booking->grand_total}} to complete your booking order.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div id="payment-status-container"></div>
                <div id="card-container"></div>
                <button id="card-button" type="button">Pay ${{$booking->grand_total}}</button>
            </div>
        </div>
    </div>

    @include('livewire.loader')

    <script type="module">
        const payments = Square.payments('sq0idp-mvWJB6CzQwBgCLKYoADlQg', 'LC9B8670T65GJ');
        const card = await payments.card();
        await card.attach('#card-container');

        const cardButton = document.getElementById('card-button');
        cardButton.addEventListener('click', async () => {
        const statusContainer = document.getElementById('payment-status-container');

        try {
            const result = await card.tokenize();
            if (result.status === 'OK') {
                $.ajax({
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'payment_token': result.token,
                    'booking_id': '{{$booking->id}}',
                },
                url: '{{route('booking.square-payment.success')}}',

                success: function (response) {
                    var url = "{{ route('success', '{{$booking->id}}') }}";
                    location.href = url;
                },
                error : function (errors) {
                    alert('PAYMENT ERROR!');
                }
                });

            } else {
            let errorMessage = `Tokenization failed with status: ${result.status}`;
            if (result.errors) {
                errorMessage += ` and errors: ${JSON.stringify(
                result.errors
                )}`;
            }

            throw new Error(errorMessage);
            }
        } catch (e) {
            console.error(e);
            statusContainer.innerHTML = "Payment Failed";
        }
        });
    </script>
</body>
