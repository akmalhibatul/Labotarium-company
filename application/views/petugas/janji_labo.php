 <!-- Main Container -->
 <main id="main-container">

     <!-- Hero -->
     <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin/') ?>media/hero-bg.jpg');">
         <div class="bg-primary-dark-op">
             <div class="content content-narrow content-full">
                 <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                     <div class="flex-sm-fill">
                         <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Janji Labotarium</h1>
                         <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <b><?= $this->session->userdata('nama'); ?></b></h2>
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
                     <div class="block-header block-header-default">
                         <h3 class="block-title">Janji Proses/Done</h3>
                     </div>
                     <div class="block-content block-content-full">
                         <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                             <thead>
                                 <tr>
                                     <th class="text-center" style="width: 5%;">ID</th>
                                     <th style="width: 20%;">Name</th>
                                     <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Telp</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                                     <th style="width: 15%;">Test</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                     <th style="width: 15%;">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    foreach ($janji as $j) :
                                    ?>
                                     <tr>
                                         <td class="text-center font-size-sm"><?= $no++; ?></td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama_lengkap']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['email']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?= $j['telp']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <em class="text-muted font-size-sm"><?= format_indo($j['date']); ?></em>
                                         </td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['type']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?php
                                                if ($j['status'] == 'done') {
                                                    echo "<span class='badge badge-success'>Done</span>";
                                                } else if ($j['status'] == 'proses') {
                                                    echo "<span class='badge badge-warning'>Proses</span>";
                                                } else if ($j['status'] == 'tolak') {
                                                    echo "<span class='badge badge-danger'>Tolak</span>";
                                                }
                                                ?>
                                         </td>
                                         <td>
                                             <a href="<?= base_url() ?>petugas/d_janji/<?= $j['id_janji']; ?>" class="btn btn-warning" data-toggle="tooltip" title="view"><i class="fas fa-eye"></i></a>
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
         <div class="row">
             <div class="col-lg-12">
                 <!-- Dynamic Table Full Pagination -->
                 <div class="block">
                     <div class="block-header block-header-default">
                         <h3 class="block-title">Janji DiTolak / Pasien Tidak Datang / Data Asal</h3>
                     </div>
                     <div class="block-content block-content-full">
                         <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                             <thead>
                                 <tr>
                                     <th class="text-center" style="width: 5%;">ID</th>
                                     <th style="width: 20%;">Name</th>
                                     <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Telp</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                                     <th style="width: 15%;">Test</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                     <th style="width: 15%;">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    foreach ($t as $j) :
                                    ?>
                                     <tr>
                                         <td class="text-center font-size-sm"><?= $no++; ?></td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama_lengkap']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['email']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?= $j['telp']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <em class="text-muted font-size-sm"><?= format_indo($j['date']); ?></em>
                                         </td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['type']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?php
                                                if ($j['status'] == 'done') {
                                                    echo "<span class='badge badge-success'>Done</span>";
                                                } else if ($j['status'] == 'proses') {
                                                    echo "<span class='badge badge-warning'>Proses</span>";
                                                } else if ($j['status'] == 'tolak') {
                                                    echo "<span class='badge badge-danger'>Tolak</span>";
                                                }
                                                ?>
                                         </td>
                                         <td>
                                             <div class="btn-group">
                                                 <a href="<?= base_url() ?>petugas/c_janji/<?= $j['id_janji']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="change" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-fw fa-exchange-alt"></i></a>
                                                 <a href="<?= base_url() ?>petugas/h_janji/<?= $j['id_janji']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-fw fa-trash"></i></a>
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
         <div class="row">
             <div class="col-lg-12">
                 <!-- Dynamic Table Full Pagination -->
                 <div class="block">
                     <div class="block-header block-header-default">
                         <h3 class="block-title">Janji Selesai / Pasien Sudah Datang</h3>
                     </div>
                     <div class="block-content block-content-full">
                         <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                         <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                             <thead>
                                 <tr>
                                     <th class="text-center" style="width: 80px;">ID</th>
                                     <th style="width: 20%;">Name</th>
                                     <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Telp</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                                     <th style="width: 15%;">Test</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                                     <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                     <th style="width: 15%;">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    foreach ($s as $j) :
                                    ?>
                                     <tr>
                                         <td class="text-center font-size-sm"><?= $no++; ?></td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama_lengkap']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['email']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?= $j['telp']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <em class="text-muted font-size-sm"><?= format_indo($j['date']); ?></em>
                                         </td>
                                         <td class="font-w600 font-size-sm"><?= $j['nama']; ?></td>
                                         <td class="d-none d-sm-table-cell font-size-sm">
                                             <?= $j['type']; ?>
                                         </td>
                                         <td class="d-none d-sm-table-cell">
                                             <?php
                                                if ($j['status'] == 'done') {
                                                    echo "<span class='badge badge-success'>Done</span>";
                                                } else if ($j['status'] == 'proses') {
                                                    echo "<span class='badge badge-warning'>Proses</span>";
                                                } else if ($j['status'] == 'tolak') {
                                                    echo "<span class='badge badge-danger'>Tolak</span>";
                                                } else if ($j['status'] == 'selesai') {
                                                    echo "<span class='badge badge-info'>Selesai</span>";
                                                }
                                                ?>
                                         </td>
                                         <td>
                                             <a href="<?= base_url() ?>petugas/h_janji/<?= $j['id_janji']; ?>" class="btn btn-danger" data-toggle="tooltip" title="hapus" onclick='return confirm(' Apakah anda yakin?')'><i class="fas fa-trash"></i></a>
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