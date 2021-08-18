<?php
ob_start();
session_start();
?>
<!doctype html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/stylemodul.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- my css -->

	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<title>Login Form</title>
</head>

<body>
	<!-- KEPALA -->
	<div class="text-center mb-2 mx-0 pt-5 bg-light" >
		<img src="gambar/JUDUL.png" class="pb-4" style="max-width:300px;" >
	</div>
	
    <!-- FORM -->
	<div class="row" style="width:100%">
	    <div class="col-sm">
	        <p></p>
	    </div>
        
        <div class="container col-sm px-5 mt-4">
		<p class="text-secondary text-center fs-4 my-2 py-3 " ><b>LOGIN</b></p>
        
		<form action="login_page.php" method="post">
		<table>
        	<tr>
          		<td width="100px">ID</td>
          		<td><input type="text" name="idlogin" class="form-control my-2 mx-2"></td>
        	</tr>
        	<tr>
          		<td>Password</td>
          		<td><input type="password" name="pwlogin"  class="form-control my-2 mx-2"></td>
        	</tr>
			<tr>
    			<td></td>
    			<td><input type="submit" name="login" value="LOGIN"  class="form-control bg-warning rounded-pill mx-2"/></td>
			</tr>
			<tr>
				<td></td>
				<td><a class="form-control text-center border-0 py-3"  href="daftar_page.php">Create Account</a></td>
			</tr>
			<tr>
				<td></td>
				<td><p class="text-center">OR</p></td>
			</tr>
			<tr>
    			<td></td>
    			<td><a class="form-control text-center border-0"  href="index.php">Back At Home</a></td>
    		</tr>
            </table>       
        </form>
	    </div>
	
	    <div class="col-sm">
	        <p></p>
	    </div>
	</div>   

    <!-- PHP -->
	<div class="text-center fw-light mt-2">
	<?php
	if(isset($_POST['login'])){
		include("connect.php"); 
		$iduser_= $_POST['idlogin']; 
		$password_ = $_POST['pwlogin'];
	
		$hasil = mysqli_query ($mysqli , "SELECT * FROM dataidpwuser WHERE iduser='".$iduser_."' AND pwuser='".$password_."'");
		if(mysqli_num_rows($hasil) > 0) {
			$_SESSION['idlogin'] = $iduser_;
			exit(header("Location: modul.php?namaid=$_POST[idlogin]"));
		} 
		else{
			echo "<p><font color='red'>ID or Password has an error!</font></p>";
		}
		}
	?>
	</div>

       <!-- FOOTER -->
	<section class="text-center text-white bg-secondary mt-5">
      <div class="container">
        <div class="row pt-3" style="font-size:12px">  
          <div class="col">
		  	<p class="fw-light">if you have difficulty registering, please report it to our email address</p>
			<a href="https://gmail.com" class="btn btn-outline-danger mb-2" style="font-size:12px"><i class="fa fa-google"></i> elc_indonesia@gmail.com</a>
            <p class="fw-light mt-3">Copyright 2021</p>
          </div>
        </div> 
      </div> 
    </section>
</body>
</html>
<?php
ob_flush();
ob_end_flush();
?>
