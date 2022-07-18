<?php
    session_start();

    // Membuat koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "kasir-gudang");

    // Menambah barang baru
    if(isset($_POST['save'])){
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];

        $tambah_barang = mysqli_query($connect, "INSERT INTO stok (nama_barang, stok, deskripsi) VALUES('$nama_barang','$stok','$deskripsi')");
        if ($tambah_barang) {
            header('location:index.php');
        }else{
            echo 'gagal';
            header('location:index.php');
        }
    }
?>