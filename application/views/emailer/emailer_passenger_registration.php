<?php $this->load->view('emailer/include/header'); ?>
<table class="bg-main">
    <tr>
        <td>
            <table class="container">    
                <tr>
                    <td>                    
                        <strong>Dear <?= $data['full_name'] ?>,</strong><br>
                        <p>You're now registered with <?= SITE_NAME ?>. Please use your credentials for login</p>                                               
                    </td>
                </tr>
                <tr>
                    <td class="section">

                        <table class="table-details">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="table-details-title">Account Information</th>
                                </tr>                             
                                <tr>
                                    <th>Email</th>
                                    <td><?= $data['email'] ?></td>
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