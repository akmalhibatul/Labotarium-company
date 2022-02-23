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
                <h2>Layanan Labotarium</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Layanan Labotarium</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page aos-item" data-aos="fade-up">

        <div class="section-title">
            <h2>Test Labotarium</h2>
            <p>Pilih pemeriksaan berdasakan kategori</p>
        </div>
        <div class="container">
            <form action="<?= base_url() ?>page/search_labo" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Layanan Test Apa ?" aria-label="Cari Layanan Test Apa ?" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <?php if (empty($data)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Test Tidak Ada !
                </div>
            <?php endif ?>

            <div class="row">
                <?php
                foreach ($data as $t) :
                ?>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="member-info ">
                                <a href="<?= base_url() ?>page/test_kategori/<?= $t['slug']; ?>">
                                    <h5><?= $t['nama_kategori']; ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </section>

</main><!-- End #main -->