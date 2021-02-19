<div class="col-12 col-md-8 col-lg-12">
    <!-- Contact Box -->
    <div class="contact-box bg-white text-left rounded p-3 mt-lg-5 mt-3 shadow-lg">
        <!-- Contact Form -->

        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#modalKelas">
                <i class="fas fa-ellipsis-v"></i>
            </a>
        </div>
        <a href="<?= base_url() ?>home/kelas/<?= $kelas[0]['id_kelas'] ?>">
            <h5 class="text-primary">[<?= $kelas[0]['kode_kelas'] ?>] - <?= $kelas[0]['nama_kelas'] ?></h5>
        </a>
        <p class="mt-2"><?= $kelas[0]['deskripsi'] ?></p>

        <p class="mt-4 pt-2">[PENGAJAR] - <?= ucwords($kelas[0]['created_by']) ?></p>

        <?php if ($this->ion_auth->logged_in() && $gabung == 0) : ?>
        <a href="<?= base_url() ?>home/gabung_kelas/<?= $kelas[0]['id_kelas'] ?>"><button
                class="btn btn-primary mt-3 col-12" type="button">Bergabung Belajar</button></a>
        <?php endif; ?>

    </div>
</div>
<div class="modal fade" id="modalKelas" tabindex="-2" aria-labelledby="modalKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel">Menu Item</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <?php if (!$this->ion_auth->in_group(2) && $_SESSION['user_id'] == $kelas[0]['id_user']) : ?>
                    <li class="mb-4 border-bottom pb-2"> <a
                            href="<?= base_url() ?>home/tambah_bab/<?= $kelas[0]['id_kelas'] ?>"><i
                                class="fas fa-plus-circle"></i>
                            Tambah
                            Bab Pembelajaran</a></li>
                    <li><a href="<?= base_url() ?>home/daftar_anggota/<?= $kelas[0]['id_kelas'] ?>"><i
                                class="fa fa-eye"></i>
                            Daftar Anggota
                        </a>
                    </li>
                    <?php if ($_SESSION['user_id'] != $kelas[0]['id_user']) : ?>
                    <li class="mt-4 mb-4 border-top pt-2"><a
                            href="<?= base_url() ?>home/keluar_kelas/<?= $kelas[0]['id_kelas'] ?>"><i
                                class="fa fa-sign-out-alt"></i>
                            Keluar
                            Kelas
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php else : ?>
                    <li><a href="<?= base_url() ?>home/daftar_anggota/<?= $kelas[0]['id_kelas'] ?>"><i
                                class="fa fa-eye"></i>
                            Daftar Anggota
                        </a>
                    </li>
                    <li class="mt-4 mb-4 border-top pt-2"><a
                            href="<?= base_url() ?>home/keluar_kelas/<?= $kelas[0]['id_kelas'] ?>"><i
                                class="fa fa-sign-out-alt"></i>
                            Keluar
                            Kelas
                        </a>
                    </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </div>
</div>