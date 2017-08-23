<section class="vechicle-selection main-quote">
    <?php $this->load->view('frontend/includes/navigation'); ?>
    <div class="quote"></div>
    <div class="container-fluid">
        <h1 class="heading">Select Your Desiered Vechile</h1>
        <div class="quote-form-banner">
            <div class="container">
                <div class="booking-form">
                    <fieldset>        
                        <legend>vehicle Selection</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="journey-info">
                                    <h4>JOURNEY Information</h4>
                                    <span class="google-map">
                                        <div class="map-container">
                                            <div id="map" style="width:100%; height: 200px"></div>                                            
                                        </div>
                                    </span>
                                    <ul class="list-unstyled">
                                        <li> <p>Pick Up Address</p> <i class="fa fa-map-marker" style="color: green;"></i><?= $quote['start'] ?></li>
                                        <?php if ($quote['via']): ?>
                                            <li><p>Via Point</p> <i class="fa fa-map-marker" ></i> <?= $quote['via'] ?></li>
                                        <?php endif; ?>
                                        <li><p>Drop Off Address</p> <i class="fa fa-map-marker" style="color: red;"></i><?= $quote['end'] ?></li>
                                        <li><p>Estimated Distance</p><i class="fa fa-road"></i> <?= $google_data['distance'] ?><?= DISTANCE ?></li>
                                        <li><p>Estimated Duration</p><i class="fa fa-clock-o"></i> <?= $google_data['duration'] ?></li>
                                        <li><i class="fa fa-arrow-left"></i><a href="<?= site_url() ?>">Change Information</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="car-details">
                                    <?php foreach ($fleets as $index => $fleet): ?>
                                        <div class="row">
                                            <div class="col-md-4">    
                                                <figure>
                                                    <img src="<?= base_url('uploads/fleet/' . $fleet->img_name) ?>" class="img-responsive" alt="Business Class">
                                                </figure>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td><p text-center"><i class="fa fa-car"></i></p></td>
                                                                <th colspan="2"><h3><?= $fleet->title ?></h3></th>
                                                            </tr>
                                                            <tr>
                                                                <td><p><i class="fa fa-user"></i></p></td>
                                                                <th><p>Passenger Capacity</p></th>
                                                                <td><p><?= $fleet->passengers; ?> Passengers</p></td>
                                                            </tr>                                
                                                            <tr>
                                                                <td><p><i class="fa fa-suitcase"></i></p></td>
                                                                <th><p>Luggage Capacity</p></th>
                                                                <td><p>Max <?= $fleet->luggage; ?> Bags</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
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
                                                        <label class="price"><span><?= CURRENCY ?><?= $session_one_way_total_fare[$fleet->id] ?></span></label>
                                                    </div>
                                                    <div class="desc two_way" style="display: none;">
                                                        <label class="price"><span><?= CURRENCY ?><?= $session_two_way_total_fare[$fleet->id] ?></span></label>
                                                    </div>

                                                    <input type="hidden" name="vehicle_id" value="<?= $fleet->id; ?>">
                                                    <input type="hidden" name="vehicle_name" value="<?= $fleet->title; ?>">  
                                                    <input type="hidden" name="vehicle_img_name" value="<?= $fleet->img_name; ?>">  
                                                    <button type="submit" class="btn blue-btn">Book Now</button>
                                                </form>  
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>                            
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    $(document).ready(function () {
        $("input[name$='journey_type']").click(function () {
            var journey_type = $(this).val();

            $(this).parents("form").find(".desc").hide();
            $(this).parents("form").find("." + journey_type).show();
        });
    });
</script>
<?php $this->load->view('frontend/includes/map-js')?>