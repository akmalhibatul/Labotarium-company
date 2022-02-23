<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit User <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="<?= base_url() ?>admin/user">user</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit User
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

                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label for="example-text-input">Nama Petugas</label>
                            <input type="text" class="form-control form-control-alt" id="example-text-input" name="nama" value="<?= $user['nama']; ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Username Petugas</label>
                            <input type="text" class="form-control form-control-alt" id="example-text-input" name="auth_username" value="<?= $user['auth_username']; ?>"> readonly
                            <small class="form-text text-danger"><?= form_error('auth_username'); ?></small>
                        </div>
                        <form action="<?= base_url() ?>admin/u_user" method="POST" enctype="multipart/form-data" novalidate>
                            <input type="text" name="id_user" value="<?= $user['id_user']; ?>" hidden>
                            <div class="form-group">
                                <label for="example-textarea-input">Level</label><br>
                                <select name="level" class="custom-select">
                                    <option selected disabled>Pilih Level</option>
                                    <?php $u = $user['level']; ?>
                                    <option <?php if ($u == 'admin') {
                                                echo "selected";
                                            } ?> value="admin">Admin</option>
                                    <option <?php if ($u == 'petugas') {
                                                echo "selected";
                                            } ?> value="petugas">Petugas</option>
                                </select>
                                <small class="form-text text-danger"><?= form_error('level'); ?></small>
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