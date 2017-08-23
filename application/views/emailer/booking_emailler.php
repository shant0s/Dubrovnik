<?php $this->load->view('emailer/include/header'); ?>
<table class="bg-main">    
    <tr>
        <td>
            <table class="container">
                <tr>
                    <td>
                        <?php if ($emailer_to = 'admin'): ?>
                            Dear Admin, You receive booking request.
                        <?php elseif ($emailer_to = 'client'): ?>
                            Dear Client, Your booking details are as follows.
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="section">
                        <table class="table-details">

                            <tbody>
                                <tr>
                                    <th colspan="2" class="table-details-title">Personal Details</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?= $data['client_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $data['client_email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Phone No.</th>
                                    <td><?= $data['client_phone'] ?></td>
                                </tr>
                                <tr>
                                    <th>No. of Passengers</th>
                                    <td><?= $data['client_passanger_no'] ?></td>
                                </tr>
                                <tr>
                                    <th>No. of Baby Seats</th>
                                    <td><?= $data['client_baby_no'] ?></td>
                                </tr>                               
                                <tr>
                                    <th>Luggages</th>
                                    <td><?= $data['client_luggage'] ?></td>
                                </tr>
                                <tr>
                                    <th>Suitcase</th>
                                    <td><?= $data['client_hand_luggage'] ?></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th colspan="2" class="table-details-title">Journey Details</th>
                                </tr>
                                <tr>
                                    <th>Pickup Point</th>
                                    <td><?= $data['pickup_address'] ?></td>
                                </tr>               
                                <tr>
                                    <th>Drop Off Point</th>
                                    <td><?= $data['dropoff_address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Pick Up Date/Time</th>
                                    <td><?= $data['pickup_date'] ?> <?= $data['pickup_time'] ?></td>
                                </tr>
                                <tr>
                                    <th>Waiting Time</th>
                                    <td><?= $data['waiting_time'] ?>mins</td>
                                </tr>
                                <tr>
                                    <th>Vehicle</th>
                                    <td><?= $data['vehicle_name'] ?></td>
                                </tr>                             
                                <tr>
                                    <th>Distance</th>
                                    <td><?= $data['distance'] ?> <?= DISTANCE ?></td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td><?= $data['duration'] ?></td>
                                </tr>
                                <tr>
                                    <th>Journey Type</th>
                                    <td><?= ucwords(str_replace('_', ' ', $data['journey_type'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Total Journey Fare</th>
                                    <td><?= CURRENCY ?><?= $data['total_fare'] ?></td>
                                </tr>
                            </tbody>
                            <tbody <?= ($data['journey_type'] == 'one_way') ? 'style="display : none;"' : '' ?>>
                                <tr>
                                    <th colspan="2" class="table-details-title">Return Details</th>
                                </tr>                                                                                                     
                                <tr>
                                    <th>Return Date</th>
                                    <td><?= $data['client_return_date'] ?></td>
                                </tr>                        
                                <tr>
                                    <th>Return Time</th>
                                    <td><?= $data['client_return_time'] ?></td>
                                </tr>                        
                            </tbody>
                            <tbody <?= isAirport($data['pickup_address']) ? '' : 'style="display : none;"' ?>>
                                <tr>
                                    <th colspan="2" class="table-details-title">Flight Arrival Details</th>
                                </tr>                                                                                                     
                                <tr>
                                    <th>Arrival From</th>
                                    <td><?= $data['flight_arrive_from'] ?></td>
                                </tr>                        
                                <tr>
                                    <th>Flight No.</th>
                                    <td><?= $data['flight_number'] ?></td>
                                </tr>                        
                            </tbody>                           
                            <tbody>
                                <tr>
                                    <th colspan="2" class="table-details-title">Special Instruction</th>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td><?= $data['message'] ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td><?= $data['pay_method'] ?></td>
                                </tr>                                                   
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php $this->load->view('emailer/include/footer'); ?>
