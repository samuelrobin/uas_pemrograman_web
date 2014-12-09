<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
<!-- Begin Wrapper -->
   <div id="wrapper">
		 
		 <!-- Begin Left Column -->
		 <div id="leftcolumn">
		 <div id="button">&nbsp;</div>		
		 <div id="content"></div>
		 </div>
		 <!-- End Left Column -->
		 
		 <!-- Begin Right Column -->
		 <div id="rightcolumn">
	     <div id="pagetitle"><h2>Admin Menu</h2></div>
	     <div id="content">
			<p>Selamat datang di area admin, <?php echo htmlentities($_SESSION["username"]);?></p>
				<ul>
				  <li><a href="manage_content.php">Mengatur isi website</a></li>
				  <li><a href="manage_admin.php">Mengatur admin user</a></li>
				  <li><a href="logout.php">Logout</a></li>
				</ul>
		 </div>		 
		 </div>
		 <!-- End Right Column -->
		 
   </div>
   <!-- End Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>	