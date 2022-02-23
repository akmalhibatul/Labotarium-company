<style>
    .services .member {
        position: relative;
        box-shadow: 0px 2px 15px rgba(44, 73, 100, 0.08);
        padding: 30px;
        border-radius: 10px;
    }


    .services .member .member-info {
        padding-left: 30px;
    }

    .services .member .pic {
        overflow: hidden;
        width: 50px;
        border-radius: 50%;
    }

    .services .member .pic img {
        transition: ease-in-out 0.3s;
    }

    .services .member:hover img {
        transform: scale(1.1);
    }

    .services .member h5 {
        margin-top: 10px;
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 20px;
        color: #2c4964;
    }

    .services .member h6 {
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 12px;
        color: #777777;
    }

    .services .member span {
        display: block;
        font-size: 15px;
        padding-bottom: 10px;
        position: relative;
        font-weight: 500;
    }

    .services .member span::after {
        content: "";
        position: absolute;
        display: block;
        width: 50px;
        height: 1px;
        background: #b2c8dd;
        bottom: 0;
        left: 0;
    }

    .services button[type="submit"] {
        margin-top: 10px;
        background: #1977cc;
        border: 0;
        padding: 10px 35px;
        color: #fff;
        transition: 0.4s;
        border-radius: 50px;
    }

    .services button[type="submit"]:hover {
        background: #1c84e3;
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Layanan Test Covid-19 GOODTest Laboratorium</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Buat Janji Khusus Untuk Test Covid 19 Disini!</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?= base_url('assets/') ?>img/5876-removebg-preview.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="section-title">
                <h2>COVID 19 INDONESIA</h2>
            </div>
            <div class="row justify-content-center">
                <?php
                $data = file_get_contents("https://dekontaminasi.com/api/id/covid19/stats");
                $json = json_decode($data, true);
                $infected = $json['numbers']['infected'];
                $recovered = $json['numbers']['recovered'];
                $fatal = $json['numbers']['fatal'];
                $perawatan = ($infected - $recovered) - $fatal;
                // echo "Terkonfirmasi : $infected | Dalam Perawatan : $perawatan | Sembuh : $recovered | Meninggal : $fatal";
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="fas fa-head-side-mask"></i>
                        <span data-toggle="counter-up"><?= number_format($infected); ?></span>
                        <p>Terkonfirmasi</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="fas fa-stethoscope"></i>
                        <span data-toggle="counter-up"><?= number_format($perawatan); ?></span>
                        <p>Positif</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fas fa-hand-holding-medical"></i>
                        <span data-toggle="counter-up"><?= number_format($recovered); ?></span>
                        <p>Sembuh</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fas fa-ambulance"></i>
                        <span data-toggle="counter-up"><?= number_format($fatal); ?></span>
                        <p>Meninggal</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Layanan Covid 19</h2>
            </div>

            <div class="row">

                <?php
                foreach ($covid as $c) :
                ?>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="<?= base_url('assets/') ?>img/stethoscope (2).png" class="img-fluid" alt=""></div>

                            <div class="member-info">
                                <a href="<?= base_url() ?>detail-layanan-covid/<?= $c['slug']; ?>">
                                    <h5><?= $c['nama']; ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
            <center>
                <form action="<?= base_url() ?>buat-janji-covid" method="POST">
                    <button type="submit" class="mt-4">Buat Janji</button>
                </form>
            </center>
    </section><!-- End Services Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>
        </div>

        <div>

        </div>

        <div class="container">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="fas fa-map-marker"></i>
                            <h4>Location:</h4>
                            <p><?= $setting['alamat']; ?></p>
                        </div>

                        <div class="email">
                            <i class="fas fa-envelope"></i>
                            <h4>Email:</h4>
                            <p><?= $setting['email']; ?></p>
                        </div>

                        <div class="phone">
                            <i class="fas fa-phone"></i>
                            <h4>Call:</h4>
                            <p><?= $setting['telp']; ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d991.3461655518072!2d106.7201308!3d-6.3442049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeb2f897bc67e5a72!2sVila%20Dago%20Pamulang!5e0!3m2!1sen!2sid!4v1626331904499!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->