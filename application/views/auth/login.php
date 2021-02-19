<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <!-- Contact Box -->
                <div class="contact-box bg-white text-center rounded p-4 p-sm-5 mt-5 mt-lg-0 shadow-lg">
                    <!-- Contact Form -->

                    <?php echo form_open('auth/login'); ?>
                    <div class="contact-top">
                        <h3 class="contact-title mb-5">Masuk</h3>
                    </div>
                    <div id="infoMessage"><?php echo $message; ?></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                    </div>
                                    <?php echo form_input($identity); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <?php echo form_input($password); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 row justify-content-center">
                            <div class="col-6">
                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                                <?php echo lang('login_remember_label', 'remember'); ?>
                            </div>
                            <div class="col-6">
                                <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-bordered w-100 mt-3 mt-sm-4" type="submit">Masuk</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Shape Bottom -->
    <div class="shape-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="shape-fill" fill="#FFFFFF"
                d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z">
            </path>
        </svg>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->