<?php $this->load->view('frontend/includes/navigation'); ?>

<div class="banner">
    <article>
        <h1>Rest Password</h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Rest Password</li>
        </ol>
    </article>
</div>

<div class="login-templates section-break">
    <div class="login-info">
        <?php flash(); ?>
        <form action="" method="post">
            <h4>Rest Password</h4>
            <input type="email" class="form-control personal-hide" name="email" placeholder="Enter Email-Address" required="">
            <button type="submit" class="btn btn-custom" title="Continue">Reset Password</button>     
        </form>
    </div>
</div>