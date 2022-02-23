<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Tambah test <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/test">test</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Tambah test
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
                <form action="<?= base_url() ?>admin/createTest" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="example-text-input">Nama Test</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input" name="nama" required>
                                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Detail</label>
                                <textarea name="detail" class="form-control form-control-alt" rows="4"></textarea>
                                <small class="form-text text-danger"><?= form_error('detail'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input">Kategori Test</label><br>
                                <select name="id_kategori" class="custom-select" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    <?php foreach ($kt as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('type'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="example-textarea-input">Type</label><br>
                                <select name="type" class="custom-select" required>
                                    <option selected disabled>Pilih Type Test</option>
                                    <option value="umum">umum</option>
                                    <option value="covid">covid</option>
                                </select>
                                <small class="form-text text-danger"><?= form_error('type'); ?></small>
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