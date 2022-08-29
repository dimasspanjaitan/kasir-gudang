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
        <title>Barang Masuk - Kasir Gudang</title>
        <link href="css/datatables-style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/font-awesome.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- TOPBAR HEADER -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">KASIR GUDANG</a>
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
                            <a class="nav-link active" href="masuk.php">
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

            <!-- ISI KONTEN -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- JUDUL -->
                        <h1 class="mt-4">Barang Masuk</h1> 
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
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Supplier</th>
                                            <th>User</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            $getdata_masuk = mysqli_query($connect, "SELECT * FROM masuk INNER JOIN barang ON barang.id = masuk.id_barang INNER JOIN supplier ON supplier.id = masuk.id_supplier INNER JOIN users ON users.id = masuk.id_user");
                                            foreach($getdata_masuk as $data){
                                                $tanggal = $data['tanggal_masuk'];
                                                $nama_barang = $data['nama_barang'];
                                                $supplier = $data['nama_supplier'];
                                                $user = $data['nama_user'];
                                                $jumlah = $data['qty_masuk'];
                                                $keterangan = $data['keterangan_masuk'];
                                        ?>
                                            <tr>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $nama_barang ?></td>
                                                <td><?= $supplier ?></td>
                                                <td><?= $user ?></td>
                                                <td><?= $jumlah ?></td>
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

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang Masuk</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <!-- Select data barang -->
                        <div class="row">
                            <div class="col">
                                <!-- NAMA BARANG -->
                                <label for="barang_masuk" class="form-label"><small>Nama Barang</small></label>
                                <select name="barang_masuk" id="barang_masuk" class="form-control">
                                    <?php
                                        $data_barang = mysqli_query($connect, "SELECT * FROM barang");
                                        while($datab = mysqli_fetch_array($data_barang) ){
                                            $id = $datab['id'];
                                            $nama_barang = $datab['nama_barang'];
                                    ?>
                                    <!-- value untuk menyimpan nilai select berupa id barang -->
                                    <!-- yang ditampilkan adalah nama barang -->
                                    <option value="<?= $id; ?>"> <?= $nama_barang; ?> </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- input jumlah barang keluar -->
                            <div class="col">
                                <label for="qty" class="form-label"><small>Jumlah Barang</small></label>
                                <input type="number" name="qty" id="qty" placeholder="Jumlah Quantity" class="form-control" required>
                            </div>
                        </div>
                        <!-- Select data supplier -->
                        <div class="row pt-3">
                            <div class="col">
                                <label for="supplier_masuk" class="form-label"><small>Nama Supplier</small></label>
                                <select name="supplier_masuk" id="supplier_masuk" class="form-control">
                                    <?php
                                        $data_supplier = mysqli_query($connect, "SELECT * FROM supplier");
                                        while($datas = mysqli_fetch_array($data_supplier) ){
                                            $id = $datas['id'];
                                            $nama_supplier = $datas['nama_supplier'];
                                    ?>
                                    
                                    <option value="<?= $id; ?>"> <?= $nama_supplier; ?> </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Select data user penerima -->
                        <div class="row pt-3">
                            <div class="col">
                                <label for="user_masuk" class="form-label"><small>Penerima/User</small></label>
                                <select name="user_masuk" id="user_masuk" class="form-control">
                                    <?php
                                        $data_users = mysqli_query($connect, "SELECT * FROM users");
                                        while($datau = mysqli_fetch_array($data_users) ){
                                            $id = $datau['id'];
                                            $nama_user = $datau['nama_user'];
                                    ?>
                                    
                                    <option value="<?= $id; ?>"> <?= $nama_user; ?> </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label for="keterangan_masuk" class="form-label"><small>Keterangan</small></label>
                                <input type="text" name="keterangan_masuk" id="keterangan_masuk" placeholder="Keterangan" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="save_masuk">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</html>
