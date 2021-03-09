<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/modulcss.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- my css -->
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="animation.js"></script>
    
    <style>
      section{
        min-height: 250px;
        width:100%;
      }  
    </style>

    <title>ELC_Indonesia</title>
  </head>
  

  <body style="width:100%">
  
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigasi" style="background-color: rgba(69, 255, 218, 0.7);">
      <div class="container">
        <a class="navbar-brand mx-3 text-warning" href="#pembuka"><strong>ELC Indonesia</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item ">
              <a class="list nav-link mx-3 my-2 text-white" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="list nav-link mx-3 my-2 text-white" href="#usermanagement">Account</a>
            </li>
            <li class="nav-item">
              <a class="list nav-link mx-3 my-2 text-white" href="#modules">Modules</a>
            </li>
            <li class="nav-item">
              <a class="list nav-link mx-3 my-2 text-white" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item mx-2 my-2 ">
              <form method="post" action="account.php">
					     <input type="submit" name="keluar" value="LogOut" class="text-center form-control py-2 px-4 bg-warning rounded-pill" onclick="javascript: return confirm('Are you sure you want to logOut?')">
				      </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- PHP Untuk LogOut -->
    <?php
	  if(isset($_POST['keluar'])){
	  $_SESSION['idlogin']= '';
	  unset($_SESSION['idlogin']);
	  session_unset();
	  session_destroy();
	  header("location: index.php");
	  }
	  ?>

    <!-- Background -->
    <section id="pembuka" class="row" style="background-image: url(gambar/foto2.jpg); width:100%; margin:0" >
      <div class="col">
        <div class="selamatdatang text-white text-center fs-1 fw-bold py-4 px-2">  
          <p><br><br>WELCOME</p>
        </div>
        <div class="paragrap col text-center py-4 ">
          <p class="text-white fs-4">To the largest English Language Learning Community</p>
          <p class="indonesia text-white mx-auto py-2 fs-1">In Indonesia</p>
        </div>
      </div>
    </section>

    <!-- PHP untuk memanggil Nama User Sesuai ID yang dimasukan pada Login -->
    <?php
    include("connect.php");
    $iddapet = isset($_GET['namaid']) ? $_GET['namaid'] : '';
    
    $hasil = mysqli_query ($mysqli, "SELECT * FROM dataidpwuser WHERE iduser='".$_SESSION['idlogin']."'");
    while ($user_data= mysqli_fetch_array($hasil)){
      $id_id = $user_data['iduser'];
      $namauser = $user_data['nama'];
    }
    ?>

  <section id="usermanagement" class="row" style="width:100% ; margin:0">
    <div class="col-sm"></div>
    <div class="usericon col-sm text-center fw-light mt-4">
      <p class="fs-3">Hi! <?php echo $namauser; ?><br> Ready to improve your self?</p>
      <p class="fs-5">You can change your personal account data</p>
      <form action="account.php" method="post">
        <input type="submit" name="pindah" value="MANAGE YOUR ACCOUNT" class="border-3 rounded-pill btn btn-outline-warning py-3 px-5" >
      </form>
      <div class="mt-3">
      <!-- PHP untuk memanggil Pesan yang Dikirim dan Melakukan Percabangan -->
      <?php
        $pesannya = isset($_GET['pesan']) ? $_GET['pesan'] : '';
        if ($pesannya == "berhasil"){
          echo "<font color='green'>FINISH!, Your Account Has Been Updated.</font>";
        }
        else if($pesannya =="gagal"){
          echo "<font color='red'>SORRY! , Your update process Failed.</font>";
        } 
      
      ?>
      
      </div>
    </div>
    <div class="col-sm"></div>
  </section>
  <?php

  if(isset($_POST['pindah'])){
     $iddapet = isset($_GET['namaid']) ? $_GET['namaid'] : '';
      $cek = mysqli_query ($mysqli, "SELECT * FROM dataidpwuser WHERE iduser='".$iddapet."'");
      while ($user_data= mysqli_fetch_array($hasil)){
        $_SESSION['idlogin'];
        header("Location: account.php?idpengguna=$user_data[iduser]");
      }
    }

  ?>

    
  <section id="modules" class="portofolio bg-light pb-4 mt-5" >
    <div class="container">
      <div class="row mb-5 pt-3">
        <div class="col text-center">
          <h1 >FREE LEARNING MODULE</h1>
          <p>You can use this as your first study material, Get another module at the online learning meeting</p>
        </div>
      </div>
        
      <div class="row justify-content-center mx-3">
        <div class="col-md text-center my-4" >
          <img src="gambar/iconmodul.png" alt="" style="max-width: 125px; margin-bottom: 20px;" >
          <br>
          <p class="text-center fw-bold fs-3 text-secondary px-1 mx-2 pt-2" id = "radius">E-Learning Module Chapter One</p>
          <p ><a href="file/modul1.pdf" class="klikmodul  mb-4 " style="text-decoration:none">Click Here To Download</a><p>
        </div>  
          
        <div class="col-md text-center my-4" >
          <img src="gambar/iconmodul.png" alt="" style="max-width: 125px; margin-bottom: 20px;" >
          <br>
          <p class="text-center fw-bold fs-3 text-secondary px-1 mx-2 pt-2" id = "radius">E-Learning Module Chapter Two</p>
          <p><a href="file/modul2.pdf" class="klikmodul  mb-4 " style="text-decoration:none">Click Here To Download</a><p>
        </div>  
        
        <div class="col-md text-center my-4" >
          <img src="gambar/iconmodul.png" alt="" style="max-width: 125px; margin-bottom: 20px;" >
          <br>
          <p class="text-center fw-bold fs-3 text-secondary  px-1 mx-2 pt-2 " id = "radius">E-Learning Module Chapter Three</p>
          <p ><a href="file/modul2.pdf" class="klikmodul  mb-4 " style="text-decoration:none">Click Here To Download</a><p>
        </div>  
      </div>
    </section>

    <section>
      <div class="quotes">
        <p class="text-center mt-5 mx-2 fs-5 fw-light px-5"><i>“If you don't go after what you want, then you won't get it. If you don't ask the answer is no. If you don't take a step forward, you will still be in the same place. "</i></p>
        <p class="text-center mx-5 fs-5 fw-light "><i>~ Nora Roberts ~</i></p>
      </div>
    </section>

    <section id="schedule" class="portofolio bg-light pb-4 " style="min-height:350px">
      <div class="container">
        <div class="row mb-5 pt-3">
          <div class="col text-center">
            <h1 >ONLINE MEETING SCHEDULE</h1>
            <p>Prepare what the telegram group instructs and join the online meeting link</p>
          </div>
        </div>
        
        <div class="row justify-content-center mx-3">
          <div class="col-md text-center my-2" >
            <div class="bulan">
              <h1 class="mb-2"><span class="text-warning "><b>JAN</b></span></h1>
              <p class="text-center text-secondary " id = "radius">15 dan 28 January 2021</p>
              <p class="ket fw-light">*schedule can change at any time<p>
            </div>
            
          </div>

          <div class="col-md text-center my-2" >
            <div class="bulan">
              <h1 class="mb-2"><span class="text-warning "><b>FEB</b></span></h1>
              <p class="text-center text-secondary" id = "radius">10 and 17 February 2021</p>
              <p class="ket fw-light">*schedule can change at any time<p>
            </div>
            
          </div>  
          
          <div class="col-md text-center my-2" >
            <div class="bulan">
              <h1 class="mb-2"><span class="text-warning "><b>MAR</b></span></h1>
              <p class="text-center text-secondary" id = "radius">9 dan 18 March 2021</p>
              <p class="ket fw-light">*schedule can change at any time<p>
            </div>
            
          </div>  
        </div>
      </section>

      <section id="contact" class="contact ">
      <div class="container mt-4">
        <div class="row pt-3 mb-3">
          <div class="col text-center">
            <h4>Follow Our Social Media</h4>
            <p class="fw-light">Look forward to other big and interesting events</p>
          </div>
        </div>

        <div class="row pt-2 mb-2">
          <div class="col text-center">
            <p><a href="https://instagram.com" class="btn btn-outline-warning rounded-pill"><i class="fab fa-instagram"></i> @english_community</a></p>
            <p><a href="https://facebook.com" class="btn btn-outline-primary rounded-pill"><i class="fab fa-facebook"></i> @english_community</a></p>
          </div>
        </div>
        
      </div>
    </section>

    <footer class=" text-center text-white bg-secondary mt-5">
      <div class="container">
        <div class="row pt-3">  
          <div class="col" style="font-size:14px">
		  	    <p class="fw-light" >Thank You</p>
            <p class="fw-light mt-3">Copyright 2021</p>
            <p style="font-size:10px">Picture by pexels.com</p>
          </div>
        </div> 
      </div> 
    </footer>


</body>
</html>
<?php
ob_flush();
?>
<!-- Digunakan Untuk Mengeser Background Dengan animasi Awan-->
<script type="text/javascript">
	$(function(){
 
		$("#pembuka").css({"position":"relative", "bottom":"0px", "left":"0px"})
		function awan(){
			$('#pembuka').animate({"background-position":"-=1024px"}, 10000,
			function(){
				$("#pembuka").css({"background-position":"-=0px"});
				awan()
			}
			)
		}
		awan();
	})
</script>

<script>
  $() <- Bentuk pertama dalam javascript dengan Jquery
  $(function(){}) <- bentuk Kedua dalam Javascript dengan Jquery 
</script>



