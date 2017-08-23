<?php $this->load->view('frontend/includes/header'); ?>
<?php $this->load->view('frontend/includes/navigation'); ?>
<main>
    <div class="inner-pages">
        <div class="inner-banner inner-about">
            <div class="container">
                <article>
                    <h1>Login Or Register</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= site_url() ?>">Home</a></li>
                        <li class="active">Login</li>
                    </ol>
                </article>
            </div>
        </div>
        <section class="inner-content">
            <div class="container">
                <div class="account-wrap">
                    <?php flash(); ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="create-account">
                                <h3 class="title">Open an Account With <?=SITE_NAME?>.</h3>
                                <a href="<?= site_url('accounts/passenger/register') ?>" class="btn btn-custom"  title="Create an Account">Create an Account</a>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="inr-form login-form">
<!--                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="<?= $loginUrl ?>" ><img src="<?= base_url('assets/images/login-facebook.png') ?>"/></a>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="<?= $authUrl ?>" ><img src="<?= base_url('assets/images/login-google.png') ?>"/></a>
                                    </div>
                                </div>-->
                                <h2 class="title">Login</h2>
                                <form action="" method="post" id="login-form">
                                    <!--<input type="hidden" name="booking" value="1">-->
                                    <div class="form-group">
                                        <input type="text" name="email" required="" placeholder="Email Address / Phone No." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" required="" placeholder="Password" class="form-control">
                                    </div>
                                    <h3><a href="<?= site_url('rest-password?type=passenger') ?>">Forgot Password? Click Here</a></h3>
                                    <button class="btn btn-custom" type="submit" title="Send Your Message">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#login-form').validate();
    });
</script>

<?php $this->load->view('frontend/includes/footer'); ?>