<main id="main">
    <style>
        label {
            font-weight: 500;
        }
    </style>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
        </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="section-title">
                        <h2>Mau Buat Janji Test Covid di GOODTEST?</h2>
                        <p>Isi form agar kami bisa menghubungi Anda.S&K Berlaku</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">

                    <form action="<?= base_url() ?>page/create_test_covid" method="POST" class="php-email-form">
                        <input type="text" value="covid" name="type" hidden>
                        <input type="text" value="proses" name="status" hidden>
                        <div class="row">
                            <div class="col-md-12 form-group mb-2">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="name" placeholder="Nama Lengkap" required>
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-2">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 form-group mb-2">
                                <label for="">Nomer Telp</label>
                                <input type="number" class="form-control" name="telp" id="phone" placeholder="No telp/WA" min="0" required>
                                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-2">
                                <label for="">Tanggal Buat Janji</label>
                                <input type="date" name="date" class="form-control" required>
                                <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group mb-2">
                                <label for="">Test Laboratorium</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="id_test" required>
                                    <option selected disabled>Pilih Test Laboratorium</option>
                                    <?php foreach ($covid as $c) : ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('id_test', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="text"><button type="submit">Buat Janji</button></div>
                    </form>

                </div>
            </div>

        </div>
    </section><!-- End Appointment Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>
        </div>

        <div>

        </div>

        <div class="container">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="fas fa-map-marker"></i>
                            <h4>Location:</h4>
                            <p><?= $setting['alamat']; ?></p>
                        </div>

                        <div class="email">
                            <i class="fas fa-envelope"></i>
                            <h4>Email:</h4>
                            <p><?= $setting['email']; ?></p>
                        </div>

                        <div class="phone">
                            <i class="fas fa-phone"></i>
                            <h4>Call:</h4>
                            <p><?= $setting['telp']; ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d991.3461655518072!2d106.7201308!3d-6.3442049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeb2f897bc67e5a72!2sVila%20Dago%20Pamulang!5e0!3m2!1sen!2sid!4v1626331904499!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->