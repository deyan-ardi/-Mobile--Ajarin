<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay d-flex">
    <div class="container mt-5">
        <div class="row justify-content-center mb-4">
            <?php $this->load->view('page/header-kelas') ?>
        </div>
        <?php foreach ($bab as $dataBab) : ?>
        <div id="section-materi" class="pb-3">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-12">
                    <!-- Contact Box -->
                    <div class="contact-box bg-white text-left rounded p-3 mt-2 shadow-lg">
                        <!-- Contact Form -->
                        <?php if (!$this->ion_auth->in_group(2) && $_SESSION['user_id'] == $kelas[0]['id_user']) : ?>
                        <div class="text-right">
                            <a href="#" data-toggle="modal" data-target="#bab<?= $dataBab['id_bab'] ?>">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                        </div>
                        <?php endif ?>
                        <a href="<?= base_url() ?>home/kelas/<?= $kelas[0]['id_kelas'] ?>">
                            <h5 class="text-primary"><?= $dataBab['nama_bab'] ?></h5>
                        </a>
                        <p class="mt-2"><?= $dataBab['deskripsi_bab'] ?></p>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="bab<?= $dataBab['id_bab'] ?>" tabindex="-2"
                        aria-labelledby="babLabel<?= $dataBab['id_bab'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title" id="babLabel<?= $dataBab['id_bab'] ?>">Menu Item</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li><a
                                                href="<?= base_url() ?>home/tambah_materi/<?= $dataBab['id_bab'] ?>/<?= $kelas[0]['id_kelas'] ?>"><i
                                                    class="fas fa-plus-circle"></i> Tambah Materi</a></li>
                                        <li class="mt-4 border-top pt-2"><a
                                                href="<?= base_url() ?>home/ubah_bab/<?= $dataBab['id_bab'] ?>/<?= $kelas[0]['id_kelas'] ?>"><i
                                                    class=" fas fa-edit"></i> Ubah Bab Pembelajaran</a></li>
                                        <li class="mt-4 border-top pt-2"><a href="#" data-dismiss="modal"
                                                data-toggle="modal" data-target="#hapusBab<?= $dataBab['id_bab'] ?>"><i
                                                    class="fas fa-trash"></i> Hapus
                                                Bab Pembelajaran</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="hapusBab<?= $dataBab['id_bab'] ?>" tabindex="-2"
                        aria-labelledby="hapusBabLabel<?= $dataBab['id_bab'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title" id="hapusBabLabel<?= $dataBab['id_bab'] ?>">Konfirmasi
                                        Hapus
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda Yakin Ingin Menghapus Bab Pembelajaran?</p>
                                    <p>Seluruh Data Dalam Bab Pembelajaran Akan Hilang</p>
                                </div>
                                <div class="modal-footer">
                                    <a
                                        href="<?= base_url() ?>home/hapus_bab/<?= $dataBab['id_bab'] ?>/<?= $kelas[0]['id_kelas']?>"><button
                                            type="button" class="btn btn-primary">Hapus</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if ($gabung > 0) :
                    foreach ($materi as $data_materi) : ?>
            <?php if ($data_materi['id_bab'] == $dataBab['id_bab']) : ?>
            <?php if ($data_materi['kategori_materi'] == 0) : ?>
            <div class="row ml-5 mb-3">
                <div class="col-12 col-md-8 col-lg-12">
                    <!-- Contact Box -->
                    <div class="contact-box bg-white text-left rounded p-3 mt-4 shadow-lg">
                        <!-- Contact Form -->
                        <?php if (!$this->ion_auth->in_group(2) && $_SESSION['user_id'] == $kelas[0]['id_user']) : ?>
                        <div class="text-right">
                            <a href="#" data-toggle="modal" data-target="#materi<?= $data_materi['id_materi'] ?>">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                        </div>
                        <?php endif ?>
                        <?php if ($gabung > 0) : ?>
                        <a href="<?= $data_materi['link_materi'] ?>">
                            <h5 class="text-primary">[Video] - <?= $data_materi['nama_materi'] ?></h5>
                        </a>
                        <?php else : ?>
                        <a href="#">
                            <h5 class="text-primary">[Video] - <?= $data_materi['nama_materi'] ?></h5>
                        </a>
                        <?php endif; ?>
                        <p class="mt-4"><?= $data_materi['deskripsi_materi'] ?> </p>
                        <div class="col-12 " style="--aspect-ratio: 16/9;">>
                            <iframe width="100%" src="<?= $data_materi['link_materi'] ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div class="row ml-5 mb-3">
                <div class="col-12 col-md-8 col-lg-12">
                    <!-- Contact Box -->
                    <div class="contact-box bg-white text-left rounded p-3 mt-4 shadow-lg">
                        <!-- Contact Form -->
                        <?php if (!$this->ion_auth->in_group(2) && $_SESSION['user_id'] == $kelas[0]['id_user']) : ?>
                        <div class="text-right">
                            <a href="#" data-toggle="modal" data-target="#materi<?= $data_materi['id_materi'] ?>">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                        </div>
                        <?php endif ?>
                        <?php if ($gabung > 0) : ?>
                        <a href="<?= $data_materi['link_materi'] ?>">
                            <h5 class="text-primary">[Kuis] - <?= $data_materi['nama_materi'] ?></h5>
                        </a>
                        <?php else : ?>
                        <a href="#">
                            <h5 class="text-primary">[Kuis] - <?= $data_materi['nama_materi'] ?></h5>
                        </a>
                        <?php endif; ?>
                        <p class="mt-4"><?= $data_materi['deskripsi_materi'] ?> </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <!-- Modal -->
            <div class="modal fade" id="materi<?= $data_materi['id_materi'] ?>" tabindex="-2"
                aria-labelledby="materiLabel<?= $data_materi['id_materi'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="materiLabel<?= $data_materi['id_materi'] ?>">Menu Item</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li><a
                                        href="<?= base_url() ?>home/ubah_materi/<?= $data_materi['id_materi'] ?>/<?= $dataBab['id_bab'] ?>/<?= $kelas[0]['id_kelas'] ?>"><i
                                            class=" fas fa-edit"></i> Ubah Materi</a></li>
                                <li class="mt-4 border-top pt-2"><a href="#" data-toggle="modal" data-dismiss="modal"
                                        data-target="#hapusMateri<?= $data_materi['id_materi'] ?>"><i
                                            class="fas fa-trash"></i> Hapus Materi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="hapusMateri<?= $data_materi['id_materi'] ?>" tabindex="-2"
                aria-labelledby="hapusMateriLabel<?= $data_materi['id_materi'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" id="hapusMateriLabel<?= $data_materi['id_materi'] ?>">Konfirmasi
                                Hapus
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Ingin Menghapus Materi Pembelajaran Ini?</p>
                            <p>Seluruh Data Dalam Materi Pembelajaran Akan Hilang</p>
                        </div>
                        <div class="modal-footer">
                            <a
                                href="<?= base_url() ?>home/hapus_materi/<?= $data_materi['id_materi'] ?>/<?=$kelas[0]['id_kelas']?>"><button
                                    type="button" class="btn btn-primary">Hapus</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
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