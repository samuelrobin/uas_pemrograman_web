<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "public";?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>
<!-- Memulai Wrapper -->
   <div id="wrapper">
		 
		 <!-- Memulai Left Column -->
		 <div id="leftcolumn">
			 <div id="button"> <?php echo public_navigation($current_subject, $current_page); ?> <br></div>		
			 <div id="content"></div>
		 </div>
		 <!-- Mengakhiri Left Column -->
		 
		 <!-- Memulai Right Column -->
		 <div id="rightcolumn">
		  
	     <div id="pagetitle"></div>
	     <div id="content">
				 <?php if ($current_page) {?>
				  
				  <h2><?php echo htmlentities($current_page["menu_name"]); ?></h2><br />
				   <?php echo $current_page["content"]; ?><br />
				  <br><br>
				<?php } else {?>
				 <h2>Selamat Datang!</h2></br>
				 Selamat Datang di Tanya Pepsodent!</br>
				 Silahkan pilih menu.
				<?php }?>
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>