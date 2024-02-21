<?php
include 'db.php';

if (isset($_GET['idp'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '" . $_GET['idp'] . "' ");
    echo '<script>window.location="tambah-kategori.php"</script>';
}