<?php
    session_start();
    include_once 'inc/class.user.php';
    include_once 'inc/class.data.php';
    $user = new User();
    $data = new Data();

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
    <meta name="description" content="Create a barcode">
    <meta name="author" content="Dirga and Bakti">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Admin Page - Update Barang</title>

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

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <a class="text-white">Welcome, <?php $user->get_fullname($id); ?>!</a>
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

        <li class="nav-item">
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
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Update Barang</li>
          </ol>

          <!-- Page Content -->
        <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-box"></i> Update Barang</div>
            <div class="card-body">
            <?php
            $kodebarang=$_GET["kodebarang"];
            $row = $data->cek_data_barang($kodebarang);
            if (isset($_POST['submit'])){
              extract($_POST);
              $inputdata = $data->update_data_barang($kodebarang, $namabarang, $jumlahbarang, $rak);
              if ($inputdata) {
                echo '<div class="alert alert-primary" role="alert">Data Barang Telah Diubah</div>';
                header( "refresh:2; url=data.php" ); 
              } else {
                echo '<div class="alert alert-danger" role="alert">Data Barang Gagal Diubah</div>';
              }
            }
            ?>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nama Barang:</span>
                    </div>
                    <input type="text" class="form-control" name="namabarang" value="<?php echo $row["namabarang"]; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Jumlah Barang:</span>
                    </div>
                    <input type="text" class="form-control" name="jumlahbarang" value="<?php echo $row["jumlah"]; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Simpan Pada Rak:</span>
                    <select class="form-control" name="rak">
                      <option value="1" <?php if($row['rak'] == '1'){ echo "selected";} ?>>1</option>
                      <option value="2" <?php if($row['rak'] == '2'){ echo "selected";} ?>>2</option>
                      <option value="3" <?php if($row['rak'] == '3'){ echo "selected";} ?>>3</option>
                    </select>
                    </div>
                </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary" onclick="">
            </form>
            </div>
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
            <a class="btn btn-primary" href="update_barang.php?q=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
</body>
</html>
