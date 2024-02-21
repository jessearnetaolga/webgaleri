<?php
include 'db.php';

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];

// Simpan data ke dalam database
$sql = "INSERT INTO komentar (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("tambah KOMENTAR berhasil")</script>';
                    echo '<script>window.location="index.php"</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>