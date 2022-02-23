<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Kategori Test <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/kategori_test">Kategori Test</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Kategori Test
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
                <form action="<?= base_url() ?>admin/updateKT" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <input type="text" name="id_kategori" value="<?= $kt['id_kategori']; ?>" hidden>
                                <label for="example-text-input">Nama Kategori Test</label>
                                <input type="text" class="form-control form-control-alt" name="nama_kategori" value="<?= $kt['nama_kategori']; ?>" required>
                                <small class="form-text text-danger"><?= form_error('nama_kategori'); ?></small>
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