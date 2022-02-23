<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Dokter <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/dokter">Dokter</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Dokter
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
                <form action="<?= base_url() ?>admin/updateDokter" method="POST" enctype="multipart/form-data" novalidate>
                    <input type="text" name="id_dokter" value="<?= $dokter['id_dokter']; ?>" hidden>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="example-text-input">Nama Dokter</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="nama_dokter" value="<?= $dokter['nama_dokter']; ?>">
                                <small class="form-text text-danger"><?= form_error('nama_dokter'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Spesialis</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="spesialis" value="<?= $dokter['spesialis']; ?>">
                                <small class="form-text text-danger"><?= form_error('spesialis'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Tempat</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="tempat" value="Laboratorium GOODTEST" readonly>
                                <small class="form-text text-danger"><?= form_error('tempat'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input">Infromasi Dokter</label>
                                <textarea name="informasi_dokter" class="form-control form-control-alt" rows="4"><?= $dokter['informasi_dokter']; ?></textarea>
                                <small class="form-text text-danger"><?= form_error('informasi_dokter'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input">Jam Operasional</label>
                                <textarea id="js-ckeditor" name="jam_operasional"><?= $dokter['jam_operasional']; ?></textarea>
                                <small class="form-text text-danger">*Harap hanya mengganti Jamnya saja bila ada hari yang ingin di hapus, hapus sampai titiknya hilang</small>
                                <small class="form-text text-danger"><?= form_error('jam_operasional'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input">Foto Dokter</label><br>
                                <input type="file" id="example-file-input" name="image_dokter">
                                <small class='form-text text-danger'>*Gambar Maksimal Width 1152 pixel dan Height 1152 pixel</small>
                                <input type="text" name="old_image_dokter" value="<?= $dokter['image_dokter']; ?>" hidden>
                                <small class="form-text text-danger"><?= form_error('image_dokter'); ?></small>
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