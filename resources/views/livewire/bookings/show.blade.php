<div wire:ignore.self class="modal fade" id="booking_detail_modal" tabindex="-1" role="dialog"
    aria-labelledby="booking_detail_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="booking_detail_modal_label">Booking Detail</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if (isset($booking_data))
                    <table class="table table-bordered table-sm text-center">
                        <tbody>
                            <tr>
                                <td colspan="4" class="bg-success text-white">
                                    <span class="fs-5">CUSTOMER DETAIL</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$booking_data->first_name}} {{$booking_data->last_name}}</td>
                                <th>Email</th>
                                <td>{{$booking_data->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$booking_data->phone}}</td>
                                <th>Comments</th>
                                <td>{{$booking_data->comments}}</td>
                            </tr>

                            <td colspan="4" class="bg-success text-white">
                                <span class="fs-5">RIDE DETAIL</span>
                            </td>
                            <tr>
                                <th>Date</th>
                                <td>{{getDateByFormat($booking_data->pickup_date)}}</td>
                                <th>Time</th>
                                <td>{{getTimeByFormat($booking_data->pickup_time)}}</td>
                            </tr>
                            <tr>
                                <th>Pickup</th>
                                <td>{{$booking_data->pickup_location}}</td>
                                <th>Drop-off</th>
                                <td>{{$booking_data->drop_location}}</td>
                            </tr>
                            <tr>
                                <th>Distance</th>
                                <td>{{distanceInKm($booking_data->total_distance)}} KM</td>
                                <th>Duration</th>
                                <td>{{$booking_data->total_time}}</td>
                            </tr>
                            <tr>
                                <th>Service Type</th>
                                <td>{{$booking_data->service_type}}</td>
                                @if ($booking_data->service_type == 2)
                                <th>No. of Hours</th>
                                <td>{{$booking_data->duration_in_hours}}</td>
                                @endif
                            </tr>

                            <td colspan="4" class="bg-success text-white">
                                <span class="fs-5">PAYMENT DETAIL</span>
                            </td>
                            <tr>
                                <th>Grand Total</th>
                                <th>{{$booking_data->grand_total}} CAD</th>
                                <th colspan="2">
                                    @if ($booking_data->payment_status == 1)
                                    <span class="fs-6 badge text-bg-success">Paid</span>
                                    @else
                                    <span class="fs-6 badge text-bg-danger">Unpaid</span>
                                    @endif
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
