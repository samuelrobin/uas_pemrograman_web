<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php
	$username = "";
	if(isset($_POST["submit"])){
		//mengecek apakah username dan password kosong atau tidak
		$required_fields = array("username","password");		
		validate_presences($required_fields);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("login.php");
		}
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$found_admin = attempt_login($username, $password);
		
		
		if($found_admin){
		//bila sukses
			$_SESSION["admin_id"] = $found_admin["id"]; 
			$_SESSION["username"] = $found_admin["username"]; 
			redirect_to("admin.php");
		} else{
		//bila gagal
			$_SESSION["message"]  = "Username/password not found.";
		}
	
	} else{
		
	}
?>
<?php $layout_context = "admin"?>
<?php include("../includes/layouts/header.php");?>
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
			<?php echo message(); ?>
			<?php $errors = errors(); ?>
			<?php echo form_errors($errors); ?>
	     <div id="pagetitle"></div>
	     <div id="content">
		 <h2>Login</h2>
			<form action="login.php" method= "POST">
						<p>Username :
							<input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
						</p>
						<p>Password :
							<input type="password" name="password"/>
						</p>
						<input type="submit" name="submit" value="Submit"/>
			</form>
		 </div>		 
		 </div>
		 <!-- End Right Column -->
		 
   </div>
   <!-- End Wrapper -->
<?php	include("../includes/layouts/footer.php");?>		