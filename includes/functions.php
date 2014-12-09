<?php 
    //fungsi untuk men-redirect page ke page lain
	function redirect_to($new_location){
	 header("Location: " . $new_location);
	 exit;
	}
	
	//fungsi agar text yang ditulis dapat menggunakan spasi
	function mysql_prep($string){
	 global $connection;
	 $escape_string = mysqli_real_escape_string($connection, $string);
	 return $escape_string;
	}

	//fungsi untuk mengetahui error
	function form_errors($errors=array()){
	 $output = "";
	 if(!empty($errors)){
	  $output .= "<div class=\" error\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error){
	   $output .= "<li>";
	   $output .= htmlentities($error). "</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	 }
	 return $output;
	 }
	
    //fungsi untuk mengecek query apakah query sudah benar atau belum	
	function confirm_query($result_set) {
		if (!$result_set){
		  die("Database query failed.");
		 }
	}

	//fungsi untuk mencari / menampilkan semua subjek
	//parameter $public digunakan untuk penanda apakah
	//page yang diakses merupakan page public atau admin
	function find_all_subjects($public = true){
		global $connection;
		//WHERE visible = 1
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		if($public){
		 $query .= "WHERE visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		return $subject_set; 
	}

	//fungsi untuk mencari / menampilkan semua admin
	function find_all_admins(){
		global $connection;
		$sql ="SELECT * FROM admins";
		$sql .= " ORDER BY username ASC";
		$admin_set = mysqli_query($connection, $sql);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	//fungsi untuk mencari / menampilkan subjek sesuai dengan id subject
	//parameter $public digunakan untuk penanda apakah
	//page yang diakses merupakan page public atau admin
	//parameter $subject_id digunakan untuk mengambil id subject 
	function find_subject_by_id($subject_id, $public = true){
	 	global $connection;
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		$query = "SELECT * FROM subjects WHERE id = {$safe_subject_id} ";
		if($public){
		 $query.= "AND visible = 1 ";
		}
		$query .= " limit 1";
		$subject_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		if($subject = mysqli_fetch_assoc($subject_set)){
			return $subject; 
		} else {
		 return null;
		 };
	}	
	
	//fungsi untuk mencari / menampilkan page sesuai dengan id subject
	function find_pages_for_subject($subject_id, $public=true){
		global $connection;
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		$query = "SELECT * ";
		$query .="FROM pages ";
		$query .= "WHERE subject_id = {$safe_subject_id} ";
		if($public){
		 $query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$page_set = mysqli_query($connection, $query);
		echo mysqli_error($connection);
		confirm_query($page_set);
		return $page_set;
	}
	
	//fungsi untuk mencari / menampilkan page sesuai dengan id page
	//parameter $page_id digunakan untuk mengambil id page 
	function find_page_by_id($page_id, $public=true){
	 	global $connection;
		$safe_page_id = mysqli_real_escape_string($connection, $page_id);
		$query = "SELECT * FROM pages WHERE id = {$safe_page_id} ";
		if($public){
		 $query.= "AND visible = 1 ";
		}
		$query .=  "limit 1";
		$page_set = mysqli_query($connection, $query);
		confirm_query($page_set);
		if($page = mysqli_fetch_assoc($page_set)){
			return $page; 
		} else {
		 return null;
		 };
		
	}	
	
	//fungsi untuk mencari / menampilkan admin sesuai dengan id admin
	function find_admin_by_id($admin_id){
		global $connection;
	
		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
		
		$sql="SELECT * FROM admins
				WHERE id = {$safe_admin_id}";
		$sql .= " LIMIT 1";
		$admin_set = mysqli_query($connection, $sql);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else{
			return null;
		}
	}
	
	//fungsi untuk mencari / menampilkan admin sesuai dengan username admin
	function find_admin_by_username($username){
		global $connection;
		$safe_username= mysqli_real_escape_string($connection, $username);
		$sql="SELECT * FROM admins
				WHERE username = '{$safe_username}'";
		$sql .= " LIMIT 1";
		$admin_set = mysqli_query($connection, $sql);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else{
			return die("WOI");
		}
	}
	
	//fungsi untuk menampilkan page utama yaitu page pertama ketika subject dipilih
	function find_default_page_for_subject($subject_id){
	 $page_set = find_pages_for_subject($subject_id);
	 	if($first_page = mysqli_fetch_assoc($page_set)){
			return $first_page; 
		} else {
		 return null;
		 };
	}
	
	//fungsi untuk menampilkan page sesuai dengan page yang dipilih
	function find_selected_page($public=false){
	global $current_subject;
	global $current_page;
	 if (isset($_GET["subject"])){
	  $current_subject = find_subject_by_id($_GET["subject"], $public); 
	  if($current_subject && $public){
	    $current_subject = find_subject_by_id($_GET["subject"], $public); 
	  } else {
	    $current_page = null;
	  }
	  if($public){
		$current_page = find_default_page_for_subject($current_subject["id"]);
	  } else {
		  $current_page = null; 
		}
	  }else if (isset($_GET["page"])){
	   $current_page = find_page_by_id($_GET["page"], $public); 
	   $current_subject = null;
	  } else {
	   $current_subject = null;
	   $current_page = null;
	  }
	}
	
	//fungsi yang menampilkan navigasi sebelah kiri
	function navigation($subject_array, $page_array){
		$output = "<ul class=\"\">";
		$subject_set = find_all_subjects(false);
		while($subject = mysqli_fetch_assoc($subject_set)){
			$output .= "<li"; 
				if ($subject_array && $subject["id"] == $subject_array["id"]) {
				$output .=  " class = '' ";
				}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= htmlentities($subject["menu_name"]);
			$output .= "</a>";
			
			$page_set = find_pages_for_subject($subject["id"], false);
			$output .= "<ul class=\"\">";
			while($page = mysqli_fetch_assoc($page_set)){
			  $output .=  "<li"; //li open
				if ($page_array && $page["id"] == $page_array["id"]) {
				$output .=  " class = '' ";
				}
			  $output .=  ">";
			$output .= "<a href=\"manage_content.php?page=";
			$output .=  urlencode($page["id"]);
			$output .= "\">";
			$output .=  htmlentities($page["menu_name"]);
			$output .= "</a></li> ";
			 }
			mysqli_free_result($page_set);
			$output .= "</ul></li>";
		} 
		mysqli_free_result($subject_set);
		$output .= "</ul>";	
		return $output;
	}
	
	//fungsi yang menampilkan navigasi sebelah kiri untuk public
	function public_navigation($subject_array, $page_array){
		$output = "<ul class=\"breadcrumbs\">";
		$subject_set = find_all_subjects();
		while($subject = mysqli_fetch_assoc($subject_set)){
			$output .= "<li"; 
				if ($subject_array && $subject["id"] == $subject_array["id"]) {
				$output .=  " class = '' ";
				}
			$output .= ">";
			$output .= "<a href=\"index.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= htmlentities($subject["menu_name"]);
			$output .= "</a>";
			
			if ($subject_array["id"] == $subject["id"] ||
				$page_array["subject_id"] == $subject["id"] ){
				$page_set = find_pages_for_subject($subject["id"]);
				$output .= "<ul class=\"\">";
				while($page = mysqli_fetch_assoc($page_set)){
				  $output .=  "<li"; //li open
					if ($page_array && $page["id"] == $page_array["id"]) {
					$output .=  " class = 'title' ";
					}
				  $output .=  ">";
				$output .= "<a href=\"index.php?page=";
				$output .=  urlencode($page["id"]);
				$output .= "\">";
				$output .=  htmlentities($page["menu_name"]);
				$output .= "</a></li> ";
				 }
				$output .= "</ul>";
				mysqli_free_result($page_set);			
			}
			
			$output .="</li>";//end subject
		} 
		mysqli_free_result($subject_set);
		$output .= "</ul>";	
		return $output;
	}
	
	//fungsi untuk mengenkripsi password
	//password menggunakan enkripsi blowfish
	function password_encrypt($password){
		$hash_format = "$2a$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;					
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	//fungsi untuk membuat salt pada saat mengenkripsi password
	//salt menggunakan enkripsi md5
	function generate_salt($length){
		$unique_random_string = md5(uniqid(mt_rand(), true));
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_ireplace('+', '.', $base64_string);
		
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}
	
	//fungsi untuk mengecek password pada saat login
	//password yang diketikan dienkripsi ulang lalu dibandingkan 
	//dengan hash_password(password yang terenkripsi) pada database
	function password_check($password, $existing_hash){
		$hash = crypt($password, $existing_hash);
		//die($hash);
		if($hash == $existing_hash){
			return true;
		} else{
			return die("NOTHING USELESS");
		}
	}
	
	//fungsi untuk menyocokan username dengan password
	function attempt_login($username, $password){
		$admin = find_admin_by_username($username);
		if($admin){
			if(password_check($password, $admin["hashed_password"])){
				return $admin;
			} else{
				return false;
			}
		}	else{
			return false;
		}
	}
	
	//fungsi untuk membuat sesi login
	function logged_in(){
		return isset($_SESSION["admin_id"]);
	}	
	
	//fungsi untuk mengkonfirmasi ketika admin belum login
	//bila belum maka akan ke redirect ke halaman login.php
	//fungsi ini digunakan pada seluruh halaman admin seperti 
	//manage_content, manage_admin, edit, delete, dan add (page,subject,admin)
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to("login.php");
		}
	}
	?>