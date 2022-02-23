<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Detail Janji <?php
                                    if ($janji['status'] == 'done') {
                                        echo "<span class='badge badge-success'>Done</span>";
                                    } else if ($janji['status'] == 'proses') {
                                        echo "<span class='badge badge-warning'>Proses</span>";
                                    } else if ($janji['status'] == 'tolak') {
                                        echo "<span class='badge badge-danger'>Tolak</span>";
                                    }
                                    ?><small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/artikel">Janji Labo</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            View Janji
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Basic -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Konfirmasi Jadwal</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <form action="<?= base_url() ?>admin/kf" method="POST">
                            <div class="form-group">
                                <label for="example-text-input">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="nama_lengkap" value="<?= $janji['nama_lengkap']; ?>" readonly>
                            </div>
                            <input type="text" name="email" value="<?= $janji['email']; ?>" hidden>
                            <div class="form-group">
                                <label for="example-text-input">Test Labotarium</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="test" value="<?= $janji['nama']; ?>" readonly>
                            </div>

                            <input type="text" name="id" value="<?= $janji['id_janji']; ?>" hidden>
                            <div class="form-group">

                                <label for="example-text-input">Tanggal Janji</label>
                                <?php
                                if ($janji['status'] == 'done') {
                                    echo "<input type='text' class='form-control form-control-alt' id='example-text-input' name='date' value='" . format_indo($janji['date']) . "' readonly>";
                                } else {
                                    echo "<input type='date' class='form-control form-control-alt' id='example-text-input' name='date' value='" . $janji['date'] . "'>
                                    <small class='form-text text-danger'>*Bila Jadwal Harian Penuh, Silakan Ganti Tanggal Janji Sebelum Konfirmasi</small>";
                                }
                                ?>
                            </div>
                            <input type="text" name="status" value="done" hidden>
                            <div class="form-group">
                                <?php
                                if ($janji['status'] == 'done') {
                                    echo "<a href='" . base_url() . "admin/selesai_janji/" . $janji['id_janji'] . "' class='btn btn-primary' data-toggle='click-ripple' onclick='return confirm('Apakah anda yakin?')'>Selesai</a>
                                    <small class='form-text text-danger'>*Klik Selesai Bila Pasien Sudah Datang / Pulang</small>";
                                } else {
                                    echo "<button type='submit' class='btn btn-primary' data-toggle='click-ripple' onclick='return confirm('Apakah anda yakin Konfirmasi Data Pasien?')'>Konfirmasi Jadwal</button>
                                    <a href='" . base_url() . "admin/tolak/" . $janji['id_janji'] . "' class='btn btn-danger' data-toggle='click-ripple' onclick='return confirm('Apakah anda yakin?')'>Tolak Janji</a>
                                    ";
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Hubungi Pasien</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <div class="form-group">

                            <a href="https://api.whatsapp.com/send?phone=62<?= $janji['telp']; ?>" class="btn btn-success mr-1 mb-3">
                                Via Whastapp
                            </a>
                            <a href="tel:<?= $janji['telp']; ?>" type="button" class="btn btn-primary mr-1 mb-3">
                                Via Nomer Telpon
                            </a>
                            <a href="mailto:<?= $janji['email']; ?>" class="btn btn-danger mr-1 mb-3">
                                Via Gmail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Basic -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->