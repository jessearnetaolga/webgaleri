<?php
 session_start();
 include 'db.php';
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



        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
              <form action="" method="POST" enctype="multipart/form-data">
              <?php $result = mysqli_query($conn,"select * from tb_category"); $jsArray = "var prdName = new Array();\n";
                    echo '<select class="input-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>
                    <option>-Pilih Kategori Foto-</option>';while ($row = mysqli_fetch_array($result)){ echo ' <option value="' . $row['category_id'] .'">' . $row['category_name'] . '</option>';
                    $jsArray .="prdName['" . $row['category_id']. "'] = '" . addslashes($row['category_name']) . "';\n";}echo '</select>';?>
            </select>
               <input type="hidden" name="nama_kategori" id="prd_name">
               <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
               <input type="text" name="namaadmin"  class="input-control" value="<?php echo $_SESSION['a_global']->admin_name ?>" readonly="readonly">
               <input type="text" name="nama"  class="input-control" placeholder="nama foto" required>
               <textarea class="input-control" name="deskripsi" placeholder="deskripsi"></textarea><br />
               <input type="file" name="gambar" class="input-control" required>
               <select class="input-control" name="status">
                <option value="">--pilih--</option>
                <option value="1">aktif</option>
                <option value="">tidak aktif</option>
            </select>
            <input type="submit" name="submit" value="submit" class="btn">
              </form>
              <?php
              if(isset($_POST['submit'])){

                $kategori =$_POST['kategori'];
                $nama_ka =$_POST['nama_kategori'];
                $ida =$_POST['adminid'];
                $user =$_POST['namaadmin'];
                $nama =$_POST['nama'];
                $deskripsi =$_POST['deskripsi'];
                $status =$_POST['status'];

                $filename= $_FILES['gambar']['name'];
                $tmp_name= $_FILES['gambar']['tmp_name'];

                $type1=explode('.', $filename);
                $type2 = $type1[1];

                $newname = 'foto' .time().'.'.$type2;

                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                if(!in_array($type2, $tipe_diizinkan)){
                    echo '<script>alert("format file tidak diizinkan")</script>';

                }else{
                    move_uploaded_file($tmp_name, './foto/'.$newname);
                    $insert = mysqli_query($conn, "INSERT INTO tb_image VALUES
                    (null,
                    '".$kategori."',
                    '".$nama_ka."',
                    '".$ida."',
                    '".$user."',
                    '".$nama."',
                    '".$deskripsi."',
                    '".$newname."',
                    '".$status."',
                    null)
                    ");
                    if($insert){
                        echo '<script>alert("tambah foto berhasil")</script>';
                        echo '<script>window.location("data-image.php")</script>';

                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                }

              }
              ?>
            </div>
        </div>
   
    <footer>
        <div class="container">
           <small>Copyright &copy; 2024 - JESSE ARNETA WEB GALERI FOTO</small>
        </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
    <script type="text/javascript"><?php echo $jsArray; ?></script>
</body>
</html>