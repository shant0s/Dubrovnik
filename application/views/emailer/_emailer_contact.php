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
                                    <th colspan="2" class="table-details-title">Contact Information</th>
                                </tr>
                                <tr>
                                    <th>Firstname</th>
                                    <td><?= $data['fname'] ?></td>
                                </tr><tr>
                                    <th>Lastname</th>
                                    <td><?= $data['fname'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $data['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td><?= $data['message'] ?></td>
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