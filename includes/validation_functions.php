<?php 

$errors = array();

//fungsi untuk mengganti karakter (_) menjadi spasi( )
//ucfirst digunakan untuk mengkapitalkan huruf pertama string
function fieldname_as_text($fieldname){
 $fieldname = str_replace("_"," ", $fieldname);
 $fieldname = ucfirst($fieldname);
 return $fieldname;
}

//fungsi yang mengkonfirmasi bahwa value telah ada
function has_presence($value){
 return isset($value) && $value !== "";
}

//fungsi yang mencari apakah field terisi atau tidak pada saat submit diklik
function validate_presences($required_fields){
 global $errors;
 foreach($required_fields as $field){
  $value = trim($_POST[$field]);
  if (!has_presence($value)){
   $errors[$field] = fieldname_as_text($field) . " can't be blank";
   }
  }
 }

 //fungsi yang mengkonfirmasi bahwa value memiliki panjang karakter yang sesuai max
function has_max_length($value, $max){
 return strlen($value) <= $max;
}

//fungsi yang mencari apakah panjang karakter value sesuai dengan max atau tidak
function validate_max_lengths($fields_with_max_lengths){
 global $errors;
 foreach($fields_with_max_lengths as $field => $max) {
  $value = trim($_POST[$field]);
  if(!has_max_length($value, $max)){
   $error[$field] =fieldname_as_text($field). " is too long";
  }
 }
}


function has_inclusion_in($value, $set){
 return in_array($value, $set);
}

?>