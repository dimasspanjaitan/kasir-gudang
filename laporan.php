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
        <title>Laporan - Gudang</title>
        <link href="css/datatables-style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/font-awesome.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- TOPBAR HEADER -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">GUDANG</a>
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
                            <a class="nav-link active" href="laporan.php">
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

            <!-- ISI KONTEN -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- JUDUL -->
                        <h1 class="mt-4">Laporan</h1> 
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Awal</th>
                                            <th>Tipe</th>
                                            <th>Jumlah</th>
                                            <th>Stok Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            $getdata_laporan = mysqli_query($connect, "SELECT * FROM trx_log LEFT JOIN barang ON barang.id = trx_log.id_barang ORDER BY trx_log.tanggal DESC");
                                            foreach($getdata_laporan as $data){
                                                $tanggal = $data['tanggal'];
                                                $nama_barang = $data['nama_barang'];
                                                $stok_awal = $data['current_stok'] - $data['qty'];
                                                $tipe = $data['tipe'] == 1 ? "Masuk" : "Keluar";
                                                $jumlah = $data['qty'];
                                                $stok_akhir = $data['current_stok'];
                                        ?>
                                            <tr>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $nama_barang ?></td>
                                                <td><?= $stok_awal ?></td>
                                                <td><?= $tipe ?></td>
                                                <td><?= $jumlah ?></td>
                                                <td><?= $stok_akhir ?></td>
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
                            <div class="text-muted">Copyright &copy; Christin Lubis 2022</div>
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
</html>
