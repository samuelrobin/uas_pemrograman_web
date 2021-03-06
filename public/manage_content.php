<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(); ?>
 <!-- Memulai Wrapper (Wrapper ini sebagai bungkusan dari HTML-->
   <div id="wrapper">
		 
		 <!-- Memulai Left Column -->
		 <div id="leftcolumn">
		 <a href="admin.php">&laquo; Main menu</a><br/>		 <!-- &laquo untuk membuat simbol "<<" -->
		 <div id="button"> <?php echo navigation($current_subject, $current_page); ?> <br></div>		
		 <div id="content"></div>
		 <a href="new_subject.php">Menambah Subject</a></br>
		 <a href="edit_logo.php">Merubah Logo</a></br>
		 <a href="edit_banner.php">Merubah Banner</a>
		 </div>
		 <!-- Mengakhiri Left Column -->
		 
		 <!-- Memulai Right Column -->
		 <div id="rightcolumn">
		     <?php echo message();?>  
	     <div id="pagetitle"></div>
	     <div id="content">
				  <?php if($current_subject){?>
				  <h2>Manage Subject</h2>
				  Menu name: <?php echo htmlentities($current_subject["menu_name"]); ?><br />
				  Position: <?php echo $current_subject["position"]; ?><br />
				  Visible: <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?><br />
				  <a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Edit Subject</a>

				<div style="font-size: 12px; margin-top: 2em; border-top: 1px solid #000;">
				 Halaman dalam subject ini:
				  <ul><?php $subject_pages = find_pages_for_subject($current_subject["id"]);
				    while ($page = mysqli_fetch_assoc($subject_pages)){
					 echo "<li>";
					 $safe_page_id = urlencode($page["id"]);
					 echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
					 echo htmlentities($page["menu_name"]);
					 echo "</a>";
					 echo "</li>";
					}
				   ?>
				  </ul><br>
				  + <a href="new_page.php?subject=<?php 
					echo urlencode($current_subject["id"]);?>">Tambah halaman pada subject ini</a>
				</div>
				
				<?php } elseif ($current_page) {?>
				<h2>Manage Page</h2>
				  Menu name: <?php echo htmlentities($current_page["menu_name"]); ?><br />
				  Position: <?php echo $current_page["position"]; ?><br />
				  Visible: <?php echo $current_page["visible"]; ?><br />
				  Content:<br />
				   <?php echo $current_page["content"]; ?><br />
				  <a href="edit_page.php?page=<?php echo urlencode($current_page['id']); ?>">Edit page</a>
				<?php } else {?>
				 Silahkan pilih halaman atau subject disamping.
				<?php }?>	
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup bungkusan Wrapper -->
   <?php include("../includes/layouts/footer.php"); ?>

