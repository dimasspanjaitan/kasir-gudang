<?php
    session_start();

    // Membuat koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "kasir-gudang"); // ("alamat database", "username database", "password database", "nama database")

    // Menambah barang baru
    if(isset($_POST['save_barang'])){
        $nama_barang = $_POST['nama_barang'];
        // $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];

        $tambah_barang = mysqli_query($connect, "INSERT INTO barang (nama_barang, deskripsi) VALUES('$nama_barang', '$deskripsi')");

        if ($tambah_barang) {
            header('location:index.php');
        }else{
            echo 'gagal';
            header('location:index.php');
        }
    }

    // Menambah barang masuk
    // ketika ada perubahan di tombol save_masuk
    if(isset($_POST['save_masuk'])){
        $barang_masuk = $_POST['barang_masuk'];
        $supplier_masuk = $_POST['supplier_masuk'];
        $user_masuk = $_POST['user_masuk'];
        $qty = $_POST['qty'];
        $keterangan_masuk = $_POST['keterangan_masuk'];

        $cek_stok = mysqli_query($connect, "SELECT * FROM barang WHERE id='$barang_masuk'"); // ambil data dari tabel barang dimana id barang sama dengan id barang masuk dari modal
        $getdata = mysqli_fetch_array($cek_stok); // ubah ke array

        $current_stok = $getdata['stok']; // ambil data stok sekarang
        $final_stok = $current_stok + $qty; // stok sekarang ditambah qty barang masuk yang diunput di modal

        // Ini menyimpan data ke table data barang masuk
        $tambah_barang_masuk = mysqli_query($connect, "INSERT INTO masuk (id_barang, id_supplier, id_user, qty_masuk, keterangan_masuk) VALUES('$barang_masuk', '$supplier_masuk', '$user_masuk', '$qty', '$keterangan_masuk')");
        $transaksi_masuk = mysqli_query($connect, "INSERT INTO trx_log (id_barang, tipe, qty, current_stok) VALUES('$barang_masuk', 1, '$qty', '$final_stok')");
        // meng-update data yang ada di stok
        $update_stok_masuk = mysqli_query($connect, "UPDATE barang SET stok='$final_stok' WHERE id='$barang_masuk'");

        if ($tambah_barang_masuk && $transaksi_masuk && $update_stok_masuk) {
            header('location:masuk.php');
        }else{
            echo 'gagal';
            header('location:masuk.php');
        }
    }

    // Menambah barang keluar
    if(isset($_POST['save_keluar'])){
        $barang_keluar = $_POST['barang_keluar'];
        $mandor_keluar = $_POST['mandor_keluar'];
        $user_keluar = $_POST['user_keluar'];
        $qty = $_POST['qty'];
        $keterangan_keluar = $_POST['keterangan_keluar'];

        $cek_stok = mysqli_query($connect, "SELECT * FROM barang where id='$barang_keluar'"); // ambil data dari tabel barang berdasarkan id barang keluar
        $getdata = mysqli_fetch_array($cek_stok); // ubah ke array

        $current_stok = $getdata['stok']; // ambil data stok sekarang
        $final_stok = $current_stok - $qty; // stok sekarang dikurang qty barang keluar

        $tambah_barang_keluar = mysqli_query($connect, "INSERT INTO keluar (id_barang, id_mandor, id_user, qty_keluar, keterangan_keluar) VALUES('$barang_keluar', '$mandor_keluar', '$user_keluar', '$qty', '$keterangan_keluar')"); // menyimpan data barang keluar
        $transaksi_keluar = mysqli_query($connect, "INSERT INTO trx_log (id_barang, tipe, qty, current_stok) VALUES('$barang_keluar', 2, '$qty', '$final_stok')");
        $update_stok_keluar = mysqli_query($connect, "UPDATE barang SET stok='$final_stok' WHERE id='$barang_keluar'"); // update data stok di tabel barang

        if ($tambah_barang_keluar && $transaksi_keluar && $update_stok_keluar) {
            header('location:keluar.php');
        }else{
            echo 'gagal';
            header('location:keluar.php');
        }
    }

    // Menambah supplier baru
    if(isset($_POST['save_supplier'])){
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $keterangan_supplier = $_POST['keterangan_supplier'];

        $tambah_supplier = mysqli_query($connect, "INSERT INTO supplier (nama_supplier, alamat, telp, keterangan_supplier) VALUES('$nama_supplier','$alamat', '$telp','$keterangan_supplier')");
        
        if ($tambah_supplier) {
            header('location:supplier.php');
        }else{
            echo 'gagal';
            header('location:supplier.php');
        }
    }

    // Menambah mandor baru
    if(isset($_POST['save_mandor'])){
        $nama_mandor = $_POST['nama_mandor'];
        $keterangan_mandor = $_POST['keterangan_mandor'];

        $tambah_mandor = mysqli_query($connect, "INSERT INTO mandor (nama_mandor, keterangan_mandor) VALUES('$nama_mandor','$keterangan_mandor')");
        
        if ($tambah_mandor) {
            header('location:mandor.php');
        }else{
            echo 'gagal';
            header('location:mandor.php');
        }
    }
?>