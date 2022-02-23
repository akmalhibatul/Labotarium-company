<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>Laboratorium GOODTest</title>
  <meta content="Goodtest laboratorium menyediakan berbagai macam Obat-obatan maupun layanan Lainnya dan Memberikan Pelayanan terbaik,aman,bermutu tinggi dan inovatif" name="description">
  <meta content="goodtest, goodtestlab, GOODTEST, goodtestLaboratorium, Laboratorium GOODTest, Laboratorium goodtest" name="keywords">

  <!-- favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/icon.png">
  <link href="<?= base_url('assets/') ?>img/icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/') ?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
</head>
<style>
  /*--------------------------------------------------------------
# Gallery
--------------------------------------------------------------*/
  .gallery {
    overflow: hidden;
  }

  .gallery .swiper-pagination {
    margin-top: 20px;
    position: relative;
  }

  .gallery .swiper-pagination .swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background-color: #fff;
    opacity: 1;
    border: 1px solid #1977cc;
  }

  .gallery .swiper-pagination .swiper-pagination-bullet-active {
    background-color: #1977cc;
  }

  .gallery .swiper-slide-active {
    text-align: center;
  }

  @media (min-width: 992px) {
    .gallery .swiper-wrapper {
      padding: 40px 0;
    }

    .gallery .swiper-slide-active {
      border: 6px solid #1977cc;
      padding: 4px;
      background: #fff;
      z-index: 1;
      transform: scale(1.2);
      margin-top: 10px;
    }
  }
</style>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="fas fa-envelope"></i><a href="mailto:<?= $setting['email']; ?>"><?= $setting['email']; ?></a>
        <i class="fas fa-phone"></i><?= $setting['telp']; ?>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="<?= $setting['facebook']; ?>" class="facebook" target="blank"><i class="bi bi-facebook"></i></a>
        <a href="<?= $setting['instagram']; ?>" class="instagram" target="blank"><i class="bi bi-instagram"></i></a>
        <a href="<?= $setting['linkedin']; ?>" class="linkedin" target="blank"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="" class="logo me-auto"><img src="<?= base_url('assets/') ?>img/Untitled-1.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#artikel">Artikel</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url() ?>dokter">Dokter</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?= base_url() ?>buat-janji" class="appointment-btn scrollto">Buat Janji</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang Di GOODTest Laboratorium</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Memberikan Pelayanan Terbaik, Aman, Bermutu Tinggi dan Inovatif</h2>
          <div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?= base_url('assets/') ?>img/19836-removebg.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
        </div>

        <div class="row">
          <?php
          foreach ($layanan as $l) :
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <div class="icon"><i class="<?= $l['icon']; ?>"></i></div>
                <h4><a href="<?= base_url() ?><?= $l['link']; ?>"><?= $l['judul']; ?></a></h4>
                <p>
                  <?= $l['isi']; ?>
                </p>
              </div>
            </div>
          <?php endforeach ?>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="artikel" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Artikel</h2>
        </div>

        <div class="row" data-aos="fade-up">

          <?php foreach ($artikel as $a) : ?>
            <div class="col-lg-4 col-md-4">
              <div class="member" data-aos-delay="100">
                <img src="<?= base_url('assets/') ?>img/artikel/<?= $a['img_artikel']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <ul>
                    <li class="text-muted"><?= format_indo($a['tgl_artikel']); ?></li>
                  </ul>
                  <a href="<?= base_url() ?>artikel/<?= $a['slug']; ?>">
                    <h6 class="card-title" style="font-weight: 400;"><?= $a['judul_artikel']; ?></h6>
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

      </div>
      <div class="text-center mt-5">
        <div class="text-center">
          <form action="<?= base_url('artikel') ?>" method="post">
            <button type="submit">Artikel Lainnya<i class="bx bx-chevron-right"></i></button>
          </form>
        </div>
      </div>
    </section><!-- End Pricing Section -->



    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="section-title">
          <h2>Testimoni</h2>
        </div>
        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?= base_url('assets/') ?>img/testimonials/reka.jpg" class="testimonial-img" alt="">
                  <h3>Reka</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Terimakasih atas pelayanannya dari GOODTest Laboratorium alhamdulillah sekarang saya sehat terimakasih yang sebesar besarnya kepada para dokter dan perawat dengan profesionalnya menangani pasien trutama ibu saya.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?= base_url('assets/') ?>img/testimonials/azmi maudy.jpg" class="testimonial-img" alt="">
                  <h3>Azmi Maudy</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Dear goodtest, Aku mu ngucapin makasi bgt berkat goodtest aku dan keluarga ku bisa dapet hasil yang cepat dan akurat.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?= base_url('assets/') ?>img/testimonials/johan.jpg" class="testimonial-img" alt="">
                  <h3>Johan</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Makasi banyak goodtest Laboratorium Pelayanan nya ok bgt ramah dan menanggapi dg sabar.. pertahanan ya ..puas bgt.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?= base_url('assets/') ?>img/testimonials/teti.jpg" class="testimonial-img" alt="">
                  <h3>Teti</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Is the best pokoknya goodtest Laboratorium semoga makin jaya ya .. terimakasih sudah membantu pelayanan homecare aku dg sigap 🙏🏻.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?= base_url('assets/') ?>img/testimonials/defana zahira.jpg" class="testimonial-img" alt="">
                  <h3>Defana zahira</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Thank bgt goodtest selalu jadi yang terdepan dan terbaik .. pelayanan nya ok bgt.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
        </div>

        <div class="gallery-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <?php foreach ($galeri as $g) : ?>
              <div class="swiper-slide"><a class="gallery-lightbox" href="<?= base_url('assets/') ?>img/gallery/<?= $g['image']; ?>"><img src="<?= base_url('assets/') ?>img/gallery/<?= $g['image']; ?>" class="img-fluid" alt=""></a></div>
            <?php endforeach ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

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

            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.83681989555552!2d106.72059339241157!3d-6.343625765370863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5f09a1dc82f%3A0xcd37b9680e66f60c!2sGOODTest%20Laboratorium!5e0!3m2!1sid!2sid!4v1628830059846!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
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


  <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Promo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/') ?>img/a.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div> -->
  <!-- GetButton.io widget -->
  <script type="text/javascript">
    (function() {
      var options = {
        whatsapp: "+6287720007800", // WhatsApp number
        call_to_action: "Hubungi Kami", // Call to action
        position: "right", // Position may be 'right' or 'left'
      };
      var proto = document.location.protocol,
        host = "getbutton.io",
        url = proto + "//static." + host;
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url + '/widget-send-button/js/init.js';
      s.onload = function() {
        WhWidgetSendButton.init(host, proto, options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    })();
  </script>
  <!-- /GetButton.io widget -->
  <div id="preloader"></div>

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
    $(window).on('load', function() {
      $('#staticBackdrop').modal('show');
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