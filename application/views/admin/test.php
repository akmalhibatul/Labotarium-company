<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin/') ?>media/hero-bg.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Labotarium test</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome Administrator</h2>
                    </div>
                    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                        <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                            <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="<?= base_url() ?>admin/t_test">
                                <i class="fa fa-plus mr-1"></i> Tambah Test
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
        <!-- Stats -->
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('flash'); ?>
                <!-- Dynamic Table Full Pagination -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">ID</th>
                                    <th style="width: 10%;">Nama Test</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Detail</th>
                                    <th class="text-center" style="width: 10%;">Nama Kategori</th>
                                    <th class="text-center" style="width: 10%;">Type Test</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($test as $t) :
                                ?>
                                    <tr>
                                        <td class="text-center font-size-sm"><?= $no++; ?></td>
                                        <td class="font-w600 font-size-sm"><?= $t['nama']; ?></td>
                                        <td class="font-w500 font-size-sm"><?= $t['detail']; ?></td>
                                        <td class=" text-center font-w500 font-size-sm"><?= $t['nama_kategori']; ?></td>
                                        <td class="text-center">
                                            <?= $t['type']; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>admin/e_test/<?= $t['id']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                                <a href="<?= base_url() ?>admin/h_test/<?= $t['id']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-fw fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table Full Pagination -->
            </div>

        </div>
        <!-- END Stats -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->