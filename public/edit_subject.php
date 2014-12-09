<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page(); ?>
<?php 
if (isset($_POST['submit'])){

	$required_fields = array("menu_name", "position", "visible");
	validate_presences($required_fields);
	
	$fields_with_max_lengths = array("menu_name" => 30);
	validate_max_lengths($fields_with_max_lengths);
	
	if(empty($errors)){
		$id = $current_subject["id"];
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		
		$query  = "UPDATE subjects SET ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible} ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1;";
		$result = mysqli_query($connection, $query);
		
		if ($result && mysqli_affected_rows($connection) >= 0 ){
			// Sukses
			$_SESSION["message"] = "Sukses memperbarui";
			redirect_to("manage_content.php");
		} else {
			// Gagal
			$message = "Gagal memperbarui";
			redirect_to("edit_subject.php");
		}
	 
	} 
	

}else {

}// Mengakhiri proses isset
?>
<?php
 if (!$current_subject){
 die("wut");
  redirect_to("manage_content.php");
 }
?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
 <!-- Memulai Wrapper -->
   <div id="wrapper">
		 
		 <!-- Memulai Left Column -->
		 <div id="leftcolumn">
		 <a href="admin.php">&laquo; Main menu</a><br/>
		 <div id="button"> <?php echo navigation($current_subject, $current_page); ?> <br></div>		
		 <div id="content"></div>
		 <a href="new_subject.php">Add a subject</a></br>
		 <a href="edit_logo.php">Change Logo</a>
		 </div>
		 <!-- Mengakhiri Left Column -->
		 
		 <!-- Memulai Right Column -->
		 <div id="rightcolumn">
		     <?php if(!empty($message)){
					echo "<div class=\"message\">". htmlentities($message). "</div>";
				 } ?>
			 <?php echo form_errors(errors());?>
	     <div id="pagetitle"></div>
	     <div id="content">
		 <h2>Edit Subject: </h2>
			<form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]) ?>" method="post">
				<p>Nama Menu: 
					<input type="text" name="menu_name" value="<?php echo htmlentities($current_subject["menu_name"]) ?>" />
				</p>
				<p>Posisi: 
					<select name="position">
						<?php
						 $subject_set = find_all_subjects(false);
						 $subject_count = mysqli_num_rows($subject_set);
						for ($count=1; $count <= $subject_count; $count++){
						 echo "<option value=\"{$count}\"";
						 if ($current_subject["position"] == $count){
						  echo " selected";
						 }
						 echo ">{$count}</option>";
						}?>					
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" <?php if ($current_subject["visible"] == 0) {echo "checked";}?>/> Tidak
					&nbsp;
					<input type="radio" name="visible" value="1" <?php if ($current_subject["visible"] == 1) {echo "checked";}?>/> Iya
				</p>
				<input type="submit" name="submit" value="Edit Subject" />
			</form>
			<br />
			<a href="manage_content.php">Batal</a>	
			&nbsp;
			<a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]) ?>" onclick="return confirm('Kamu Yakin?');">Hapus</a>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
   <?php include("../includes/layouts/footer.php"); ?>
