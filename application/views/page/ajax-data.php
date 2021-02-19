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

         <?php if ($this->ion_auth->in_group(2)) : ?>
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
                         <li class="mt-4 border-top pt-2"><a href="#" data-dismiss="modal" data-toggle="modal"
                                 data-target="#hapusKelas<?= $data['id_kelas'] ?>"><i class="fas fa-trash"></i>
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
                     <a href="<?= base_url() ?>home/hapus_kelas/<?= $data['id_kelas'] ?>"><button type="button"
                             class="btn btn-primary">Hapus</button></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php endforeach; ?>