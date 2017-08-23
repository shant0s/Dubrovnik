<section class="airport-transfer">
  <?php $this->load->view('frontend/includes/navigation'); ?>
    <div class="container-fluid">
        <h1><?=$airport_data->name?></h1>

        <div class="container">
            <div class="airport-details">
                <div class="row">   
                 <?=$airport_data->desc?>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mercedes S-Class</th>
                                        <th>Mercedes E-Class</th>
                                        <th>Mercedes V-Class</th>
                                        <th>Economy Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>£ 87</td>
                                        <td>£ 52</td>
                                        <td>£ 85</td>
                                        <td>£ 35</td>
                                    </tr>
                                    <tr>
                                        <td>£ 135</td>
                                        <td>£ 85</td>
                                        <td>£ 130</td>
                                        <td>£ 59</td>
                                    </tr>
                                    <tr>
                                        <td>£ 135</td>
                                        <td>£ 90</td>
                                        <td>£ 130</td>
                                        <td>£ 60</td>
                                    </tr>
                                    <tr>
                                        <td>£ 77</td>
                                        <td>£ 44</td>
                                        <td>£ 74</td>
                                        <td>£ 28</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="airport-features">
            <div class="row">
                <div class="col-md-4">
                    <span>
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <h4>An hour Free waiting</h4>
                    <div class="overlay-content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="non-overlay-content"> <span>
                            <i class="fa fa-paper-plane-o"></i>
                        </span>
                        <h4>Monitor Your Fight</h4>
                    </div>
                    <div class="overlay-content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>
                        <i class="fa fa-handshake-o"></i>
                    </span>
                    <h4>Meet and Greet</h4>
                    <div class="overlay-content">
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
