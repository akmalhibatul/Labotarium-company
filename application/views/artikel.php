<style>
    .inner-page .title p {
        font-size: 12px;
    }

    .inner-page p {
        font-size: 13px;
    }
</style>
<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url() ?>page/">Home</a></li>
                    <li>Artikel</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="section-title">
            <h2>Artikel</h2>
        </div>
        <div class="container">
            <form action="" method="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Artikel Apa" aria-label="Cari Artikel Apa" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div class="row">
                <?php foreach ($artikel as $a) : ?>
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?= base_url('assets/') ?>img/artikel/<?= $a['img_artikel']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="title">
                                    <p class="text-muted"><?= format_indo($a['tgl_artikel']); ?></p>
                                </div>
                                <a href="<?= base_url() ?>artikel/<?= $a['slug']; ?>">
                                    <h6 class="card-title"><?= $a['judul_artikel']; ?></h6>
                                </a>
                                <p class="text-muted"><?php
                                                        $string = $a['isi_artikel'];
                                                        if (strlen($string) > 90) $string = substr($string, 0, 200) . '...';
                                                        echo strip_tags($string);
                                                        ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
            <center><?php echo $this->pagination->create_links(); ?></center>
            <script type='text/javascript'>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
        </div>
    </section>

</main><!-- End #main -->