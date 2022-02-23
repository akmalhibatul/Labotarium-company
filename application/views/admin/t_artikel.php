<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Tambah Artikel <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/artikel">Artikel</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Tambah Artikel
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
            <div class="block-content block-content-full">
                <form action="<?= base_url() ?>admin/createArtikel" method="POST" enctype="multipart/form-data" novalidate>
                    <input type="text" name="tgl_artikel" value="<?= date('Y-m-d'); ?>" hidden>
                    <input type="text" name="id_user" value="<?= $this->session->userdata('id_user'); ?>" hidden>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="example-text-input">Judul Artikel</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="judul_artikel" placeholder="Masukan Judul" required>
                                <small class="form-text text-danger"><?= form_error('judul_artikel'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input">Isi Artikel</label>
                                <textarea id="js-ckeditor" name="isi_artikel" required></textarea>
                                <small class="form-text text-danger"><?= form_error('isi_artikel'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input">Foto Artikel</label><br>
                                <input type="file" id="example-file-input" name="img_artikel" required>
                                <small class='form-text text-danger'>*Gambar Maksimal Width 1152 pixel dan Height 1152 pixel</small>
                                <small class="form-text text-danger"><?= form_error('img_artikel'); ?></small>
                            </div>
                        </div>
                        <div class="form-group ml-3">
                            <button type="submit" class="btn btn-primary" data-toggle="click-ripple">Submit</button>
                            <button type="reset" class="btn btn-danger" data-toggle="click-ripple">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Basic -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->