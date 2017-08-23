<?php $count = 0; ?>
<main>
    <section class="dshbd-wpr">
        <div class="dshbd-title fp-title">
            <div class="container-fluid">
                <h1> Dashboard <span>Customer</span></h1>
            </div>
        </div>
        <div class="dshbd-content">
            <div class="container">
                <div class="dshbd-table">                   
                    <?php flash(); ?>                     
                    <div class="dshbd-title-btn">
                        <h2 class="title">Booking History</h2>
                        <a href="<?= site_url() ?>" class="btn btn-custom"> Make New Booking</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dt-bookings">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booked Date/Time</th>
                                    <th>Booking ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Vehicle</th>
                                    <th>Pickup Date/Time</th>
                                    <th>Final Fare</th>                                    
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($bookings): ?>
                                    <?php foreach ($bookings as $b): $count++; ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= date('m/d/Y G:i:s', strtotime($b->created_at)) ?></td>
                                            <td><?= $b->booking_ref_id ?></td>
                                            <td><?= $b->pickup_address ?></td>
                                            <td><?= $b->dropoff_address ?></td>
                                            <td><?= $b->vehicle_name ?></td>
                                            <td><?= $b->pickup_date . ' ' . $b->pickup_time ?></td>
                                            <td><?= CURRENCY . $b->total_fare ?></td>                                            
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">                                                                                                            
                                                        <li><a href="<?= base_url('accounts/passenger/booking_details/' . $b->booking_ref_id) ?>"><i class="fa fa-list-alt green"> </i> View Details</a></li>                                                     
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php endforeach; ?>                                 
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>




<script>
    $(document).ready(function () {
        $('#dt-bookings').dataTable();
    });

</script>