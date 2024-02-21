<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<header>
        <div class="container">
         <h1><a href="dashboard.php">web galeri foto</a></h1>
         <ul>
            <li><a href="dashboard.php">dashboard</a></li>
            <li><a href="profil.php">profil</a></li>
            <li><a href="data-image.php.php">data foto</a></li>
            <li><a href="keluar.php">keluar</a></li>
         </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>data galeri foto</h3>
            <div class="box">
                <p><a class="btn btn-primary" href="tambah-image.php">tambah data</a></p><br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">no</th>
                            <th>kategori</th>
                            <th> nama user</th>
                            <th>nama foto</th>
                            <th>deskripsi</th>
                            <th>gambar</th>
                            <th>status</th>
                            <th width="180px">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $user = $_SESSION['a_global']->admin_id;
                        $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id =
'$user' ");
                        if (mysqli_num_rows($foto) > 0) {
                            while ($row = mysqli_fetch_array($foto)) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['admin_name'] ?></td>
                                    <td><?php echo $row['image_name'] ?></td>
                                    <td><?php echo $row['image_description'] ?></td>
                                    <td><a href="foto/<?php echo $row['image'] ?>" target="_blank"><img src="foto/<?php echo$row['image'] ?>" width="50px"></a></td>
                                    <td><?php echo ($row['image_status'] == 0) ? 'Tidak Aktif': 'Aktif'; ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a>
                                        <a class="btn btn-primary" href="proses-hapus.php?idp=<?php echo$row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - JESSE ARNETA WEB GALERI FOTO</small>
        </div>
    </footer>
</body>

</html>