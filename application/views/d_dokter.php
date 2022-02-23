<style>
    .card-body li {
        font-size: 14px;
    }

    .doctors .member .pic {
        overflow: hidden;
        width: 240px;
        border-radius: 50%;
    }
</style>
<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Dokter</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>dokter">Dokter</a></li>
                    <li><?= $dokter['nama_dokter']; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section id="doctors" class="doctors aos-item" data-aos="fade-up">
        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <div class="member d-flex align-items-start">
                        <div class="mb-3" style="max-width: 100%;">
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="pic">
                                        <img src="<?= base_url('assets/') ?>img/doctors/<?= $dokter['image_dokter']; ?>" class="img-fluid" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $dokter['nama_dokter']; ?></h3>
                                        <p class="text-muted"><strong><?= $dokter['spesialis']; ?></strong></p>
                                        <h5 class="card-title mt-2" style="font-size: 14px;"><i class="fas fa-question-circle"></i> Informasi Lainnya</h5>
                                        <p class="card-text text-muted"><?= $dokter['informasi_dokter']; ?></p>
                                        <h5 class="card-title mt-2" style="font-size: 14px;"><i class="fas fa-clock"></i> Jam Operasional</h5>
                                        <?= $dokter['jam_operasional']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->