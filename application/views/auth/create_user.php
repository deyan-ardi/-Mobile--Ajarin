<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay d-flex ">
    <div class="container">
        <div class="row mt-lg-5 mb-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <!-- Contact Box -->
                <div class="contact-box bg-white text-center rounded p-4 p-sm-5 mt-lg-0 shadow-lg">
                    <!-- Contact Form -->

                    <?php echo form_open('auth/create_user'); ?>
                    <div class="contact-top">
                        <img class="navbar-brand-regular" src="<?= base_url() ?>/assets/img/ajarin.png" width="150px"
                            alt="brand-logo">
                        <h4 class="contact-title mb-4 mt-2">Yuk Memulai Metode Belajar Yang Berbeda</h4>
                    </div>
                    <div id="infoMessage"><?php echo $message; ?></div>
                    <?php
                    if ($identity_column !== 'email') {
                        echo '<p>';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <?php echo form_input($first_name); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                    </div>
                                    <?php echo form_input($email); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <select name="company" id="company" class="form-control" required>
                                        <option value="">Login Sebagai</option>
                                        <option value="2">Siswa</option>
                                        <option value="3">Guru</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <?php echo form_input($password); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <?php echo form_input($password_confirm); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-bordered w-100 mt-3 mt-sm-4" type="submit">Mendaftar</button>
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