<?php
 session_start();
 if($_SESSION['status_login'] != true){
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
            <li><a href="data-image.php">data foto</a></li>
            <li><a href="keluar.php">keluar</a></li>
         </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
               <div class="box">
                    <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Website Galeri Foto</h4>
               </div>
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