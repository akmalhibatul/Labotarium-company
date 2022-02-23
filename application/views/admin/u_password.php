<!-- Main Container -->
<main id="main-container">
    <?= $this->session->flashdata('message'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ubah Password User</small>
                </h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Basic -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Isi Form</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-6">
                        <form action="<?= base_url('Admin/u_password'); ?>" method="post">
                            <div class="form-group">
                                <label for="current_password">Password Lama</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password Baru</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Ulangi Password</label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Basic -->
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->