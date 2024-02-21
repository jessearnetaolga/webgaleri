<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
    $produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id ='".$_GET['id']."'");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data-image.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
    $komentar = mysqli_query($conn, "SELECT * FROM komentar where id ");
    $k = mysqli_fetch_object($komentar)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
             <ul>
                <li><a href="galeri.php">galeri</a></li>
                <li><a href="registrasi.php">registrasi</a></li>
                <li><a href="login.php">login</a></li>
             </ul>
        </div>
    </header>

    <!-- search -->
    <div class= "search">
        <div class= "container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari foto" />
                <input type="submit" name="Cari" value="Cari foto" />
            </form>
        </div>
    </div>
    <!-- category -->
     <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
              <div class="col-2">
                  <img src="foto/<?php echo $p->image ?>" width="100%"/>
              </div>
              <div class="col-2">
                   <h3><?php echo $p->image_name?><br />kategori : <?php echo $p->category_name ?></h3>
                   <h4>Nama User : <?php echo $p->admin_name ?><br /> uplod pada tanggal : <?php echo $p->date_created ?></h4>
                   <p>deskripsi :<br /><?php echo $p->image_description ?></p> 
              </div>
              <div class="container">
              <h2>komentar</h2><br>

<form action="proses-komentar.php" method="post">
    <label for="name">nama:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="name">email:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="comment">komentar:</label><br>
    <textarea id="comment" name="comment" rows="4" required></textarea><br><br>
    
    <button type="submit">Submit</button>
</form>
</div>

            </div>
        </div>
     </div>
    

    
     <!-- footer -->
     <footer>
        <div class="container">
           <small>Copyright &copy; 2024 - Jesse Arneta Web Galeri Foto </small>
        </div>
     </footer>
</body>
</html>