<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page();?>
<?php 
if (isset($_POST['submit'])){
	$judul = mysql_prep($_POST['judul']);
	 
	$file_name = $_FILES['gambar']['name'];
	$file_size = $_FILES['gambar']['size'];
	$file_tmp  = $_FILES['gambar']['tmp_name'];

	$file_ext = strtolower(end(explode(".", $file_name)));
	$ext_boleh = array("jpg", "jpeg", "png", "gif", "bmp");
	
	if(empty($errors)){
		if(in_array($file_ext, $ext_boleh)){
		  if($file_size <= 2*1024*1024){
			$sumber = $file_tmp;
			$tujuan = "images/" . $file_name;
			//ngupload foto ke server
                        if(move_uploaded_file($file_tmp, $tujuan)) 
                          { 
                            echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
                          } 
                            else { 
								//memberi pesan eror jika salah  
							echo "Sorry, there was a problem uploading your file."; } 
			$sql = "INSERT INTO logo(title, gambar) 
					VALUES ('$judul', '$tujuan')";
			$result = mysqli_query($connection, $sql);
			if ($result) {
			// Sukses
			$_SESSION["message"] = "Success change logo";
			redirect_to("manage_content.php");
			} else {
				// Gagal
				$_SESSION["message"] = "Fail change logo";
			}
			if(mysqli_error($connection)){
			 echo "Upload gambar gagal.";
			 echo mysqli_error($connection);
			 die();
			}
			redirect_to("manage_content.php");
		  }else {
		   echo "MAX 2MB cin";
		  }
		}else {
		 echo "cuman gambar cin!";
		}
 }
}
?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
<!-- Memulai Wrapper -->
   <div id="wrapper">
		 
		 <!-- Memulai Left Column -->
		 <div id="leftcolumn">
		 <div id="button">&nbsp;</div>		
		 <div id="content"></div>
		 </div>
		 <!-- Mengakhiri Left Column -->
		 
		 <!-- Memulai Right Column -->
		 <div id="rightcolumn">
			<?php echo message(); ?>
			<?php $errors = errors(); ?>
			<?php echo form_errors($errors); ?>
	     <div id="pagetitle"></div>
	     <div id="content">
			<h2>Change Logo</h2>
			<form action="edit_logo.php" method="post" enctype="multipart/form-data">
				<p>Title: 
					<input type="text" name="judul" value="" />
				</p>
				<p>File:
					<input type="file" name="gambar"/>
				</p>
				<input type="submit" name="submit" value="Save Changes" />
			</form>
			<a href="manage_content.php">Batal</a>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>