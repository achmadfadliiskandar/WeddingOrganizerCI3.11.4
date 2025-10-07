<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
          <div>
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/skydash-admin-template" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i class="ti-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="ti-close text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- partial:partials/_navbar.html -->
    <?php include 'navbar.php' ?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar.php' ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold"><?php echo $title1; ?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <main>
          <?php echo $content; ?>
          </main>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/dataTables.select.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/template.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/settings.js"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/jquery.cookie.js" type="text/javascript"></script>
  <script src="<?= base_url(uri: 'assets/skydash/skydash-v.01/') ?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>