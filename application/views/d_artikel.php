<style>
    .inner-page .member {
        margin-top: 5px;
        position: relative;
        box-shadow: 0px 2px 15px rgba(44, 73, 100, 0.08);
        padding: 25px;
        border-radius: 10px;
    }


    .inner-page .member .member-info {
        padding-left: 25px;
    }

    .inner-page .member .pic {
        overflow: hidden;
        width: 230px;
    }

    .inner-page .member h6 {
        text-align: left;
        padding-top: 13px;
        font-size: 15px;
        color: #777777;
    }


    .article-content p {
        text-align: left;
    }

    .blog-details-desc .entry-meta {
        margin-bottom: 10px;
    }

    .blog-details-desc .entry-meta ul {
        padding-left: 0;
        margin-bottom: 10px;
        list-style-type: none;
    }

    .blog-details-desc .entry-meta ul li {
        position: relative;
        display: inline-block;
        color: #121521;
        margin-right: 21px;
        font-family: rubik, sans-serif;
        font-size: 11px;
    }

    .blog-details-desc .entry-meta ul li span {
        display: inline-block;
        color: #121521;
    }

    .blog-details-desc .entry-meta ul li a {
        display: inline-block;
        color: #7d7d7d;
    }

    .blog-details-desc .entry-meta ul li a:hover {
        color: #19ce67;
    }

    .blog-details-desc .entry-meta ul li i {
        color: #19ce67;
        margin-right: 2px;
    }

    .blog-details-desc .entry-meta ul li::before {
        content: "";
        position: absolute;
        top: 11px;
        right: -15px;
        width: 6px;
        height: 1px;
        background: #19ce67;
    }

    .blog-details-desc .entry-meta ul li:last-child {
        margin-right: 0;
    }

    .blog-details-desc .entry-meta ul li:last-child::before {
        display: none;
    }

    .pricing .member {
        position: relative;
        box-shadow: 0px 2px 15px rgba(44, 73, 120, 0.08);
        padding: 30px;
        border-radius: 10px;
    }


    .pricing .member .member-info {
        padding-left: 30px;
    }
</style>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Artikel</h2>
                <ol>
                    <li><a href="<?= base_url() ?>page/">Home</a></li>
                    <li><a href="<?= base_url() ?>page/artikel">Artikel</a></li>
                    <li><?php
                        $string = $artikel['judul_artikel'];
                        if (strlen($string) > 15) $string = substr($string, 0, 15) . '...';
                        echo strip_tags($string);
                        ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="blog-details-desc">
                        <div class="entry-meta">
                            <ul>
                                <li>&nbsp;<?= format_indo($artikel['tgl_artikel']); ?></li>
                                <li><span>Posting: </span>&nbsp;<?= $user['auth_username']; ?></li>
                            </ul>
                        </div>
                        <img class="img-fluid" alt="<?= $artikel['judul_artikel']; ?>" src="<?= base_url('assets/') ?>img/artikel/<?= $artikel['img_artikel']; ?>" />
                        <div class="article-content">
                            <strong>
                                <h3 style="margin-top: 10px; "><?= $artikel['judul_artikel']; ?></h3>
                            </strong>
                            <p><?= $artikel['isi_artikel']; ?></p>
                        </div>
                        <div class="article-footer"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="title">
                        <center>
                            <h4>Artikel Lainnya</h4>
                        </center>
                    </div>
                    <?php foreach ($aa as $a) : ?>
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="<?= base_url('assets/') ?>img/artikel/<?= $a['img_artikel']; ?>" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h6>
                                    <a href="<?= base_url() ?>artikel/<?= $a['slug']; ?>">
                                        <?php
                                        $string = $a['judul_artikel'];
                                        if (strlen($string) > 38) $string = substr($string, 0, 38);
                                        echo strip_tags($string);
                                        ?>
                                    </a>
                                </h6>
                                <p class="text-muted" style="font-size: 11px;"><?= format_indo($a['tgl_artikel']); ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->