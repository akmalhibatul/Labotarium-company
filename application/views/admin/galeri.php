<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin/') ?>media/hero-bg.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Galeri</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <b><?= $this->session->userdata('nama'); ?></b></h2>
                    </div>
                    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                        <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                            <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="<?= base_url() ?>admin/t_galeri">
                                <i class="fa fa-plus mr-1"></i> Tambah Galeri
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <?= $this->session->flashdata('flash'); ?>
        <!-- Image Default -->
        <div class="row items-push">
            <?php foreach ($galeri as $g) : ?>
                <div class="col-md-4 animated fadeIn">
                    <div class="options-container">
                        <img class="img-fluid options-item" src="<?= base_url('assets/') ?>img/gallery/<?= $g['image']; ?>" alt="">
                        <div class="options-overlay bg-black-75">
                            <div class="options-overlay-content">
                                <a class="btn btn-sm btn-light" href="<?= base_url() ?>admin/h_galeri/<?= $g['id_galeri']; ?>" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-times text-danger mr-1"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
        <!-- END Image Default -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->