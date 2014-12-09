<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php //$layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(); ?>
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
		     <?php echo message();?> 
			 <?php echo form_errors(errors());?>
	     <div id="pagetitle"></div>
	     <div id="content">
		 <h2>Create Subject</h2>
			<form action="create_subject.php" method="post">
				<p>Menu name: 
					<input type="text" name="menu_name" value="" />
				</p>
				<p>Position: 
					<select name="position">
					<?php
					 $subject_set = find_all_subjects();
					 $subject_count = mysqli_num_rows($subject_set);
					for ($count=1; $count <= ($subject_count + 1); $count++){
					 echo "<option value=\"{$count}\">{$count}</option>";
					}?>					
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" /> No
					&nbsp;
					<input type="radio" name="visible" value="1" /> Yes
				</p>
				<input type="submit" name="submit" value="Create Subject" />
			</form>
			<br />
			<a href="manage_content.php">Cancel</a>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Menutup Bungkusan Wrapper -->
   <?php include("../includes/layouts/footer.php"); ?>
