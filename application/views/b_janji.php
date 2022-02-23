<style>
    label {
        font-weight: 500;
    }
</style>
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
        </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="section-title">
                        <h2>Mau Buat Janji di GoodTest?</h2>
                        <p>Isi form agar kami bisa menghubungi Anda.S&K Berlaku</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">

                    <form action="<?= base_url() ?>page/create_test" method="POST" class="php-email-form">
                        <input type="text" name="type" value="umum" hidden>
                        <input type="text" name="status" value="proses" hidden>
                        <div class="row mt-2">
                            <div class="col-md-12 form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="name" placeholder="Masukan Nama Lengkap" required>
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Nomer Telp</label>
                                <input type="number" class="form-control" name="telp" id="phone" placeholder="No telp/WA" min="0" required>
                                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 form-group">
                                <label for="">Tanggal Buat Janji</label>
                                <input type="date" name="date" class="form-control">
                                <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 form-group">
                                <label for="">Kategori Test</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="id_test" id="category" required>
                                    <option selected disabled>Pilih Kategori Test</option>
                                    <?php foreach ($test as $t) : ?>
                                        <option value="<?= $t['id_kategori']; ?>"><?= $t['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('id_test', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 form-group">
                                <label for="">Test Laboratorium</label>
                                <select class="form-control" id="sub_category" name="sub_category" required>
                                    <option value="">No Selected</option>
                                </select>
                                <?= form_error('id_test', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </section><!-- End Appointment Section -->
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
<style>
    @media (max-width: 992px) {
        #footer .img-fluid {
            width: 60%;
        }
    }
</style>
<!-- ======= Footer ======= -->
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <a href="<?= base_url() ?>" class="logo mr-auto"><img src="<?= base_url('assets/') ?>img/Untitled-2.png" alt="" class="img-fluid"></a>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>GOODTEST</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>#services">Layanan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>artikel">Artikel</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>dokter">Dokter</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Lainnya</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>layanan-labotarium">Layanan Laboratorium</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>layanan-covid">Layanan Covid 19</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url() ?>coming-soon">Layanan Apotek</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>OPERATIONAL HOURS</h4>
                    <ul>
                        <li><a href="">Senin - Jumat : 07:00 - 21:00 WIB</a></li>
                        <li><a href="">Sabtu - Minggu : 07:00 - 21:00 WIB</a></li>
                        <li><a href="">Hari Libur : 07:00 - 21:00 WIB</a></li>
                    </ul>
                    <p></p>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-left">
            <div class="copyright">
                Copyright &copy; <?= date('Y') ?> <strong><span>GOODTestLab</span></strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="<?= $setting['facebook']; ?>" class="facebook" target="blank"><i class="bx bxl-facebook"></i></a>
            <a href="<?= $setting['instagram']; ?>" class="instagram" target="blank"><i class="bx bxl-instagram"></i></a>
            <a href="<?= $setting['linkedin']; ?>" class="linkedin" target="blank"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#category').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('page/get_sub_kategori'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
                    }
                    $('#sub_category').html(html);

                }
            });
            return false;
        });

    });
