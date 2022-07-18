<?php
    session_start();

    // Membuat koneksi ke database
    $connect = mysqli_connect("localhost", "root", "", "kasir-gudang");

    // Menambah barang baru
    if(isset($_POST['save_barang'])){
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];

        $tambah_barang = mysqli_query($connect, "INSERT INTO barang (nama_barang, stok, deskripsi) VALUES('$nama_barang','$stok','$deskripsi')");
        if ($tambah_barang) {
            header('location:index.php');
        }else{
            echo 'gagal';
            header('location:index.php');
        }
    }

    // Menambah barang masuk
    if(isset($_POST['save_masuk'])){
        $barang_masuk = $_POST['barang_masuk'];
        $qty = $_POST['qty'];
        $penerima = $_POST['penerima'];

        $cek_stok = mysqli_query($connect, "SELECT * FROM barang where id='$barang_masuk'"); // ambil data dari tabel barang berdasarkan id barang masuk
        $getdata = mysqli_fetch_array($cek_stok); // ubah ke array

        $current_stok = $getdata['stok']; // ambil data stok sekarang
        $final_stok = $current_stok + $qty; // stok sekarang ditambah qty barang masuk

        $tambah_barang_masuk = mysqli_query($connect, "INSERT INTO masuk (id_barang, qty, penerima) VALUES('$barang_masuk', '$qty', '$penerima')"); // menyimpan data barang masuk
        $update_stok_masuk = mysqli_query($connect, "UPDATE barang SET stok='$final_stok' WHERE id='$barang_masuk'"); // update data stok di tabel barang

        if ($tambah_barang_masuk && $update_stok_masuk) {
            header('location:masuk.php');
        }else{
            echo 'gagal';
            header('location:masuk.php');
        }
    }

    // Menambah barang keluar
    if(isset($_POST['save_keluar'])){
        $barang_keluar = $_POST['barang_keluar'];
        $qty = $_POST['qty'];
        $keterangan = $_POST['keterangan'];

        $cek_stok = mysqli_query($connect, "SELECT * FROM barang where id='$barang_keluar'"); // ambil data dari tabel barang berdasarkan id barang keluar
        $getdata = mysqli_fetch_array($cek_stok); // ubah ke array

        $current_stok = $getdata['stok']; // ambil data stok sekarang
        $final_stok = $current_stok - $qty; // stok sekarang dikurang qty barang keluar

        $tambah_barang_keluar = mysqli_query($connect, "INSERT INTO keluar (id_barang, qty, keterangan) VALUES('$barang_keluar', '$qty', '$keterangan')"); // menyimpan data barang keluar
        $update_stok_keluar = mysqli_query($connect, "UPDATE barang SET stok='$final_stok' WHERE id='$barang_keluar'"); // update data stok di tabel barang

        if ($tambah_barang_keluar && $update_stok_keluar) {
            header('location:keluar.php');
        }else{
            echo 'gagal';
            header('location:keluar.php');
        }
    }
?>