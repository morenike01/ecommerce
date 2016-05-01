<?php

function log_error($error_type, $error_string,$error_file, 
$error_line){
$my= new mysqli(DB_HOST, DB_USER, DB_PWORD, DB_NAME);

$error_type = (int)$error_type;
$error_string = mysqli_real_escape_string($my,$error_string);
$error_file = mysqli_real_escape_string($my,$error_file);
$error_line =(int)$error_line;

$sql = "Insert into error set error_time=UNIX_TIMESTAMP(), error_type='$error_type', error_string='$error_string',error_file='$error_file', error_line=$error_line";

$result=mysqli_query($my,$sql);
}



//fetches all of the errors logged.
function fetch_error(){
$sql = "select error_time,
				error_string,
				error_type,
				error_file,
				error_line
				from error";

				$result = mysqli_query($my, $sql);
				$errors = array();
				while (($row = mysql_fetch_assoc($result))
				 !== false){
					$errors[] = $row;

				}
				return $errors; 
}
//converting errors to name
function error_constant_to_name($value){
	$values= array(
		E_ERROR => 'E_ERROR',
		E_NOTICE => 'E_NOTICE',
        E_WARNING => 'E_WARNING',
        E_PARSE => 'E_PARSE',
        E_CORE_ERROR => 'E_CORE_ERROR',
        E_CORE_WARNING =>  'E_CORE_WARNING',
        E_COMPILE_ERROR => 'E_COMPILE_ERROR',
        E_USER_ERROR =>   'E_USER_ERROR',
        E_USER_WARNING => 'E_USER_WARNING',
        E_USER_NOTICE => 'E_USER_NOTICE',
        E_STRICT => 'E_STRICT',
        E_RECOVERABLE_ERROR =>  'E_RECOVERABLE_ERROR',
        E_ALL =>   'E_ALL'
	);
	return $values[$value];
}

?>