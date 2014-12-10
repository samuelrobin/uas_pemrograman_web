<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page();?>
<?php 
if (isset($_POST['submit'])){
	$file_name = $_FILES['banner']['name'];
	$file_size = $_FILES['banner']['size'];
	$file_tmp  = $_FILES['banner']['tmp_name'];
	$title = mysql_prep($_POST['title']);
	$bawah = mysql_prep($_POST['bawah']);
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
                            echo "The file ". basename( $_FILES['banner']['name']). " has been uploaded, and your information has been added to the directory"; 
                          } 
                            else { 
								//memberi pesan eror jika salah 
							echo "Sorry, there was a problem uploading your file."; } 
			
				if($_POST['id'] == 1) {
					$query = "UPDATE banner SET title='$title', bawah='$bawah', banner='$tujuan' WHERE id=1";
				} else if($_POST['id'] == 2) {
					$query = "UPDATE banner SET title='$title', bawah='$bawah', banner='$tujuan' WHERE id=2";
				} else if($_POST['id'] == 3) {
					$query = "UPDATE banner SET title='$title', bawah='$bawah', banner='$tujuan' WHERE id=3";
				} else {
				  die();
				}
			mysqli_query($connection, $query);
			if(mysqli_error($connection)){
			 echo "Upload banner gagal.";
			 echo mysqli_error($connection);
			 die();
			}
			redirect_to("manage_content.php");
		  }else {
		   echo "MAX 2MB cin";
		  }
		}else {
		 echo "cuman banner cin!";
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
	     <div id="papostitle"></div>
	     <div id="content">
			<h2>Ganti Slide</h2>
			<form action="edit_banner.php" method="POST" enctype="multipart/form-data">
				<p>Slide:
				 <select name="id">
				  <option value="1">1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				 </select>
				</p>
				<p>Title: 
					<input type="text" name="title" value="" />
				</p>
				<p>Pesan: 
					<input type="text" name="bawah" value="" />
				</p>
				<p>File:
					<input type="file" name="banner"/>
				</p><br>
				<input type="submit" name="submit" value="Simpan" />
			</form>
			<a href="manage_content.php">Batal</a>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>