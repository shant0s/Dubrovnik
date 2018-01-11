<section class="banner-inner" style="background: url(<?= base_url('assets/images/contact.jpg'); ?>);">    <div class="container">        <h1 class="text">Contact <span>Details</span>        </h1>    </div></section><?= flash(); ?><section class="contact-form contact-form-style">    <div class="container-fluid">        <div class="row">            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">                <div class="text-center form-wrap banner-cont">                    <h4 class="text-center">Booking / Enquiry</h4>                    <h5 class="text-center">Send us a message with your request</h5>                    <form action="<?= site_url('mail/contact_email'); ?>" method="post" class="form"                          id="booking_enquiry" required>                        <div class="form-group">                            <div class="row">                                <div class="col-sm-6 pad-5-right">                                    <input type="text" class="form-control" name="fname" placeholder="First Name"                                           required>                                    <?= form_error('fname', '<div class="is-error">', '</div>'); ?>                                </div>                                <div class="col-sm-6 pad-5-left">                                    <input type="text" class="form-control" name="lname" placeholder="Last Name"                                           value="<?php echo set_value('lname'); ?>" required>                                    <?= form_error('lname', '<div class="is-error">', '</div>'); ?>                                </div>                            </div>                        </div>                        <div class="form-group">                            <input type="email" class="form-control" name="email" placeholder="Email Address"                                   value="<?php echo set_value('email'); ?>" required>                            <?= form_error('email', '<div class="is-error">', '</div>'); ?>                        </div>                        <div class="form-group">                            <textarea class="form-control" name="message" placeholder="Message" rows="4"                                      required><?php echo set_value('message'); ?></textarea>                            <?= form_error('message', '<div class="is-error">', '</div>'); ?>                        </div>                        <div class="text-right">                            <button type="submit" class="btn-custom1">Send Message</button>                        </div>                    </form>                </div>            </div>        </div>    </div></section><section class="contact section">    <div class="container">        <div class="contacts-detail">            <div class="col-md-4 col-xs-6">                <div class="contact-item">                    <h4>Contact Information</h4>                    <article>                        <strong>Ad:</strong> Dubrovnik,Crotia                    </article>                    <article>                        <strong>Ph:</strong><a href="tel:+385 0 959 060 606">+385 0 959 060 606</a><br>                    </article>                    <article>                        <strong>Mail:</strong> <a href="mailto:info@dubrovnik-transfers.com">info@dubrovnik-transfers.com</a><br>                        <a href="mailto:Info@dubrovniktransfers.com">Info@dubrovniktransfers.com</a>                    </article>                </div>            </div>            <div class="col-md-4 col-xs-6">                <div class="contact-item">                    <h4>Social Connection</h4>                    <ul class="social-contact">                        <?php $contact_social_links = get_page_by_slug('contact-social-media-links') ?>                        <?= $contact_social_links->desc; ?>                    </ul>                </div>            </div>            <div class="col-md-4 col-xs-12">                <div class="contact-item">                    <div class="map">                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46955.731751834624!2d18.05902768684344!3d42.64581500141397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b8ba20835e87d%3A0x400ad50862bd500!2sDubrovnik%2C+Croatia!5e0!3m2!1sen!2snp!4v1514446755458"                                allowfullscreen></iframe>                    </div>                </div>            </div>        </div>    </div></section>