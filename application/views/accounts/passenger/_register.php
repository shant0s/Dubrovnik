<?php $this->load->view('frontend/includes/header'); ?>
<?php $this->load->view('frontend/includes/navigation'); ?>
<main>
    <div class="inner-pages">
        <div class="inner-banner inner-about">
            <div class="container">
                <article>
                    <h1>Account Registration</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= site_url() ?>">Home</a></li>
                        <li class="active">Register</li>
                    </ol>
                </article>
            </div>
        </div>
        <section class="inner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Create an Account</h2>
                        <div class="inr-form registration-form">
                            <?php flash(); ?>
                            <h3>Personal Information</h3>
                            <form role="form" method="post" action="<?= site_url('accounts/passenger/register'); ?>" enctype="multipart/form-data" id="form-register">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Full Name" class="form-control" name="full_name" required="">
                                        </div>
                                    </div>                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Your Phone" class="form-control" name="phone_no" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="Enter Email" class="form-control" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" placeholder="Enter Password" class="form-control" name="password" required="">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Address" class="form-control" name="address" required="">
                                        </div>
                                    </div>                                   
                                    <div class="col-md-6">
                                        <label>Your Image</label>
                                        <div class="form-group">
                                            <input type="file" name="image">
                                        </div>
                                    </div>                                   
                                </div>
                                <button class="btn btn-custom" type="submit" title="Account Registration">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script>
    $(document).ready(function () {
        $('#form-register').validate();
    });
</script>
<?php $this->load->view('frontend/includes/footer'); ?>