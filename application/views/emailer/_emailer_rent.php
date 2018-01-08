<?php $this->load->view('emailer/include/header'); ?>
<table class="bg-main">
    <tr>
        <td>
            <table class="container">            
                <tr>
                    <td class="section">

                        <table class="table-details">
                            <tbody>

                                <tr>
                                    <th colspan="2" class="table-details-title">Personal Details</th>
                                </tr>
                                <tr>
                                    <th>Firstname</th>
                                    <td><?= $data['fname']; ?></td>
                                </tr>
                                <tr>
                                    <th>Lastname</th>
                                    <td><?= $data['fname']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $data['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <td><?= $data['phone']; ?></td>
                                </tr>


                            <tr>
                                <th colspan="2" class="table-details-title">Journey Details</th>
                            </tr>
                            <tr>
                                <th>Pick Up Address</th>
                                <td><?= $data['pickupAddress']; ?></td>
                            </tr>
                            <tr>
                                <th>Drop Off Address</th>
                                <td><?= $data['dropoffAddress']; ?></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><?= $data['date']; ?></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td><?= $data['pickupTime']; ?></td>
                            </tr>
                                <tr>
                                <th>Vechicle Type</th>
                                <td><?= $data['vehicleType']; ?></td>
                            </tr>
                                <tr>
                                    <th colspan="2" class="table-details-title">Payment Details</th>
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <td><?= $data['paymentType']; ?></td>
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