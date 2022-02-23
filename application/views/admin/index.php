<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin/') ?>media/hero-bg.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <b><?= $this->session->userdata('nama'); ?></b></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="<?= base_url('admin/artikel') ?>">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Arikel</div>
                        <div class="font-size-h2 font-w400 text-dark"><?= $jm_art; ?></div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="<?= base_url('admin/dokter') ?>">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Dokter</div>
                        <div class="font-size-h2 font-w400 text-dark"><?= $jm_dk; ?></div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="<?= base_url('admin/galeri') ?>">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Galeri</div>
                        <div class="font-size-h2 font-w400 text-dark"><?= $jm_g; ?></div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="<?= base_url('admin/test') ?>">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Test</div>
                        <div class="font-size-h2 font-w400 text-dark"><?= $jm_t; ?></div>
                    </div>
                </a>
            </div>

        </div>
        <!-- END Stats -->

        <!-- Customers and Latest Orders -->
        <div class="row row-deck">

            <!-- Latest Orders -->
            <div class="col-lg-12">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title">Laporan Janji Hari Ini</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700">ID</th>
                                    <th class="font-w700">Nama</th>
                                    <th class="d-none d-sm-table-cell font-w700">Email</th>
                                    <th class="d-none d-sm-table-cell font-w700">Telp</th>
                                    <th class="font-w700">Test</th>
                                    <th class="d-none d-sm-table-cell font-w700">Type</th>
                                    <th class="font-w700">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($gtgl as $g) : ?>
                                    <tr>
                                        <td>
                                            <span class="font-w600"><?= $no++; ?></span>
                                        </td>
                                        <td>
                                            <span class="font-w600"><?= $g['nama_lengkap']; ?></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="font-size-sm text-muted"><?= $g['email']; ?></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?= $g['telp']; ?>
                                        </td>
                                        <td>
                                            <span class="font-w600"><?= $g['nama']; ?></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="font-size-sm text-muted"><?= $g['type']; ?></span>
                                        </td>
                                        <td>
                                            <?php
                                            if ($g['status'] == 'done') {
                                                echo "<span class='font-w600 text-success'>Done</span>";
                                            } else if ($g['status'] == 'proses') {
                                                echo "<span class='font-w600 text-warning'>Proses</span>";
                                            } else if ($g['status'] == 'tolak') {
                                                echo "<span class='font-w600 text-danger'>Tolak</span>";
                                            } else if ($g['status'] == 'selesai') {
                                                echo "<span class='font-w600 text-info'>Selesai</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Latest Orders -->
        </div>
        <!-- END Customers and Latest Orders -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->