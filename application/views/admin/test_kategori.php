<style>
    .inner-page .title p {
        font-size: 12px;
    }

    .inner-page p {
        font-size: 13px;
    }

    .inner-page .member {
        position: relative;
        box-shadow: 0px 2px 15px rgba(44, 73, 100, 0.08);
        padding: 30px;
        border-radius: 10px;
    }


    .inner-page .member .member-info {
        padding-left: 30px;
    }

    .inner-page .member .pic {
        overflow: hidden;
        width: 50px;
        border-radius: 50%;
    }

    .inner-page .member .pic img {
        transition: ease-in-out 0.3s;
    }

    .inner-page .member:hover img {
        transform: scale(1.1);
    }

    .inner-page .member h5 {
        margin-top: 5px;
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 16px;
        color: #2c4964;
    }

    .inner-page .member h6 {
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 12px;
        color: #777777;
    }

    .inner-page .member span {
        display: block;
        font-size: 15px;
        padding-bottom: 10px;
        position: relative;
        font-weight: 500;
    }

    .inner-page .member span::after {
        content: "";
        position: absolute;
        display: block;
        width: 50px;
        height: 1px;
        background: #b2c8dd;
        bottom: 0;
        left: 0;
    }
</style>
<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Kategori Obat</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>layanan-apotek">Layanan Apotek</a></li>
                    <li><?= $kt['nama_kategori']; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="section-title">
            <div class="container">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="<?= base_url('assets/') ?>img/kategori_obat/<?= $kt['image_kategori']; ?>" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h5><?= $kt['nama_kategori']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="<?= base_url() ?>page/search_obat" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Obat Disemua Kategori" aria-label="Cari Obat Disemua Kategori" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </form>


            <div class="row">
                <?php if (empty($kategori)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Obat belum di input !
                    </div>
                <?php endif ?>
                <?php foreach ($kategori as $item) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?= base_url('assets/') ?>img/obat/<?= $item['image_obat']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="title">
                                    <a href="<?= base_url() ?>detail-obat/<?= $item['slug']; ?>">
                                        <h5 class="card-title"><?= $item['nama_obat']; ?></h5>
                                    </a>
                                </div>
                                <p class="text-muted" style="text-align: center;"><?= $item['satuan']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
            <center><?php echo $this->pagination->create_links(); ?></center>

        </div>
    </section>

</main><!-- End #main -->