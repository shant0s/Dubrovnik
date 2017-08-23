<main>
    <section class="dshbd-wpr">
        <div class="dshbd-title fp-title">
            <div class="container-fluid">
                <h1> Dashboard <span>Customer</span></h1>
            </div>
        </div>
        <div class="dshbd-content">
            <div class="container">
                <div class="dshbd-profile-intro">
                    <div class="row">
                        <?php flash(); ?>
                        <div class="col-md-3">
                            <div class="dshbd-profile-img">
                                <figure>
                                    <?php if ($passenger->image != null): ?>
                                        <img src="<?= base_url('uploads/passenger') . '/' . $passenger->image; ?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('uploads/passenger/default.png'); ?>">
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <div class="dshbd-edit-profle">
                                <a href="#" class="btn btn-custom" data-toggle="modal" data-target=".modal-dshbd-edit-detail" title="Boston Airport Cheap Car">Edit Details</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="dshbd-profile-detail fp-para">
                                <ul class="list-inline list-unstyled">
                                    <li>
                                        <i class="fa fa-user"> </i><label>Full Name</label><p><?= $passenger->full_name ?></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"> </i><label>Phone No.</label><p><?= $passenger->phone_no ?></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"> </i><label>E-mail Address</label><p><?= $passenger->email ?></p>
                                    </li>

                                    <li>
                                        <i class="fa fa-map-marker"> </i><label>Address</label><p><?= $passenger->address ?></p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!--Modal Profile Edit -->
<div class="cstm-modal inr-wpr">
    <div class="modal fade modal-dshbd-edit-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <div class="inr-form">
                        <!--                        <figure>
                                                    <img src="<?= base_url('assets') ?>/images/logo.png" title="Daily Airport Logo" itemprop="image">
                                                </figure>-->
                        <h2>Edit Details</h2>
                        <form method="post" action="<?= site_url('accounts/passenger/profile'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Change Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="<?= $passenger->full_name ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_no" placeholder="Phone" value="<?= $passenger->phone_no ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?= $passenger->email ?>" required="" readonly=""> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder=" Enter Address " name="address" value="<?= $passenger->address ?>" required="">
                                    </div>
                                </div>                             
                            </div>
                            <div class="form-group cstm-chkbx">
                                <label><input type="checkbox" class="dshbd-change-pswd"> Change Password</label>
                            </div>
                            <div class="dshbd-change-pswd-list">
                                <div class="form-group">
                                    <!--<label>Old Password</label>-->
                                    <input type="password" class="form-control" placeholder="Enter Old Password" name="old_password" id="register-old-password" required="">
                                </div>
                                <div class="form-group">
                                    <!--<label>New Password</label>-->
                                    <input type="password" class="form-control" placeholder="Enter New Password" name="password" id="register-password1" required="">
                                </div>
                                <div class="form-group">
                                    <!--<label>Re-type New Password</label>-->
                                    <input type="password" class="form-control" placeholder="Re-type New Password" name="password2" id="register-password2" required="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block hvr-bounce-to-right">Update Detail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".dshbd-change-pswd-list").find("input").attr("disabled", "disabled");

        $(".dshbd-change-pswd").click(function () {
            if ($(".dshbd-change-pswd").is(":checked")) {
                $(".dshbd-change-pswd-list").find("input").removeAttr("disabled");
            } else {
                $(".dshbd-change-pswd-list").find("input").attr("disabled", "disabled");
            }
        });

        $(".dshbd-change-pswd-list").hide();

        $(".dshbd-change-pswd").click(function () {
            if ($(".dshbd-change-pswd").is(":checked")) {
                $(".dshbd-change-pswd-list").slideDown();
            } else {
                $(".dshbd-change-pswd-list").slideUp();
            }
        });

        $('#register-password2').change(function () {
            var sec1 = $('#register-password1').val();
            var sec2 = $('#register-password2').val();


            if (sec1 !== sec2) {
                bootbox.alert("Password Does not Match. Enter it again!");
                $('#register-password2').val('');
                $('#register-password2').focus();
            }

        });
    });
    $('#register-old-password').change(function () {
        var old_password = $(this).val();
        var email = $('#email').val();

        if (old_password === '' || email === '')
            return;

        $.ajax({
            type: "POST",
            url: "<?= site_url('accounts/passenger/ajax_checkPassword') ?>",
            data: {'password': old_password, 'email': email},
            dataType: "json",
            success: function (response) {
                if (response.isMatch === '0') {
                    bootbox.alert("Password does not maches. Please try again!");
                    $('#register-old-password').val('');
                    $('#register-old-password').focus();
                }
            }
        });

    });

</script>