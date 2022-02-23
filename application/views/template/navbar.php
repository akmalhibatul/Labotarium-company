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

     <a href="<?= base_url() ?>" class="logo me-auto"><img src="<?= base_url('assets/') ?>img/Untitled-1.png" alt="" class="img-fluid"></a>


     <nav id="navbar" class="navbar order-last order-lg-0">
       <ul>
         <li><a class="nav-link scrollto" href="<?= base_url() ?>">Home</a></li>
         <li><a class="nav-link scrollto" href="<?= base_url() ?>#services">Layanan</a></li>
         <li><a class="nav-link scrollto" href="<?= base_url() ?>artikel">Artikel</a></li>
         <li><a class="nav-link scrollto" href="<?= base_url() ?>dokter">Dokter</a></li>
         <li><a class="nav-link scrollto" href="<?= base_url() ?>#contact">Contact</a></li>
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->

     <?php
      $base = base_url('buat-janji');
      if ($this->uri->segment(1) == "layanan-covid") {
        echo "";
      } else if ($this->uri->segment(1) == "buat-janji-covid") {
        echo "";
      } else if ($this->uri->segment(1) == "create_test_covid") {
        echo "";
      } else if ($this->uri->segment(1) == "create_test") {
        echo "";
      } else if ($this->uri->segment(1) == "buat-janji") {
        echo "";
      } else {
        echo "<a href='$base' class='appointment-btn scrollto'>Buat Janji?</a>";
      }
      ?>

   </div>
 </header><!-- End Header -->