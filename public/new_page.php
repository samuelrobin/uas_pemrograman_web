<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page();?>
<?php
  if (!$current_subject){
  redirect_to("manage_content.php");
 }
?>
<?php
if (isset($_POST['submit'])){
 
 //validation
 $required_field = array("menu_name", "position", "visible", "content");
 validate_presences($required_field);
 
 $fields_with_max_lengths = array("menu_name" => 30);
 validate_max_lengths($fields_with_max_lengths);

	if(empty($errors)){
			$subject_id = $current_subject["id"];
			$menu_name = mysql_prep($_POST['menu_name']);
			$position = mysql_prep($_POST['position']);
			$visible = mysql_prep($_POST['visible']);
			$content = mysql_prep($_POST['content']);
			
				$query  = "INSERT INTO pages (";
				$query .= "subject_id, menu_name, position, visible, content";
				$query .= ") VALUES (";
				$query .= "{$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
				$query .= ")";
				$result = mysqli_query($connection, $query);
				if ($result) {
				// sukses
				$_SESSION["message"] = "Success created";
				redirect_to("manage_content.php?subject=". urlencode($current_subject["id"]));
				} else {
					// gagal
					$_SESSION["message"] = "Fail created";
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
		 <a href="admin.php">&laquo; Main menu</a><br/>
		 <div id="button"> <?php echo navigation($current_subject, $current_page); ?> <br></div>		
		 <div id="content"></div>
		 </div>
		 <!-- Mengakhiri Left Column -->
		 
		 <!-- Memulai Right Column -->
		 <div id="rightcolumn">
		     <?php echo message();?> 
			 <?php echo form_errors(errors());?>
	     <div id="pagetitle"></div>
		 <h2>Create Page</h2>
	     <div id="content">
			<form action="new_page.php?subject=<?php echo urlencode($current_subject['id']); ?>" method="post">
				<p>Nama menu: 
					<input type="text" name="menu_name" value="" />
				</p>
				<p>Posisi: 
					<select name="position">
					<?php
					 $page_set = find_pages_for_subject($current_subject["id"]);
					 $page_count = mysqli_num_rows($page_set);
					for ($count=1; $count <= ($page_count + 1); $count++){
					 echo "<option value=\"{$count}\">{$count}</option>";
					}?>					
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" /> Tidak
					&nbsp;
					<input type="radio" name="visible" value="1" /> Iya
				</p>
				<p>Content:</br>
				  <textarea name="content" rows="20" cols="80"></textarea>
				</p>
				<input type="submit" name="submit" value="Create Page" />
			</form>
			<br />
			<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Batal</a>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
   <?php include("../includes/layouts/footer.php"); ?>
