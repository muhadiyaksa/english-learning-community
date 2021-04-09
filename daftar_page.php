<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/stylemodul.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- my css -->

	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<title>Registration Form</title>
</head>


<body >
	<!-- KEPALA -->
	<div class="header text-center mb-2 bg-light" >
		<img src="gambar/JUDUL.png" class="py-4" style="max-width:300px;" >
	</div>

    <!-- FORM -->
	<div class="row" style="width:100%">
    <div class="container col-md-6 offset-md-3  px-4">
	<p class="text-secondary text-center fs-4 my-2 py-3 " ><b>REGISTRATION FORM</b></p>
        <form action="daftar_page.php" method="post">
		<table>
			<tr>
    			<td width="120px";>New ID</td>
      			<td><input name="userid" id="userid" type="text" class="form-control px-2 my-2"></td>
    		</tr>
            
            <tr>
    			<td>New Password<br><p style="font-size:10px">*at least 8 characters</p></td>
      			<td><input name="pwinput" type="password" minlength="8" class="form-control px-2 my-2"></td>
    		</tr>
            
            <tr>
            	<td></td> 
				<td><p id="result" class="fs-6 text-secondary"></p></td>
            </tr>
            
            <tr>
    			<td>Name</td>
      			<td><input name="namalengkap" type="text" class="form-control px-2 my-2"></td>
    		</tr>

			<tr>
    			<td>Phone Number </td>
      			<td><input name="notelp" type="number" min="0" class="form-control px-2 my-2" ></td>
   	 		</tr>
    
    	 	<tr>
    			<td>Email </td>
     	 		<td><input name="email" type="email" class="form-control px-2 my-2"></td>
			</tr>
			  
     		<tr>
    			<td>Born Date</td>
      			<td><input name="tanggallahir" type="date" class="form-control px-2 my-2"></td>
    		</tr>
    
   			<tr>
    			<td>Address</td>
      			<td><textarea name="alamat" class="form-control px-2 my-2" ></textarea ></td>
    		</tr>
    
    		<tr>
   				<td>City</td>
      			<td><input name="kota" type="text" class="form-control px-2 my-2"></td>
   			</tr>

			<tr>
    			<td>Province</td>
     	 		<td><input name="provinsi" type="text" class="form-control px-2 my-2"></td>
    		</tr>
    
     		<tr>
    			<td>Gender</td>
      			<td>
      			<input type="radio" name="jkelamin" value="Laki-Laki"> Male
      			<input type="radio" name="jkelamin" value="Perempuan"> Female 
     			</td>
    		</tr>

			<tr>
				<td>Reasons for Joining This Community</td>
				<td><textarea name="alasan" rows="4" cols="50"class=" form-control px-2 my-2" ></textarea></td>
			</tr>
      		
     		<tr>
    			<td></td>
    			<td>
    				<input type="submit" name="simpan" value="SIGN UP NOW"  class="form-control bg-warning rounded-pill"/>
					<a class="form-control text-center border-0 py-3"  href="index.php">Back at Home</a>
				</td>
    		</tr>

	
        </table>
		</form>
		<div class="text-center fw-light mt-2">
		<?php
		if(isset($_POST['simpan'])){
			$id = $_POST['userid'];
			$pw = $_POST['pwinput'];
			$nama=$_POST['namalengkap'];
			$no_telp = intval($_POST['notelp']);
			$email_ = $_POST['email'];
			$tanggal_lahir = $_POST['tanggallahir'];
			$alamat_ = $_POST['alamat'];
			$kota_ = $_POST['kota'];
			$provinsi_ = $_POST['provinsi'];
			$jeniskelamin = $_POST['jkelamin'];
			$alasan_ = $_POST['alasan'];

			include("connect.php");

			$query = mysqli_query($mysqli, "SELECT * FROM dataidpwuser WHERE iduser = '".$id."'");
			if(mysqli_num_rows($query) > 0){
				echo "<p><font color='red'>SORRY!, we cannot enter your data because the ID is already registered</font></p>";
			}
			else{
    			mysqli_query($mysqli, "INSERT INTO dataidpwuser VALUES ('".$id."','".$pw."','".$nama."','".$no_telp."','".$email_."','".$tanggal_lahir."','".$alamat_."','".$kota_."','".$provinsi_."','".$jeniskelamin."','".$alasan_."')");
				echo "<p>Congratulations , Your account have been Registered</p>";
			}
		}

		?>
		</div>
    </div>
	</div>

    <!-- FOOTER -->
	<footer class=" text-center text-white bg-secondary mt-5">
      <div class="container">
        <div class="row pt-3" style="font-size:12px">  
          <div class="col">
		  	<p class="fw-light">if you have difficulty registering, please report it to our email address</p>
			<a href="https://gmail.com" class="btn btn-outline-danger mb-2" style="font-size:12px"><i class="fas fa-envelope"></i> elc_indonesia@gmail.com</a>
            <p class="fw-light mt-3">Copyright 2021</p>
          </div>
        </div> 
      </div> 
    </footer>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		var app = {
			check: function(){
				var userid = $("#userid").val();
				$.ajax({
					url: "ajax_2.php",
					method: 'POST',
					data: {userid: userid},
					success: function(response){
						$("#result").html(response).fadeIn("slow")
						
					}
				})
			}
		}
 
	$("#userid").keyup(app.check)
	})
</script>