<main class="templates quote-system">
    <section class="step-head">
        <div class="container">
            <div class="booking-step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon">
                        <div class="step-title">Enter Details</div>
                        <span>1</span>
                    </div>
                    <div class="step-icon active">
                        <div class="step-title">Vehicle Selection</div>
                        <span>2</span>
                    </div>
                    <div class="step-icon">
                        <div class="step-title">Transfer Details</div>
                        <span>3</span>
                    </div>
                    <div class="step-icon">
                        <div class="step-title">Confirmation</div>
                        <span>4</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section quote-system-wrap bg-light-gray">
        <div class="container">
            <div class="quote-sys-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sidebar-quote">
                            <h3 class="title">Trip Details <span><a href="<?= site_url('get-quote') ?>"><i class="fa fa-edit"></i> Edit</a></span></h3>
                            <p class="clearfix"><i class="fa fa-map-marker"></i><strong>From:</strong> <span> <?= $quote['start'] ?></span></p>
                            <p class="clearfix"><i class="fa fa-map-marker"></i><strong>To:</strong> <span> <?= $quote['end'] ?></span></p>
                            <p class="clearfix"><i class="fa fa-road"></i><strong>Distance:</strong> <span> <?= $google_data['distance'] . DISTANCE ?> (<?= $google_data['duration'] ?>)</span></p>
                            <p><i class="fa fa-calendar"></i><strong>Date:</strong> <span><?= $quote['pickupdate'] ?></span></p>
                            <p><i class="fa fa-clock-o"></i> <strong>Time:</strong> <span><?= $quote['pickuptime'] ?></span></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="quote-inr-wrap">
                            <?php foreach ($fleets as $index => $fleet): ?>
                                <?php if($vehicle_fare[$index]['rate']):?>
                                <div class="quote-fleet">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <figure class="fleet-img">
                                                <img src="<?= base_url('uploads/fleet/' . $fleet->img_name) ?>" alt="<?= $fleet->title ?>">
                                            </figure>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="fleet-desc">
                                                        <h3><?= $fleet->title ?></h3>
                                                        <ul class="list-inline details">
                                                            <li><i class="fa fa-user"></i> <?= $fleet->passengers; ?> Passengers</li>
                                                            <li><i class="fa fa-suitcase"></i> <?= $fleet->luggage; ?> Suitcases</li>
                                                            <li><i class="fa fa-briefcase"></i> <?= $fleet->suitcases; ?> Briefcases</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <h6><i class="fa fa-check-circle"></i>  Guaranteed fixed price</h6>
                                                    <form class="form-inline" action="<?= site_url('quote/booking') ?>" method="post">
                                                        <div class="form-group">
                                                            <label class="radio">
                                                                <input type="radio" name="journey_type" value="one_way" checked="" required=""> One Way
                                                            </label>
                                                            <label class="radio">
                                                                <input type="radio" name="journey_type" value="two_way" required=""> Two Way
                                                            </label>
                                                        </div>

                                                        <div class="desc one_way">
                                                            <h2 class="rate"><?= CURRENCY ?><?= $vehicle_fare[$index]['rate'] ?></h2>
                                                        </div>
                                                        <div class="desc two_way" style="display: none;">
                                                            <h2 class="rate"><?= CURRENCY ?><?= $vehicle_fare[$index]['round_trip_rate'] ?></h2>
                                                        </div>

                                                        <input type="hidden" name="vehicle_id" value="<?= $fleet->id; ?>">
                                                        <input type="hidden" name="vehicle_name" value="<?= $fleet->title; ?>">
                                                        <input type="hidden" name="vehicle_img_name" value="<?= $fleet->img_name; ?>">
                                                        <button type="submit" class="btn btn-gold">Book Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function () {
        $("input[name$='journey_type']").click(function () {
            var journey_type = $(this).val();

            $(this).parents("form").find(".desc").hide();
            $(this).parents("form").find("." + journey_type).show();
        });
    });
</script>