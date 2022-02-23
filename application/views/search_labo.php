<style>
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
        margin-top: 10px;
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 20px;
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
                <h2>Search Test</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>layanan-labotarium">Layanan Labotarium</a></li>
                    <li>Search Test</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="section-title">
            <h2>Search Test</h2>
            <p>Layanan Test Di semua Kategori</p>
        </div>
        <div class="container">
            <form action="<?= base_url() ?>page/search_labo" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Test Disemua Kategori" aria-label="Cari Test Disemua Kategori" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <?php if (empty($data)) : ?>
                <div class="alert alert-danger" role="alert">
                    Test Yang Anda Cari Tidak ada !
                </div>
            <?php endif ?>

            <div class="row">
                <?php foreach ($data as $item) : ?>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="<?= base_url('assets/') ?>img/1039328.png" class="img-fluid" alt=""></div>

                            <div class="member-info ">
                                <a href="<?= base_url() ?>detail-layanan/<?= $item['slug']; ?>">
                                    <h5><?= $item['nama']; ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>

        </div>
    </section>

</main><!-- End #main -->