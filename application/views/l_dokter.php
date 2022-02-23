<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Dokter</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Dokter</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section id="doctors" class="doctors aos-item" data-aos="fade-up">
        <div class="container">

            <div class="row">
                <?php foreach ($dokter as $d) : ?>
                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="<?= base_url('assets/') ?>img/doctors/<?= $d['image_dokter']; ?>" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4><?= $d['nama_dokter']; ?></h4>
                                <span><?= $d['spesialis']; ?></span>

                                <div class="social">
                                    <h6><?= $d['tempat']; ?></h6>
                                </div>
                                <a href="<?= base_url() ?>dokter/<?= $d['slug']; ?>" class="btn btn-primary mt-3">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
        </div>
    </section>

</main><!-- End #main -->