<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php $layout_context = "admin";?>
<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php
 if(!isset($layout_context)){
 $layout_context = "public";
 }
 $sql = "SELECT *
		FROM ask";
$hasil = mysqli_query($connection, $sql);
?>
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
			<h2>Baca Pesan</h2>
			<table border="1" width="80%">
					<thead> 
					<tr>
						<th>Nama</th>
						<th>Topik</th>
						<th>Pertanyaan</th>
						<th>Pasta Gigi</th>
					</tr>
					</thead>
					<tbody> 				
						<?php
							while($baris = mysqli_fetch_assoc($hasil)){
							echo "<tr>";
								echo "<td>".$baris['nama']."</td>";
								echo "<td>".$baris['topik']."</td>";
								echo "<td>".$baris['pertanyaan']."</td>";
								echo "<td>".$baris['pasta']."</td>";
							}
							mysqli_free_result($hasil);
						?>
					</tbody>

				</table><br>
			<a href="admin.php">Kembali</a>
		 </div>		 
		 </div>
		 <!-- Mengakhiri Right Column -->
		 
   </div>
   <!-- Tutup Bungkusan Wrapper -->
<?php include("../includes/layouts/footer.php"); ?>	