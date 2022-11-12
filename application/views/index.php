<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi Pembukuan Dagang | <?= $title; ?></title>
  <meta name="description" content="Aplikasi Pembukuan Dagang, dibuat dengan menggunakan PHP Framework Codeigniter 3">
  <meta name="keywords" content="Aplikasi Pembukuan Dagang, Aplikasi Pembukuan, Pembukuan Dagang, Pembukuan Dagang Sederhana.">
  <meta name="author" content="Diamsyah M Dida">
  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/DataTables/datatables.min.css">
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

  <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/DataTables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/chart371.js"></script>
  <style>
    body {
      background-color: #feb500;
      margin: 0px;
      padding: 0px;
      overflow: hidden;
    }
    .active {
      background: #000000;
    }
  </style>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">
    <nav id="navbar" class="navbar nav-menu bg-white p-5 rounded shadow-lg">
      <ul>
        <li>
          <a href="<?= site_url(); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path>
            </svg>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('marketplace'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804.02.004c-.015.064-.04.124-.04.192 0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"></path>
            </svg>
            <span>Marketplace</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('kategori'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: white;">
              <path d="M22 8a.76.76 0 0 0 0-.21v-.08a.77.77 0 0 0-.07-.16.35.35 0 0 0-.05-.08l-.1-.13-.08-.06-.12-.09-9-5a1 1 0 0 0-1 0l-9 5-.09.07-.11.08a.41.41 0 0 0-.07.11.39.39 0 0 0-.08.1.59.59 0 0 0-.06.14.3.3 0 0 0 0 .1A.76.76 0 0 0 2 8v8a1 1 0 0 0 .52.87l9 5a.75.75 0 0 0 .13.06h.1a1.06 1.06 0 0 0 .5 0h.1l.14-.06 9-5A1 1 0 0 0 22 16V8zm-10 3.87L5.06 8l2.76-1.52 6.83 3.9zm0-7.72L18.94 8 16.7 9.25 9.87 5.34zM4 9.7l7 3.92v5.68l-7-3.89zm9 9.6v-5.68l3-1.68V15l2-1v-3.18l2-1.11v5.7z"></path>
            </svg>
            <span>Kategori Produk</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('produk'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="M11.13,4.41l4.23,4.23L14.3,9.7,10.06,5.46,8.29,7.23l4.24,4.24-1.06,1.06L7.23,8.29,5.46,10.06,9.7,14.3,8.64,15.36,4.41,11.13C1.86,14,1.55,18,3.79,20.21a5.38,5.38,0,0,0,3.85,1.5,8,8,0,0,0,5.6-2.47l6-6c2.87-2.87,3.31-7.11,1-9.45S14,1.86,11.13,4.41Z"></path>
            </svg>
            <span>Produk</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('pembelian'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM14 14v3h-4v-3H7l5-5 5 5h-3z"></path>
            </svg>
            <span>Pembelian</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('penjualan'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.997.997 0 0 0-.707.293L2.294 5.292A.996.996 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM12 18l-5-5h3v-3h4v3h3l-5 5z"></path>
            </svg>
            <span>Penjualan</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('report'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="M13 2.051V11h8.949c-.47-4.717-4.232-8.479-8.949-8.949zm4.969 17.953c2.189-1.637 3.694-4.14 3.98-7.004h-8.183l4.203 7.004z"></path>
              <path d="M11 12V2.051C5.954 2.555 2 6.824 2 12c0 5.514 4.486 10 10 10a9.93 9.93 0 0 0 4.255-.964s-5.253-8.915-5.254-9.031A.02.02 0 0 0 11 12z"></path>
            </svg>
            <span>Report</span>
          </a>
        </li>
        <!-- <li>
          <a href="<?= site_url('auth/logout'); ?>" class="nav-link scrollto active">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
              <path d="M12 3c-4.963 0-9 4.037-9 9v.001l5-4v3h7v2H8v3l-5-4C3.001 16.964 7.037 21 12 21s9-4.037 9-9-4.037-9-9-9z"></path>
            </svg>
            <span>Logout</span>
          </a>
        </li> -->
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->
  <main id="main">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 col-12">
        <h1 class="pt-3 pb-3 text-white" id="judul-app">Pembukuan <strong>Dagang</strong></h1>
      </div>
      <div class="col-md-6 col-12 text-end">
        <!-- <h3 class="pt-3 pb-3 text-white" id="judul-app"><strong><?= $title; ?></strong></h3> -->
        <a href="<?= site_url('auth/logout'); ?>" class="text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: white;">
            <path d="M12 3c-4.963 0-9 4.037-9 9v.001l5-4v3h7v2H8v3l-5-4C3.001 16.964 7.037 21 12 21s9-4.037 9-9-4.037-9-9-9z"></path>
          </svg>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <?php
    if (isset($file)) {
      $this->load->view($file);
    } else {
    ?>
      <section id="main-content" class="d-flex flex-column justify-content-center bg-white p-2" style="overflow: auto;">
        <div class="container mt-4" data-aos="zoom-in" data-aos-delay="100">
          <h1 class="mb-4">Selamat Datang <strong><?= $this->session->userdata('fullname'); ?></strong></h1>
          <h4><strong>Total Profitmu : Rp <?= number_format($total_profit); ?></strong></h4>
          <br />
          <div class="row d-flex align-items-center mb-4 flex-column-reverse flex-md-row">
            <div class="col-md-4 col-12 mb-3">
              <div class="card shadow">
                <div class="card-body p-4">
                  <div class="row d-flex align-items-center">
                    <div class="col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" style="fill: #feb500;">
                        <path d="M6 21H3a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1zm7 0h-3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1zm7 0h-3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1z"></path>
                      </svg>
                    </div>
                    <div class="col-9">
                      <h4 class="card-title"><b>Pembelian Hari Ini</b></h4>
                      <small class="card-text"><?= $daily_pembelian; ?> item | Rp <?= number_format($total_daily_pembelian->total == NULL ? 0 : $total_daily_pembelian->total); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12 mb-3">
              <div class="card shadow">
                <div class="card-body p-4">
                  <div class="row d-flex align-items-center">
                    <div class="col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" style="fill: #feb500;">
                        <path d="M4,21H21V19H5V3H3V20A1,1,0,0,0,4,21Z"></path>
                        <circle cx="10" cy="8" r="2"></circle>
                        <circle cx="18" cy="12" r="2"></circle>
                        <circle cx="11.5" cy="13.5" r="1.5"></circle>
                        <circle cx="16.5" cy="6.5" r="1.5"></circle>
                      </svg>
                    </div>
                    <div class="col-9">
                      <h4 class="card-title"><b>Penjualan Hari Ini</b></h4>
                      <small class="card-text"><?= $daily_penjualan; ?> item | Rp <?= number_format($total_daily_penjualan->total == NULL ? 0 : $total_daily_penjualan->total); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <h1 class="text-center">
                Per Hari
              </h1>
            </div>
          </div>
          <div class="row d-flex align-items-center">
            <div class="col-md-4 mb-3">
              <h1 class="text-center">
                Per Bulan
              </h1>
            </div>
            <div class="col-md-4 col-12 mb-3">
              <div class="card shadow">
                <div class="card-body p-4">
                  <div class="row d-flex align-items-center">
                    <div class="col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" style="fill: #feb500;">
                        <path d="M13 6h2v11h-2zm4-3h2v14h-2zM9 9h2v8H9zM4 19h16v2H4zm1-7h2v5H5z"></path>
                      </svg>
                    </div>
                    <div class="col-9">
                      <h4 class="card-title"><b>Pembelian Bulan Ini</b></h4>
                      <small class="card-text"><?= $monthly_pembelian; ?> item | Rp <?= number_format($total_monthly_pembelian->total == NULL ? 0 : $total_monthly_pembelian->total); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12 mb-3">
              <div class="card shadow">
                <div class="card-body p-4">
                  <div class="row d-flex align-items-center">
                    <div class="col-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" style="fill: #feb500;">
                        <path d="M5 3H3v18h18v-2H5z"></path>
                        <path d="M13 12.586 8.707 8.293 7.293 9.707 13 15.414l3-3 4.293 4.293 1.414-1.414L16 9.586z"></path>
                      </svg>
                    </div>
                    <div class="col-9">
                      <h4 class="card-title"><b>Penjualan Bulan Ini</b></h4>
                      <small class="card-text"><?= $monthly_penjualan; ?> item | Rp <?= number_format($total_monthly_penjualan->total == NULL ? 0 : $total_monthly_penjualan->total); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
      }
        ?>
        </div>
      </section>
      <div class="pt-2 pb-2 text-white" id="judul-app">
        <pre>copyright &copy; Async <?= date('Y'); ?></pre>
      </div>
  </main><!-- End #main -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
  <script>
    let url = `<?= site_url(); ?>`

    function setHeader() {
      let myHeaders = new Headers();
      myHeaders.append('pragma', 'no-cache')
      myHeaders.append('cache-control', 'no-cache')

      let myInit = {
        method: 'GET',
        headers: myHeaders,
      }
      return myInit
    }

    function setHeaderPost(body) {
      let myHeaders = new Headers();
      myHeaders.append('pragma', 'no-cache')
      myHeaders.append('cache-control', 'no-cache')
      // myHeaders.append('Content-type', 'application/json; charset=utf-8')

      let myInit = {
        method: 'POST',
        headers: myHeaders,
        body: body
      }
      return myInit
    }
  </script>
</body>

</html>