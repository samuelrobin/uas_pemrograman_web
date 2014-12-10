<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php
	$admin_set = find_all_admins();
?>
<?php $layout_context = "admin"?>
<?php	include("../includes/layouts/header.php");?>
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
		     <?php echo message();?>  
	     <div id="pagetitle"></div>
	     <div id="content">
		 <h2>Manage Admin</h2>
		 <table>
					<tr>
						<th style="text-align:left; width:200px;">Username</th>
						<th colspan="2" style="text-align:left;">Actions</th>
					</tr>
					<?php while($admin = mysqli_fetch_assoc($admin_set)){?>
						<tr>
							<td><?php echo htmlentities($admin["username"]); ?></br>
							 <?php// echo htmlentities($admin["hashed_password"]); ?>
							</td>
							<td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a>&nbsp;&nbsp;</td>
							<td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>

						</tr>
					<?php } ?>
				</table>
				</br>
				<a href="admin.php">Batal</a>
				<a href="new_admin.php">Tambah Admin</a>
		</div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->

