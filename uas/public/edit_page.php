<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page();?>
<?php
 if (!$current_page){
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
		$id = $current_page["id"];
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		$content = mysql_prep($_POST['content']);
			$query  = "UPDATE pages SET ";
			$query .= "menu_name = '{$menu_name}', ";
			$query .= "position = {$position}, ";
			$query .= "visible = {$visible}, ";
			$query .= "content = '{$content}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			
			$result = mysqli_query($connection, $query);
			echo $result;
		if ($result && mysqli_affected_rows($connection) >= 0 ){
			// Success!
			$_SESSION["message"] = "Success updated";
			echo $result;
			redirect_to("manage_content.php");
		} else {
			// Fail
			$message = "Fail update";
			echo $result;
			redirect_to("edit_subject.php");
		}
		}
		}
else {

}// end isset post
?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
 <!-- Begin Wrapper -->
   <div id="wrapper">
		 
		 <!-- Begin Left Column -->
		 <div id="leftcolumn">
		 <a href="admin.php">&laquo; Main menu</a><br/>
		 <div id="button"> <?php echo navigation($current_subject, $current_page); ?> <br></div>		
		 <div id="content"></div>
		 </div>
		 <!-- End Left Column -->
		 
		 <!-- Begin Right Column -->
		 <div id="rightcolumn">
		    <?php if(!empty($message)){
					echo "<div class=\"message\">". htmlentities($message). "</div>";
				 } ?>
			 <?php echo form_errors($errors);?>
	     <div id="pagetitle"></div>
	     <div id="content">
		 <h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]) ?></h2>
			<form action="edit_page.php?page=<?php echo urlencode($current_page["id"]) ?>" method="post">
				<p>Nama menu: 
					<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]) ?>" />
				</p>
				<p>Posisi: 
					<select name="position">
					<?php
						$page_set = find_pages_for_subject($current_page["subject_id"]);
						$page_count = mysqli_num_rows($page_set);
							for ($count=1; $count <= $page_count; $count++){
								echo "<option value=\"{$count}\"";
							if ($current_page["position"] == $count){
							echo " selected";
							}
							echo ">{$count}</option>";
						}?>						
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0"<?php if ($current_page["visible"] == 0) {echo "checked";}?>/> Tidak
					&nbsp;
					<input type="radio" name="visible" value="1"<?php if ($current_page["visible"] == 1) {echo "checked";}?>/> Iya
				</p>
				<p>Content:</br>
				  <textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
				</p>
				<input type="submit" name="submit" value="Edit Page" />
			</form>
			<br />
			<a href="manage_content.php?">Batal</a>	
			&nbsp;
		    <a href="delete_page.php?page=<?php echo urlencode($current_page["id"]) ?>" onclick="return confirm('Kamu Yakin?');">Hapus</a>	
		 </div>		 
		 </div>
		 <!-- End Right Column -->
		 
   </div>
   <!-- End Wrapper -->
   <?php include("../includes/layouts/footer.php"); ?>
