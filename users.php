<?php 
    session_start();
    include_once 'inc/class.user.php';
    $user = new User();

    $id = $_SESSION['id'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Data Users">
    <meta name="author" content="Dirga and Bakti">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Admin Page - Data User</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>
<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Admin Page</a>

      <!-- Navbar Admin Name -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
          <a class="text-white">Welcome, <?=$user->get_fullname($id);?>!</a>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
      <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#logoutModal">Logout</button>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="input.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Input Barang</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="data.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Barang</span></a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="users.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="register.php">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah User</span></a>
        </li>
      </ul>


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Data User</li>
          </ol>

          <!-- Data User -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-users"></i>
              Data User</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>id</th>
                        <th>Username</th>
                        <th>Tanggal Buat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $user->get_user_data(); ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small"></div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Created by: Dirga Brajamusti and Bakti Qilan Mufid</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda ingin logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Silahkan klik tombol "Logout" untuk mengakhiri session anda</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="users.php?q=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
