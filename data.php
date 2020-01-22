<?php
include 'koneksi.php';
if(isset($_GET['act']) && $_GET['act'] == 'delete') {
  $kd_barang = $_GET['id'];
  $data = mysqli_query($db, "DELETE FROM data_barang WHERE kd_barang='$kd_barang'")or die(mysqli_error());
}
if(isset($_POST['update'])){
 
  $kategori = addslashes($_POST['kategori']);
  $deskripsi = addslashes($_POST['deskripsi']);
  $jmlh = addslashes($_POST['jmlh']);
  $hb = addslashes($_POST['hb']);
  $nama = addslashes($_POST['nama']);
	$image = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $folder = './img/';
  if($image !=''){
    move_uploaded_file($tmp, $folder.$image);
        $update = mysqli_query($db, "UPDATE data_barang SET
        nama = '".$nama."',
        deskripsi = '".$deskripsi."',
        jmlh = '".$jmlh."',
        hb = '".$hb."',
        kategori = '".$kategori."',
        image = '".$image."'
        WHERE kd_barang = '".$_GET['id']."'
    ");
}else{
    $update = mysqli_query($db, "UPDATE data_barang SET
    nama = '".$nama."',
        deskripsi = '".$deskripsi."',
        jmlh = '".$jmlh."',
        hb = '".$hb."',
        kategori = '".$kategori."'
    WHERE kd_barang = '".$_GET['id']."'
    ");
}
}


if(isset($_POST['tambah'])){
  $kd_barang = addslashes($_POST['kd_barang']);
  $kategori = addslashes($_POST['kategori']);
  $deskripsi = addslashes($_POST['deskripsi']);
  $jmlh = addslashes($_POST['jmlh']);
  $hb = addslashes($_POST['hb']);
  $nama = addslashes($_POST['nama']);
	$image = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $folder = './img/';
  move_uploaded_file($tmp, $folder.$image);
      $query = mysqli_query($db, "INSERT INTO data_barang VALUES ('$kd_barang','$nama','$kategori','$deskripsi','$jmlh','$hb','$image',null)");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="data.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Asset</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="penempatan.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Penempatan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="lokasi.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Lokasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="kategori.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Kategori Produk</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="cetakasset.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export to PDF</a>
          </div>

          <!-- Content Row -->
          <p class="mb-4">Masukan Asset Anda</p>
					<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
					<a class="btn border-info" data-target="#tambah" data-toggle="modal" role="button">Tambah</a>
					</h6>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<form action="" method="POST">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NO</th>
										<th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                <?php
                $no=1;
                $data = mysqli_query($db, "SELECT * FROM data_barang");
                while($isi = mysqli_fetch_array($data)){
                ?>
                <tr>
                <td><?= $no++?></td>
                <td><?= $isi['nama']; ?></td>
                <td><?= $isi['kategori']; ?></td>
                <td><img src="img/<?= $isi['image']?>" width="90px" height="50px"> </td>
                <td><?= $isi['jmlh']; ?></td>
                <td>
                <a class="edit badge badge-info text-white" data-target="#view-<?= $isi['kd_barang']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_barang']?>">VIEW</a> |
                <a class="edit badge badge-primary text-white" data-target="#edit-<?= $isi['kd_barang']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_barang']?>">Edit</a> |
                <a class="del badge badge-danger" role="button" href="data.php?id=<?= $isi['kd_barang']; ?>&act=delete">Hapus</a>
                <?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>NO</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
							</table>
						</form>
					</div>
				</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="data.php" method="POST" enctype="multipart/form-data">
							<table class="table table-borderless">
								<tr>
									<th>Kode</th>
									<td>
										<input type="text" name="kd_barang">
									</td>
								</tr>
								<tr>
									<th>Nama Barang</th>
									<td>
										<input type="text" name="nama">
									</td>
                </tr>
                <tr>
                  <th>Kategori</th>
                  <td>
                    <select name="kategori">
                      <option value="komputer">Komputer</option>
                      <option value="kursi">kursi</option>
                      <option value="meja">Meja</option>
                    </select>
                  </td>
                </tr>
                <tr>
                <th>Deskripsi</th>
                  <td>
                    <textarea name="deskripsi" id="" cols="50" rows="3"></textarea>
                  </td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                    <td><input type="text" name="jmlh"></td>
                </tr>
                <tr>
                  <th>Harga Beli</th>
                    <td><input type="text" name="hb"></td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td><input type="file" name="image"><td>
                </tr>
								<tr>
									<td>
										<input type="submit" value="tambah" class="btn btn-outline-primary" name="tambah">
									</td>
                </tr>
              </table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

  <?php
	$data = mysqli_query($db, "SELECT * FROM data_barang");
	while($isi = mysqli_fetch_array($data)){
    ?>
	<div class="modal fade" id="edit-<?= $isi['kd_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="data.php?id=<?= $isi['kd_barang']; ?>" method="POST" enctype="multipart/form-data">
							<table class="table table-borderless">
              <tr>
									<th>Kode Barang</th>
									<td>
									<?= $isi['kd_barang']; ?>
									</td>
                </tr>
								<tr>
									<th>Nama Barang</th>
									<td>
										<input type="text" name="nama" value="<?= $isi['nama']; ?>">
									</td>
                </tr>
                <tr>
                  <th>Kategori</th>
                  <td>
                    <select name="kategori" value="<?= $isi['kategori']; ?>">
                    <?php
                  $data = mysqli_query($db, "SELECT *from kategori");
                  while($isi = mysqli_fetch_array($data)){
                  ?>
                      <option value="<?= $isi['kategori']; ?>"><?= $isi['kategori']; ?></option>
                  <?php } ?>
                  </td>
                </tr>
                <tr>
                <th>Deskripsi</th>
                  <td>
                    <textarea name="deskripsi" cols="50" rows="3" value="<?= $isi['deskripsi']; ?>"><?= $isi['deskripsi']; ?></textarea>
                  </td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                    <td><input type="text" name="jmlh"  value="<?= $isi['jmlh']; ?>"></td>
                </tr>
                <tr>
                  <th>Harga Beli</th>
                    <td><input type="text" name="hb" value="<?= $isi['hb']; ?>"></td>
                </tr>
                <tr>
                  <th>Image</th>

                  <td> <input type="hidden" name="gambar" value="<?php echo $file ?>"><input type="file" name="image"><td>
                </tr>
								<tr>
									<td>
										<input type="submit" value="update" class="btn btn-outline-primary" name="update">
									</td>
                </tr>
              </table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>



  <?php
    $data = mysqli_query($db, "SELECT * FROM data_barang");
    while($isi = mysqli_fetch_array($data)){
  ?>
  <div class="modal fade" id="view-<?= $isi['kd_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $isi['nama']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="data.php" enctype="multipart/form-data">
							<table class="table table-borderless">
								<tr>
									<th>Kode</th>
									<td>
										<?= $isi['kd_barang']; ?>
									</td>
								</tr>
								<tr>
									<th>Nama Barang</th>
									<td>
                    <?= $isi['nama']; ?>
									</td>
                </tr>
               <tr>
                  <th>Kategori</th>
                    <td>
                    <?= $isi['kategori']; ?>
                    </td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                    <td>
                    <?= $isi['deskripsi']; ?>
                    </td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                    <td><?= $isi['jmlh']; ?> </td>
                </tr>
                <tr>
                  <th>Harga Beli</th>
                    <td><?= $isi['hb']; ?> </td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td><img src="img/<?= $isi['image']?>" width="90px" height="50px"> </td>
                </tr>
              </table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="vendor/chart.js/Chart.min.js"></script>

  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>
