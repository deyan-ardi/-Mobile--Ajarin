<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay d-flex">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <?php $this->load->view('page/header-kelas') ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-12">
                <!-- Contact Box -->
                <div class="contact-box bg-white text-left rounded p-3 mt-4 shadow-lg">
                    <a
                        href="<?= base_url() ?>home/tambah_materi/<?= $dataBab[0]['id_bab'] ?>/<?= $kelas[0]['id_kelas'] ?>">
                        <h5 class="text-primary">Tambah Materi Pembelajaran</h5>
                    </a>
                    <form action="" method="post" class="mt-5">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <input type="text" name="nama_materi" id="nama_materi" required class="form-control"
                                        placeholder="Nama Materi Pembelajaran">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <textarea name="deskripsi" id="deskripsi" required class="form-control" cols="30"
                                        placeholder="Deskripsi Materi Pembelajaran" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="">Kategori Materi Pembelajaran</option>
                                        <option value="0">Video Pembelajaran</option>
                                        <option value="1">Kuis Pengayaan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cog"></i></span>
                                    </div>
                                    <input type="url" name="link" id="link" class="form-control"
                                        placeholder="URL Materi Pembelajaran">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-bordered w-100 mt-3 mt-sm-4" type="submit"><i
                                    class="fas fa-save"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
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