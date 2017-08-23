<?php $this->load->view('emailer/include/header');?>
<table class="bg-main">
    <tr>
        <td>
            <table class="container">            
                <tr>
                    <td class="section">
                        
                        <table class="table-details">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="table-details-title">Admin User Information</th>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $data->username?></td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td><?= $data->password?></td>
                                </tr>
                               
                            </tbody>
                        </table>
                       
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php $this->load->view('emailer/include/footer');?>