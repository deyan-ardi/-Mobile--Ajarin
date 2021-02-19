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
        <div class="row align-items-center mt-4" id="result">
            <?php foreach ($kelas as $data) : ?>
            <div class="col-12 col-md-8 col-lg-6">
                <!-- Contact Box -->
                <div class="contact-box bg-white text-left rounded p-3 mt-lg-5 mt-3 shadow-lg">
                    <!-- Contact Form -->
                    <div class="text-right">
                        <a href="#" data-toggle="modal" data-target="#kelas<?= $data['id_kelas'] ?>">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                    </div>
                    <a href="<?= base_url() ?>home/kelas/<?= $data['id_kelas'] ?>">
                        <h5 class="text-primary">[<?= $data['kode_kelas'] ?>] - <?= $data['nama_kelas'] ?></h5>
                    </a>
                    <p class="mt-2"><?= $data['deskripsi'] ?></p>

                    <p class="mt-4 pt-2">[PENGAJAR] - <?= ucwords($data['created_by']) ?></p>

                    <?php if($this->ion_auth->in_group(2)): ?>
                    <a href=""><button class="btn btn-primary mt-3 col-12" type="button">Bergabung Belajar</button></a>
                    <?php endif; ?>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="kelas<?= $data['id_kelas'] ?>" tabindex="-2"
                    aria-labelledby="kelasLabel<?= $data['id_kelas'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title" id="kelasLabel<?= $data['id_kelas'] ?>">Menu Item</div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><a href="<?= base_url() ?>home/ubah_kelas/<?= $data['id_kelas'] ?>"> <i
                                                class="fas fa-edit"></i> Ubah Kelas</a></li>
                                    <li class="mt-4 border-top pt-2"><a href="#" data-dismiss="modal"
                                            data-toggle="modal" data-target="#hapusKelas<?= $data['id_kelas'] ?>"><i
                                                class="fas fa-trash"></i>
                                            Hapus
                                            Kelas</a></li>
                                    <li class="mt-4 mb-4 border-top pt-2"><a href=""><i class="fa fa-eye"></i>
                                            Daftar Anggota
                                        </a>
                                    </li>
                                    <li class="mt-4 mb-4 border-top pt-2"><a href=""><i class="fa fa-sign-out-alt"></i>
                                            Keluar
                                            Kelas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="hapusKelas<?= $data['id_kelas'] ?>" tabindex="-2"
                    aria-labelledby="hapusKelasLabel<?= $data['id_kelas'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title" id="hapusKelasLabel<?= $data['id_kelas'] ?>">Konfirmasi Hapus
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Ingin Menghapus Kelas?</p>
                                <p>Seluruh Data Dalam Kelas Akan Hilang</p>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url() ?>home/hapus_kelas/<?= $data['id_kelas'] ?>"><button
                                        type="button" class="btn btn-primary">Hapus</button></a>
                            </div>
                        </div>
                    </div>
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