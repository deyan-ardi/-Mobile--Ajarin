<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-center mt-4">
            <div class="col-12 col-md-8 col-lg-12">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="input-group" onkeyup="searchKelas()">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" name="cari" id="search"
                                placeholder="Masukkan Kode Kelas Baru . . . " required="required">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row  mt-4" id="result">
            <?php foreach ($kelas as $data) : ?>
            <div class="col-12 col-md-8 col-lg-6">
                <!-- Contact Box -->
                <div class="contact-box bg-white text-left rounded p-3 mt-lg-5 mt-3 shadow-lg">
                    <!-- Contact Form -->
                    <a href="<?= base_url() ?>home/kelas/<?= $data['id_kelas'] ?>">
                        <h5 class="text-primary">[<?= $data['kode_kelas'] ?>] - <?= $data['nama_kelas'] ?></h5>
                    </a>
                    <p class="mt-2"><?= $data['deskripsi'] ?></p>

                    <p class="mt-4 pt-2">[PENGAJAR] - <?= ucwords($data['created_by']) ?></p>

                    <?php if ($this->ion_auth->logged_in()) : ?>
                    <a href="<?= base_url() ?>home/kelas/<?= $data['id_kelas'] ?>"><button
                            class="btn btn-primary mt-3 col-12" type="button">Mulai Belajar</button></a>

                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="shape-bottom">
        <svg viewBox="0 0 1920 310" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" class="svg replaced-svg">
            <title>sApp Shape</title>
            <desc>Created with Sketch</desc>
            <defs></defs>
            <g id="sApp-Landing-Page" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="sApp-v1.0" transform="translate(0.000000, -554.000000)" fill="#FFFFFF">
                    <path
                        d="M-3,551 C186.257589,757.321118 319.044414,856.322454 395.360475,848.004007 C509.834566,835.526337 561.525143,796.329212 637.731734,765.961549 C713.938325,735.593886 816.980646,681.910577 1035.72208,733.065469 C1254.46351,784.220361 1511.54925,678.92359 1539.40808,662.398665 C1567.2669,645.87374 1660.9143,591.478574 1773.19378,597.641868 C1848.04677,601.75073 1901.75645,588.357675 1934.32284,557.462704 L1934.32284,863.183395 L-3,863.183395"
                        id="sApp-v1.0"></path>
                </g>
            </g>
        </svg>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->