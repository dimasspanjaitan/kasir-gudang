<?php 
    require 'function.php';
    require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<<<<<<< HEAD
        <title>Supplier - Bening's</title>
=======
        <title>Supplier - Gudang</title>
>>>>>>> 2f25da4d76b676add21cf5d9f043b8273c48a44d
        <link href="css/datatables-style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/font-awesome.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
		<!-- TOPBAR HEADER -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
<<<<<<< HEAD
            <a class="navbar-brand ps-3" href="index.php">BENING'S MEMUT</a>
=======
            <a class="navbar-brand ps-3" href="index.php">GUDANG</a>
>>>>>>> 2f25da4d76b676add21cf5d9f043b8273c48a44d
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
		
		<!-- KONTEN -->
        <div id="layoutSidenav">
			<!-- SIDEBAR -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                        Stok Barang
                                    </a>
                                    <a class="nav-link active" href="supplier.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-parachute-box"></i></div>
                                        Supplier
                                    </a>
                                    <a class="nav-link" href="mandor.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-parachute-box"></i></div>
                                        Mandor
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-down"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-up"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>
                    </div>
                </nav>
            </div>
			
			<!-- KONTEN -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
						<!-- JUDUL -->
                        <h1 class="mt-4">Data Supplier</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getdata_supplier = mysqli_query($connect, "SELECT * FROM supplier");
                                            foreach($getdata_supplier as $datas){
                                                $id = $datas['id'];
                                                $nama_supplier = $datas['nama_supplier'];
                                                $alamat = $datas['alamat'];
                                                $telp = $datas['telp'];
                                                $keterangan = $datas['keterangan_supplier'];
                                        ?>
                                            <tr>
                                                <td width="5px"><?= $id ?></td>
                                                <td><?= $nama_supplier ?></td>
                                                <td><?= $alamat ?></td>
                                                <td><?= $telp ?></td>
                                                <td><?= $keterangan ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
				
				<!-- FOOTER -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
<<<<<<< HEAD
                            <div class="text-muted">Copyright &copy; Bening's Medan SUMUT 2022</div>
=======
                            <div class="text-muted">Copyright &copy; Christin Lubis 2022</div>
>>>>>>> 2f25da4d76b676add21cf5d9f043b8273c48a44d
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

   <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Supplier</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="nama_supplier" placeholder="Nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <input type="text" name="telp" placeholder="Nomor Telp: 08xx-xxxx-xxxx" class="form-control" required>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <input type="text" name="keterangan_supplier" placeholder="Keterangan" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="save_supplier">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</html>
