<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Layanan</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>layanan-covid">Layanan Covid</a></li>
                    <li><?= $l['nama']; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section id="doctors" class="doctors aos-item" data-aos="fade-up">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="member-info">
                            <h2 style="color: #1977cc;"><?= $l['nama']; ?></h2>
                            <span><?= $l['type']; ?></span>
                            <p class="text-muted"><?= $l['detail']; ?></p>
                            <center>
                                <a href="https://api.whatsapp.com/send?phone=6287720007800" class="btn btn-primary mt-4 mb-3" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Pesan layanan <?= $l['nama']; ?>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->