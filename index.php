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
        <title>Stok Barang - Bening's</title> 
=======
        <title>Stok Barang - Gudang</title> 
>>>>>>> 2f25da4d76b676add21cf5d9f043b8273c48a44d
        <link href="css/datatables-style.css" rel="stylesheet" /> <!-- memanggil resource tampilan table -->
        <link href="css/styles.css" rel="stylesheet" /> <!-- memanggil resource tampilan keseluruhan -->
        <script src="js/font-awesome.min.js" crossorigin="anonymous"></script> <!-- memanggil resource untuk font dan icon -->
    </head>
    <body class="sb-nav-fixed">
        <!-- Header -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
<<<<<<< HEAD
            <a class="navbar-brand ps-3" href="index.php">BENING'S MEMUT</a> <!-- menampilkan logo atau nama gudang -->
=======
            <a class="navbar-brand ps-3" href="index.php">GUDANG</a> <!-- menampilkan logo atau nama gudang -->
>>>>>>> 2f25da4d76b676add21cf5d9f043b8273c48a44d
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> <!-- untuk menyembunyikan dan menampilkan sidebar -->
        </nav>

        <!-- Menampilkan SIDEBAR & isi KONTEN -->
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
                                    <a class="nav-link active" href="index.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                        Stok Barang
                                    </a>
                                    <a class="nav-link" href="supplier.php">
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
                        <h1 class="mt-4">Stok Barang</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah
                                </button>
                            </div>
                            <!-- TABEL -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $getdata_barang = mysqli_query($connect, "SELECT * FROM barang");
                                            foreach($getdata_barang as $data){
                                                $id = $data['id'];
                                                $nama_barang = $data['nama_barang'];
                                                $stok = $data['stok'];
                                                $deskripsi = $data['deskripsi'];
                                        ?>
                                            <tr>
                                                <td width="5px"><?= $id ?></td>
                                                <td><?= $nama_barang ?></td>
                                                <td><?= $deskripsi ?></td>
                                                <td><?= $stok ?></td>
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
    <div class="modal fade" id="myModal"> <!-- id modal yang akan dipanggil di tombol tambah -->
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <!-- Nama barang -->
                            <div class="col">
                                <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required>
                            </div>
                            <!-- jumlah qty -->
                            <!-- <div class="col">
                                <input type="number" name="stok" placeholder="Jumlah Stok" class="form-control" required>
                            </div> -->
                        </div>
                        <div class="row pt-3">
                            <!-- deskripsi -->
                            <div class="col">
                                <input type="text" name="deskripsi" placeholder="Harga (contoh: 350.000)" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="save_barang">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</html>
