<!-- Main Container -->
<main id="main-container">
    <?= $this->session->flashdata('message'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Setting</small>
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
                <h3 class="block-title">Setting Website</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12">
                        <form action="<?= base_url('Admin/u_setting'); ?>" method="post">
                            <?php
                            $s = $this->db->get_where('setting', ['id_setting' => '1'])->row_array();

                            ?>
                            <input type="text" name="id_setting" value="<?= $s['id_setting']; ?>" hidden>
                            <div class="form-group">
                                <label for="telp">Nomer Telpon</label>
                                <input type="text" class="form-control" name="telp" value="<?= $s['telp']; ?>">
                                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $s['email']; ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control"><?= $s['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="<?= $s['instagram']; ?>">
                                <?= form_error('instagram', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="<?= $s['facebook']; ?>">
                                <?= form_error('facebook', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" value="<?= $s['linkedin']; ?>">
                                <?= form_error('linkedin', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ubah Setting</button>
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