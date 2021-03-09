<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulcss.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- my css -->
	
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="animation.js"></script>
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<title>Account</title>
</head>
<style>

.list{
    transition: 0.2s;
}
.list:hover{
    background-color: rgba(49, 49, 49, 0.4);
    border-radius: 10px;
}
</style>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigasi" style="background-color: rgba(69, 255, 218, 0.7); top:-75px" >
      <div class="container">
        <a class="navbar-brand mx-3 text-warning" href="#akun"><strong>ELC Indonesia</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item ">
              <a class="list nav-link mx-3 my-2 fw-bold text-white" aria-current="page" href="modul.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="list nav-link mx-3 my-2 fw-bold text-white" href="account.php">Account</a>
            </li>
            <li class="nav-item mx-2 my-2">
				<span>
				<form method="post" action="account.php">
					<input type="submit" name="keluar" value="LogOut" class="text-center form-control py-2 px-3 bg-warning rounded-pill text-secondary" onclick="javascript: return confirm('Are you sure you want to logOut?')">
				</form>
				</span>
            </li>
          </ul>
        </div>
    </div>
</nav>

	<?php
	if(isset($_POST['keluar'])){
	$_SESSION['idlogin']= '';
	unset($_SESSION['idlogin']);
	session_unset();
	session_destroy();
	header("location: index.php");
	}
	?>

	<section id="akun">
	<div class="wrap row justify-content-center" style="width:100%; margin:0">
		<div class="text-center mb-4 bg-light mt-5 py-3" >
			<img src="gambar/JUDUL.png" class="py-4" style="max-width:300px;" >
		</div>
	
	<?php
    include("connect.php"); 
    $iddapet = isset($_GET['idpengguna']) ? $_GET['idpengguna'] : '';
    $hasil = mysqli_query ($mysqli, "SELECT * FROM dataidpwuser WHERE iduser='".$_SESSION['idlogin']."'");
    while ($user_data= mysqli_fetch_array($hasil)){
		$id_id = $user_data['iduser'];
		$pw_pw = $user_data['pwuser'];
		$namauser = $user_data['nama'];
        $notelp = $user_data['notelp'];
        $email = $user_data['email'];
        $tanggallahir = $user_data['tanggallahir'];
        $alamat = $user_data['alamat'];
        $kota = $user_data['kota'];
        $provinsi = $user_data['provinsi'];
        $jeniskelamin = $user_data['jeniskelamin'];
        $alasan = $user_data['alasan'];
    }
    ?>

    <div class="container col-md-6 offset-md-3 px-5 mt-4">
        <p class="text-center fw-bold fs-3">MANAGE YOUR ACCOUNT</p>
        <form  action="account.php" method="post">
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="iduser" value="<?php echo $id_id; ?>"></td>
			</tr>
			<tr>
          		<td width="180px">Password</td>
          		<td><input type="text" name="password" value="<?php echo $pw_pw;?>" class="form-control my-2 mx-2"></td>
			</tr>
			<tr>
          		<td>Name</td>
          		<td><input type="text" name="namauser" value="<?php echo $namauser;?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Phone Number</td>
          		<td><input type="number" name="notelpuser" value="<?php echo $notelp; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Email</td>
          		<td><input type="text" name="emailuser" value="<?php echo $email; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Born Date</td>
          		<td><input type="date" name="tanggallahiruser" value="<?php echo $tanggallahir; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Address</td>
          		<td><input type="text" name="alamatuser" value ="<?php echo $alamat; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>City</td>
          		<td><input type="text" name="kotauser" value="<?php echo $kota; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Province</td>
          		<td><input type="text" name="provinsiuser" value="<?php echo $provinsi; ?>" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Reasons for Joining this Community</td>
          		<td><textarea name="alasanuser" row="20" cols="50" class="form-control my-2 mx-2"><?php echo $alasan; ?></textarea></td>
        	</tr>
        	<tr>
          		<td></td>
          		<td><input type="submit" name="ubah" value="SAVE" class="form-control bg-warning rounded-pill my-2 mx-2" ></td>
        	</tr>
        	<tr>
          		<td></td>
         		<td><input type="submit" name="hapus" value="DELETE ACCOUNT" class="form-control border-0 bg-transparent text-danger my-2 mx-2" onclick="javascript: return confirm('Are you sure you want to delete this account?')"></td>
        	</tr>
        </table>       
       </form>
	
	</div>    

	<div class="text-center fw-light mt-2">
	<?php
	if(isset($_POST['ubah'])){
		$iddapet = isset($_GET['idpengguna']) ? $_GET['idpengguna'] : '';
		$pw_ = $_POST['password']; 
		$nama_ = $_POST['namauser'];
		$notelp_ = $_POST['notelpuser']; 
		$email_ = $_POST['emailuser'];
		$tanggal_lahir = $_POST['tanggalahiruser'];
		$alamat_ =  $_POST['alamatuser'];
		$kota_ = $_POST['kotauser'] ;
		$provinsi_ =$_POST['provinsiuser'];
		$alasan_ =$_POST['alasanuser'];
		
		include("connect.php");
		$sql = "UPDATE dataidpwuser SET pwuser='".$pw_."', nama='".$nama_."', notelp='".$notelp_."', email='".$email_."', tanggallahir='".$tanggal_lahir."', alamat='".$alamat_."', kota='".$kota_."', provinsi='".$provinsi_."',alasan='".$alasan_."' WHERE iduser='$id_id'";
		if (mysqli_query($mysqli, $sql)) {
			header("location: modul.php?pesan=berhasil&namaid=$_POST[idlogin]");
		} else {
			header('location:modul.php?pesan=gagal'); 
		}
	}
	?>
	<?php
	if (isset($_POST['hapus'])) {
		include("connect.php");
		$iddapet = isset($_GET['idpengguna']) ? $_GET['idpengguna'] : '';

		$query = "DELETE FROM dataidpwuser WHERE iduser='".$_POST['iduser']."'";
	
		if (mysqli_query($mysqli, $query)) {
			echo "<script>alert('Data Berhasil Dihapus');location='login_page.php';</script>";
		} else {
			echo "<script>alert('Error');window.history.go(-1);</script>";
		}
	}
	?>
	</div>
	</section>
	<footer class=" text-center text-white bg-secondary mt-5">
      <div class="container">
        <div class="row pt-3" style="font-size:14px">  
          <div class="col">
		  	<p class="fw-light" >if you have difficulty during the login process, please report it to our email address</p>
			<a href="https://gmail.com" class="btn btn-outline-danger mb-3" style="font-size:14px"><i class="fas fa-envelope"></i> elc_indonesia@gmail.com</a>
            <p class="fw-light mt-3">Copyright 2021</p>
          </div>
        </div> 
      </div> 
    </footer>

</div>


</body>
</html>
<?php
ob_flush();
?>
<script>
window.onscroll = function(){scrollFunction()};

function scrollFunction(){
    if(document.body.scrollTop >20 || document.documentElement.scrollTop>20){
      document.getElementById("navigasi").style.top = "0";
    } 
    else {
      document.getElementById("navigasi").style.top = "-75px";
    }
}
</script>