<?php
include 'db.php';
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
    <!-- contect --> 
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div div class="box">
                <form action="" method="POST">
                 <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                 <input type="text" name="user" placeholder="username" class="input-control" required>
                 <input type="text" name="pass" placeholder="password" class="input-control" required>
                 <input type="text" name="tlp" placeholder="Nomor telpon" class="input-control" required>
                 <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                 <input type="text" name="almt" placeholder="alamat" class="input-control" required>
                 <input type="submit"name="submit" value="submit" class="btn" required>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']);
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $telpon = $_POST['tlp'];
                    $mail = $_POST['email'];
                    $alamat = ucwords($_POST['almt']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES 
                    (null,
                    '".$nama."',
                     '".$username."',
                     '".$password."',
                     '".$telpon."',
                     '".$mail."',
                     '".$alamat."')
                     ");
                     if($insert){
                        echo '<script>alert("Registrasi berhasil")</script>';
                        echo '<script>window.location="login.php"</script>';
                     }else{
                        echo 'gagal '.mysqli_error($conn);
                    }
                    }                     
                ?>
            </div>
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