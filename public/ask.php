<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
if (isset($_POST['submit'])){
	$nama = mysql_prep($_POST['nama']);
	$email = mysql_prep($_POST['email']);
	$topik = mysql_prep($_POST['topik']);
	$pertanyaan = mysql_prep($_POST['pertanyaan']);
	$pasta = mysql_prep($_POST['pasta']);

	if(!empty($errors)){
	 $_SESSION["errors"] = $errors;
	 redirect_to("index.php");
	} 
	
	$query  = "INSERT INTO ask (";
	$query .= "nama, email, topik, pertanyaan, pasta";
	$query .= ") VALUES (";
	$query .= " '{$nama}', '{$email}', '{$topik}', '{$pertanyaan}', '{$pasta}'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
	
	if ($result) {
		// Success!
		$_SESSION["message"] = "Pertanyan terkirim";
		redirect_to("index.php");
	} else {
		// Fail
		$_SESSION["message"] = "Pertanyaan tidak terkirim";
		redirect_to("index.php");
	}

}else {
 redirect_to("index.php");
}
?>

<?php 
	if(isset($connection)){ mysqli_close($connection); }
?>