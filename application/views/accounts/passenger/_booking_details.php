<main>
    <section class="dshbd-wpr">
        <div class="dshbd-title fp-title">
            <div class="container-fluid">
                <h1> Dashboard <span>Customer</span></h1>
            </div>
        </div>
        <div class="dshbd-content dshbd-booking-detail">
            <div class="container">
                <div class="dshbd-table">
                    <h2 class="title">Booking Detail</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Journey Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Journey Type</th>
                                            <td><?= ucwords(str_replace('_', ' ', $booking->journey_type)) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pickup Address</th>
                                            <td><?= $booking->pickup_address ?></td>
                                        </tr>
                                        <?php if ($booking->via_point): ?>
                                            <tr>
                                                <th>Via Point</th>
                                                <td><?= $booking->via_point ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <th>Dropoff Address</th>
                                            <td><?= $booking->dropoff_address ?></td>
                                        </tr>
                                        <tr>
                                            <th>Distance</th>
                                            <td><?= $booking->distance . ' ' . DISTANCE ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pickup Date/Time</th>
                                            <td><?= $booking->pickup_date . ' ' . $booking->pickup_time ?></td>
                                        </tr>
                                        <tr>
                                            <th>Vehicle Name</th>
                                            <td><?= $booking->vehicle_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Passengers/Luggage</th>
                                            <td><?= $booking->client_passanger_no ?> / <?= $booking->client_luggage ?></td>
                                        </tr>                                                                   
                                        <tr>
                                            <th>Baby Seats</th>
                                            <td><?= $booking->client_baby_no ?></td>
                                        </tr>
                                        <?php if ($booking->journey_type == 'two_way'): ?>
                                            <tr>
                                                <th>Return Date/Time</th>
                                                <td><?= $booking->client_return_date . " / " . $booking->client_return_time ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dshbd-table table-responsive">
                                <?php if ($booking->flight_number): ?>
                                    <table class="table table-bordered table-fee-charge">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Flight Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Number</th>
                                                <td><?= $booking->flight_number ?></td>
                                            </tr>
                                            <tr>
                                                <th>Arrival From</th>
                                                <td><?= $booking->flight_arrive_from ?></td>
                                            </tr>                                      
                                            <tr>
                                                <th>Total Fare</th>
                                                <td><?= CURRENCY . $booking->total_fare ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                <table class="table table-bordered table-fee-charge">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Payment Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Booking ID</th>
                                            <td><?= $booking->booking_ref_id ?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment Type</th>
                                            <td><?= ucfirst($booking->pay_method) ?></td>
                                        </tr>                                      
                                        <tr>
                                            <th>Total Fare</th>
                                            <td><?= CURRENCY . $booking->total_fare ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>