</script>
<!-- Template Main JS File -->
<script>
    (function() {
        "use strict";

        /**
         * Easy selector helper function
         */
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        /**
         * Easy event listener function
         */
        const on = (type, el, listener, all = false) => {
            let selectEl = select(el, all)
            if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
            }
        }

        /**
         * Easy on scroll event listener 
         */
        const onscroll = (el, listener) => {
            el.addEventListener('scroll', listener)
        }

        /**
         * Navbar links active state on scroll
         */
        let navbarlinks = select('#navbar .scrollto', true)
        const navbarlinksActive = () => {
            let position = window.scrollY + 200
            navbarlinks.forEach(navbarlink => {
                if (!navbarlink.hash) return
                let section = select(navbarlink.hash)
                if (!section) return
                if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                    navbarlink.classList.add('active')
                } else {
                    navbarlink.classList.remove('active')
                }
            })
        }
        window.addEventListener('load', navbarlinksActive)
        onscroll(document, navbarlinksActive)

        /**
         * Scrolls to an element with header offset
         */
        const scrollto = (el) => {
            let header = select('#header')
            let offset = header.offsetHeight

            let elementPos = select(el).offsetTop
            window.scrollTo({
                top: elementPos - offset,
                behavior: 'smooth'
            })
        }

        /**
         * Toggle .header-scrolled class to #header when page is scrolled
         */
        let selectHeader = select('#header')
        let selectTopbar = select('#topbar')
        if (selectHeader) {
            const headerScrolled = () => {
                if (window.scrollY > 100) {
                    selectHeader.classList.add('header-scrolled')
                    if (selectTopbar) {
                        selectTopbar.classList.add('topbar-scrolled')
                    }
                } else {
                    selectHeader.classList.remove('header-scrolled')
                    if (selectTopbar) {
                        selectTopbar.classList.remove('topbar-scrolled')
                    }
                }
            }
            window.addEventListener('load', headerScrolled)
            onscroll(document, headerScrolled)
        }

        /**
         * Back to top button
         */
        let backtotop = select('.back-to-top')
        if (backtotop) {
            const toggleBacktotop = () => {
                if (window.scrollY > 100) {
                    backtotop.classList.add('active')
                } else {
                    backtotop.classList.remove('active')
                }
            }
            window.addEventListener('load', toggleBacktotop)
            onscroll(document, toggleBacktotop)
        }

        /**
         * Mobile nav toggle
         */
        on('click', '.mobile-nav-toggle', function(e) {
            select('#navbar').classList.toggle('navbar-mobile')
            this.classList.toggle('bi-list')
            this.classList.toggle('bi-x')
        })

        /**
         * Mobile nav dropdowns activate
         */
        on('click', '.navbar .dropdown > a', function(e) {
            if (select('#navbar').classList.contains('navbar-mobile')) {
                e.preventDefault()
                this.nextElementSibling.classList.toggle('dropdown-active')
            }
        }, true)

        /**
         * Scrool with ofset on links with a class name .scrollto
         */
        on('click', '.scrollto', function(e) {
            if (select(this.hash)) {
                e.preventDefault()

                let navbar = select('#navbar')
                if (navbar.classList.contains('navbar-mobile')) {
                    navbar.classList.remove('navbar-mobile')
                    let navbarToggle = select('.mobile-nav-toggle')
                    navbarToggle.classList.toggle('bi-list')
                    navbarToggle.classList.toggle('bi-x')
                }
                scrollto(this.hash)
            }
        }, true)

        /**
         * Scroll with ofset on page load with hash links in the url
         */
        window.addEventListener('load', () => {
            if (window.location.hash) {
                if (select(window.location.hash)) {
                    scrollto(window.location.hash)
                }
            }
        });

        /**
         * Preloader
         */
        let preloader = select('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove()
            });
        }

        /**
         * Initiate glightbox 
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });

        /**
         * Initiate Gallery Lightbox 
         */
        const galelryLightbox = GLightbox({
            selector: '.galelry-lightbox'
        });

        /**
         * Testimonials slider
         */
        new Swiper('.testimonials-slider', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },

                1200: {
                    slidesPerView: 2,
                    spaceBetween: 20
                }
            }
        });


        /**
         * Clients Slider
         */
        new Swiper('.gallery-slider', {
            speed: 400,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 20
                }
            }
        });

        /**
         * Initiate gallery lightbox 
         */
        const galleryLightbox = GLightbox({
            selector: '.gallery-lightbox'
        });

        /**
         * Animation on scroll
         */
        window.addEventListener('load', () => {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            })
        });

    })()
</script>
<!-- <script src="<?= base_url('assets/') ?>js/main.js"></script> -->

</body>

</html>