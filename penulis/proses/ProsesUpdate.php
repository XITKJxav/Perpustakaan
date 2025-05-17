<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

include "../../koneksi/koneksi.php";

$id = $_GET["id"] ?? print($redirectDaftar);
$nama = $_POST["nama"] ?? print($redirectDaftar);
$status = $_POST["status"] ?? print($redirectDaftar);

$perintah = "UPDATE tb_penulis SET Nama_Penulis='$nama', status= '$status' WHERE ID_Penulis = '$id'";

$eksekusi = mysqli_query($koneksi, $perintah);

$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    echo "<script>
        alert('data berhasil diubah');
    </script>";
    echo $redirectIndex;
} else {
    echo  "<script>
        alert('gagal diubah');
    </script>";
}
