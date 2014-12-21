<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
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
	     <div id="pagetitle"></div>
	     <div id="content">
			<h2>Admin Menu</h2>
			<p style="font-size: 14;">Selamat datang di area admin, <?php echo htmlentities($_SESSION["username"]);?></p>
				<ul>
				  <li><a href="manage_content.php">Mengatur isi website</a></li>
				  <li><a href="manage_admin.php">Mengatur admin user</a></li>
				  <li><a href="baca_pesan.php">Baca pertanyaan masuk</a></li>
				  <li><a href="logout.php">Logout</a></li>
				</ul>
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>	